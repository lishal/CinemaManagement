<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticketstatus;
use Illuminate\Http\RedirectResponse;

class PaymentlistController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin');
    }
    public function paid(){
        $tickets = \DB::table('ticketstatus')
            ->join('users', 'users.id', '=', 'ticketstatus.user_id')
            ->select('ticketstatus.*', 'users.first_name')
            ->get();
        return view('admin.paidlist',['tickets'=>$tickets]);
    }
    public function notpaid(){
        $tickets = \DB::table('ticketstatus')
            ->join('users', 'users.id', '=', 'ticketstatus.user_id')
            ->select('ticketstatus.*', 'users.first_name')
            ->get();
        return view ('admin.notpaid',['tickets'=>$tickets]);
    }
}
