@extends('layout.main')
@section('container')
<div class="cms-main-container">

  <h1 style="text-align: center;">Login with your registered email</h1><hr>

  <div class="f-container">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                       
                            <br><br>
                       
                            <label for="password">{{ __('Password') }}</label>

                            
                                <input id="password" type="password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check" style="margin-top:16px;">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <a href="{{url('/register')}}">Not registered yet?</a>
                    </form>
                </div>
@endsection
@section('footer')
@include('layout.footer')
@endsection