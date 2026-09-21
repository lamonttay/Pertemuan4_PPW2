@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <div>
        <h1>Edit Project</h1>
        
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 10px;">
                <label>Title:</label><br>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required style="width: 100%; max-width: 300px;">
            </div>
            
            <div style="margin-bottom: 10px;">
                <label>Description:</label><br>
                <textarea name="description" required style="width: 100%; max-width: 300px; height: 100px;">{{ old('description', $project->description) }}</textarea>
            </div>
            
            <button type="submit" style="padding: 5px 10px; background: orange; color: white; border: none; cursor: pointer;">Update</button>
            <a href="{{ route('projects.index') }}" style="margin-left: 10px;">Cancel</a>
        </form>
    </div>
@endsection
