<?php

namespace App\Http\Controllers\Auth\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\SocialiteModel;
use App\Models\UserModel;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;

class GoogleController extends Controller
{
    public function create()
    {
        return Socialite::driver('google')->redirect();
    }

    public function store()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $existingUser = UserModel::where('email', $user->email)->first();
        if ($existingUser) {
            if ($existingUser->email_verified_at == "" || $existingUser->email_verified_at == NULL) {
                $existingUser->email_verified_at = Carbon::now();
                $existingUser->save();
            }
            $existingGoogle = $existingUser->socialite();
            if (!$existingGoogle) {
                $existingUser->socialite()->updateOrCreate([
                    'google_id' => $user->getId(),
                    'google_token' => $user->token,
                    'google_refresh_token' => $user->refreshToken,
                ], [
                    'user_id' => $existingUser->id
                ]);
            }

            Auth::login($existingUser);
        }
        else {
            $newUser = UserModel::create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'email_verified_at' => Carbon::now(),
            ]);

            $createdUser = UserModel::where('email', $user->getEmail())->first();
            $createdUser->socialite()->create([
                        'user_id' => $createdUser->id,
                        'google_id' => $user->getId(),
                        'google_token' => $user->token,
                        'google_refresh_token' => $user->refreshToken
                    ]);

            event(new Registered($newUser));
            Auth::login($newUser);
        }
        return redirect()->route('google.profile');
    }
}
