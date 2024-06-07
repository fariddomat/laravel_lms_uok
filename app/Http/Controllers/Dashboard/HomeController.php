<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Train;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function contact()
    {
        $contacts = Contact::all();
        return view('dashboard.contact', compact('contacts'));
    }

    public function statistics()
    {
        // Get the number of students enrolled in each course
        $courseStudentCounts = Course::withCount('students')->get();

        // Get the number of courses each student is enrolled in
        $studentCourseCounts = User::role('user')->withCount('studentCourses')->get();

        // Get the number of lessons each teacher has created
        $teacherLessonsCounts = User::role('teacher')->withCount('lessons')->get();

        return view('dashboard.statistics.index', compact('courseStudentCounts', 'studentCourseCounts', 'teacherLessonsCounts'));
    }

}
