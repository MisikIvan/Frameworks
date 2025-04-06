@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Teacher Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $teacher->first_name }} {{ $teacher->last_name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $teacher->email }}</p>
            </div>
        </div>

        <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-warning mt-3">Edit</a>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">Back to list</a>
    </div>
@endsection