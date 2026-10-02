@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1>Edit Blog Post</h1>

    @if ($errors->any())
        <div class="alert-danger">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required class="form-control">
            @error('title')
                <small style="color: #ef4444;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required class="form-control">{{ old('description', $post->description) }}</textarea>
            @error('description')
                <small style="color: #ef4444;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary" style="margin-left: 8px;">Cancel</a>
        </div>
    </form>
@endsection
