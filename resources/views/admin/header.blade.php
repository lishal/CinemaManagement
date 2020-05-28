<header class="main-header">

  <!-- Logo -->
  <a href="/admin/home" class="logo">
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><h4><b>Cinema Management System</b></h4></span>
  </a>

  <!-- Header Navbar -->
  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ url('images/admin.png') }}" class="user-image" alt="User Image">
          <span class="hidden-xs">Hello, Admin</span>
          </a>
          
          
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="{{ url('images/admin.png') }}" class="img-circle"  alt="User Image">
              <p>
                
                <h4 style="color:white">Hello, Admin</h4>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a id="Btn" href="{{ url('#') }}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  <input type="hidden" name="redirect" id="redirect">
              </form>
              <div class="pull-right">
                  <a id="logoutBtn" href="{{ url('/logout') }}" class="btn btn-default btn-flat">
                      Logout
                  </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

<script type="text/javascript">
  $('#logoutBtn').on('click', function(e){
    e.preventDefault();
    $('#logout-form').submit();
  });

</script>