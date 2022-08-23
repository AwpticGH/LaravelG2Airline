<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\FlightModel;
use App\Models\ReservationModel;
use App\Models\ReservationInfoModel;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(Request $request, FlightModel $flightModel)
    {
        $flight = $flightModel::find($request->flight_id);
        $passenger_count = $request->passenger_count;
        $seat_class = $request->seat_class;

        return view('reservation.create', compact(['flight', 'passenger_count', 'seat_class']));
    }

    public function store(Request $request)
    {
        $passenger_count = $request->passenger_count;
        for ($i = 0; $i < $passenger_count; $i++) {
            $request->validate([
                'name'.$i => 'required',
                'gender'.$i => 'required',
                'title'.$i => 'required',
                'date_of_birth'.$i => 'required',
            ]);
        }

        ReservationModel::create([
            'user_id' => Auth::user()->getAuthIdentifier(),
            'flight_id' => $request->flight_id,
            'paid' => '0',
            'active' => '1'
        ]);

        $newReservation = ReservationModel::where('user_id', Auth::user()->getAuthIdentifier())
                                            ->where('flight_id', $request->flight_id)
                                            ->where('paid', 0)->where('active', 1)->latest()->first();

        for ($i = 0; $i < $passenger_count; $i++) {
            ReservationInfoModel::create([
                'reservation_id' => $newReservation->id,
                'seat_class' => $request->seat_class,
                'name' => Request('name'.$i),
                'gender' => Request('gender'.$i),
                'title' => Request('title'.$i),
                'date_of_birth' => Request('date_of_birth'.$i),
                'phone_number' => Request('phone_number'.$i),
            ]);
        }

        return redirect()->route('reservation.show');
    }

    public function show()
    {
        $reservation = ReservationModel::where('user_id', Auth::user()->getAuthIdentifier())
                                        ->where('paid', 1)->where('active', 1)->latest()->first();

        $flight = ReservationModel::selectRaw('reservations_info.seat_class as seat_class, routes.id as route_id, routes.time_of_flight_minutes as time_of_flight, flights.depart_date_time as time_of_departure,
                                                ap1.code as from_airport_code, ap1.name as from_airport_name, ap1.province as from_airport_province,
                                                ap1.city as from_airport_city, ap2.code as to_airport_code, ap2.name as to_airport_name, ap2.province as to_airport_province,
                                                ap2.city as to_airport_city, airlines.code as airline_code, airlines.name as airline_name')
                                                ->join('reservations_info', 'reservations_info.reservation_id', '=', 'reservations.id')
                                                ->join('flights', 'reservations.flight_id', '=', 'flights.id')
                                                ->join('routes', 'flights.route_id', '=', 'routes.id')
                                                ->join('airports as ap1', 'routes.departure_id', '=', 'ap1.id')
                                                ->join('airports as ap2', 'routes.destination_id', '=', 'ap2.id')
                                                ->join('airplanes', 'flights.airplane_id', '=', 'airplanes.id')
                                                ->join('airlines', 'airplanes.airline_id', '=', 'airlines.id')
                                                ->where('reservations.id', $reservation->id)->first();

        $passenger = ReservationInfoModel::selectRaw('reservations_info.name as name, reservations_info.gender as gender,
                                                reservations_info.title as title, reservations_info.date_of_birth as date_of_birth,
                                                reservations_info.phone_number as phone_number')
                                                ->join('reservations', 'reservations_info.reservation_id', '=', 'reservations.id')
                                                ->where('reservation_id', $reservation->id)->get();
        $passenger_count = $passenger->count();

//        dd($flight);
        return view('reservation.show', compact(['flight', 'passenger_count', 'passenger']));
    }
}
