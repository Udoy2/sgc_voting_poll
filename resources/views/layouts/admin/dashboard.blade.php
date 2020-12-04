<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-----------all layouts css--------------->
    @include('inc.css_all_layouts.css_layouts')
  <!-----------all layouts css--------------->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('admin_panel/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('admin_panel/css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{asset('admin_panel/css/style.min.css')}}" rel="stylesheet">
  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
  </style>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    @include('admin.inc.navbar.navbar')

    @include('admin.inc.sidebar.sidebar')

  </header>
  <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5 mb-2" style="min-height: 100vh !important;">

     <div class="mt-5">
      @include('inc.msg.messege')
     </div>
          <!--Main layout-->
      @yield('content')
    </main>
    <!--Main layout-->
      <!--Footer-->
     @include('inc.footer.footer')
      <!--/.Footer-->
    

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{asset('admin_panel/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('admin_panel/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('admin_panel/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('admin_panel/js/mdb.min.js')}}"></script>
  <!-- Initializations -->

      <!-----------all layouts js--------------->
      @include('inc.js_all_layouts.js_layouts')
      <!-----------all layouts hs--------------->



  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

    $(function () {
      $('.example-popover').popover({
        container: 'body'
      })
    })

  </script>

  <script>
    //side bar animation javasction/////////////////////////////////////
      $('#sidebar_toggle_bar').click(function(){
          $("#sidebar").fadeIn()
      })
      $('#sidebar_toggle_bar_cross').click(function(){
          $("#sidebar").fadeOut()
      })
    //side bar animation javascrtipt end////////////////////////////////

    //pol add javascript start/////////////////////////////////////////////////
    $("#add_poll_button").click(function(){
      $("#poll_add_modal").modal('show');
    })

    //pol end javascript enddddddddddd/////////////////////////////////////

    //edit teacher javascript start/////////////////////////////////////////
    function passDataToModal(tid , teacher_name , teacher_subject , teacher_sector){
      $('#edit_teacher_id').val(tid);
      $('#edit_teacher_name').val(teacher_name);
      $('#edit_teacher_subject').val(teacher_subject);
      $('#edit_teacher_sector').val(teacher_sector);
      $('#teacher_edit_modal').modal('show');
      $('.edit_teacher_labels').addClass('active');
    }
    //edit teacher javascript end/////////////////////////////////////////
  </script>



</body>

</html>
