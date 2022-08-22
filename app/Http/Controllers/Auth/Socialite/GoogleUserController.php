<?php

namespace App\Http\Controllers\Auth\Socialite;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleUserController extends Controller
{
    public function create()
    {
        return view('user.socialite.complete-profile-detail');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255|min:5|unique:users',
            'password' => 'required|max:16|min:6|',
            'password_confirmation' => 'required|same:password',
            'title' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'phone_number' => 'required',
        ]);

        $user = UserModel::find(Auth::user()->getAuthIdentifier());

        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->title = $request->title;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->phone_number = $request->phone_number;
        $user->update();

        return redirect(RouteServiceProvider::HOME);
    }
}
