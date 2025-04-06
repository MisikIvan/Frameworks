<h1>Enrollment</h1>
<p>Student: {{ $enrollment->student->name }}</p>
<p>Course: {{ $enrollment->course->name }}</p>
<p>Grade: {{ $enrollment->grade ?? 'N/A' }}</p>

<a href="{{ route('enrollments.index') }}">Back</a>