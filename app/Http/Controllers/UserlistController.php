<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   public function index(){
       $users= User::all();
       return view('Admin.userlist',['users'=>$users]);
   }
   public function delete($id){
    $delete= User::find($id);
    $delete->delete();
    $message="User Successfully Deleted";
    return redirect('/userlist')->with('success',$message);
   }
}
