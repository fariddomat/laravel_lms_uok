<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::with('course', 'teacher')->get();
        return view('dashboard.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Logic to fetch necessary data for creating a lesson (e.g., courses, users)
        $courses=Course::all();
        $teachers=User::role('teacher')->get();
        return view('dashboard.lessons.create', compact('courses', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Lesson::create($validatedData);

        return redirect()->route('dashboard.lessons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        return view('dashboard.lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        // Logic to fetch necessary data for editing the lesson (e.g., courses, users)
        $courses=Course::all();
        $teachers=User::role('teacher')->get();
        return view('dashboard.lessons.edit', compact('lesson', 'courses', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string',
            'content' => 'nullable|string',
            'course_id' => 'sometimes|required|exists:courses,id',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $lesson->update($validatedData);

        return redirect()->route('dashboard.lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('dashboard.lessons.index');
    }

    public function viewCourseLessons(Course $course)
    {
        $lessons = $course->lessons;
        return view('dashboard.lessons.index', compact('course', 'lessons'));
    }
}
