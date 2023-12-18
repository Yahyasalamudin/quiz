<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassNameController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login-action', [AuthController::class, 'actionLogin'])->name('actionLogin');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Halaman Dashboard
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    // Classroom
    Route::get('/class', [ClassNameController::class, 'index'])->name('class');
    Route::post('/class', [ClassNameController::class, 'store'])->name('class.store');

    // Quiz
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
    Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store');
    Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
    Route::get('/quiz/{id}/addToClass', [QuizController::class, 'addClass'])->name('addClass');
    Route::get('/quiz/{id}/create', [QuizController::class, 'addToClass'])->name('addToClass');

    // Profile
    // Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');
    // Route::put('/editprofile/{id}', [ProfileController::class, 'update'])->name('editProfile');

});
