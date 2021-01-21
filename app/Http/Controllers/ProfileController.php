<?php


namespace App\Http\Controllers;


use App\Http\Requests\UpdateAvatar;
use App\Models\User;

class ProfileController extends Controller
{
    public function avatarUpdate(UpdateAvatar $request)
    {
        /** @var User $user */
        $user = $request->user();
        $image = $request->file('avatar_image');
        $filename = substr(md5_file($image), -16) . ".{$image->extension()}";
        $folder = str_replace(
            ['{id}'],
            [$user->id],
            "users/user_{id}/avatar/"
        );
        User::find($user->id)
            ->update(['avatar' => $filename]);
        $image->storeAs($folder, $filename, 'public');
        return [1];
    }
}
