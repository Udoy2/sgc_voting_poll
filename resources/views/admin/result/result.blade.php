@extends('layouts.admin.dashboard')

@section('content')
                <!-- Heading -->
                <div class="card mb-4 wow fadeIn">

                    <!--Card content-->
                    <div class="card-body d-sm-flex justify-content-between">
        
                        <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="" target="_blank">Dashboard</a>
                        <span>/</span>
                        <span>Result</span>
                        </h4>
        
                        
        
        
        
                    </div>
        
                    </div>
                    <!-- Heading -->

                    @foreach ($polls as $poll)
                    <div class="card text-left my-2">
                      <img class="card-img-top"  alt="">
                      <div class="card-body">
                        <a href="{{route('admin.result.poll',[encrypt($poll->id)])}}" class="card-title font-weight-bold text-primary h4 pb-3">{{$poll->name}}</a>
                        <a class="float-right text-success" data-toggle="tooltip" title="Download result sheet" href="{{route('admin.poll.excel_download',[encrypt($poll->id),$poll->name])}}"><strong><i class="fas fa-file-download  fa-2x  "></i></strong></a>

                      </div>
                    </div>
                  @endforeach 
@endsection