@extends('layouts.app')

@section('title', 'Trash')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
        <h1>Trash</h1>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">&larr; Back to Posts</a>
    </div>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Deleted At</th>
                <th style="width: 200px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td><strong>{{ $post->title }}</strong></td>
                <td>{{ $post->deleted_at }}</td>
                <td>
                    <div style="display: flex; gap: 4px;">
                        <form action="{{ route('posts.restore', $post->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary">Restore</button>
                        </form>
                        <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST"
                            onsubmit="return confirm('Delete this post permanently?')" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Permanently</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align: center; color: #94a3b8;">Trash is empty.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection