@extends('layout.main')

@section('container')
    <div class="cms-main-container">
        <div class="container">
            <h1 style="text-align:center;">{{$movie->movie_name}}</h1>
            <div class="container-fluid">
    
              <div class="container">   
    
                <div class="row">
                  <div class="col-sm-6" style="margin-top: 25px;">
                    <img class="card-img-top" src="{{ asset('uploads/titleimg/'.$movie->title_image)}}" alt={{$movie->movie_name}} height="550" width="400" >
                  </div>
                  <div class="col-sm-6" style="margin-top: 25px;">
                    <div class="panel-body">

                     
                        <table class="table table-striped deals-table">
                          <thead>
                            <tr>
                                <th>Show Date</th>
                                <th>Show Time</th>
                            </tr>
                          </thead>
                          <tbody>
                          
                            @foreach ($showdates as $showdate)
                                  <tr> 
                                    @if ($date_today<=$showdate->show_date)
                                      <td>
                                        @if($date_today==$showdate->show_date)
                                          Today
                                        @elseif($date_tomorrow==$showdate->show_date)
                                          Tomorrow
                                        @else
                                        {{$showdate->show_date}}
                                        @endif
                                        </td>
                                        <td>
                                          @if($date_today==$showdate->show_date)
                                            @foreach ($show_todays as $showtoday)
                                            @if($showtoday->movie_id==$movie->id && $showtoday->show_time_start>=$today_time)
                                              <a href="{{ url('/seatselection') }}/{{ $showtoday->id }}/{{$showtoday->movie_id}}"><button>{{$showtoday->show_time_start}}</button></a>
                                            
                                            @endif
                                            @endforeach
                                          @elseif($date_tomorrow==$showdate->show_date)
                                            @foreach ($show_tomorrows as $show_tomorrow)
                                            @if($show_tomorrow->movie_id==$movie->id)
                                               <a href="{{ url('/seatselection') }}/{{ $show_tomorrow->id }}/{{$show_tomorrow->movie_id}}"><button>{{$show_tomorrow->show_time_start}}</button></a>
                                            @endif
                                            @endforeach
                                          @elseif($date_dayaftertomorrow==$showdate->show_date)
                                            @foreach ($show_dayaftertomorrows as $show_dayaftertomorrow)
                                            @if($show_dayaftertomorrow->movie_id==$movie->id)
                                              <a href="{{ url('/seatselection') }}/{{ $show_dayaftertomorrow->id }}/{{$show_dayaftertomorrow->movie_id}}"><button>{{$show_dayaftertomorrow->show_time_start}}</button></a>
                                            @endif
                                            @endforeach
                                          @else
                                            No Movie Availabe
                                          @endif
                                        </td>
                                    @endif
                                  </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                      </div>
                </div>
                  </div>
                </div>
              </div>
            </div>
        
        </div>
    </div>
@endsection
@section('footer')
@include('layout.footer')
@endsection