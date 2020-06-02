<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Showtime;
use App\Ticketstatus;
use DB;
class BookingController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }
    public function booking($id){
        $movie = Movie::find($id);
        $showtimes = Showtime::all();
        $date_today= date('Y-m-d');
        $time_today=date('H:i:s');
        $date_tomorrow=date('Y-m-d', strtotime($date_today. ' + 1 day'));
        $date_dayaftertomorrow=date('Y-m-d', strtotime($date_today. ' + 2 day'));
        $showdates= DB::table('showtimes')
            ->select('show_date')
            ->groupBy('show_date')
            ->get();
        $show_today= DB::table('showtimes')
            ->select('show_time_start','movie_id','id')
            ->where('show_date',$date_today)
            ->get();
        $show_tomorrow= DB::table('showtimes')
            ->select('show_time_start','movie_id','id')
            ->where('show_date',$date_tomorrow)
            ->get();
        $show_dayaftertomorrow= DB::table('showtimes')
            ->select('show_time_start','movie_id','id')
            ->where('show_date',$date_dayaftertomorrow)
            ->get();
           // return($showtimes);
         //return ($show_today);
        // return($movie);
        // return($time_today);
        return view('users.Booking.index',['movie'=>$movie,
        'showtimes'=>$showtimes,
        'date_today'=>$date_today,
        'date_tomorrow'=>$date_tomorrow,
        'date_dayaftertomorrow'=>$date_dayaftertomorrow,
        'showdates'=>$showdates,
        'show_todays'=>$show_today,
        'show_tomorrows'=>$show_tomorrow,
        'show_dayaftertomorrows'=>$show_dayaftertomorrow,
        'today_time'=>$time_today]);
    }

    public function seat($id,$movie_id){
        $showtime = Showtime::find($id);
        $movie = Movie::find($movie_id);
        return view('users.Booking.ticket',['movie'=>$movie,
        'showtime' => $showtime,
        ]);
    }

    public function save(Request $request, $id){

        $total_seat = $this->request->input('total_seat');
        $user_id = auth()->user()->id;
        $showtime = Showtime::find($id);
        $movie_id=$showtime->movie_id;
        $movie = Movie::find($movie_id);

        // // return ($movie);
        if($showtime->totalseat<$total_seat){
            return view('users.Booking.ticket',['movie'=>$movie,'showtime'=>$showtime])->withErrors(['error' => 'Sorry! Insufficient Seat']);
        }
        else{
            if($total_seat <=0){
                return view('users.Booking.ticket',['movie'=>$movie,'showtime'=>$showtime])->withErrors(['error' => 'Must select atleaset one seat']);
            }
            else{
                $movie_name=$movie->movie_name;
                $show_date=$showtime->show_date;
                $show_time=$showtime->show_time_start;
                $show_end=$showtime->show_time_end;
                $total_amount=$total_seat*$showtime->price;
                $data = [
                    'user_id'=>$user_id,
                    'movie_name' => $movie_name,
                    'show_date' =>  $show_date,
                    'show_time_start' =>  $show_time,
                    'show_time_end' =>  $show_end,
                    'total_seat' => $total_seat,
                    'total_amount' =>  $total_amount,
                    'booking' => '1',
                    'paid'=>'0',
                ];
                $data['created_at'] = date('Y-m-d H:i:s');
                \DB::table('ticketstatus')->insert($data);
                \DB::table('showtimes')
                ->where('id', $showtime->id)
                ->update(['totalseat'=>$showtime->totalseat-$total_seat]);
                return redirect('/myticket');
            }

        }

        //return view('users.Booking.confirmticket');
    }
    public function myticket(){
        $user_id = auth()->user()->id;
        $tickets= DB::table('ticketstatus')
            ->where('user_id',$user_id)
            ->get();

        return view ('users.Booking.confirmticket',
        ['user_id'=>$user_id,
        'tickets'=>$tickets,]
        );
    }
    public function payment($id){
        $ticket = Ticketstatus::find($id);
        // return($ticket);
        return view('users.Booking.payment',['ticket'=>$ticket]);
    }
    public function detail(Request $request,$id){
        $this->validate($request, [
            'firstname'=>'required',
            'email'=>'required | email',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zip'=>'required | min:5 | max:5',
            'cardname'=>'required',
            'cardnumber'=>'required | min:16 | max:16',
            'expmonth'=>'required',
            'expyear'=>'required | min:4 | max:4',
            'cvv'=>'required | min:3 | max:3',
        ]);
      
        \DB::table('ticketstatus')
            ->where('id',$id)
            ->update(['paid'=>"1"]);
        $message="Successfully Paid";
            
        return redirect('/myticket')->with('success',$message);
    }
    public function cancel($id){
       
        $delete= Ticketstatus::find($id);
        $delete->delete();
        $message= "Successfully Canceled";
        $tables= DB::table('showtimes')
                ->where('show_date', '=', $delete->show_date)
                ->where('show_time_start', '=', $delete->show_time_start)
                ->get();
        foreach($tables as $table){
            $total_seat=$table->totalseat;
        }
        \DB::table('showtimes')
            ->where('show_date', '=', $delete->show_date)
            ->where('show_time_start', '=', $delete->show_time_start)
            ->update(['totalseat'=>$total_seat+$delete->total_seat]);

        // return($total_seat);
        return redirect('/myticket')->with('success',$message);
            
    }
}
