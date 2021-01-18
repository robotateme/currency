<?php


namespace App\Http\Controllers;


use App\Http\Requests\UpdateAvatar;

class ProfileController extends Controller
{
    public function avatarUpdate(UpdateAvatar $request)
    {
        $image = $request->file('avatar_image');
        $image->store(env('USER_AVATARS_FOLDER'), 'public');
        return $request->user();
    }
}
