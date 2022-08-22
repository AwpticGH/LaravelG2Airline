@extends('static.external')

@section('content')
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Complete Profile - {{ auth()->user()->name }}</h1>
        <p class="lead">Complete Profile {{ auth()->user()->name }} in G2Airline</p>
        <div class="row pt-5">
            <div class="col-12">
                <form method="POST" action="{{ route('google.profile.update') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control"
                               name="name" readonly
                               value="{{ auth()->user()->name }}"
                               >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control"
                               name="email" readonly
                               value="{{ auth()->user()->email }}"
                               >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control"
                               name="username" required
                               value="{{ auth()->user()->username }}"
                               >
                    </div>
                   <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control"
                               name="password" required
                               >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password Confirmation</label>
                        <input type="password" class="form-control"
                               name="password_confirmation" required
                               >
                    </div>
                   <div class="mb-3">
                        <label class="form-label">Title</label>
                        <select class="form-select" aria-label="Default select example" name="title">
{{--                            {{  }}--}}
{{--                            <option value="Mr" selected>Mr</option>--}}
{{--                            <option value="Mrs">Mrs</option>--}}
{{--                            <option value="Miss">Miss</option>--}}
{{--                            --}}
{{--                            <% if (profileRs.getString("Title").equals("Mrs")) { %>--}}
{{--                            <option value="Mr">Mr</option>--}}
{{--                            <option value="Mrs" selected>Mrs</option>--}}
{{--                            <option value="Miss">Miss</option>--}}
{{--                            <% } %>--}}
{{--                            <% if (profileRs.getString("Title").equals("Miss")) { %>--}}
{{--                            <option value="Mr">Mr</option>--}}
{{--                            <option value="Mrs">Mrs</option>--}}
{{--                            <option value="Miss" selected>Miss</option>--}}
{{--                            <% } %>--}}
                                <option value="Mr" selected>Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-select" aria-label="Default select example" name="gender">
{{--                            <% if (profileRs.getString("Gender").equals("Male")) { %>--}}
{{--                            <option value="Male" selected>Male</option>--}}
{{--                            <option value="Female">Female</option>--}}
{{--                            <% } %>--}}
{{--                            <% if (profileRs.getString("Gender").equals("Female")) { %>--}}
{{--                            <option value="Male">Male</option>--}}
{{--                            <option value="Female" selected>Female</option>--}}
{{--                            <% } %>--}}
                            <option value="Male">Male</option>
                            <option value="Female" selected>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control"
                               placeholder="Date of Birth..." name="date_of_birth" required
                               value="{{ auth()->user()->date_of_birth }}"
                               >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="number" class="form-control"
                               placeholder="Phone Number..." name="phone_number" required
                               value="{{ auth()->user()->phone_number }}"
                               >
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-small btn-rounded">Complete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
