<h1>{{ $course->name }}</h1>
<p>{{ $course->description }}</p>
<p>Credits: {{ $course->credits }}</p>

<a href="{{ route('courses.index') }}">Back</a>