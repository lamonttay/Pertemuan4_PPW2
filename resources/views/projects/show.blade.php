@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
    <div>
        <h1>Project Details</h1>
        
        <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 10px;">
            <h3>{{ $project->title }}</h3>
            <p>{{ $project->description }}</p>
        </div>
        
        <a href="{{ route('projects.index') }}" style="text-decoration: none; color: blue;">&larr; Back to Projects</a>
    </div>
@endsection
