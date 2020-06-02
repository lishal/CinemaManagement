<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">ADMIN MENU</li>
      
      <li class="@if(Request::is('admin/movie')) {{ 'active' }} @endif"><a href="{{ url('admin/movie') }}"><i class="fa fa-film"></i> <span>Movies</span></a></li>
        <li class="@if(Request::is('showtime')) {{ 'active' }} @endif"><a href="{{ url('/showtime') }}"><i class="fa fa-bell"></i> <span>Show Time</span></a></li>
        <li class="@if(Request::is('userlist')) {{ 'active' }} @endif"><a href="{{ url('/userlist') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
     
      {{-- <li class="@if(Request::is('*/posts*')) {{ 'active' }} @endif"><a href="{{ url('#') }}"><i class="fa fa-address-book"></i> <span>Posts</span></a></li> --}}

      
      <li class="@if(Request::is('paymentlist')) {{ 'active' }} @endif"><a href="{{ url('/paymentlist') }}"><i class="fa fa-money"></i> <span>Payment</span></a></li>
    

      
        <li class="@if(Request::is('bookinglist')) {{ 'active' }} @endif"><a href="{{ url('/bookinglist') }}"><i class="fa fa-book"></i> <span>Booking</span></a></li>
        
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>