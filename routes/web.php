<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\TimeSlotController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('academic-years', AcademicYearController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('kelas', KelasController::class);
Route::resource('days', DayController::class);
Route::resource('time-slots', TimeSlotController::class);
