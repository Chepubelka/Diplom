<?php

namespace App\Http\Controllers;

use App\Airplane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TabloController extends Controller
{
    public function index(){
//        $airports = Airport::with('flights')->get();
        $info = DB::table('flights')
            ->join('airports as airport1','flights.departure_airport','airport1.id')
            ->join('airports as airport2','flights.arrival_airport','airport2.id')
            ->join('cities as city1','airport1.city_id','city1.id')
            ->join('cities as city2','airport2.city_id','city2.id')
            ->select('flights.id as id','airport1.airport_name as name1','airport2.airport_name as name2','city1.city_name as city1','city2.city_name as city2','scheduled_departure','scheduled_arrival')
            ->get();
        return view('online-tablo',compact('info'));
    }
    public function filter(Request $request){
        $number = $request->input('number-tablo');
        $date = str_replace('.','-',date_format(date_create($request->input('date-tablo')), 'Y-m-d'));
        $info = DB::table('flights')
            ->join('airports as airport1','flights.departure_airport','airport1.id')
            ->join('airports as airport2','flights.arrival_airport','airport2.id')
            ->join('cities as city1','airport1.city_id','city1.id')
            ->join('cities as city2','airport2.city_id','city2.id')
            ->select('flights.id as id','airport1.airport_name as name1','airport2.airport_name as name2','city1.city_name as city1','city2.city_name as city2','scheduled_departure','scheduled_arrival')
            ->where('flights.id','=',$number)->OrwhereDate('scheduled_departure',$date)
            ->get();
        return view('online-tablo',compact('info'));
    }
}
