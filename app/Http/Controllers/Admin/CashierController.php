<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashierController extends Controller
{
    public function index(){
        $orders = null;
        return view('cash.index',compact('orders'));
    }
    public function findTicket(Request $request){
        $orders = DB::table('bookings')
            ->join('flights','bookings.id_flight','=','flights.id')
            ->join('users','bookings.id_user','=','users.id')
            ->join('airports as airport1','flights.departure_airport','airport1.id')
            ->join('airports as airport2','flights.arrival_airport','airport2.id')
            ->join('cities as city1','airport1.city_id','city1.id')
            ->join('cities as city2','airport2.city_id','city2.id')
            ->select('airport1.airport_name as name1','airport2.airport_name as name2','bookings.id_book as id','city1.city_name as city1','city2.city_name as city2','scheduled_departure','scheduled_arrival','price','status')
            ->where('bookings.id_book','=',$request->book_id)
            ->orWhere('users.email','=',$request->email)
            ->get();
        $passengers = DB::table('tickets')
            ->join('passengers','passengers.id','=','tickets.passenger_id')
            ->join('bookings','bookings.id_book','=','tickets.book_id')
            ->join('users','users.id','=','bookings.id_user')
            ->select('passengers.Surname','passengers.Name','passengers.Middle_name','tickets.id as id','tickets.seat_id','passengers.passport')
            ->where('bookings.id_book','=',$request->book_id)
            ->orWhere('users.email','=',$request->email)
            ->get();
        return view('cash.index',compact('orders','passengers'));
    }
}
