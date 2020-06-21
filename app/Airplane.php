<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = ['model_name','count_seats'];
    public function flights(){
        return $this->hasMany(Flight::class,'id');
    }

}
