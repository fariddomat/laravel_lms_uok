<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use App\Http\Controllers\Home\SiteController;
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

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/courses', [SiteController::class, 'courses'])->name('courses');
Route::get('/courses/{id}', [SiteController::class, 'course'])->name('courses.show');
Route::get('/lessons/{id}', [SiteController::class, 'lesson'])->name('lessons.show');

Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contact');
Route::post('/postContact', [SiteController::class, 'postContact'])->name('postContact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/updateInfo', [ProfileController::class, 'updateInfo'])->name('profile.updateInfo');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {

    // suggestion
});
Route::middleware(['role:admin'])->prefix('dashboard')->name('dashboard.')->group(function () {
    // Routes accessible only to admins

    Route::resource('users', Dashboard\UserController::class);
    Route::get('/contact', [Dashboard\HomeController::class, 'contact'])->name('contact');

});

Route::middleware(['role:admin||moderator'])->prefix('dashboard')->name('dashboard.')->group(function () {
    // Routes accessible to admins and coach

    Route::resource('courses', Dashboard\CourseController::class);
    Route::get('/courses/{course}/lessons', [Dashboard\LessonController::class, 'viewCourseLessons'])->name('courses.lessons');
    Route::resource('lessons', Dashboard\LessonController::class);
    Route::resource('lessons/{lesson}/files', Dashboard\LessonFileController::class)->except(['show', 'edit', 'update']);
    Route::resource('lessons.quizzes', Dashboard\QuizController::class);
});

require __DIR__ . '/auth.php';
