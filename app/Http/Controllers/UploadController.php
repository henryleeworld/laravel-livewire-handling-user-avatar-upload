<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('avatars')) {
            $file = $request->file('avatars');
            $folder = uniqid() . '-' . now()->timestamp;
            $filename = $file->getClientOriginalName();
            $file->storeAs('avatars/tmp/' . $folder, $filename);
            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);
            return $folder;
        }

        return '';
    }
}
