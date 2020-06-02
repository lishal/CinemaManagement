@extends('admin.layout.admindashboard')

@section('content-header')
    <h2>Paid List</h2>
@endsection
@section('content')
@include('validation.message')
<div class="row">
    <div class="panel-body">
        <table class="table table-striped">
          <thead>
            <tr>
                <th>User Name</th>
                <th>Movie Name</th>
                <th>Show Date</th>
                <th>Show Time</th>
                <th>Total_seat</th>
                <th>Total Amount</th>
            </tr>
          </thead>
          <tbody>
            @if (count($tickets) > 0)
            @foreach ($tickets as $ticket)
                @if($ticket->paid=="1")
                    <tr>
                        <td>{{ $ticket->first_name }}</td>
                        <td>{{ $ticket->movie_name }}</td>
                        <td>{{ $ticket->show_date }}</td>
                        <td>{{ $ticket->show_time_start }}</td>
                        <td>{{ $ticket->total_seat }}</td>
                        <td>{{ $ticket->total_amount }}</td>
                    </tr>
                @endif
            @endforeach
        @else
            <tr>
                <td colspan="6">No records found</td>
            </tr>
        @endif
           
          </tbody>
        </table>
      </div>
</div>
@endsection