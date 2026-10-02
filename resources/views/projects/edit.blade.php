@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <h1>Edit Project</h1>
    
    @if ($errors->any())
        <div class="alert-danger">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required class="form-control">
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required class="form-control">{{ old('description', $project->description) }}</textarea>
        </div>
        
        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary" style="margin-left: 8px;">Cancel</a>
        </div>
    </form>
@endsection
