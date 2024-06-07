<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\Contact;
use App\Models\Lesson;
use App\Models\Schedule;
use App\Models\Train;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $courses = Course::limit(6)->get();
        $teachers = User::role('teacher')->get();
        $latestCourses=Course::latest()->limit(3)->get();

        return view('welcome', compact('courses', 'teachers', 'latestCourses'));
    }

    public function courses(Request $request)
    {
        if ($request->category!='') {

            $courses = Course::where('category_id', $request->category)->get();
        }else{

        $courses = Course::all();
        }
        $categories = Category::all();
        $latestCourses=Course::latest()->limit(3)->get();

        return view('home.courses', compact('courses', 'latestCourses', 'categories'));
    }

    public function course($id)
    {
        $course = Course::findOrFail($id);
        return view('home.course', compact('course'));
    }

    public function blogs()
    {
        $blogs = Blog::latest()->get();

        return view('home.blogs', compact('blogs'));
    }

    public function blog($id)
    {
        $blog = Blog::findOrFail($id);
        return view('home.blog', compact('blog'));
    }


    public function lesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('home.lesson', compact('lesson'));
    }

    public function quiz($id)
    {
        $lesson = Lesson::findOrFail($id);
        $quizzes=$lesson->quizzes;
        return view('home.quiz', compact('lesson', 'quizzes'));
    }



    public function about()
    {
        $teachers = User::role('teacher')->get();
        return view('home.about',compact('teachers'));
    }

    public function contact()
    {
        return view('home.contact-us');
    }

    public function postContact(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        Contact::create($request->all());
        return redirect()->route('home');

    }



}
