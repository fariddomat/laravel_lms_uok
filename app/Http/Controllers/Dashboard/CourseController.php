<?php
// app/Http/Controllers/Dashboard/CategoryController.php
namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ORM
        $courses = Course::latest()->get();
        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('dashboard.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:courses',
            'category_id' => 'required',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload (if needed)
        if ($request->has('image')) {
            $image = $request->file('image');
            $directory = '/uploads/courses'; // Replace with the desired directory
            $helper = new ImageHelper;
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 800, 500);
            // Save the full path with name in the database
            $imagePath = $fullPath;
        }

        $course = Course::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imagePath ?? null, // Store image path or null
        ]);

        return redirect()->route('dashboard.courses.index')->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('dashboard.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories=Category::all();
        return view('dashboard.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:courses,name,' . $course->id,

            'category_id' => 'required',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->has('image')) {
            $image = $request->file('image');
            $directory = '/uploads/courses'; // Replace with the desired directory
            $helper = new ImageHelper;
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 800, 500);
            // Save the full path with name in the database
            $imagePath = $fullPath;
        }

        // Handle image upload and deletion of old image (if needed)
        // ...

        $course->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imagePath ?? $course->image, // Update image path or keep old one
        ]);

        return redirect()->route('dashboard.courses.index')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        // Handle image deletion (if needed)
        // ...

        $course->delete();
        return redirect()->route('dashboard.courses.index')->with('success', 'Course deleted successfully!');
    }

    // teacher
    public function attachUser(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);
        $userId = $request->input('user_id');

        $course->teacher()->attach($userId);

        // Return a response, e.g., redirect or JSON
        return redirect()->back()->with('success', 'User added to the course.');
    }

    // teacher
    public function detachUser(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);
        $userId = $request->input('user_id');

        $course->teacher()->detach($userId);

        // Return a response
        return redirect()->back()->with('success', 'User removed from the course.');
    }
}
