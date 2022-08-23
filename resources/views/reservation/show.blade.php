@extends('static.base')
@section('css-file', 'ticket.css')
@section('js-file', '')

@section('content')
    <div class="content">
        <div class="panel shadowed">
            <div class="flight-detail">
                <div class="col-6">
                    <div class="row content">
                        <div class="col-4 content">
                            <h1>{{ $flight->from_airport_city }}</h1>
                        </div>
                        <div class="col-4 content text-center">
                            <h1><i class='bx bx-right-arrow-alt'></i></h1>
                        </div>
                        <div class="col-4 content text-center">
                            <h1>{{ $flight->to_airport_city }}</h1>
                        </div>
                    </div>
                    <div class="row content">
                        <div class="col-12 content">
                            <h3>{{ $flight->airline_name }}</h3>
                        </div>
                    </div>
                    <div class="row content">
                        <div class="col-12 content footer">
                            @if($passenger_count == 1)
                            <p>{{ $flight->time_of_departure }} &nbsp||&nbsp 1 Passenger &nbsp||&nbsp {{ $flight->seat_class }}</p>
                            @else
                            <p>{{ $flight->time_of_departure }} &nbsp||&nbsp {{ $passenger_count }} Passengers &nbsp||&nbsp
                                {{ $flight->seat_class }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="header">
                        <strong>{{ $flight->airline_code }}-{{ $flight->route_id }}></strong>
                        <hr>
                    </div>
                    <div class="from-to-time-airport">
                        <div class="col-4">
                            <div class="text from-to text-center">
                                <p>{{ $flight->time_of_departure }}</p>
                                <p>{{ $flight->from_airport_code }}</p>
                                <p>{{ $flight->from_airport_name }}</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text time-of-flight text-center">
                                <p>{{ $flight->time_of_flight }} M</p>
                                <hr>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text from-to text-center">
                                <p>added time</p>
                                <p>{{ $flight->to_airport_code }}</p>
                                <p>{{ $flight->to_airport_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="passenger-detail">
                <div class="col-12">
                    <br>
                    <table>
                        <tr>
                            <th class="number">No</th>
                            <th class="name">Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th class="phone">Phone Number</th>
                        </tr>
                        {{ $i = 0 }}
                        @foreach($passenger as $passengers)
                            {{ $i++ }}
                            <tr>
                                <td>{{ $i }}.</td>
                                @if($passengers->gender == "Male")
                                <td>Mr. {{ $passengers->name }}</td>
                                @else
                                <td>Mrs. {{ $passengers->name }}</td>
                                @endif
                                <td>{{ $passengers->date_of_birth }}</td>
                                <td>{{ $passengers->gender }}</td>
                                <td>+62 {{ $passengers->phone_number }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="text-center">
                <form action="Ticket" method="POST">
                    <input type="hidden" name="flightId" value="<%= flightId%>">
                    <input type="hidden" name="accountId" value="<%= accountId%>">
                    <input type="hidden" name="reservationId" value="<%= reservationId%>">
                    <button type="submit" onclick="return confirm('Are You Sure?')">Cancel Flight</button>
                </form>
            </div>
        </div>
    </div>
@endsection
