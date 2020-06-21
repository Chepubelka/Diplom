<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    public function index($ticketid,$adults,$children,$price){
        if (!Auth::user()){
            return redirect('/register');
        }
        else{
        $booking = new Booking;
        $booking->id_user = Auth::user()->id;
        $booking->children = $children;
        $booking->adults = $adults;
        $booking->id_flight = $ticketid;
        $booking->price = $price;
        $booking->save();
        return redirect('/');
        }
    }
}
