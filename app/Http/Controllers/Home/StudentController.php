<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\UserQuiz;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Enroll the authenticated student into a course.
     */
    public function joinCourse($courseId)
    {
        $course = Course::find($courseId);
        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }

        $user = Auth::user();
        $user->studentCourses()->attach($courseId);

        return redirect()->back()->with('success', 'You have successfully enrolled in the course.');
    }

    /**
     * Unenroll the authenticated student from a course.
     */
    public function unJoinCourse($courseId)
    {
        $user = Auth::user();
        $user->studentCourses()->detach($courseId);

        return redirect()->back()->with('success', 'You have successfully unenrolled from the course.');
    }

    /**
     * Display all courses the authenticated student is enrolled in.
     */
    public function courses()
    {
        $user = Auth::user();
        $courses = $user->studentCourses;
        $latestCourses=Course::latest()->limit(3)->get();
        return view('home.courses', compact('courses', 'latestCourses'));
    }

    public function accessCourse($courseId)
    {
        $user = Auth::user();
        if ($user->hasCourse($courseId)) {
            // Proceed with accessing the course
            $course = Course::findOrFail($courseId);
            return view('home.course', compact('courses'));
        } else {
            // Redirect or show an error if the course does not belong to the user
            return redirect()->back()->with('error', 'You are not enrolled in this course.');
        }
    }

    public function accessLesson($courseId)
    {
        $user = Auth::user();
        if ($user->hasCourse($courseId)) {
            // Proceed with accessing the course
            $course = Course::findOrFail($courseId);
            return view('home.course', compact('courses'));
        } else {
            // Redirect or show an error if the course does not belong to the user
            return redirect()->back()->with('error', 'You are not enrolled in this course.');
        }
    }


    /**
     * Display the quiz page for a specific quiz.
     */
    public function makeQuiz($quizId)
    {
        $quiz = Quiz::find($quizId);
        if (!$quiz) {
            return redirect()->back()->with('error', 'Quiz not found.');
        }

        return view('student.makeQuiz', compact('quiz'));
    }

    /**
     * Store the student's answer to a quiz.
     */
    public function storeQuizAnswer(Request $request, $quizId)
    {
        $request->validate([
            'selected_option' => 'required|integer',
        ]);

        $quiz = Quiz::findOrFail($quizId);
        $isCorrect = ($quiz->correct_option === $request->selected_option);

        $userQuiz = UserQuiz::create([
            'user_id' => Auth::id(),
            'quiz_id' => $quizId,
            'selected_option' => $request->selected_option,
            'is_correct' => $isCorrect,
        ]);

        return redirect()->route('student.quizResults', $quizId)->with('success', 'Quiz submitted successfully.');
    }

    /**
     * Display the result of a quiz attempt.
     */
    public function quizResults($quizId)
    {
        $userQuiz = UserQuiz::where('user_id', Auth::id())->where('quiz_id', $quizId)->firstOrFail();

        return view('student.quizResults', compact('userQuiz'));
    }
}
