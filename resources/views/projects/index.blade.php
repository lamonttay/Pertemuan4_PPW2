@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    {{-- Bungkus pake div biar rapi --}}
    <div>
        <h1>Projects</h1>
        <a href="{{ route('projects.create') }}" style="display:inline-block; margin-bottom: 10px; padding: 5px 10px; background: blue; color: white; text-decoration: none;">Add New Project</a>
        
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Looping semua data project yang dikirim dari controller --}}
                @forelse($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project->id) }}">View</a>
                    </td>
                </tr>
                @empty
                {{-- Kalo datanya kosong, tampilin ini --}}
                <tr>
                    <td colspan="3">No projects found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
