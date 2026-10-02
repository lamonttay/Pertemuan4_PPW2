@extends('layouts.app')

@section('title', 'Home - Portfolio')

@section('content')
    <div>
        <h1>Welcome</h1>
        <p style="margin-bottom: 16px; color: #475569;">I'm a learning Software Engineer</p>
        <a href="{{ route('projects.index') }}" class="btn btn-primary">View My Work</a>
    </div>
@endsection
