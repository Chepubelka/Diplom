<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = ['scheduled_departure','scheduled_arrival','departure_airport','arrival_airport','id_plane'];
    public function airplane(){
        return $this->belongsTo(Airplane::class,'id_plane');
    }
    public function airport(){
        return $this->belongsTo(Airport::class,'scheduled_departure');
    }
}
