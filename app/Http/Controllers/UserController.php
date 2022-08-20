<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    use HasFactory;
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:16',
            'passwordConfirmed' => 'required|same:password',
            'gender' => 'required',
            'title' => 'required',
            'phoneNumber' => 'required',
            'dateOfBirth' => 'required',
        ]);

        if ($credentials) {
            $data = new UserModel();
            $data->Name = $request->name;
            $data->Username = $request->username;
            $data->Email = $request->email;
            $data->Password = Hash::make($request->password);
            $data->Gender = $request->gender;
            $data->Title = $request->title;
            $data->date_of_birth = $request->dateOfBirth;
            $data->phone_number = $request->phoneNumber;
            $success = $data->save();
            if ($success) {
                event(new Registered($data));
                return redirect('/login');
            }
            else {
                return back()->withErrors([
                    'dbError', 'Can not register, please try again later!'
                ])->withInput([
                    $request->name,
                    $request->username,
                    $request->email,
                    $request->gender,
                    $request->title,
                    $request->dateOfBirth,
                ]);
            }
        }
        else {
            return back()->withErrors([
                'inputError', 'Please Input Form Correctly'
            ])->withInput([
                $request->name => old(),
                $request->username => old(),
                $request->email => old(),
                $request->gender => old(),
                $request->title => old(),
                $request->dateOfBirth => old(),
            ]);
        }
    }

    public function login(Request $request, UserModel $userModel)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:16'
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect('/');
        }
        else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records'
            ])->onlyInput('email');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserModel  $userModel
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show(Request $request, UserModel $userModel)
    {
        return view('user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(UserModel $userModel, Request $request)
    {
        $credentials = $request->validate([
            'phoneNumber' => 'required',
        ]);
        if ($credentials) {
            $data = $userModel->find(auth()->user()->getAuthIdentifier());

            $data->password = Hash::make($request->password);
            $data->gender =  $request->gender;
            $data->title = $request->title;
            $data->date_of_birth = $request->dateOfBirth;
            $data->phone_number = $request->phoneNumber;

            $success = $data->update();

            if ($success) {
                return back()->with('alertSuccess', 'Succeeded');
            }
        }
        else {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, UserModel $userModel)
//    {
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
//    public function destroy(UserModel $userModel)
//    {
//        //
//    }

    public function sendEmailVerificationNotification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back();
    }
}
