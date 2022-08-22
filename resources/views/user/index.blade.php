@extends('static.user')
@section('css-file', 'login.css')
@section('js-file', 'login.js')

@section('content')
    <div class="form-body">
        <div class="container">
            <div class="title">
                <span>
                    <h3>
                        <a href="/" style="text-decoration: none">G2 Airline</a>
                    </h3>
                </span>
                Login
            </div>
            <div class="content">
                <form method="POST" action="/login">
                    @csrf
                    @method('POST')
                    <div class="user-details">
                        <div class="input-box">
                            <label for="email" class="details">Email</label>
                            <input type="email" placeholder="Enter your Email" id="email" name="email" required>
                        </div>
                        <div class="input-box">
                            <label for="password" class="details">Password</label>
                            <input type="password" placeholder="Enter your password" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="button">
                        <button class="button-login" type="Submit">Submit</button>
                    </div>
                    <div class="button">
                        <a href="{{ route('google.redirect') }}" class="button-login">Login With Google</a>
                        <a href="{{ route('register') }}" class="button-login">Register Now!</a>
                        <a href="{{ route('password.request') }}" class="button-login">Forgot Password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
