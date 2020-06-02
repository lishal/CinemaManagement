@extends('admin.layout.admindashboard')

@section('content-header')
    <h2>User List</h2>
@endsection
@section('content')
@include('validation.message')
<div class="row">
    <div class="panel-body">
        <table class="table table-striped">
          <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if (count($users) > 0)
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phonenumber }}</td>
                    <td>
                        <a href="{{ url('/deleteuser') }}/{{ $user->id }}" onclick="return confirmDelete()" class="ibtn btn-icon"> <i class="fa fa-remove" rel="tootltip" title="Delete"></i> </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2">No records found</td>
            </tr>
        @endif
           
          </tbody>
        </table>
      </div>
</div>
@endsection