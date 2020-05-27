@extends('layout.main')
@section('container')
<div class="cms-main-container">

  <h1 style="text-align: center;">Send us your Message</h1><hr>

  <div class="f-container">
  @include('validation.message')
  <form class="contact-form" action="{{url('/contactus')}}" method="POST">
  @csrf
  <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Your name..">
    @if ($errors->has('name'))
        <span style="color: #BE3636 ;" class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
    @endif

    <label for="email">Email</label>
    <input type="email" name="email" class="contact-form-text" placeholder="Your email..">
    @if ($errors->has('email'))
        <span style="color: #BE3636 ;" class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
    @endif

    <label for="country">Phone</label>
    <input type="text" name="phone" class="contact-form-text" placeholder="Your phone..">
    @if ($errors->has('phone'))
        <span style="color: #BE3636 ;" class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
    @endif

    <label for="message">Message</label>
    <textarea name="message" class="contact-form-text" placeholder="Your message.."></textarea>
    @if ($errors->has('message'))
        <span style="color: #BE3636 ;" class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
    @endif

    <input type="submit" class="contact-form-btn" value="Submit">
  </form>
</div>
</div>

@endsection
@section('footer')
@include('layout.footer')
@endsection