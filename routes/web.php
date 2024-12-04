<?php
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

Route::get('students/pdf', [StudentController::class, 'exportToPdf'])->name('students.pdf');
Route::resource('students', StudentController::class);
Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::resource('course_students', CourseStudentController::class);
Route::get('/professors/export-pdf', [ProfessorController::class, 'exportPdf'])->name('professors.exportPdf');
Route::resource('professors', ProfessorController::class);
Route::resource('subjects', SubjectController::class);
Route::get('courses/pdf', [CourseController::class, 'exportToPdf'])->name('courses.pdf');
Route::resource('courses', CourseController::class);
Route::get('/commissions/export-pdf', [CommissionController::class, 'exportPdf'])->name('commissions.exportPdf');
Route::resource('commissions', CommissionController::class);
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
