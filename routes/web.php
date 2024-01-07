<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;

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

// Auth routes
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/', [AuthController::class, 'Login'])->name('login');
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

// Quiz routes
Route::middleware(['auth', 'preventPassed'])->group(function () {
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.sheet');
    Route::post('/quiz/completed', [QuizController::class, 'submit'])->name('quiz.completion');
});

// Admin routes
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/{questionId}', [AdminController::class, 'showAnswers'])->name('admin.answers');

    // Admin.Quiz routes
    Route::get('/quiz/{quiz_id}/edit', [AdminController::class, 'editQuiz'])->name('admin.quiz.edit');
    Route::put('/quiz/{quiz_id}', [AdminController::class, 'updateQuiz'])->name('admin.quiz.update');

    // Admin.question routes (get is used instead of delete HTTP method to escape use a form)
    Route::get('/question/create', [AdminController::class, 'createQuestion'])->name('admin.question.create');
    Route::post('/question', [AdminController::class, 'storeQuestion'])->name('admin.question.store');
    Route::get('/question/{question_id}/edit', [AdminController::class, 'editQuestion'])->name('admin.question.edit');
    Route::put('/question/{question_id}', [AdminController::class, 'updateQuestion'])->name('admin.question.update');
    Route::get('/question/{question_id}', [AdminController::class, 'destroyQuestion'])->name('admin.question.destroy');
    
    // Admin.answer routes (get is used instead of delete HTTP method to escape use a form)
    Route::get('/answer/create', [AdminController::class, 'createAnswer'])->name('admin.answer.create');
    Route::post('/answer', [AdminController::class, 'storeAnswer'])->name('admin.answer.store');
    Route::get('/answer/{answer_id}/edit', [AdminController::class, 'editAnswer'])->name('admin.answer.edit');
    Route::put('/answer/{answer_id}', [AdminController::class, 'updateAnswer'])->name('admin.answer.update');
    Route::get('/answer/{answer_id}', [AdminController::class, 'destroyAnswer'])->name('admin.answer.destroy');

    // Dumping all current data (customized truncate)
    Route::get('/quiz/dump', [AdminController::class, 'dumpAll'])->name('admin.quiz.dump');
});
