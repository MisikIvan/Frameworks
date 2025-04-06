@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Teachers</h1>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add New Teacher</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->first_name }}</td>
                        <td>{{ $teacher->last_name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>
                            <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


<form method="GET" action="{{ route('teachers.index') }}" class="mb-3 row">
    <div class="col"><input type="text" name="first_name" value="{{ request('first_name') }}" placeholder="First Name"
            class="form-control"></div>
    <div class="col"><input type="text" name="last_name" value="{{ request('last_name') }}" placeholder="Last Name"
            class="form-control"></div>
    <div class="col"><input type="email" name="email" value="{{ request('email') }}" placeholder="Email"
            class="form-control"></div>
    <div class="col"><input type="number" name="itemsPerPage" value="{{ request('itemsPerPage', 10) }}"
            placeholder="Items per page" class="form-control"></div>
    <div class="col-auto"><button class="btn btn-primary">Filter</button></div>
</form>

<table class="table table-bordered"> ... </table>
{{ $teachers->links() }}