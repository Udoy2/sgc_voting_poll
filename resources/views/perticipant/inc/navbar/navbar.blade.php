    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container">
  
          <!-- Brand -->
          <div class="row">
            <div class="col-2">
              <a class="navbar-brand waves-effect" href="" target="_blank">
                <img src="{{asset('/logo/college_logo/college_logo.png')}}" alt="college_logo"   height='55px' width="55px" srcset="">
              </a>
              
            </div>
            <div class="col-10">
              <a class="navbar-brand waves-effect mt-3" href="" target="_blank">
                <strong style="color: #073c5e; font-size:1.4rem; font-weight:700;">Sabujbagh Govt. College</strong>
              </a>
            </div>


          </div>
  
          <!-- Collapse -->
           <button class="navbar-toggler ml-md-auto" style="padding: 0 !important;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
  
          <!-- Links -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
  

  
            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons ml-auto">

              <li class="nav-item">
                <form action="{{route("logout")}}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-outline-grey text-blue rounded-pill">logout</button>
              </form>
              </li>
            </ul>
  
          </div>
  
        </div>
      </nav>
      <!-- Navbar -->