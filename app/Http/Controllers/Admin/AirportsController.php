<?php

namespace App\Http\Controllers\Admin;

use App\Airport;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\AirportsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AirportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = DB::table('airports')
            ->join('cities','airports.city_id','=','cities.id')
            ->select('city_name','airport_name','airports.id as id')
            ->get();
        return view('admin.airports.index',compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.airports.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirportsRequest $request)
    {
        Airport::create($request->all());
        return redirect(route('airports.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(Airport $airport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function edit(Airport $airport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function update(AirportsRequest $request, Airport $airport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airport $airport)
    {
        //
    }
}
