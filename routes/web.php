<?php
use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class);
Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::resource('subjects', SubjectController::class);

