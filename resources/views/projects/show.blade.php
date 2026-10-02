@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
    <h1>Project Details</h1>
    
    <div style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin-bottom: 20px; background: #fafafa;">
        <h2 style="font-size: 1.25rem; color: #1e293b; margin-bottom: 10px;">{{ $project->title }}</h2>
        <p style="color: #475569; white-space: pre-line;">{{ $project->description }}</p>
    </div>
    
    <div style="display: flex; gap: 8px; align-items: center;">
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary" style="margin-left: auto;">&larr; Back to Projects</a>
    </div>
@endsection
