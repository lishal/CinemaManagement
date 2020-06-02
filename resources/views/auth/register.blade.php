@extends('layout.main')
@section('container')
<div class="cms-main-container">
    <h1 style="text-align: center;">Register for New User</h1><hr>
    <div class="f-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>           
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror 
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="email">{{ __('E-Mail Address') }}</label>                       
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                                  
                            <label for="password">{{ __('Password') }}</label>                       
                                <input id="password" type="password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                             
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>                           
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">                                                  
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                                <a href="{{url('/login')}}" class="btn btn-primary">Back To Login</a>
                            </div>
                        </div>
                    </form>
                </div>
@endsection
@section('footer')
@include('layout.footer')
@endsection