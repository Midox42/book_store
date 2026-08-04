<?php

namespace App\Http\Controllers;
use App\Models\Book;


use Illuminate\Http\Request;

class BookController extends Controller
{
    public function home(Request $request){
        $books = Book::orderBy('id', 'desc')->paginate(8);
        $heroBook = Book::inRandomOrder()->first();
        return view("index", ['books' => $books, 'heroBook' => $heroBook]);
    }

    public function about(){
        $totalBooks = Book::count();
        $globalPublishers = Book::distinct('created_by')->count('created_by');
        return view("about", [
            'totalBooks' => $totalBooks,
            'globalPublishers' => $globalPublishers
        ]);
    }

    public function books(Request $request){
        $query = Book::orderBy('id', 'asc');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('created_by', 'like', "%{$search}%");
            });
        }

        $books = $query->get();
        return view("books.index", ['books' => $books]);
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
        'title' => ['required', 'string', 'min:3', 'max:100'],
        'created_by' => ['required', 'string', 'min:2', 'max:100'],
        'price'       => 'required|numeric|min:0',
        'description' => ['nullable', 'string'],
        'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ]);
        if ($request->hasFile('cover_image')) {
        // Saves to storage/app/public/covers/
        $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
    }


        $validated['description'] = !empty($validated['description']) ? $validated['description'] : null;

        $book = Book::create($validated);
        if ($request->has('genres')) {
        $book->genres()->sync($request->genres);
        }

        return redirect()->route('books')->with('success', 'Book created successfully');
    }

    public function show($id){
        $book = Book::findOrFail($id);
        return view("books.show", ['book' => $book]);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
        'title' => ['required', 'string', 'min:3', 'max:100'],
        'created_by' => ['required', 'string', 'min:2', 'max:100'],
        'price'       => 'required|numeric|min:0',
        'description' => ['nullable', 'string'],
        'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
    ]);

    $book = Book::findOrFail($id);

    if ($request->hasFile('cover_image')) {
        // Delete old cover image if it exists
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }
        // Save the new file
        $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
    }

    $validated['description'] = !empty($validated['description']) ? $validated['description'] : null;

    $book->update($validated);

    if ($request->has('genres')) {
        $book->genres()->sync($request->genres);
    }

    return redirect()->route('books')->with('success', 'Book updated successfully');
    }
}

