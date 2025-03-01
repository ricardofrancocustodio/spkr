<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SavequestionsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RecordingsController;
use App\Http\Controllers\EvaluationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Routes redirecting to a function on Controller
Route::post('deleteanswer', [TestController::class, 'deleteanswer'])->name('deleteanswer');
Route::post('deleteselectedanswer', [TestController::class, 'deleteselectedanswer'])->name('deleteselectedanswer');
Route::post('deleteallanswers', [TestController::class, 'deleteallanswers'])->name('deleteallanswers');
Route::any('testindex', [TestController::class, 'testindex'])->name('testindex');
Route::post('savequestions', [SavequestionsController::class, 'savequestions'])->name('savequestions');
Route::post('sendimgtoserver', [ProfileController::class, 'sendimgtoserver'])->name('sendimgtoserver');
Route::post('evaluationstore', [EvaluationController::class, 'evaluationstore'])->name('evaluationstore');
Route::any('evaluationshow/view/{id}', [EvaluationController::class, 'evaluationshow'])->name('evaluationshow');
Route::any('evaluationedit/edit/{id}', [EvaluationController::class, 'evaluationedit'])->name('evaluationedit');
Route::post('evaluationupdate/update/{id}', [EvaluationController::class, 'evaluationupdate'])->name('evaluationupdate');

//Routes redirecting to an URL
Route::get('/recordings/list', [RecordingsController::class, 'recordingsindex'])->name('recordingslist');
Route::post('/profile/myinfo', [ProfileController::class, 'index'])->name('myinfo');
Route::get('/evaluationtest', [EvaluationController::class, 'index'])->name('evaluationtest');
Route::post('getquestionlist', [EvaluationController::class, 'getquestionlist'])->name('getquestionlist');
Route::get('/evaluationtest/create', [EvaluationController::class, 'create'])->name('createevaluationtest');
Route::get('/plan/plans', [PlanController::class, 'index'])->name('plans');
//Route::resource('evaluationtest', EvaluationController::class);


Route::get('/successpage', function () {
    return view('/successpage');
});

Route::get('/test/loading', function () {
    return view('/test/loading');
});

Route::get('/recordings/norecordings', function () {
    return view('/recordings/norecordings');
});

Route::get('/practicetest', function () {
    return view('practicetest');
})->middleware(['auth'])->name('practicetest');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/test/selectyourtest', function () {
    return view('/test/selectyourtest');
})->middleware(['auth'])->name('selectyourtest');

require __DIR__.'/auth.php';
