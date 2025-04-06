<h1>Students</h1>
<a href="{{ route('students.create') }}">Add New</a>

<ul>
    @foreach ($students as $student)
        <li>
            <a href="{{ route('students.show', $student) }}">{{ $student->first_name }} {{ $student->last_name }}</a>
            <a href="{{ route('students.edit', $student) }}">Edit</a>
            <form method="POST" action="{{ route('students.destroy', $student) }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

<form method="GET" action="{{ route('students.index') }}" class="mb-3 row">
    <div class="col"><input type="text" name="first_name" value="{{ request('first_name') }}" class="form-control"
            placeholder="First Name"></div>
    <div class="col"><input type="text" name="last_name" value="{{ request('last_name') }}" class="form-control"
            placeholder="Last Name"></div>
    <div class="col"><input type="email" name="email" value="{{ request('email') }}" class="form-control"
            placeholder="Email"></div>
    <div class="col"><input type="text" name="phone" value="{{ request('phone') }}" class="form-control"
            placeholder="Phone"></div>
    <div class="col">
        <input type="number" name="itemsPerPage" value="{{ request('itemsPerPage', 10) }}" class="form-control"
            placeholder="Items per page">
    </div>
    <div class="col-auto"><button class="btn btn-primary">Filter</button></div>
</form>

<table class="table table-bordered"> ... </table>

{{ $students->links() }}