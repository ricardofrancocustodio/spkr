<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\UploadAudioToSpaces;

class AudioController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'audio' => 'required|file|mimes:mp3,wav,ogg|max:10240',
        ]);

        $file = $request->file('audio');
        $filePath = $file->getRealPath();
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Disparar o Job para fazer o upload em background
        UploadAudioToSpaces::dispatch($filePath, $fileName);

        return response()->json(['message' => 'Upload iniciado. O arquivo será processado em background.']);
    }
}
