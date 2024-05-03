<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Lesson $lesson)
    {
        $lessonFiles=$lesson->lesson_files;
        return view('dashboard.lessons.files.index', compact('lesson', 'lessonFiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lesson)
    {
        return view('dashboard.lessons.files.create', compact('lesson'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Lesson $lesson,Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string',
            'file' => 'required|file', // Validation for the uploaded file
        ]);

        // Handle file upload
        $file = $request->file('file');
        $path = $file->store('lesson_files'); // Store the file in the 'lesson_files' directory

        LessonFile::create([
            'title' => $validatedData['title'],
            'lesson_id' => $lesson->id,
            'path' => $path,
        ]);

        return redirect()->route('dashboard.files.index', $lesson);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson,  $lessonFile)
    {
        $lessonFile= LessonFile::findOrFail($lessonFile);
        // Delete the file from storage
        Storage::delete($lessonFile->path);
        // Delete the database record
        $lessonFile->delete();
        return redirect()->route('dashboard.files.index', $lesson);
    }
}
