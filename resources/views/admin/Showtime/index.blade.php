@extends('admin.layout.admindashboard')

@section('content-header')
    <h2>Show Time</h2>
@endsection
@section('content')
<div class="add-button">
    <a href="{{ url('/addshow') }}" class="btn btn-primary">Add Show Time</a>
</div>  
@include('validation.message')

<div class="panel-body">
    <table class="table table-striped deals-table">
      <thead>
        <tr>
            <th>Movie Name</th>
            <th>Show Date</th>
            <th>Show start</th>
            <th>Show end</th>
            <th>Price</th>
            <th>Total Seat</th>
            <th>Action</th>
            
        
        </tr>
      </thead>
      <tbody>
        @if (count($showtimes) > 0)
        @foreach ($showtimes as $showtime)
            <tr>
                @foreach ($movies as $movie)
                    @if($showtime->movie_id==$movie->id)
                        <td>{{ $movie->movie_name }}</td>
                    @endif
                @endforeach
                <td>{{ $showtime->show_date }}</td>
                <td>{{ $showtime->show_time_start }}</td>
                <td>{{ $showtime->show_time_end }}</td>
                <td>{{ $showtime->price }}</td>
                <td>{{ $showtime->totalseat }}</td>
                
                <td>
                    {{-- <a href="{{ url('/addshow') }}/{{ $showtime->id }}" class="ibtn btn-icon"> <i class="fa fa-pen" rel="tootltip"  aria-hidden="true" title="Edit"></i> </a>   --}}
                    <a href="{{ url('/showtime') }}/{{ $showtime->id }}" onclick="return confirmDelete()" class="ibtn btn-icon"> <i class="fa fa-remove" rel="tootltip" title="Delete"></i> </a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5">No records found</td>
        </tr>
    @endif
       
      </tbody>
    </table>
  </div>
</div>
@endsection