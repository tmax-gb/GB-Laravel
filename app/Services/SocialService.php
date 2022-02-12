<?php

namespace App\Services;

use App\Models\User;
use App\Contracts\Social;
use Laravel\Socialite\Contracts\User as BaseContract;
use lluminate\Support\Facades\Auth;

class SocialService implements Social
{
    /**
     * @param BaseContract $socialUser
     * @param string $network
     * @return string
     * @throws \Exception
     */
    public function loginUser(BaseContract $socialUser, string $network): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if($user) {
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();

            if($user->save()) {
                \Auth::loginUsingId($user->id);
                return route('account');
            }
        }else {
            //todo: register here
            return route('register');
        }

        throw new \Exception("You get error was network: " . $network);
    }
}
