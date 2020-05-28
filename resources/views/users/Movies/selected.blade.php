@extends('layout.main')

@section('container')
    <div class="cms-main-container">
        {{-- <p>{{$movie->trailer_link}}</p> --}}
        <h1 style="text-align:center;">{{$movie->movie_name}}</h1>
        <div class="container-fluid">

          <div class="container">   

            <div class="row">
              <div class="col-sm-6" style="margin-top: 25px;">
                <img class="card-img-top" src="{{ asset('uploads/titleimg/'.$movie->title_image)}}" alt={{$movie->movie_name}} height="550" width="400" >
                <button type="button"  class="btn btn-primary" style="margin-top: 10px; height:50px; width:200px; margin-left:-1vh;" data-toggle="modal" data-target="#modalYT">Trailer <i class="fa fa-film" style="margin-left:5px;" aria-hidden="true"></i></button>
                <a href="{{url('booking')}}/{{ $movie->id }}"><button type="button"  class="btn btn-success" style="margin-top: 10px; height:50px; width:200px; margin-left:2vh;">Book Now <i class="fa fa-ticket" style="margin-left:5px;" aria-hidden="true"></i></button></a>
              </div>
              <div class="col-sm-6" style="margin-top: 25px;">
                <p class="display_details">
                  Director&ensp;:&emsp;<a href="#">{{$movie->director}}</a><br>
                  Cast Member&ensp;:&emsp;<a href="#">{{$movie->cast}}</a><br>
                  Total Duration&ensp;:&emsp;{{$movie->duration_min}}<br>
                  Release Date&ensp;:&emsp;{{$movie->release_date}}<br>
                  Movie Language&ensp;:&emsp;{{$movie->language}}<br>
                  Movie Category&ensp;:&emsp;
                  @if($movie->checkage==0)
                  Any one can watch 
                  @else
                  18+ only
                  @endif
                </p>
                <p class="display_desc">
                Description&ensp;:&emsp;{{$movie->description}}
                </p>
              </div>
            </div>
          </div>
          <!--Modal: Name-->
          <div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
          
              <!--Content-->
              <div class="modal-content">
          
                <!--Body-->
                <div class="modal-body mb-0 p-0">
          
                  <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                  <iframe class="embed-responsive-item" src="{{$movie->trailer_link}}" allowfullscreen></iframe>
                  </div>
          
                </div>
          
                <!--Footer-->
                <div class="close-con" style="margin-top:-5px; margin-bottom:5px; text-align:center;">
                  <button type="button" class="btn btn-primary m-2 p-2" data-dismiss="modal">Close</button>
                </div>
          
              </div>
              <!--/.Content-->
          
            </div>
          </div> 
         
    </div>
@endsection
@section('footer')
@include('layout.footer')
@endsection