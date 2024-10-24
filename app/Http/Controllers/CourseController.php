<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Constructor to apply middleware for permission checks
    public function __construct()
    {
        // Apply middleware for permissions for restrict functuon according to permission

        // $this->middleware('can:manage-courses')->only(['create', 'store', 'edit', 'update', 'destroy']);
        // $this->middleware('can:view-courses')->only(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all courses, you might consider paginating for better performance
        $courses = Course::all(); // Adjust the number per page as needed
    
        // Return the view with the courses data
        return view('courses.index', [
            'courses' => $courses
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('courses.create' );
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new course
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id)->first();
        return view('courses.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id)->first();
        return view('courses.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Find the course by ID or fail if not found
        $course = Course::findOrFail($id);

        // Update course details
        $course->title = $request->title;
        $course->description = $request->description;
        $course->save();

        // Redirect with success message
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id)->first();
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
