<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getAvatar($userId)
    {
        $user = User::findOrFail($userId);

        return Storage::disk('local')->response('avatars/' . $userId . '/' . $user->avatar);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('profile');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request)
    {
        if ($request->hasFile('avatars')) {
            Storage::disk('local')->delete('avatars/' . auth()->id() . '/' . auth()->user()->avatar);

            $file = $request->file('avatars');
            $filename = $file->getClientOriginalName();
            $file->storeAs('avatars/' . auth()->id(), $filename, 'local');
            auth()->user()->update([
                'avatar' => $filename,
            ]);
        }
        return redirect()->route('profile.edit');
    }
}
