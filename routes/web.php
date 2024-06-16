<?php

use App\Events\MessageEvent;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Client\Request;

Route::get('/', function () {
    return inertia('Index');
})->name('about');

Route::post('/button', function (\Illuminate\Http\Request $request) {
    broadcast(new MessageEvent($request->message))->toOthers();
    return to_route('chat.index');
})->name('contact');

Route::get('/contact', function () {
    return inertia('Contact');
})->name('contact');

Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

Route::middleware('auth')->group(function (Router $router) {
    $router->get('/user', [UserController::class, 'create'])->name('user');
    $router->put('/user', [UserController::class, 'update'])->name('user.update');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/signup', [AuthController::class, 'signup'])->name('auth.signup');
    Route::post('/signin', [AuthController::class, 'signin'])->name('auth.signin');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
