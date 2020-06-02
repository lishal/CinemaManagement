@extends('admin.layout.admindashboard')

@section('content-header')
    <h2> Add Show Time</h2>
@endsection
@section('content')
@include('validation.message')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/addshow/store') }}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
        <label class="col-md-2 control-label">Movies</label>
        <div class="col-md-7">
                <select class="form-control" name="movie_id">
                <option value="{{ old('movie_id')==""?'selected':''}} ">Please select</option>
                @foreach($movies as $movie)
                        <option value="{{$movie->id}}" {{ $movie->id == $showtime->movie_id? 'selected': ''}} >{{$movie->movie_name}}</option>
                @endforeach
            </select>
            {{-- @error('movie_id')
                <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
             @enderror --}}
        </div>

    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Start Time *</label>

        <div class="col-md-7">
            <input type="text" class="form-control" placeholder="Pick Time" name="starttime" id="picktime" autocomplete="off">
            {{-- @error('starttime')
                <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
             @enderror --}}
        </div> 

    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">End Time *</label>

        <div class="col-md-7">
            <input type="text" class="form-control" placeholder="Pick Time" name="endtime" id="picktime1" autocomplete="off">
            {{-- @error('endtime')
                <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
             @enderror --}}
        </div> 

    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Select Date *</label>

        <div class="col-md-7">
            <input type="text" class="form-control" placeholder="Pick Time" name="movie_date" id="datepicker"  autocomplete="off">
            {{-- @error('movie_date')
                <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
             @enderror --}}
        </div> 

    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Price*</label>

        <div class="col-md-7">
            <input type="number" class="form-control" placeholder="Price" name="price">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Total Seat*</label>

        <div class="col-md-7">
            <input type="number" class="form-control" placeholder="Total Seat" name="total_seat">
        </div>
    </div>
    <div class="form-group bi-form-controls">
        <div class="col-md-9 text-left">
            <button type="submit" class="btn btn-default pull-right">Submit</button>
        </div>
    </div>
</form>

<script>
    $('#picktime').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '10',
            maxTime: '9:00pm',
            defaultTime: '11',
            startTime: '10:00am',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
        $('#picktime1').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '10',
            maxTime: '9:00pm',
            defaultTime: '11',
            startTime: '10:00am',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
      $( "#datepicker").datepicker();
      
    } );
</script>

@endsection