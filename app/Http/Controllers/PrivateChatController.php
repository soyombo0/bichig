<?php

namespace App\Http\Controllers;

use App\Models\PrivateChat;
use App\Models\User;
use Illuminate\Http\Request;

class PrivateChatController extends Controller
{
    public function index()
    {
         $chats = PrivateChat::whereHas('users', function ($query) {
             $query->where('user_id', auth()->id());
         })->with('users')->get();

        return inertia('PrivateChat/Index', ['chats' => $chats]);
    }

    public function store(Request $request)
    {
        $secondUser = User::find($request->secondUser);

        $chat = PrivateChat::query()->create([
            'participants' => json_encode([
                'firstUser' => auth()->user()->id,
                'secondUser' => $secondUser,
            ])
        ]);

        $chat->users()->attach(auth()->user());
        $chat->users()->attach($secondUser);

        return inertia('PrivateChat/Chat');
    }

    public function destroy(PrivateChat $chat)
    {
        $chat->delete();
    }

    public function join(Request $request, PrivateChat $chat)
    {
        return inertia('PrivateChat/Chat', [
            'chat' => $chat
        ]);
    }
}
