<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadPublic(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);

        $path = $request->file('avatar')->store('avatars', 'public');

        return back()->with('success', 'Avatar uploadé : ' . $path);
    }

    public function uploadPrivate(Request $request)
    {
        $request->validate([
            'pdf' => ['required', 'mimes:pdf', 'max:5120'],
        ]);

        $path = $request->file('pdf')->store('documents');

        return back()->with('success', 'PDF uploadé : ' . $path);
    }
}
