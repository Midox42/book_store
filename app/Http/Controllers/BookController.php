<?php

namespace App\Http\Controllers;
use App\Models\Book;


use Illuminate\Http\Request;

class BookController extends Controller
{
    public function home(Request $request){
        $books = Book::orderBy('id', 'desc')->take(6)->get();
        return view("welcome", ['books' => $books]);
    }

    public function about(){
        return view("about");
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
        'description' => ['nullable', 'string'],
        ]);

        $validated['description'] = !empty($validated['description']) ? $validated['description'] : null;

        Book::create($validated);

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
        'description' => ['nullable', 'string'],
    ]);

        $book = Book::findOrFail($id);
        $book->update($validated);

        return redirect()->route('books')->with('success', 'Book updated successfully');
    }

    public function destroy($id){
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books')->with('success', 'Book deleted successfully');
    }
}

