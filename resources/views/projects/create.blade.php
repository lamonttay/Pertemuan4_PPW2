@extends('layouts.app')

@section('title', 'Add Project')

@section('content')
    <div>
        <h1>Add New Project</h1>
        
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div style="margin-bottom: 10px;">
                <label>Title:</label><br>
                <input type="text" name="title" value="{{ old('title') }}" required style="width: 100%; max-width: 300px;">
            </div>
            
            <div style="margin-bottom: 10px;">
                <label>Description:</label><br>
                <textarea name="description" required style="width: 100%; max-width: 300px; height: 100px;">{{ old('description') }}</textarea>
            </div>
            
            <button type="submit" style="padding: 5px 10px; background: blue; color: white; border: none; cursor: pointer;">Save</button>
            <a href="{{ route('projects.index') }}" style="margin-left: 10px;">Cancel</a>
        </form>
    </div>
@endsection
