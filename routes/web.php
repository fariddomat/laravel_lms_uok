<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Dashboard\FavoriteController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Home;
use App\Http\Controllers\Home\QuizController;
use App\Http\Controllers\Home\SiteController;
use App\Http\Controllers\Home\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/pusher/auth', function() {
    return Auth::user();
});

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/courses', [SiteController::class, 'courses'])->name('courses');
Route::get('/courses/{id}', [SiteController::class, 'course'])->name('courses.show');
Route::get('/lessons/{id}', [SiteController::class, 'lesson'])->name('lessons.show');
Route::get('/lessons/{id}/quiz', [SiteController::class, 'quiz'])->name('lessons.quiz');

Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contact');
Route::post('/postContact', [SiteController::class, 'postContact'])->name('postContact');


Route::get('/blogs', [SiteController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{id}', [SiteController::class, 'blog'])->name('blogs.show');

// Ensure that the user is authenticated for these routes
Route::middleware(['auth'])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
    Route::get('/messages', [ChatController::class, 'fetchMessages'])->name('chat.fetchMessages');

Route::post('favorites', [StudentController::class, 'favorite'])->name('favorites.store');
Route::delete('favorites', [StudentController::class, 'destroyfavorite'])->name('favorites.destroy');
Route::post('comments', [StudentController::class, 'comment'])->name('comments.store');
// Route for students to view all their courses
    Route::get('/student/courses', [StudentController::class, 'courses'])->name('student.courses');

    // Route for students to join a course
    Route::get('/student/join-course/{courseId}', [StudentController::class, 'joinCourse'])->name('student.joinCourse');

    // Route for students to unjoin a course
    Route::get('/student/unjoin-course/{courseId}', [StudentController::class, 'unJoinCourse'])->name('student.unJoinCourse');

    // Route for students to take a quiz
    Route::get('/student/make-quiz/{quizId}', [StudentController::class, 'makeQuiz'])->name('student.makeQuiz');

    // Route for students to submit quiz answers
    Route::post('/student/store-quiz-answer/{quizId}', [StudentController::class, 'storeQuizAnswer'])->name('student.storeQuizAnswer');

    // Route for students to view quiz results
    Route::get('/student/quiz-results/{quizId}', [StudentController::class, 'quizResults'])->name('student.quizResults');
});

Route::middleware('auth')->group(function () {

Route::get('lessons/{lesson}/quizzes', [QuizController::class, 'show'])->name('quizzes.show');
Route::post('lessons/{lesson}/quizzes', [QuizController::class, 'submit'])->name('quizzes.submit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/updateInfo', [ProfileController::class, 'updateInfo'])->name('profile.updateInfo');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::delete('favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::get('/quizzes', [UserController::class, 'quizzes'])->name('quizzes');
    Route::get('online_classes/index', 'App\Http\Controllers\Dashboard\OnlineClasseController@index')->name('online_classes.index');

    // suggestion
});
Route::middleware(['role:admin'])->prefix('dashboard')->name('dashboard.')->group(function () {
    // Routes accessible only to admins

    Route::resource('users', Dashboard\UserController::class);
    Route::get('/contact', [Dashboard\HomeController::class, 'contact'])->name('contact');

});
// teacher
Route::middleware(['role:admin||moderator|teacher'])->prefix('dashboard')->name('dashboard.')->group(function () {
    // Routes accessible to admins and coach

    Route::get('online_classes/create', 'App\Http\Controllers\Dashboard\OnlineClasseController@createView')->name('online_classes.create');
    Route::post('online_classes/store', 'App\Http\Controllers\Dashboard\OnlineClasseController@store')->name('online_classes.store');
    Route::get('online_classes/{id}/edit', 'App\Http\Controllers\Dashboard\OnlineClasseController@edit')->name('online_classes.edit');
    Route::delete('online_classes/{id}', 'App\Http\Controllers\Dashboard\OnlineClasseController@destroy')->name('online_classes.destroy');
    Route::post('online_classes/notify/id', 'App\Http\Controllers\Dashboard\OnlineClasseController@notify')->name('online_classes.notify');



    Route::resource('courses', Dashboard\CourseController::class);
    Route::get('/courses/{course}/lessons', [Dashboard\LessonController::class, 'viewCourseLessons'])->name('courses.lessons');
    Route::resource('lessons', Dashboard\LessonController::class);
    Route::resource('lessons/{lesson}/files', Dashboard\LessonFileController::class)->except(['show', 'edit', 'update']);
    Route::resource('lessons.quizzes', Dashboard\QuizController::class);
    Route::resource('comments', Dashboard\CommentController::class);



    Route::get('/imageGallery/browser', [Dashboard\ImageGalleryController::class, 'browser'])->name('imageGallery.browser');
    Route::post('/imageGallery/uploader', [Dashboard\ImageGalleryController::class, 'uploader'])->name('imageGallery.uploader');

});

Route::middleware(['role:admin||moderator'])->prefix('dashboard')->name('dashboard.')->group(function () {
    // Routes accessible to admins and coach

    Route::resource('blogs', Dashboard\BlogController::class);


    Route::get('/imageGallery/browser', [Dashboard\ImageGalleryController::class, 'browser'])->name('imageGallery.browser');
    Route::post('/imageGallery/uploader', [Dashboard\ImageGalleryController::class, 'uploader'])->name('imageGallery.uploader');

});

require __DIR__ . '/auth.php';
