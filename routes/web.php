<?php
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

Route::resource('students', StudentController::class);
Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::resource('course_students', CourseStudentController::class);
Route::resource('professors', ProfessorController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('courses', CourseController::class);
Route::resource('commissions', CommissionController::class);
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
