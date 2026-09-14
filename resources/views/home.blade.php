@extends('layouts.app')

@section('title', 'Home - Portfolio')

@section('content')
    <div>
        <h1>Welcome</h1>
        <p>I'm a learning Software Engineer</p>
        <a href="{{ route('projects') }}">View My Work</a>
    </div>
@endsection
