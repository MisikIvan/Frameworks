<h1>{{ isset($course) ? 'Edit Course' : 'Create Course' }}</h1>

<form method="POST" action="{{ isset($course) ? route('courses.update', $course) : route('courses.store') }}">
    @csrf
    @if(isset($course))
        @method('PUT')
    @endif

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $course->name ?? '') }}" required>

    <label>Description:</label>
    <textarea name="description">{{ old('description', $course->description ?? '') }}</textarea>

    <label>Credits:</label>
    <input type="number" name="credits" value="{{ old('credits', $course->credits ?? '') }}" required>

    <button type="submit">Save</button>
</form>