<h1 style="font-family: serif; font-size:3vw; padding-top:1.5%; padding-bottom:1.5%;padding-left:1%">Cinema Management System</h1>
    <nav class="navbar navbar-default"  style="background-color:rgba(0,0,0,.2);border:none; ">
        <div class="container-fluid" style="padding:0px;" >
          <ul class="nav navbar-nav">
          <li id="hov" class="@if(Request::is('/')) {{ 'act' }} @endif"><a href="{{url('/')}}" style="color:white; font-size:1.5vw; display:block;">Home</a></li>
          <li id="hov" class="@if(Request::is('aboutproject')) {{ 'act' }} @endif"><a href="{{url('/aboutproject')}}" style="color:white; font-size:1.5vw; display:block">About Project</a></li>
          <li id="hov" class="@if(Request::is('allmovies')) {{ 'act' }} @endif"><a href="/allmovies" style="color:white; font-size:1.5vw; display:block">All Movies</a></li>
          <li id="hov" class="@if(Request::is('contactus')) {{ 'act' }} @endif"><a href="{{url('/contactus')}}" style="color:white; font-size:1.5vw; display:block">Contact Us</a></li>
          @if(Auth::check())  
          <li id="hov">
          <div class="dropdown" style="color:white; font-size:1.5vw;">
            <button class="btn btn-primary dropdown-toggle" style="height:50px;" type="button" data-toggle="dropdown">{{ Auth::user()->name }} 
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <a class="dropdown-item" style=" font-size:1vw; margin-left:10px;" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>
     
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
            </ul>
          </div>
        </li>
          @endif
        </ul>
        </div>
    </nav>



