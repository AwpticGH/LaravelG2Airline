<?php

namespace App\Http\Controllers;

use App\Models\FlightModel;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\RouteModel;
use App\Models\AirportModel;

class FlightController extends Controller
{
    public function show(Request $request)
    {
        $flight = FlightModel::select('')
                                ->join('routes', 'flights.route_id', '=', 'routes.id')
                                ->join('airports as ap1', 'routes.departure_id', '=', 'ap1.id')
                                ->join('airports as ap2', 'routes.destination_id', '=', 'ap2.id')
                                ->where('ap1.city', $request->from_city)
                                ->where('ap2.city', $request->to_city)
                                ->get();

        dd($flight);
    }
}
