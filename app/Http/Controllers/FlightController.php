<?php

namespace App\Http\Controllers;

use App\Models\FlightModel;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FlightModel  $flightModel
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, FlightModel $flightModel)
    {
        $flights = $flightModel::find()
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FlightModel  $flightModel
     * @return \Illuminate\Http\Response
     */
    public function edit(FlightModel $flightModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlightModel  $flightModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlightModel $flightModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlightModel  $flightModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlightModel $flightModel)
    {
        //
    }
}
