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