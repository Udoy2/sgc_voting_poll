@extends('layouts.admin.dashboard')


@section('content')






      <div class="container-fluid mt-5">

        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">

          <!--Card content-->
          <div class="card-body d-sm-flex justify-content-between">

            <h4 class="mb-2 mb-sm-0 pt-1">
              <a href="" target="_blank">Dashboard</a>
              <span>/</span>
              <span>Poll</span>
            </h4>

            <div class="float-right">
              <a id="add_poll_button" data-toggle="tooltip" title="Add Poll!!"><strong><i class="fas fa-plus-circle text-success fa-2x"></i></strong></a>


            </div>



          </div>

        </div>
        <!-- Heading -->
        @php
            $i = 0
        @endphp
        @foreach ($polls as $poll)
          <div class="card text-left my-2">
            <img class="card-img-top"  alt="">
            <div class="card-body">
              <h4 class="card-title">{{$poll->name}}</h4>
              <a class="float-right text-success" data-toggle="tooltip" title="Download excel file of perticipant" href="{{route('admin.poll.excel_download',[encrypt($poll->id),$poll->name])}}"><strong><i class="fas fa-file-download  fa-2x  "></i></strong></a>
              <form action="{{route('admin.poll.delete_poll')}}" method="post" class="form_poll_delete{{$i}}">
                  @csrf
                  <input type="hidden" name="id" value="{{encrypt($poll->id)}}">
                  <a class="float-right text-danger mr-3" onclick='document.getElementsByClassName("form_poll_delete{{$i}}")[0].submit();' ><strong><i class="fas fa-trash   fa-2x  "></i></strong></a>
                  
              </form>

              <form action="{{route('admin.poll.publish_poll')}}" class="form_poll_publish{{$i}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{encrypt($poll->id)}}">
                  @if ($poll->is_published == 0)
                  
                    <a class="float-right text-success mr-3" data-toggle="tooltip" title="Publish poll!" onclick='document.getElementsByClassName("form_poll_publish{{$i}}")[0].submit();' ><strong><i class="fas fa-check-circle   fa-2x  "></i></strong></a>
                  @else
                    <a class="float-right text-danger mr-3" data-toggle="tooltip" title="remove from published poll!" onclick='document.getElementsByClassName("form_poll_publish{{$i}}")[0].submit();' ><strong><i class="fas fa-check-circle   fa-2x  "></i></strong></a>
                  @endif
              </form>
              <form action="{{route('admin.poll.perticipant_login_permission')}}" class="perticipant_login_permission{{$i}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{encrypt($poll->id)}}">
                  @if ($poll->login_permission == 0)
                  
                    <a class="float-right text-success mr-3" data-toggle="tooltip" title="Enable perticipant login!" onclick='document.getElementsByClassName("perticipant_login_permission{{$i}}")[0].submit();' ><strong><i class="fas fa-sign-in-alt  fa-2x  "></i></strong></a>
                  @else
                    <a class="float-right text-danger mr-3" data-toggle="tooltip" title="Disable perticipant login!" onclick='document.getElementsByClassName("perticipant_login_permission{{$i}}")[0].submit();' ><strong><i class="fas fa-sign-in-alt   fa-2x  "></i></strong></a>
                  @endif
              </form>
            </div>
          </div>
          @php
          $i = $i + 1;
      @endphp
        @endforeach 




      </div>





















        {{-- poll add modal start///////////////////////////// --}}
        <div class="modal fade" id="poll_add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Create poll</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="{{route('admin.poll.add_poll')}}" method="post">
                @csrf
                <div class="modal-body mx-3">
                  <div class="md-form mb-5">
                    <i class="fas fa-user-plus prefix grey-text"></i>
                    <input type="number"  id="Perticipants" name="perticipants"  class="form-control validate">
                    <label data-error="wrong" data-success="right" for="Perticipants">Perticipants</label>
                  </div>
          
                  <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="text" id="defaultForm-pass" name="name" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Name</label>
                  </div>
          
                </div>
                <div class="modal-footer d-flex justify-content-center">
                  <button class="btn btn-default" type="submit">Create</button>
                </div>
              </form>
          </div>
        </div>
      </div>
      



    {{-- poll add modal end///////////////////////////// --}}
@endsection