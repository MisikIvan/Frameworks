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