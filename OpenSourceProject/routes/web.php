<?php

use App\Models\Enquiry;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\PackageController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/destinations', [DestController::class, 'index'])->name('dest');

Route::get('/destinations/{destination}', [DestController::class, 'show'])->name('dest.show');

Route::get('/packages', [PackageController::class, 'index'])->name('package');

Route::get('/packages/{package}', [PackageController::class, 'show'])->name('package.show');

Route::get('/auth', [UserController::class, 'index'])->name('register');

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/enquiry', [EnquiryController::class, 'store'])->name('sendEnquiry');

Route::get('/enquiryHistory', [EnquiryController::class, 'index'])->name('enquiryHistory');

Route::get('/enquiries/{id}/edit', [EnquiryController::class, 'enquiryUpdate'])->name('enquiries.edit');
Route::put('/enquiries/{id}', [EnquiryController::class, 'update'])->name('enquiries.update');
Route::delete('/enquiries/{id}', [EnquiryController::class, 'destroy'])->name('enquiries.destroy');

Route::get('/forum', [ForumController::class, 'index'])->name('forum');
Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');

Route::post('/forum/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comment/update/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::put('/comment/{id}', [CommentController::class, 'edit'])->name('comment.edit');
Route::delete('/comment/{id}', [CommentController::class, 'delete'])->name('comment.delete');