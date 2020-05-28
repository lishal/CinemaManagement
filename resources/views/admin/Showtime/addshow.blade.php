@extends('admin.layout.admindashboard')

@section('content-header')
    <h2> Add Show Time</h2>
@endsection
@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('#') }}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
        <label class="col-md-2 control-label">Movies</label>
        <div class="col-md-7">
            <select class="form-control" >
                 @foreach ($movies as $movie)
                    <option value="{{$movie->id}}">{{$movie->movie_name}}</option>
                 @endforeach
            </select>
        </div> 

    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Start Time *</label>

        <div class="col-md-7">
            <input type="text" class="form-control" placeholder="Pick Time" name="starttime" id="picktime" autocomplete="off">
        </div> 

    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">End Time *</label>

        <div class="col-md-7">
            <input type="text" class="form-control" placeholder="Pick Time" name="endtime" id="picktime1" autocomplete="off">
        </div> 

    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Select Date *</label>

        <div class="col-md-7">
            <input type="text" class="form-control" placeholder="Pick Time" name="datepicker" id="datepicker" autocomplete="off">
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