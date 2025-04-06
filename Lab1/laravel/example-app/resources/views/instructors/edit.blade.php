@extends('layouts.app')

@section('content')
    <h1>Edit Instructor</h1>

    @if ($errors->any())
        <div>
            <strong>Whoops!</strong> There were problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('instructors.update', $instructor) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>First Name:</label>
            <input type="text" name="first_name" value="{{ old('first_name', $instructor->first_name) }}" required>
        </div>

        <div>
            <label>Last Name:</label>
            <input type="text" name="last_name" value="{{ old('last_name', $instructor->last_name) }}" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email', $instructor->email) }}" required>
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('instructors.index') }}">Back</a>
    </form>
@endsection