<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Contact;
use App\Models\Schedule;
use App\Models\Train;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $courses = Course::with('user')->get();
        $teachers = User::role('teacher')->get();
        return view('welcome', compact('courses', 'teachers'));
    }

    public function courses()
    {
        $courses = Course::all();

        return view('home.courses', compact('courses'));
    }

    public function course($id)
    {
        $course = Course::findOrFail($id);
        return view('home.course', compact('course'));
    }



    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact-us');
    }

    public function postContact(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('home');

    }
}
