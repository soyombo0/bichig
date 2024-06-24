<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return inertia('Chat/Chat');
    }

    public function sendMessage(Request $request)
    {
        broadcast(new MessageEvent($request->message))->toOthers();
        return to_route('chat.index');
    }
}
