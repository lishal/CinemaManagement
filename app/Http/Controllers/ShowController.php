<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

use App\Showtime;

class ShowController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin');
        $this->request = $request;
    }
    public function index(){
        $movies=Movie::all();
        $showtimes = Showtime::all();
        return view('admin.Showtime.index',['movies'=>$movies,'showtimes'=>$showtimes]);
    }
    public function add($show_id=0){
        $movies=Movie::all();
        $showtime = new Showtime();
        if($show_id > 0) {
            $showtime = $showtime->where('id', $show_id)->first();
        }
        return view('admin.Showtime.addshow',['movies'=>$movies,'showtime'=>$showtime]);
    }
    public function store(Request $request){
        $this->validate($request, [
            'movie_id'=>'required',
            'starttime'=>'required',
            'endtime'=>'required',
            'movie_date'=>'required',
            'price' => 'required|regex:/^[0-9]+/',
            'total_seat' => 'required|regex:/^[0-9]+/',
        ]);
        $movie_id = $this->request->input('movie_id');
        $starttime = $this->request->input('starttime');
        $endtime = $this->request->input('endtime');
        $movie_date = $this->request->input('movie_date');
        $price = $this->request->input('price');
        $total_seat = $this->request->input('total_seat');
        $date_movie= date('Y-m-d', strtotime($movie_date));
        $show_time_start =  date("H:i:s", strtotime($starttime));
        $show_time_end = date("H:i:s", strtotime($endtime));
        $showtimes=Showtime::all();

        $currentdate=date('Y-m-d');
        if($currentdate<=$date_movie){
            if($show_time_start<$show_time_end){
                if(count($showtimes) > 0){
                    foreach($showtimes as $showtime){
                        if($showtime->show_time_start == $show_time_start && $showtime->show_time_end == $show_time_end && $showtime->show_date == $date_movie){
                            return redirect('/addshow')->withErrors(['error' => 'Their is already one Show of selected date and time']);
                        }
                        else{
                            $data = [
                                'movie_id' => $movie_id,
                                'show_time_start' =>  $show_time_start,
                                'show_time_end' => $show_time_end,
                                'show_date' => $date_movie, 
                                'totalseat'=>$total_seat,
                                'price'=>$price,
                            ];
                            $data['created_at'] = date('Y-m-d H:i:s');
                            \DB::table('showtimes')->insert($data);
                            $message = "Record added successfully.";
                            return redirect('/showtime')->with('success',$message);
                        }
                    }
                }
                else{
                    $data = [
                        'movie_id' => $movie_id,
                        'show_time_start' =>  $show_time_start,
                        'show_time_end' => $show_time_end,
                        'show_date' => $date_movie, 
                        'totalseat'=>$total_seat,
                        'price'=>$price,
                    ];
                    $data['created_at'] = date('Y-m-d H:i:s');
                    \DB::table('showtimes')->insert($data);
                    $message = "Record added successfully.";
                    return redirect('/showtime')->with('success',$message);
                }

            }
            else{
                return redirect('/addshow')->withErrors(['error' => 'Please check your start time and end time']);
            }
        }
        else{
            return redirect('/addshow')->withErrors(['error' => 'Invalid Date. Past days date are not allowed']);;
        }

    
    }
    public function delete($id){
        $showtime = Showtime::find($id);
        if($showtime->delete()){
            return redirect('/showtime')->with('success','Show successfully deleted.');
        }
        else{
            return redirect('/showtime')->with('error','Something went wrong. Please try again.');
        }
    }
}
