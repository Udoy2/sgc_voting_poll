    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">
  
          <!-- Brand -->
          <a class="navbar-brand waves-effect ml-3" id="sidebar_toggle_bar">
            <strong class="blue-text"><i class="fas fa-bars"></i></strong>
          </a>
  
          <!-- Collapse -->

  
          <!-- Links -->
          <div class="" id="navbarSupportedContent">
  
            <!-- Left -->
            <ul class="navbar-nav mr-auto">
  
            </ul>
  
            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <form action="{{route("logout")}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-grey text-blue rounded-pill">logout</button>
                </form>
            </ul>
  
          </div>
  
        </div>
      </nav>
      <!-- Navbar -->