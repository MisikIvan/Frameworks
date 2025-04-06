@extends('layouts.app')

@section('content')
    <h1>Instructors</h1>

    <a href="{{ route('instructors.create') }}">Add Instructor</a>

    <ul>
        @foreach($instructors as $instructor)
            <li>
                <a href="{{ route('instructors.show', $instructor) }}">
                    {{ $instructor->first_name }} {{ $instructor->last_name }}
                </a>
                |
                <a href="{{ route('instructors.edit', $instructor) }}">Edit</a>
                <form action="{{ route('instructors.destroy', $instructor) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection