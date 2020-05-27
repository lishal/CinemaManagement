@extends('layout.main')

@section('container')
    <div class="cms-main-container">
        <div class="container">
           
            <div class="row">
                @foreach ($movies as $movie)
                    @if ($movie->isActive==1)
                        <div class="col-sm-6">
                        <br>
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('uploads/titleimg/'.$movie->title_image)}}" alt={{$movie->movie_name}} height="550" width="400" >
                                <a href="{{ url('selectedmovie') }}/{{ $movie->id }}"><p><button> More Info of {{$movie->movie_name}}</button></p></a>
                            </div>
                        </div>
                    @endif
                @endforeach 
            </div>   
        </div>
    </div>
@endsection
@section('footer')
@include('layout.footer')
@endsection