<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    if ($request->query('status') === 'published') {
        $posts = Post::published()->get();
    } else {
        $posts = Post::all();
    }

    return view('posts.index', compact('posts'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input: title min 5 karakter, description min 10 karakter
        $request->validate([
            'title'       => 'required|string|min:5|max:255',
            'description' => 'required|string|min:10',
        ]);

        Post::create($request->only('title', 'description', 'status'));

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi sama seperti store, dengan aturan min
        $request->validate([
            'title'       => 'required|string|min:5|max:255',
            'description' => 'required|string|min:10',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->only('title', 'description', 'status'));

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
    public function trash()
{
    $posts = Post::onlyTrashed()->get();
    return view('posts.trash', compact('posts'));
}

public function restore(string $id)
{
    $post = Post::onlyTrashed()->findOrFail($id);
    $post->restore();

    return redirect()->route('posts.trash')
        ->with('success', 'Post restored successfully.');
}

public function forceDelete(string $id)
{
    $post = Post::onlyTrashed()->findOrFail($id);
    $post->forceDelete();

    return redirect()->route('posts.trash')
        ->with('success', 'Post permanently deleted.');
}
}
