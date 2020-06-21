<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable = ['Surname','Name','Middle_name','passport'];
}
