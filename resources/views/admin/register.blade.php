@extends('layout.main')
@section('container')
<div class="cms-main-container">
    <h1 style="text-align: center;">Register for New User</h1><hr>
    <div class="f-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="name">{{ __('Name') }}</label>             
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                                                       
                            <label for="email">{{ __('E-Mail Address') }}</label>                       
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                                  
                            <label for="password">{{ __('Password') }}</label>                       
                                <input id="password" type="password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                             
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>                           
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">                                                  
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
@endsection
@section('footer')
@include('layout.footer')
@endsection