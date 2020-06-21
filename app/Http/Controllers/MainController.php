<?php

namespace App\Http\Controllers;

use App\Airplane;
use App\Airport;
use App\City;
use App\Flight;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        $news = News::query()->orderBy('id','Desc')->limit(3)->get();
        $cities = City::all();
        return view('index',compact('news','cities'));
    }
    public function info(){
        return view('info');
    }
    public function contacts(){
        return view('contacts');
    }
    public function find_tickets(Request $request){
        $adults = $request->input('adults');
        $children = $request->input('children');
        $date = str_replace('.','-',date_format(date_create($request->input('date')), 'Y-m-d'));
        $coords1 = DB::table('cities')->select('longitude','latitude')->where('cities.id','=',$request->city1)->first();
        $coords2 = DB::table('cities')->select('longitude','latitude')->where('cities.id','=',$request->city2)->first();
        $R=6371;
        $sin1=sin(($coords1->latitude-$coords2->latitude)/2);
        $sin2=sin(($coords1->longitude-$coords2->longitude)/2);
        $distance = 2*$R*asin(sqrt($sin1*$sin1+$sin2*$sin2*cos($coords1->latitude)*cos($coords2->latitude)));
        $price = round($distance * $request->adults + $distance * $request->children * 0.5);
        $flights =DB::table('flights')
            ->join('airports as airport1','flights.departure_airport','airport1.id')
            ->join('airports as airport2','flights.arrival_airport','airport2.id')
            ->join('cities as city1','airport1.city_id','city1.id')
            ->join('cities as city2','airport2.city_id','city2.id')
            ->select('airport1.airport_name as name1','airport2.airport_name as name2','city1.city_name as city1','city2.city_name as city2','scheduled_departure','scheduled_arrival','flights.id as id')
            ->whereDate('scheduled_departure','=',$date)
            ->get();
        return view('tickets',compact('flights','adults','children','price'));
    }
    public function changeLocale($locale){

        session(['locale'=>$locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
