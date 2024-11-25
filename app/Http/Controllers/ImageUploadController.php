<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        $path = $request->file('file')->store('uploads', 'public');
        return response()->json(['filePath' => $path]);
    }

    public function store(Request $request)
    {
        $image = $request->input('image'); // Gambar dalam format Base64

        // Memisahkan header Base64
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);

        // Dekode gambar
        $imageData = base64_decode($image);

        // Simpan gambar ke storage
        $fileName = 'photo_' . time() . '.png';
        $filePath = 'storage/' . $fileName; // Path publik untuk file
        Storage::disk('public')->put($fileName, $imageData);

        // Kembalikan path file
        return response()->json(['success' => true, 'file' => $filePath]);
    }
}
