<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// welcome
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');

});

Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // users
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    // questions
    Route::get('questions',[QuestionController::class,'index'])->name('questions.index');
    Route::get('questions/create',[QuestionController::class,'create'])->name('questions.create');
    Route::post('questions/create',[QuestionController::class,'store'])->name('questions.store');
    Route::get('questions/detail/{id}',[QuestionController::class,'show'])->name('questions.show');
    Route::get('questions/like/{id}',[QuestionController::class,'like'])->name('questions.like');

    // comments
    Route::get('comments/question/{id}',[CommentController::class,'create'])->name('comments.create');

    // profile
    Route::get('profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::post('profile',[ProfileController::class,'update'])->name('profile.update');


});


