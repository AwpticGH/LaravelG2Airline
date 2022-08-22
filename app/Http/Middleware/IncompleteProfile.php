<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Providers\RouteServiceProvider;

class IncompleteProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = UserModel::find($request->user()->getAuthIdentifier());

        if ($this->emptyColumns($user)) {
            return $next($request);
        }

        return redirect(RouteServiceProvider::HOME);
    }

    public function emptyColumns(UserModel $user)
    {
        return (
            $user->username == NULL
            || $user->password == NULL
            || $user->gender == NULL
            || $user->title == NULL
            || $user->date_of_birth == NULL
            || $user->phone_number == NULL
        ) ? true : false;
    }
}
