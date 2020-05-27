@extends('layout.main')
@section('container')
<div class="cms-main-container">
    <h1 style="text-align: center;">Reset Admin password</h1><hr>
    <div class="f-container">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf

                        
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <br><br>  

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
@endsection
@section('footer')
@include('layout.footer')
@endsection