<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookerController extends Controller
{
    public function index(){
        $revenue = null;
        return view('bookkeep.index',compact('revenue'));
    }
    public function report(Request $request){
        $date1 = str_replace('.','-',date_format(date_create($request->date1), 'Y-m-d'));
        $date2 = str_replace('.','-',date_format(date_create($request->date2), 'Y-m-d'));
//        dd($date1);
        $revenue = DB::table('bookings')
            ->join('flights','flights.id','=','bookings.id_flight')
            ->select(DB::raw('DATE_FORMAT(flights.scheduled_departure,"%Y-%m-%d") as new_date'),DB::raw('SUM(bookings.price) as total_price'))
            ->whereBetween('flights.scheduled_departure',array($date1,$date2))
            ->groupBy(DB::raw('DATE_FORMAT(flights.scheduled_departure,"%Y-%m-%d")'))
            ->get();
        return view('bookkeep.index',compact('revenue'));
    }
}
