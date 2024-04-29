<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    /**
     * Display a listing of the quizzes for a lesson.
     */
    public function index(Lesson $lesson)
    {
        $quizzes = $lesson->quizzes;
        return view('dashboard.lessons.quizzes.index', compact('lesson', 'quizzes'));
    }

    /**
     * Show the form for creating a new quiz for a lesson.
     */
    public function create(Lesson $lesson)
    {
        return view('dashboard.lessons.quizzes.create', compact('lesson'));
    }

    /**
     * Store a newly created quiz for a lesson.
     */
    public function store(Request $request, Lesson $lesson)
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'option_1' => 'required|string|max:255',
            'option_2' => 'required|string|max:255',
            'option_3' => 'required|string|max:255',
            'option_4' => 'required|string|max:255',
            'correct_option' => 'required|integer|between:1,4', // Assuming 4 options
        ]);
        $quiz = new Quiz($validatedData);
        $quiz->lesson()->associate($lesson); // Associate quiz with the lesson
        $quiz->save();

        return redirect()->route('dashboard.lessons.quizzes.index', $lesson);
    }

    /**
     * Display the specified quiz for a lesson.
     */
    public function show(Lesson $lesson, Quiz $quiz)
    {
        if ($quiz->lesson_id !== $lesson->id) {
            abort(404);
        }

        $options = [$quiz->option_1, $quiz->option_2, $quiz->option_3, $quiz->option_4];
        return view('dashboard.lessons.quizzes.show', compact('lesson', 'quiz', 'options'));
    }

    /**
     * Show the form for editing the specified quiz.
     */
    public function edit(Lesson $lesson, Quiz $quiz)
    {
        return view('dashboard.lessons.quizzes.edit', compact('lesson', 'quiz'));
    }

    /**
     * Update the specified quiz in storage.
     */
    public function update(Request $request, Lesson $lesson, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'option_1' => 'required|string|max:255',
            'option_2' => 'required|string|max:255',
            'option_3' => 'required|string|max:255',
            'option_4' => 'required|string|max:255',
            'correct_option' => 'required|integer|between:1,4', // Assuming 4 options
        ]);

        $quiz->update($validatedData);
        return redirect()->route('dashboard.lessons.quizzes.index', $lesson);
    }

    /**
     * Remove the specified quiz from storage.
     */
    public function destroy(Lesson $lesson, Quiz $quiz)
    {
        // ... (Logic to delete the quiz)
        $quiz->delete();
        return redirect()->route('dashboard.lessons.quizzes.index', $lesson);
    }
}
