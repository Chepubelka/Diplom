<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NutritionRequest;
use App\Nutrition;
use App\Type_nutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nutrition = DB::table('nutrition')->join('type_nutrition','nutrition.type','=','type_nutrition.id')
            ->select('nutrition.id as id','nutrition.name as name','type_nutrition.name as name_type','nutrition.description','nutrition.price')
            ->get();
        return view('admin.nutrition.index',compact('nutrition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type_nutrition::all();
        return view('admin.nutrition.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NutritionRequest $request)
    {
        Nutrition::create($request->all());
        return redirect(route('nutrition.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function show(Nutrition $nutrition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function edit(Nutrition $nutrition)
    {
        $types = Type_nutrition::all();
        $old_type = Type_nutrition::query()
            ->join('nutrition','nutrition.type','=','type_nutrition.id')
            ->where('nutrition.id','=',$nutrition->id)
            ->select('type_nutrition.name as name')
            ->first();
        return view('admin.nutrition.create',compact('nutrition','types','old_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function update(NutritionRequest $request, Nutrition $nutrition)
    {
        $nutrition->update($request->all());
        return redirect(route('nutrition.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nutrition $nutrition)
    {
        $nutrition->delete();
        return redirect(route('nutrition.index'));
    }
}
