<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\PrivateChatController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

// Auth related routes
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/signup', [AuthController::class, 'signup'])->name('auth.signup');
    Route::post('/signin', [AuthController::class, 'signin'])->name('auth.signin');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware('auth')->group(function (Router $router) {
    $router->get('/user', [UserController::class, 'create'])->name('user');
    $router->get('/users', [UserController::class, 'index'])->name('user.index');
    $router->put('/user', [UserController::class, 'update'])->name('user.update');
    $router->post('/user/pic', [UserController::class, 'storePic'])->name('user.pic.store');
});

// Home page
Route::get('/', HomeController::class)->name('home');

// Chat related routes
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::post('/button', [ChatController::class, 'sendMessage'])->name('send-message');

Route::middleware('auth')->group(function (Router $router) {
    $router->get('/user/chats', [PrivateChatController::class, 'index'])->name('private.chats.index');
    $router->post('/chats', [PrivateChatController::class, 'store'])->name('private.chats.store');
    $router->get('/chats/{chat}', [PrivateChatController::class, 'join'])->name('private.chats.join');
});
// Extra routes
Route::get('/contact', ContactController::class)->name('contact');

Route::prefix('learning')->group(function (Router $router) {
    $router->get('/', [LearningController::class, 'index'])->name('learning');
});
