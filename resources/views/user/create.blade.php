@extends('static.user')
@section('css-file', 'register.css')
@section('js-file', 'register.js')

@section('content')
    <!-- content -->
    <!-- Panel Regis-->
    <div class="form-body">
        <div class="container">
            <div class="title">
                <span>
                    <h3>
                        <a href="/" style="text-decoration: none">G2 Airline</a>
                    </h3>
                </span>
                Registration
            </div>
            <div class="content">
                <form method="POST" action="register">
                    @csrf
                    @method('POST')
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" placeholder="Enter your name" name="name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" placeholder="Enter your name" name="username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" placeholder="Enter your Email" name="email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" placeholder="Enter your password" name="password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Confirm Password</span>
                            <input type="password" placeholder="Confirm your password" name="passwordConfirmed" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Title</span>
                            <select class="form-select" aria-label="Default select example" name="title" required>
                                <option value="Mr">Mr</option>
                                <option value="Miss">Miss</option>
                                <option value="Mrs">Mrs</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="number" placeholder="Enter your phone number" name="phoneNumber" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Date of Birth</span>
                            <input type="date" placeholder="Enter your date of birth" name="dateOfBirth" required>
                        </div>
                    </div>
                    <div class="gender-details">
                        <input type="radio" name="gender" id="dot-1" value="Male">
                        <input type="radio" name="gender" id="dot-2" value="Female">
                        <input type="radio" name="gender" id="dot-3" value="null">
                        <span class="gender-title">Gender</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Female</span>
                            </label>
                            <label for="dot-3">
                                <span class="dot three"></span>
                                <span class="gender">Prefer not to say</span>
                            </label>
                        </div>
                    </div>
                    <div class="button">
                        <button type="Submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
