<?php

use App\Events\MessageEvent;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
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

Route::prefix('auth')->group(function () {
    Route::get('/signup', [AuthController::class, 'index'])->name('auth.signup');
});
