@extends('static.base')
@section('css-file', 'search.css')
@section('js-file', 'search.js')

@section('content')
    <!-- panel - searched -->
    <div class="panel searched shadowed">
        <div class="col-6">
            <div class="row content">
                <div class="col-4 content">
                    <h1>fromCity</h1>
                </div>
                <div class="col-4 content text-center">
                    <h1><i class='bx bx-right-arrow-alt'></i></h1>
                </div>
                <div class="col-4 content text-center">
                    <h1>toCity</h1>
                </div>
            </div>
            <div class="row content">
                <div class="col-12 content">
                    <p class="searched-footer">departDate &nbsp||&nbsp 1 Passenger &nbsp||&nbsp Economy</p>
                </div>
            </div>
        </div>
        <div class="col-6 content">
            <button class="btn-panel-searched shadowed" onclick="history.back()">Change Search</button>
        </div>
    </div>
    <!-- panel - result -->
    @foreach($flights as $flight)
        <form method="get" action="{{ route('reservation.create') }}">
            @csrf
            <input name="accountId" type="hidden" value="">
            <input name="flight_id" type="hidden" value="{{ $flight->id }}">
            <input name="passenger_count" type="hidden" value="{{ '2' }}">
            <input name="seat_class" type="hidden" value="{{ 'Economy' }}">
            <div id="result">
                <div class="panel result shadowed" onclick="clickedResult1(), extendResult1()">
                    <div class="col-4">
                        <div class="col-12 content">
                            <h2><img class="result-airline-logo" src="assets/images/garuda_indonesia.png"> {{ ($flight->airline_name) }}</h2>
                        </div>
                        <div class="col-12 content">
                            <br>
                        </div>
                        <div class="col-12">
                            <div class="col-6 content text-center">
                                <a href="#result" class="info-extender">Flight Info</a>
                            </div>
                            <div class="col-6 content text-center">
                                <a href="#result" class="price-extender">Fare Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="col-8">
                            <div class="col-4 content text-center">
                                <p class="result-text-time">{{ ($flight->time_of_departure) }}</p>
                                <p>{{ ($flight->from_airport_code) }}</p>
                            </div>
                            <div class="col-4 content text-center">
                                <p class="result-text-time-duration">{{ ($flight->time_of_flight) }} M</p>
                                <hr>
                                <!-- <div>
                                    <i class='bx bx-chevron-left'></i><hr class="result-text-time-separator"><i class='bx bx-chevron-right' ></i>
                                </div> -->
                            </div>
                            <div class="col-4 content text-center">
                                <p class="result-text-time">added time</p>
                                <p>{{ ($flight->to_airport_code) }}</p>
                            </div>
                        </div>
                        <div class="col-4 content">
                            <button type="submit" class="btn-panel-result shadowed">Choose</button>
                        </div>
                    </div>
                </div>
                <!-- panel - result - 1 extension -->
                <div class="panel result-extended" id="info-1">
                    <!-- below is blank  -->
                    <div class="row">
                        <div class="col-12 content"></div>
                    </div>
                    <!-- above is blank -->
                    <div class="row">
                        <div class="col-2 content text-center info-vr" style="padding-top: 0; padding-bottom: 0;">
                            <p class="no-margin-bottom no-margin-top">{{ ($flight->time_of_departure) }}</p>
                            <p class="text-gray no-margin-top">19 Jun</p>
                            <br>
                            <br>
                            <br>
                            <p><i class='bx bx-right-arrow-alt'></i> {{ ($flight->time_of_flight) }} M</p>
                            <br>
                            <br>
                            <br>
                            <p class="no-margin-bottom">added time</p>
                            <p class="text-gray no-margin-top no-margin-bottom">19 Jun</p>
                        </div>
                        <div class="col-10 content" style="padding-top: 0; padding-bottom: 0;">
                            <p class="no-margin-bottom no-margin-top">{{ ($flight->from_airport_code) }}</p>
                            <p class="no-margin-top text-gray">{{ ($flight->from_airport_name) }}></p>
                            <div class="row">
                                <div class="col-10 panel info-panel">
                                    <div class="col-4 content">
                                        <strong><img src="assets/images/garuda_indonesia.png" alt="Logo" class="info-airline-logo"> {{ ($flight->airline_name) }}</strong>
                                        <p>{{ ($flight->airline_code) }}-{{ ($flight->route_id) }} - <span class="info-text-seat-class">Economy</span></p>
                                    </div>
                                    <div class="col-4 content">
                                        <p class="text-gray no-margin-top">Baggage 20 kg</p>
                                        <p class="text-gray">Cabin Baggage 7 kg</p>
                                    </div>
                                    <div class="col-4 content">
                                        <p class="no-margin-top"><span class="text-bold">Aircraft</span> Boeing 737</p>
                                        <p><span class="text-bold">Seat layout</span> 3-3</p>
                                        <p><span class="text-bold">Seat pitch</span> 29 inches (standard)</p>
                                    </div>
                                </div>
                            </div>
                            <p class="no-margin-bottom">{{ ($flight->to_airport_city) }} ({{ ($flight->to_airport_code) }})</p>
                            <p class="no-margin-top text-gray">{{ ($flight->to_airport_name) }}</p>
                        </div>
                    </div>
                </div>
                <!-- price -->
                <div class="panel result-extended" id="price-1">
                    <div class="col-6 content">
                        <h3 class="price-text-title">Conditions</h3>
                        <p><img src="assets/images/garuda_indonesia.png" alt="Logo" class="info-airline-logo"> <span class="price-text-title">{{ ($flight->airline_name) }}</span></p>
                        <p>{{ ($flight->from_airport_city) }} <i class='bx bx-right-arrow-alt'></i> {{ ($flight->to_airport_city) }}</p>
                        <p class="text-gray">Economy</p>
                        <hr>
                        <h3 class="price-text-title">Included Benefits</h3>
                        <div class="col-1 text-center">
                            <i class='bx bxs-check-circle' style="color: blue;"></i>
                        </div>
                        <div class="col-11">
                            <p class="price-text-title no-margin-top">Free Protection</p>
                            <p>This free insurance will help cover you in case you get infected with COVID-19 during travel.</p>
                        </div>
                        <hr>
                        <div class="panel price-panel col-12">
                            <h3 class="no-margin-bottom">Baggage Prices</h3>
                            <p>Extra baggage purchase is not available for your flight</p>
                            <div class="col-1">
                                <img src="assets/images/garuda_indonesia.png" alt="Logo" class="price-panel-airline-logo">
                            </div>
                            <div class="col-11">
                                <p class="price-text-title no-margin-top" style="margin-bottom: 0;">&nbsp{{ ($flight->airline_name) }}</p>
                                <p>&nbsp{{ ($flight->from_airport_city) }} &nbsp&nbsp<i class='bx bx-right-arrow-alt' ></i>&nbsp&nbsp {{ ($flight->to_airport_city) }} - <span class="text-bold text-italic">Economy</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 content">
                        <h3 class="price-text-title">Price Details</h3>
                        <div class="col-6 text-left">
                            <p>Adult Basic Fare (x1)</p>
                            <p>Tax</p>
                            <p>Regular Total Price</p>
                            <p class="text-discount">Save</p>
                            <p class="text-discount">Free Protection</p>
                        </div>
                        <div class="col-6 text-right">
                            <p>Rp 1.277.300</p>
                            <p>Included</p>
                            <p>Rp 1.277.300</p>
                            <p class="text-discount">Rp 40.000</p>
                            <p class="text-discount">FREE</p>
                        </div>
                        <hr>
                        <div class="col-6 text-bold text-gray text-left">
                            <p class="no-margin-top">You Pay</p>
                        </div>
                        <div class="col-6 text-bold text-gray text-right">
                            <p class="no-margin-top">Rp 1.237.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
@endsection
