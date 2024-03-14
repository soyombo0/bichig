<?php

use App\Events\TestEvent;
use App\Http\Controllers\ChatController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Index');

});

Route::post('/button', function (\Illuminate\Http\Request $request) {

    broadcast(new TestEvent($request->message))->toOthers();
    return to_route('chat.index');
});

Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
