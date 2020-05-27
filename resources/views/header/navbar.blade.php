<h1 style="font-family: serif; font-size:3vw; padding-top:1.5%; padding-bottom:1.5%;padding-left:1%">Cinema Management System</h1>
    <nav class="navbar navbar-default"  style="background-color:rgba(0,0,0,.2);border:none; ">
        <div class="container-fluid" style="padding:0px;" >
          <ul class="nav navbar-nav">
          <li id="hov" class="@if(Request::is('/')) {{ 'act' }} @endif"><a href="{{url('/')}}" style="color:white; font-size:1.5vw; display:block;">Home</a></li>
          <li id="hov" class="@if(Request::is('aboutproject')) {{ 'act' }} @endif"><a href="{{url('/aboutproject')}}" style="color:white; font-size:1.5vw; display:block">About Project</a></li>
          <li id="hov" class="@if(Request::is('allmovies')) {{ 'act' }} @endif"><a href="/allmovies" style="color:white; font-size:1.5vw; display:block">All Movies</a></li>
          <li id="hov" class="@if(Request::is('')) {{ 'act' }} @endif"><a href="#" style="color:white; font-size:1.5vw; display:block">Book Ticket</a></li>
          <li id="hov" class="@if(Request::is('login')) {{ 'act' }} @endif"><a href="{{url('/login')}}" style="color:white; font-size:1.5vw; display:block">Login</a></li>
          <li id="hov" class="@if(Request::is('register')) {{ 'act' }} @endif"><a href="{{url('/register')}}" style="color:white; font-size:1.5vw; display:block">Register</a></li>
          <li id="hov" class="@if(Request::is('contactus')) {{ 'act' }} @endif"><a href="{{url('/contactus')}}" style="color:white; font-size:1.5vw; display:block">Contact Us</a></li>
          </ul>
        </div>
    </nav>



