    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed d-xl-block" id="sidebar" >

        <div class="d-xl-none d-md-block d-sm-block">        
            <a class="navbar-brand waves-effect ml-3 mt-4" id="sidebar_toggle_bar_cross">
            <strong class="blue-text"><i class="fas fa-times"></i></strong>
          </a>
        </div>
      <a class=" waves-effect d-flex justify-content-center mt-2 mb-1">
        
         
        <img src="{{asset('logo/college_logo/college_logo.png')}}" width="100px" height="100px"  class="" alt="" >

          
        
      </a>
      <strong style="color: #073c5e; font-size:1.25rem; font-weight:700;" class="text-center">Sabujbagh Govt. College</strong>

      <div class="list-group list-group-flush mt-3">
        <a href="{{route('admin.poll')}}" class="list-group-item {{$navPoll ?? ''}} list-group-item-action waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Polls
        </a>
        <a href="{{route('admin.teacher')}}" class="list-group-item {{$navTeacher ?? ''}} list-group-item-action waves-effect">
          <i class="fas fa-user mr-3"></i>Teachers</a>

        <a href="{{route('admin.result')}}" class="list-group-item {{$navResult ?? ''}} list-group-item-action waves-effect">
          <i class="fas fa-user mr-3"></i>Result</a>

      </div>

    </div>
    <!-- Sidebar -->