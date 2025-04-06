<h1>Courses</h1>
<a href="{{ route('courses.create') }}">Add Course</a>

<ul>
    @foreach ($courses as $course)
        <li>
            <a href="{{ route('courses.show', $course) }}">{{ $course->name }}</a>
            <a href="{{ route('courses.edit', $course) }}">Edit</a>
            <form method="POST" action="{{ route('courses.destroy', $course) }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

<form method="GET" action="{{ route('courses.index') }}" class="mb-3 row">
    <div class="col"><input type="text" name="name" value="{{ request('name') }}" placeholder="Name"
            class="form-control"></div>
    <div class="col"><input type="text" name="description" value="{{ request('description') }}"
            placeholder="Description" class="form-control"></div>
    <div class="col"><input type="number" name="credits" value="{{ request('credits') }}" placeholder="Credits"
            class="form-control"></div>
    <div class="col"><input type="number" name="itemsPerPage" value="{{ request('itemsPerPage', 10) }}"
            placeholder="Items per page" class="form-control"></div>
    <div class="col-auto"><button class="btn btn-primary">Filter</button></div>
</form>

<table class="table table-bordered"> ... </table>
{{ $courses->links() }}