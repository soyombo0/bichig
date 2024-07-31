<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function storePic(Request $request)
    {
        $pic = $request->file('image');
        $storagePath = '/user-' . auth()->user()->id . '-pfp';

        Storage::drive('local')->deleteDirectory($storagePath);
        $path = Storage::drive('local')->put($storagePath, $pic);
        auth()->user()->profile_pic = $path;
        auth()->user()->save();

        return $path;
    }
}
