<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function tickets(){
        return $this->hasMany(Ticket::class,'book_id');
    }
}
