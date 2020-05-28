<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class ShowController extends Controller
{
    public function index(){
        return view('admin.Showtime.index');
    }
    public function add(){
        $movies=Movie::all();
        return view('admin.Showtime.addshow',['movies'=>$movies]);
    }
}
