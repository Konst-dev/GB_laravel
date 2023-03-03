<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{
    public function loginAndGetRedirectUrl(SocialUser $socialUser)
    {
        // dd($socialUser);
        // die;
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();
        if ($user === null) {
            return route('auth.register');
        }
        $user->name = $socialUser->getName();
        if ($user->name === null) $user->name = $socialUser->getNickname();
        $user->avatar = $socialUser->getAvatar();

        if ($user->save()) {
            Auth::loginUsingId($user->id);
            return route('account');
        }

        throw new \Exception('Не удалось сохранить юзера');
    }
}
