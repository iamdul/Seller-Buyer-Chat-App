<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user/save', [UserController::class, 'save'])->name('user.save');
Route::post('/user/check', [UserController::class, 'check'])->name('user.check');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('/user/register', [UserController::class, 'register'])->name('user.register');
Route::get('/user/profileview', [UserController::class, 'profile'])->name('user.profileview');
Route::get('/user/profileedit', [UserController::class, 'edit'])->name('user.profileedit');
Route::get('/user/chats', [UserController::class, 'chats'])->name('user.chats');
Route::put('/user/updateProfile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

// Route for fetching messages
Route::get('/fetch-messages', [ChatController::class, 'fetchMessages'])->name('fetch.messages');

// Route for sending messages
Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send.message');
