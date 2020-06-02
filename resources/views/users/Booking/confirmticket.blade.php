@extends('layout.main')

@section('container')
@include('validation.message')
    <div class="cms-main-container">
        <h1 style="text-align: center;">My Ticket</h1>
    </div>
    <div class="row">
        <div class="panel-body">
  
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>Movie Name</th>
                    <th>Movie Date</th>
                    <th>Movie Start Time</th>
                    <th>Movie End Time</th>
                    <th>Total Seat</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @if (count($tickets) > 0)
                @foreach ($tickets as $ticket)
                    @if($ticket->user_id == $user_id)
                    <tr>
                        <td>{{ $ticket->movie_name }}</td>
                        <td>{{ $ticket->show_date }}</td>
                        <td>{{ $ticket->show_time_start }}</td>
                        <td>{{ $ticket->show_time_end }}</td>
                        <td>{{ $ticket->total_seat }}</td>
                        <td>{{ $ticket->total_amount }}</td>
                        @if($ticket->paid == "0")
                            <td style="color: red; font-size:18px;">Amount Not Paid</td>
                        @else
                            <td style="color: green; font-size:18px;">Amount Paid</td>
                        @endif
                        @if($ticket->paid=="0")
                            <td>
                            <a href="{{url('/payment')}}/{{$ticket->id}}"><button class="btn btn-success">Pay Now</button></a>
                            <a href="{{url('/cancel')}}/{{$ticket->id}}"><button class="btn btn-danger">Cancel Booking</button></a>
                            </td>
                        @endif
                        
                    </tr>
                    @endif
                @endforeach
                
            @else
                <tr>
                    <td colspan="8">You don't have any bookings</td>
                </tr>
            @endif
               
              </tbody>
            </table>
          </div>
    </div>
@endsection
@section('footer')
    @include('layout.footer')
@endsection
 