@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div style="display: flex; gap: 8px;">
    @if (request('status') === 'published')
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Show All</a>
    @else
        <a href="{{ route('posts.index', ['status' => 'published']) }}" class="btn btn-secondary">Published Only</a>
    @endif
    <a href="{{ route('posts.trash') }}" class="btn btn-secondary">Trash</a>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Add New Post</a>
</div>

    {{-- Flash message for success --}}
    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th style="width: 180px;">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($posts as $post)
            <tr>
                <td><strong>{{ $post->title }}</strong></td>
                <td>{{ $post->description }}</td>
                <td>{{ ucfirst($post->status) }}</td>
                <td>
                    <div style="display: flex; gap: 4px;">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">View</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                            onsubmit="return confirmDelete()" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center; color: #94a3b8;">No posts found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this post?');
        }
    </script>
@endsection