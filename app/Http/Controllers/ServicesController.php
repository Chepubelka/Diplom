<?php

namespace App\Http\Controllers;

use App\Insurance;
use App\Nutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function index(){
        return view('services');
    }
    public function nutrition(){
        $waters = DB::table('nutrition')
            ->join('type_nutrition','nutrition.type','=','type_nutrition.id')
            ->where('type_nutrition.name','=','Напитки')
            ->select('nutrition.name as name','nutrition.price','nutrition.description')
            ->get();
        $breakfast = DB::table('nutrition')
            ->join('type_nutrition','nutrition.type','=','type_nutrition.id')
            ->where('type_nutrition.name','=','Завтрак')
            ->select('nutrition.name as name','nutrition.price','nutrition.description')
            ->get();
        $lunch = DB::table('nutrition')
            ->join('type_nutrition','nutrition.type','=','type_nutrition.id')
            ->where('type_nutrition.name','=','Обед')
            ->select('nutrition.name as name','nutrition.price','nutrition.description')
            ->get();
        $dinner = DB::table('nutrition')
            ->join('type_nutrition','nutrition.type','=','type_nutrition.id')
            ->where('type_nutrition.name','=','Ужин')
            ->select('nutrition.name as name','nutrition.price','nutrition.description')
            ->get();
        return view('nutrition',compact('waters','breakfast','lunch','dinner'));
    }
    public function insurance(){
        $insurance = Insurance::get();
        return view('insurance',compact('insurance'));
    }
    public function flight(){
        return view('flight');
    }
    public function childrens(){
        return view('childrens');
    }
}
