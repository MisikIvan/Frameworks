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


<form method="GET" action="{{ route('instructors.index') }}" class="mb-3 row">
    <div class="col"><input type="text" name="first_name" value="{{ request('first_name') }}" placeholder="First Name"
            class="form-control"></div>
    <div class="col"><input type="text" name="last_name" value="{{ request('last_name') }}" placeholder="Last Name"
            class="form-control"></div>
    <div class="col"><input type="email" name="email" value="{{ request('email') }}" placeholder="Email"
            class="form-control"></div>
    <div class="col"><input type="text" name="specialization" value="{{ request('specialization') }}"
            placeholder="Specialization" class="form-control"></div>
    <div class="col"><input type="number" name="itemsPerPage" value="{{ request('itemsPerPage', 10) }}"
            class="form-control" placeholder="Items per page"></div>
    <div class="col-auto"><button class="btn btn-primary">Filter</button></div>
</form>

<table class="table table-bordered"> ... </table>
{{ $instructors->links() }}