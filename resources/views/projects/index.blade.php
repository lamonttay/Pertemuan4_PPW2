@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
        <h1>Projects</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">+ Add New Project</a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th style="width: 180px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td><strong>{{ $project->title }}</strong></td>
                <td>{{ $project->description }}</td>
                <td>
                    <div style="display: flex; gap: 4px;">
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary">View</a>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?');" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align: center; color: #94a3b8;">No projects found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
