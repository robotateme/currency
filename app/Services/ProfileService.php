<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProfileService
{

    public function updateAvatar(FormRequest $request)
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
        return [
            'avatar_url' => Storage::url($folder . $filename)
        ];
    }


}
