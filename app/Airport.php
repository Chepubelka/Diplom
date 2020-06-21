<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = ['airport_name','city_id'];
    public function flights(){
        return $this->hasMany(Flight::class,'id_plane');
    }
}
