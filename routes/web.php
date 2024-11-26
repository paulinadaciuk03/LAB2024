<?php
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class);
Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::resource('course_students', CourseStudentController::class);
Route::resource('professors', ProfessorController::class);
