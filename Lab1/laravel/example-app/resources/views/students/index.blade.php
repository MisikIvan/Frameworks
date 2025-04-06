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