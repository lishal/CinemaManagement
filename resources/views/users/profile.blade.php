@extends('layout.main')
@section('container')

        @include('validation.message')
        <div class="panel panel-default">
            <div style="margin-left:47%;">
                
                <img src="/uploads/avatars/{{ $user->avatar }}" style="width:70px; height:70px; border-radius:50%;">
                <h2 style="margin-top:5px;margin-left:-6%">{{ $user->first_name }}'s Profile</h2></div>
                
            <div class="panel-body">

                <br>
                <form class="form-horizontal" enctype="multipart/form-data" action="/profile" method="POST">
                    @csrf
                    <div class="form-group first_name">
                        <label class="col-md-2 control-label">First Name*</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name')? old('first_name'): ($user->first_name? $user->first_name: '') }}">
                        </div>
                    </div>
                    <div class="form-group last_name">
                        <label class="col-md-2 control-label">Last Name*</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name')? old('last_name'): ($user->last_name? $user->last_name: '') }}">
                        </div>
                    </div>
                    <div class="form-group email">
                        <label class="col-md-2 control-label">Email Address*</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="Email Address" name="email" value="{{ old('email')? old('email'): ($user->email? $user->email: '') }}">
                        </div>
                    </div>
                    <div class="form-group email">
                        <label class="col-md-2 control-label">Phone Number*</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phonenumber" value="{{ old('phonenumber')? old('phonenumber'): ($user->phonenumber? $user->phonenumber: '') }}">
                        </div>
                    </div>
                    <div class="form-group avatar">
                        <label class="col-md-2 control-label">Avatar</label>
                        <div class="col-md-7">
                            <input type="file" name="avatar" class="form-control">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    
                    <div class="form-group bi-form-controls">
                        <div class="col-md-9 text-left">
                            <button type="submit" class="btn btn-success pull-right">UPDATE</button>
                        </div>
                    </div>
                </form>
                <div class="panel-heading">
                    <h3>CHANGE PASSWORD</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/update_password">
                        @csrf

                        <div class="form-group old_password">
                            <label class="col-md-2 control-label">Old Password*</label>
    
                            <div class="col-md-7">
                                <input type="password" class="form-control" placeholder="Old Password" name="old_password" value="">
                            </div>
                        </div>

                        <div class="form-group new_password">
                            <label class="col-md-2 control-label">New Password*</label>
    
                            <div class="col-md-7">
                                <input type="password" class="form-control" placeholder="New Password" name="new_password" value="">
                            </div>
                        </div>
    
                        <div class="form-group confirm_password">
                            <label class="col-md-2 control-label">Confirm New Password*</label>
    
                            <div class="col-md-7">
                                <input type="password" class="form-control" placeholder="Confirm New Password" name="new_password_confirmation" value="">
                            </div>
                        </div>
    
                        <div class="form-group bi-form-controls">
                            <div class="col-md-9 text-left">
                                <button type="submit" class="btn btn-success pull-right">CHANGE PASSWORD</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@section('footer')
    @include('layout.footer')
@endsection