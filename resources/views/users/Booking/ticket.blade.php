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
                    @include('validation.message')
                    <p class="display_details"> Total Availabel Seat: {{$showtime->totalseat}}
                    </p>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/seatconfirm') }}/{{ $showtime->id }}" enctype="multipart/form-data" style="margin-top: 50px;">
                      {!! csrf_field() !!}
                      <div class="form-group">
                      <label class="col-md-2 control-label" style="margin-top: 5px;">Total Seat</label>
              
                      <div class="col-md-7">
                          <input type="number" class="form-control" placeholder="Total Seat" name="total_seat"  id="seat">
                      </div>
                  </div>
                  <p class="display_details"> Per Head price: {{$showtime->price}}<br>
                  </p>
                  <button type="submit"  class="btn btn-success" style="margin-top: 10px; height:50px; width:200px; margin-left:10vh;">Book Now</button>
                 
                  </form>
                 
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script>
      </script>
@endsection
@section('footer')
    @include('layout.footer')
@endsection