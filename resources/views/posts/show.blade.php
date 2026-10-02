@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <h1>Post Details</h1>

    <div style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin-bottom: 20px; background: #fafafa;">
        <h2 style="font-size: 1.25rem; color: #1e293b; margin-bottom: 10px;">{{ $post->title }}</h2>
        <p style="color: #475569; white-space: pre-line;">{{ $post->description }}</p>
    </div>

    <div style="display: flex; gap: 8px; align-items: center;">
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
            onsubmit="return confirmDelete()" style="margin: 0;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary" style="margin-left: auto;">&larr; Back to Posts</a>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this post?');
        }
    </script>
@endsection
