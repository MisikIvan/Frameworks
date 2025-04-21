<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:Manager']);
    }
    public function index(Request $request)
    {
        $query = Enrollment::with(['student', 'course']);

        if ($request->filled('student_id')) {
            $query->where('student_id', $request->student_id);
        }

        if ($request->filled('course_id')) {
            $query->where('course_id', $request->course_id);
        }

        if ($request->filled('enrolled_at')) {
            $query->whereDate('enrolled_at', $request->enrolled_at);
        }

        $perPage = $request->input('itemsPerPage', 10);
        $enrollments = $query->paginate($perPage)->appends($request->query());

        return view('enrollments.index', compact('enrollments'));
    }


    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'grade' => 'nullable|string|max:5',
        ]);

        Enrollment::create($validated);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment created.');
    }

    public function show(Enrollment $enrollment)
    {
        return view('enrollments.show', compact('enrollment'));
    }

    public function edit(Enrollment $enrollment)
    {
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.edit', compact('enrollment', 'students', 'courses'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'grade' => 'nullable|string|max:5',
        ]);

        $enrollment->update($validated);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted.');
    }
}

