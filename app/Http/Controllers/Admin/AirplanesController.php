<?php

namespace App\Http\Controllers\Admin;

use App\Airplane;
use App\Http\Controllers\Controller;
use App\Http\Requests\AirplanesRequest;
use Illuminate\Http\Request;

class AirplanesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airplanes = Airplane::get();
        return view('admin.airplanes.index',compact('airplanes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.airplanes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirplanesRequest $request)
    {
        Airplane::create($request->all());
        return redirect(route('airplanes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function show(Airplane $airplane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function edit(Airplane $airplane)
    {
        return view('admin.airplanes.create',compact('airplane'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function update(AirplanesRequest $request, Airplane $airplane)
    {
        $airplane->update($request->all());
        return redirect(route('airplanes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airplane $airplane)
    {
    }
}
