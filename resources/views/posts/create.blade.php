@extends('layouts.app')

@section('title', 'Add Post')

@section('content')
    <h1>Add New Post</h1>

    @if ($errors->any())
        <div class="alert-danger">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required class="form-control">
            @error('title')
                <small style="color: #ef4444;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <small style="color: #ef4444;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control">
                <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            @error('status')
                <small style="color: #ef4444;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary" style="margin-left: 8px;">Cancel</a>
        </div>
    </form>
@endsection
