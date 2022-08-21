<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{

    public function create(Request $request)
    {
        return view('user.forgot-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', 'A reset link has been sent to your email.')
            : back()->withInput($request->only('email'))
                    ->withErrors('status', 'There was an error sending the password reset link.');
    }
}
