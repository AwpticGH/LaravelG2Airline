<?php

namespace App\Http\Controllers;

use App\Models\FlightModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
    public function create()
    {
        return Auth::viaRemember() ? view('flight.home') : view('flight.home');
    }

    public function show(Request $request)
    {
        $flights = FlightModel::selectRaw('routes.id as route_id, routes.time_of_flight_minutes as time_of_flight, flights.depart_date_time as time_of_departure,
                                        flights.id as id, ap1.code as from_airport_code, ap1.name as from_airport_name, ap1.province as from_airport_province,
                                        ap1.city as from_airport_city, ap2.code as to_airport_code, ap2.name as to_airport_name, ap2.province as to_airport_province,
                                        ap2.city as to_airport_city, airplanes.id as airplane_id, airlines.code as airline_code, airlines.name as airline_name')
                                ->join('routes', 'flights.route_id', '=', 'routes.id')
                                ->join('airports as ap1', 'routes.departure_id', '=', 'ap1.id')
                                ->join('airports as ap2', 'routes.destination_id', '=', 'ap2.id')
                                ->join('airplanes', 'flights.airplane_id', '=', 'airplanes.id')
                                ->join('airlines', 'airplanes.airline_id', '=', 'airlines.id')
                                ->where('ap1.city', $request->from_city)
                                ->where('ap2.city', $request->to_city)
                                ->get();

        return view('flight.show', compact('flights'));
    }
}
