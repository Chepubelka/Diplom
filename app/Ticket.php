<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    public static function getPassengers($id_booking){
        $passengers = DB::table('passengers')
            ->join('tickets','tickets.passenger_id','=','passengers.id')
            ->where('tickets.book_id','=',$id_booking)
            ->select('Surname','Name','Middle_name')
            ->get();
        return $passengers;
    }
    public function booking(){
        return $this->belongsTo(Booking::class,'id_plane');
    }
}
