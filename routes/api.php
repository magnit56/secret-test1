<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('student')->group(function () {
    Route::get('/', [\App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
    Route::get('/{student}', [\App\Http\Controllers\StudentController::class, 'show'])->name('student.show');
    Route::post('/', [\App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
    Route::patch('/{student}', [\App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
    Route::delete('/{student}', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy');
});

Route::prefix('lecture')->group(function () {
    Route::get('/', [\App\Http\Controllers\LectureController::class, 'index'])->name('lecture.index');
    Route::get('/{lecture}', [\App\Http\Controllers\LectureController::class, 'show'])->name('lecture.show');
    Route::post('/', [\App\Http\Controllers\LectureController::class, 'store'])->name('lecture.store');
    Route::patch('/{lecture}', [\App\Http\Controllers\LectureController::class, 'update'])->name('lecture.update');
    Route::delete('/{lecture}', [\App\Http\Controllers\LectureController::class, 'destroy'])->name('lecture.destroy');
});

Route::prefix('group')->group(function () {
    Route::get('/', [\App\Http\Controllers\GroupController::class, 'index'])->name('group.index');
    Route::get('/{group}', [\App\Http\Controllers\GroupController::class, 'show'])->name('group.show');
    Route::post('/', [\App\Http\Controllers\GroupController::class, 'store'])->name('group.store');
    Route::patch('/{group}', [\App\Http\Controllers\GroupController::class, 'update'])->name('group.update');
    Route::delete('/{group}', [\App\Http\Controllers\GroupController::class, 'destroy'])->name('group.destroy');
});
