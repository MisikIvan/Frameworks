<h1>Enrollments</h1>
<a href="{{ route('enrollments.create') }}">Add Enrollment</a>

<ul>
    @foreach ($enrollments as $enrollment)
        <li>
            {{ $enrollment->student->name }} → {{ $enrollment->course->name }} | Grade: {{ $enrollment->grade ?? 'N/A' }}
            <a href="{{ route('enrollments.edit', $enrollment) }}">Edit</a>
            <form method="POST" action="{{ route('enrollments.destroy', $enrollment) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

<form method="GET" action="{{ route('enrollments.index') }}" class="mb-3 row">
    <div class="col"><input type="number" name="student_id" value="{{ request('student_id') }}" placeholder="Student ID"
            class="form-control"></div>
    <div class="col"><input type="number" name="course_id" value="{{ request('course_id') }}" placeholder="Course ID"
            class="form-control"></div>
    <div class="col"><input type="date" name="enrolled_at" value="{{ request('enrolled_at') }}" class="form-control">
    </div>
    <div class="col"><input type="number" name="itemsPerPage" value="{{ request('itemsPerPage', 10) }}"
            placeholder="Items per page" class="form-control"></div>
    <div class="col-auto"><button class="btn btn-primary">Filter</button></div>
</form>

<table class="table table-bordered"> ... </table>
{{ $enrollments->links() }}