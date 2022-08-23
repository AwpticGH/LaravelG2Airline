@extends('static.external')
@section('css-file', '')
@section('js-file', '')

@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Reserve Flight -
                {{ auth()->user()->username }}
            </h1>
            <p class="lead">Fill In Ticket Detail</p>
            <div class="row pt-5">
                <div class="col-12">
                    <form method="POST" action="{{ route('reservation.store') }}">
                        @csrf
                        <input type="hidden" name="flight_id" value="{{ ($flight->id) }}" />
                        <input type="hidden" name="passenger_count" value="{{ $passenger_count }}" />
                        <input type="hidden" name="seat_class" value="{{ $seat_class }}" />
                        @for($i = 0; $i < $passenger_count; $i++)
                        <p class="lead">Person - {{ ($i+1) }}</p>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name" name="name{{ ($i) }}"
                                   value="{{ $i == 0 ? auth()->user()->name : "" }}"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-select" aria-label="Default select example" name="gender{{ ($i) }}"
{{--                                    selected="{{ $i == 0 ? auth()->user()->gender : "" }}"--}}
                                    required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <select class="form-select" aria-label="Default select example" name="title{{ ($i) }}"
{{--                                    selected="{{ $i == 0 ? auth()->user()->gender : "" }}"--}}
                                    required>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control" placeholder="Enter Date Of Birth" name="date_of_birth{{ ($i) }}"
{{--                                   value="{{ $i == 0 ? auth()->user()->date_of_birth : "" }}"--}}
                                   required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="number" class="form-control" placeholder="Enter Your Phone number" name="phone_number{{ ($i) }}"
                                   value="{{ $i == 0 ? auth()->user()->phone_number : "" }}">
                        </div>
                        @endfor
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-small btn-rounded">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
