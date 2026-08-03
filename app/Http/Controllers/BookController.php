<?php

namespace App\Http\Controllers;
use App\Models\book;


use Illuminate\Http\Request;

class bookController extends Controller
{
    public function books(Request $request){
        $query = book::orderBy('id', 'asc');

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
        'title' => ['required', 'string', 'min:5', 'max:100'],
        'created_by' => ['required', 'string', 'min:5', 'max:100'],
        'description' => ['nullable', 'string'],
        ]);

        $validated['description'] = !empty($validated['description']) ? $validated['description'] : null;

        book::create($validated);

        return redirect()->route('books')->with('success', 'book created successfully');
    }

    public function show($id){
        $book = book::findOrFail($id);
        return view("books.show", ['book' => $book]);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
        'title' => ['required', 'string', 'min:5', 'max:100'],
        'created_by' => ['required', 'string', 'min:5', 'max:100'],
        'description' => ['nullable', 'string'],
    ]);

        $book = book::findOrFail($id);
        $book->update($validated);

        return redirect()->route('books')->with('success', 'book updated successfully');
    }

    public function destroy($id){
        $book = book::findOrFail($id);
        $book->delete();
        return redirect()->route('books')->with('success', 'book deleted successfully');
    }
}

