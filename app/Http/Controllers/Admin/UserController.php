<?php

namespace App\Http\Controllers\Admin;

use App\Airplane;
use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPassRequest;
use App\Insurance;
use App\Passenger;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return view('user.profile');
    }
    public function orders(){
        $id = Auth::user()->id;
        $orders = DB::table('bookings')
            ->join('flights','bookings.id_flight','=','flights.id')
            ->join('airports as airport1','flights.departure_airport','airport1.id')
            ->join('airports as airport2','flights.arrival_airport','airport2.id')
            ->join('cities as city1','airport1.city_id','city1.id')
            ->join('cities as city2','airport2.city_id','city2.id')
            ->select('airport1.airport_name as name1','airport2.airport_name as name2','bookings.id_book as id','city1.city_name as city1','city2.city_name as city2','scheduled_departure','scheduled_arrival','price','adults','children')
            ->where('id_user','=',$id)
            ->where('status','=',0)
            ->get();
//        $passengers = Ticket::getPassengers($orders->id);
        return view('user.orders',compact('orders'));
    }
    public function remove($id_booking){
        $deletepassenger = Passenger::query()
            ->join('tickets','passengers.id','=','tickets.passenger_id')
            ->where('tickets.book_id','=',$id_booking);
        $deletepassenger->delete();
        $deletetickets = Ticket::query()->where('book_id','=',$id_booking);
        $deletetickets->delete();
        $delete = Booking::query()->where('id_book','=',$id_booking);
        $delete->delete();
        return redirect('/profile/orders');
    }
    public function sale($book_id){
        $count_seat = DB::table('airplanes')
            ->join('flights','flights.id_plane','=','airplanes.id')
            ->join('bookings','bookings.id_flight','=','flights.id')
            ->where('bookings.id_book','=',$book_id)
            ->first('count_seats');
//            ->get();
//        dd($count_seat);
        $busy_seats = DB::table('tickets')
            ->where('tickets.book_id','=',$book_id)
            ->select('seat_id')->get();
        $new_seats = $busy_seats->pluck('seat_id')->toArray();
        $insurances = Insurance::all();
//        dd($new_seats);
        return view('user.sale',compact('book_id','count_seat','new_seats','insurances'));
    }
    public function salechildren($book_id){
        $count_seat = DB::table('airplanes')
            ->join('flights','flights.id_plane','=','airplanes.id')
            ->join('bookings','bookings.id_flight','=','flights.id')
            ->where('bookings.id_book','=',$book_id)
            ->first('count_seats');
//            ->get();
//        dd($count_seat);
        $busy_seats = DB::table('tickets')
            ->where('tickets.book_id','=',$book_id)
            ->select('seat_id')->get();
        $new_seats = $busy_seats->pluck('seat_id')->toArray();
        $insurances = Insurance::all();
//        dd($new_seats);
        return view('user.saleChildren',compact('book_id','count_seat','new_seats','insurances'));
    }
    public function addchildren($book_id,Request $request){
        $passen = new Passenger;
        $passen->Surname = $request->input('name1');
        $passen->Name = $request->input('name2');
        $passen->Middle_name = $request->input('name3');
        $passen->passport = $request->input('pass');
        $passen->save();
        $id_passen = Passenger::query()->orderBy('id','desc')->limit('1')->first('id');
        $ticket = new Ticket;
        $ticket->book_id = $book_id;
        $ticket->passenger_id = $id_passen->id;
        $ticket->insurance_id = $request->input('insurance');
        $ticket->seat_id = $request->input('seat');
        $ticket->save();
        $id_tick = Ticket::query()->orderBy('id','desc')->limit('1')->first('id');
        $price_insurance = DB::table('tickets')
            ->join('insurances','insurances.id','=','tickets.insurance_id')
            ->where('tickets.id','=',$id_tick->id)
            ->first('insurances.price');
        if ($price_insurance === null){
            $price_insurance = 0;
        }else{
            DB::table('bookings')->where('id_book','=',$book_id)->increment('bookings.price',$price_insurance->price);
        }
        DB::table('bookings')->where('id_book','=',$book_id)->decrement('children',1);

        return redirect('/profile/orders');
    }
    public function add($book_id,Request $request){
        $passen = new Passenger;
        $passen->Surname = $request->input('name1');
        $passen->Name = $request->input('name2');
        $passen->Middle_name = $request->input('name3');
        $passen->passport = $request->input('pass');
        $passen->save();
        $id_passen = Passenger::query()->orderBy('id','desc')->limit('1')->first('id');
        $ticket = new Ticket;
        $ticket->book_id = $book_id;
        $ticket->passenger_id = $id_passen->id;
        $ticket->insurance_id = $request->input('insurance');
        $ticket->seat_id = $request->input('seat');
        $ticket->save();
        $id_tick = Ticket::query()->orderBy('id','desc')->limit('1')->first('id');
        $price_insurance = DB::table('tickets')
            ->join('insurances','insurances.id','=','tickets.insurance_id')
            ->where('tickets.id','=',$id_tick->id)
            ->first('insurances.price');
        if ($price_insurance === null){
            $price_insurance = 0;
        }else{
            DB::table('bookings')->where('id_book','=',$book_id)->increment('bookings.price',$price_insurance->price);
        }
        DB::table('bookings')->where('id_book','=',$book_id)->decrement('adults',1);

        return redirect('/profile/orders');
    }
    public function status($book_id){
        DB::table('bookings')->where('id_book','=',$book_id)->update(['status'=>true]);
        return redirect('/profile/orders');
    }
    public function complete(){
        $id = Auth::user()->id;
        $orders = DB::table('bookings')
            ->join('flights','bookings.id_flight','=','flights.id')
            ->join('airports as airport1','flights.departure_airport','airport1.id')
            ->join('airports as airport2','flights.arrival_airport','airport2.id')
            ->join('cities as city1','airport1.city_id','city1.id')
            ->join('cities as city2','airport2.city_id','city2.id')
            ->select('airport1.airport_name as name1','airport2.airport_name as name2','bookings.id_book as id','city1.city_name as city1','city2.city_name as city2','scheduled_departure','scheduled_arrival','price','adults','children')
            ->where('id_user','=',$id)
            ->where('status','=',1)
            ->get();
        $passengers = DB::table('tickets')
            ->join('passengers','passengers.id','=','tickets.passenger_id')
            ->join('bookings','bookings.id_book','=','tickets.book_id')
        ->select('passengers.Surname','passengers.Name','passengers.Middle_name','tickets.id as id','tickets.seat_id')
        ->where('bookings.id_user','=',$id)
        ->get();
        return view('user.completeorders',compact('orders','passengers'));
    }
}
