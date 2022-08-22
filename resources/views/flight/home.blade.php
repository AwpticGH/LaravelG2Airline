@extends('static.base')
@section('css-file', 'home.css')
@section('js-file', 'home.js')

@section('content')
    <!-- Slideshow -->
    <div class="slideshow-background">
        <div class="container slideshow">
            <img src="assets/images/Airline_ads(1).jpg" alt="Airline Ad(1)" class="slideshow-img" id="img-1">
            <img src="assets/images/Airline_ads(2).jpg" alt="Airline Ad(2)" class="slideshow-img" id="img-2">
            <img src="assets/images/Airline_ads(3).jpg" alt="Airline Ad(3)" class="slideshow-img" id="img-3">
        </div>
    </div>

    <!-- Search Box -->
    <div class="container search-box focusable" id="search-box" style="z-index: unset !important;">
        <div class="header">
            <h2 class="text">Hello there!</h2>
            <h1 class="text">Are you looking to travel somewhere?</h1>
        </div>
        <div class="promo-group">
            <div class="row">
                <div class="col-1">
                    <h1 class="text"><i class='bx bxs-plane-alt' style="color: blue;"></i></h1>
                </div>
                <div class="col-11">
                    <h2 class="text">Look for promos & cheap ticket prices <a href="">here</a>!!!</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <label for="trip-choice">
                    <input type="radio" id="trip-choice"  name="trip-choice" checked> Single-Trip
                </label>
            </div>
        </div>
        <form action="{{ route('flight.show') }}" method="GET">
            @csrf
            <div class="search-group">
                <div class="col-2_5 from-to" id="from">
                    <label for="from-city" class="text-gray label-form">From</label><br>
                    <select name="from_city" aria-placeholder="From City" id="from-city">
                        <option value="" disabled>City or Airport</option>
                        <option value="Tanggerang" class="btn-cities-from">Tanggerang, Indonesia</option>
                        <option value="Surabaya" class="btn-cities-from">Surabaya, Indonesia</option>
                        <option value="Medan" class="btn-cities-from">Medan, Indonesia</option>
                        <option value="Makassar" class="btn-cities-from">Makassar, Indonesia</option>
                        <option value="Yogyakarta" class="btn-cities-from">Yogyakarta, Indonesia</option>
                        <option value="Denpasar-Bali" class="btn-cities-from">Denpasar-Bali, Indonesia</option>
                        <option value="Padang" class="btn-cities-from">Padang, Indonesia</option>
                        <option value="Palembang" class="btn-cities-from">Palembang, Indonesia</option>
                        <option value="Banjarmasin" class="btn-cities-from">Banjarmasin, Indonesia</option>
                        <option value="Pontianak" class="btn-cities-from">Pontianak, Indonesia</option>
                    </select>
                </div>
                <div class="col-2_5 from-to">
                    <label for="to-city" class="text-gray label-form">To</label><br>
                    <select name="to_city" aria-placeholder="To City" id="to-city">
                        <option value="" disabled>City or Airport</option>
                        <option value="Tanggerang" class="btn-cities-to">Tanggerang, Indonesia</option>
                        <option value="Surabaya" class="btn-cities-to">Surabaya, Indonesia</option>
                        <option value="Medan" class="btn-cities-to">Medan, Indonesia</option>
                        <option value="Makassar" class="btn-cities-to">Makassar, Indonesia</option>
                        <option value="Yogyakarta" class="btn-cities-to">Yogyakarta, Indonesia</option>
                        <option value="Denpasar-Bali" class="btn-cities-to">Denpasar-Bali, Indonesia</option>
                        <option value="Padang" class="btn-cities-to">Padang, Indonesia</option>
                        <option value="Palembang" class="btn-cities-to">Palembang, Indonesia</option>
                        <option value="Banjarmasin" class="btn-cities-to">Banjarmasin, Indonesia</option>
                        <option value="Pontianak" class="btn-cities-to">Pontianak, Indonesia</option>
                    </select>
                </div>
                <div class="col-2_25 departure-arrival">
                    <label for="departure-date" class="text-gray label-form">Depart Date</label><br>
                    <input type="date" name="departure-date" id="departure-date">
                </div>
                <div class="col-2_25 departure-arrival">
                    <input type="checkbox" id="return-date-check" name="return-date-check" class="checkbox" onclick="returnFlight()">
                    <label for="return-date-check" class="text-gray label-form"> Return Date</label><br>
                    <input type="date" name="return-date" id="return-date" disabled>
                </div>
                <div class="col-2_5 passenger-class" onclick="displayListsPass()">
                    <label for="passenger-seat-class" class="text-gray label-form">Passenger, Seat Class</label><br>
                    <input type="text" name="passenger-seat-class" id="passenger-seat-class" placeholder="1 Passenger, Economy" onclick="displayListsPass()">
                    <div class="container-lists" id="passenger-list">
                        <input type="text" placeholder="Passenger and Seat Class" disabled>
                        <div class="col-6" id="passenger-count">
                            <div class="row">
                                <div class="col-2 text-center">
                                    <button class="btn-decrease">-</button>
                                </div>
                                <div class="col-8 text-center">
                                    <p>Adult</p>
                                </div>
                                <div class="col-2 text-center">
                                    <button class="btn-increase">+</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 text-center">
                                    <button class="btn-decrease">-</button>
                                </div>
                                <div class="col-8 text-center">
                                    <p>Child</p>
                                </div>
                                <div class="col-2 text-center">
                                    <button class="btn-increase">+</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 text-center">
                                    <button class="btn-decrease">-</button>
                                </div>
                                <div class="col-8 text-center">
                                    <p>Infant</p>
                                </div>
                                <div class="col-2 text-center">
                                    <button class="btn-increase">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6" id="seat-class">
                            <button type="button" class="seat-class-list">Economy</button>
                            <button type="button" class="seat-class-list">Premium Economy</button>
                            <button type="button" class="seat-class-list">Business</button>
                            <button type="button" class="seat-class-list">First Class</button>
                            <div class="col-6 text-center">
                                <button type="button" class="btn-reset" onclick="resetPassSeatClass()">Reset</button>
                            </div>
                            <div class="col-6 text-center">
                                <button type="button" class="btn-done" onclick="submitPassSeatClass()">Done</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <button type="submit" class="btn-submit">Search</button>
            </div>
        </form>
    </div>

    <!-- Main Background -->
    <div class="main-background"></div>
@endsection
