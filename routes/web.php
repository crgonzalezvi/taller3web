<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

Route::get('/', function () {
    return view('/home');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth','role:student')->group(function () {
    Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('students',[StudentController::class, 'index'])->name('students.index');
    Route::post('students',[StudentController::class, 'store'])->name('students.store');
    Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::post('students/inscript', [StudentController::class, 'inscript'])->name('students.inscript');

});

Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('students', [StudentController::class, 'store'])->name('students.store');

// Route::middleware('auth','role:teacher')->group(function () {
//     Route::get('teachers',[TeacherController::class, 'index'])->name('teachers.index');
//     Route::post('teachers',[TeacherController::class, 'store'])->name('teachers.store');
//     Route::get('teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
//     Route::put('teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
//     Route::delete('teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
//     Route::post('teachers/inscript', [TeacherController::class, 'inscript'])->name('teachers.inscript');
// });


Route::get('teacher/students', [TeacherController::class, 'students'])
    ->name('teacher.students')
    ->middleware('auth', 'role:teacher');

Route::post('teacher/students/{id}/grade', [TeacherController::class, 'updateGrade'])
    ->name('teacher.updateGrade')
    ->middleware('auth', 'role:teacher');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
