<?php

namespace App\Http\Controllers;
use App\Models\Post;


use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts(Request $request){
        $query = Post::orderBy('id', 'asc');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('created_by', 'like', "%{$search}%");
            });
        }

        $posts = $query->get();
        return view("posts.index", ['posts' => $posts]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
        'title' => ['required', 'string', 'min:5', 'max:100'],
        'created_by' => ['required', 'string', 'min:5', 'max:100'],
        'description' => ['nullable', 'string'],
        ]);

        $validated['description'] = !empty($validated['description']) ? $validated['description'] : null;

        Post::create($validated);

        return redirect()->route('posts')->with('success', 'Post created successfully');
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view("posts.show", ['post' => $post]);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
        'title' => ['required', 'string', 'min:5', 'max:100'],
        'created_by' => ['required', 'string', 'min:5', 'max:100'],
        'description' => ['nullable', 'string'],
    ]);

        $post = Post::findOrFail($id);
        $post->update($validated);

        return redirect()->route('posts')->with('success', 'Post updated successfully');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts')->with('success', 'Post deleted successfully');
    }
}

