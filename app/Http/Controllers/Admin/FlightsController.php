<?php

namespace App\Http\Controllers\Admin;

use App\Airplane;
use App\Airport;
use App\Flight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = DB::table('flights')
            ->join('airports as airport1','flights.departure_airport','airport1.id')
            ->join('airports as airport2','flights.arrival_airport','airport2.id')
            ->join('cities as city1','airport1.city_id','city1.id')
            ->join('cities as city2','airport2.city_id','city2.id')
            ->join('airplanes','airplanes.id','=','flights.id_plane')
            ->select('flights.id as id','airport1.airport_name as name1','airport2.airport_name as name2','city1.city_name as city1','city2.city_name as city2','scheduled_departure','scheduled_arrival','airplanes.model_name as model_name','airplanes.count_seats as seats')
            ->get();
//        dd($flights);
        return view('admin.flights.index',compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airports = Airport::get();
        $airplanes = Airplane::get();
        return view('admin.flights.create',compact('airports','airplanes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Flight::create($request->all());
        return redirect(route('flights.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        $airports = Airport::get();
        $airplanes = Airplane::get();
        $firstairport = DB::table('flights')
            ->join('airports as airport1','flights.departure_airport','airport1.id')
            ->join('airports as airport2','flights.arrival_airport','airport2.id')
            ->select('airport1.airport_name as airport1','airport2.airport_name as airport2')
            ->where('flights.id','=',$flight->id)
        ->first();
//        dd($firstairport);
        $firstplane = DB::table('flights')
            ->join('airplanes','airplanes.id','=','flights.id_plane')
            ->select('airplanes.model_name','airplanes.count_seats')
            ->where('flights.id','=',$flight->id)
            ->first();
        return view('admin.flights.create',compact('flight','airplanes','airports','firstairport','firstplane'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        $flight->update($request->all());
        return redirect(route('flights.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect(route('flights.index'));
    }
}
