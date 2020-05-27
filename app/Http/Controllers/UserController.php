<?php

namespace App\Http\Controllers;
use App\Movie;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function movie(){
        $movies= Movie::all();
        // return($movies);
        return view('users.Movies.index',['movies'=>$movies]);
    }
    public function selected($id){
        $movie = Movie::find($id);
        //return($movie);
        return view('users.Movies.selected',['movie'=>$movie]);
    }
}
