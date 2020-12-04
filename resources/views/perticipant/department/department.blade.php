@extends('layouts.perticipant.dashboard')

@section('content')
    <div class="container">
      <div class="card " >
        <div class="card-body" style="height: 88vh !important;">
              <div class="row my-auto">
                  <div class="col-lg-4 col-sm-12">

                    <a href="{{route('perticipant.perticipant_department',encrypt('science'))}}">
                      <!--Card Primary-->
                    <div class="card indigo text-center z-depth-2 mt-3">
                      <div class="card-body">
                        <h3 class="text-uppercase font-weight-bold amber-text mt-2 mb-3"><strong>Science</strong></h3>
                        <p class="white-text mb-0"></p>
                      </div>
                    </div>
                    <!--/.Card Primary-->
                    </a>
        
                  </div>
                <!-- Grid column -->
      
                  <div class="col-lg-4 col-sm-12">

                    <a href="{{route('perticipant.perticipant_department',encrypt('commerce'))}}">
                      <!--Card Primary-->
                    <div class="card indigo text-center z-depth-2 mt-3">
                      <div class="card-body">
                        <h3 class="text-uppercase font-weight-bold amber-text mt-2 mb-3"><strong>Commerce</strong></h3>
                        <p class="white-text mb-0"></p>
                      </div>
                    </div>
                    <!--/.Card Primary-->
                    </a>
        
                  </div>

      
                  <div class="col-lg-4 col-sm-12">

                    <a href="{{route('perticipant.perticipant_department',encrypt('arts'))}}">
                      <!--Card Primary-->
                    <div class="card indigo text-center z-depth-2 mt-3">
                      <div class="card-body">
                        <h3 class="text-uppercase font-weight-bold amber-text mt-2 mb-3"><strong>Arts</strong></h3>
                        <p class="white-text mb-0"></p>
                      </div>
                    </div>
                    <!--/.Card Primary-->
                    </a>
        
                  </div>
              </div>
        </div>
      </div>
    </div>
@endsection