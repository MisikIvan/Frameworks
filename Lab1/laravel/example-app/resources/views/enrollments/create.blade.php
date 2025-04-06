<h1>{{ isset($enrollment) ? 'Edit Enrollment' : 'Create Enrollment' }}</h1>

<form method="POST"
    action="{{ isset($enrollment) ? route('enrollments.update', $enrollment) : route('enrollments.store') }}">
    @csrf
    @if(isset($enrollment))
        @method('PUT')
    @endif

    <label>Student:</label>
    <select name="student_id">
        @foreach ($students as $student)
            <option value="{{ $student->id }}" {{ isset($enrollment) && $enrollment->student_id == $student->id ? 'selected' : '' }}>
                {{ $student->name }}
            </option>
        @endforeach
    </select>

    <label>Course:</label>
    <select name="course_id">
        @foreach ($courses as $course)
            <option value="{{ $course->id }}" {{ isset($enrollment) && $enrollment->course_id == $course->id ? 'selected' : '' }}>
                {{ $course->name }}
            </option>
        @endforeach
    </select>

    <label>Grade:</label>
    <input type="text" name="grade" value="{{ old('grade', $enrollment->grade ?? '') }}">

    <button type="submit">Save</button>
</form>