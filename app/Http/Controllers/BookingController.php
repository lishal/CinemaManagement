<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function booking($id){
        $movie = Movie::find($id);
        // return($movie);
        return view('users.Booking.index',['movie'=>$movie]);
    }
}
