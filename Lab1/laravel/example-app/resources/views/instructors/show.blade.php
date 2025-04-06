@extends('layouts.app')

@section('content')
    <h1>Instructor Details</h1>

    <p><strong>First Name:</strong> {{ $instructor->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $instructor->last_name }}</p>
    <p><strong>Email:</strong> {{ $instructor->email }}</p>

    <a href="{{ route('instructors.edit', $instructor) }}">Edit</a>
    <form action="{{ route('instructors.destroy', $instructor) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('instructors.index') }}">Back</a>
@endsection