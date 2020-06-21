<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    protected $fillable = ['name','type','description','price'];
}
