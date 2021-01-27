<?php


namespace App\Http\Controllers;


use App\Http\Requests\UpdateAvatar;
use App\Models\User;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    /**
     * @var ProfileService
     */
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function avatarUpdate(UpdateAvatar $request)
    {
        return [
            'data' => $this->profileService
                ->updateAvatar($request),
        ];
    }
}
