@extends('layout.main')
@section('container')
<div class="cms-main-container">
    <h1 style="text-align: center;">Reset your admin password</h1><hr>
    <div class="f-container">
                    <form method="POST" action="{{ route('admin.password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        
                            <label for="email" >{{ __('E-Mail Address') }}</label>

                           
                                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                 
                            <br><br>
                            <label for="password">{{ __('Password') }}</label>

                            
                                <input id="password" type="password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                            <br><br>
                        
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
@endsection
@section('footer')
@include('layout.footer')
@endsection