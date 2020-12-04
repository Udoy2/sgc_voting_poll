@extends('layouts.perticipant.dashboard')

@section('content')

    <div class="container">
        <div class="card  bg-white" >

          <div class="card-body" style="min-height: 100vh !important;">
              @if ($is_published == 1)
                    <h3 class="text-center text-muted">{{$poll->name}}</h3>
                    <form  >
                        
                      
                        @foreach ($teachers as $teacher)

                        <div class="card mt-3">
                          <div class="card-body">
                            <div class="row d-flex justify-content-center">
                              <div class="col-3 d-flex justify-content-center">
                                <img src="{{asset($teacher->profile)}}" class="rounded" alt="Teacher" srcset="">
                              </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-2">
                              <div class="col-md-6 col-sm-12  d-flex justify-content-center">
                                <strong>{{$teacher->name}}</strong>
                            </div>
                          </div>
                            <div class="row d-flex justify-content-center mt-1">
                              <div class="col-md-6 col-sm-12  d-flex justify-content-center">
                                <strong>{{$teacher->subject}}</strong>
                              </div>
                            </div>
                            <!----------------- vote questions ----------------->
                            @foreach ($topics as $topic)
                            @php
                              $id_random = Illuminate\Support\Str::random();
                            @endphp
                            <div class="container">
                              <div class="row d-flex justify-content-center mt-2">
                                <div class="col-lg-6 col-md-12 d-flex justify-content-start">
                                  <div class="row">
                                    <div class="col-12">
                                      <strong class="ml-lg-5">{{$topic->topic}}</strong>
                                    </div>
                                  </div>
                              </div>
                                <div class="col-lg-6 col-md-12 d-flex justify-content-start">
                                <div class="row">
                                  <div class="col-12">
                                    <!-- Default inline 1-->
                                        <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" style="cursor: pointer;" class="custom-control-input vote_radio_mard {{$id_random}}"  onchange='voteFormFillUp("{{encrypt($poll->id)}}","{{encrypt($teacher->id)}}","{{encrypt($topic->id)}}",1,"{{$id_random}}")' id="{{$id_random}}1" name="{{$topic->id.$teacher->id}}"
                                          @if(    \App\VoteResultSheet::where('poll_id',$poll->id)->
                                                  where('perticipant_id',Auth::user()->id)
                                                  ->where('teacher_id',$teacher->id)
                                                  ->where('topic_id',$topic->id)->get()->isNotEmpty())
                                            disabled
                                          
                                          @endif
                                          @if(    \App\VoteResultSheet::where('poll_id',$poll->id)->
                                                  where('perticipant_id',Auth::user()->id)
                                                  ->where('teacher_id',$teacher->id)
                                                  ->where('topic_id',$topic->id)->where('point',1)->get()->isNotEmpty())
                                            checked
                                          
                                          @endif>
                                          <label class="custom-control-label" style="cursor: pointer;" for="{{$id_random}}1">1</label>
                                        </div>

                                        <!-- Default inline 2-->
                                        <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" style="cursor: pointer;" class="custom-control-input vote_radio_mark {{$id_random}}" onchange='voteFormFillUp("{{encrypt($poll->id)}}","{{encrypt($teacher->id)}}","{{encrypt($topic->id)}}",2,"{{$id_random}}")' id="{{$id_random}}2" name="{{$topic->id.$teacher->id}}"
                                          @if(    \App\VoteResultSheet::where('poll_id',$poll->id)->
                                                  where('perticipant_id',Auth::user()->id)
                                                  ->where('teacher_id',$teacher->id)
                                                  ->where('topic_id',$topic->id)->get()->isNotEmpty())
                                            disabled
                                          
                                          @endif
                                          @if(    \App\VoteResultSheet::where('poll_id',$poll->id)->
                                                  where('perticipant_id',Auth::user()->id)
                                                  ->where('teacher_id',$teacher->id)
                                                  ->where('topic_id',$topic->id)->where('point',2)->get()->isNotEmpty())
                                            checked
                                          
                                          @endif>
                                          <label class="custom-control-label" style="cursor: pointer;" for="{{$id_random}}2">2</label>
                                        </div>

                                        <!-- Default inline 3-->
                                        <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" style="cursor: pointer;" class="custom-control-input vote_radio_mark {{$id_random}}" onchange='voteFormFillUp("{{encrypt($poll->id)}}","{{encrypt($teacher->id)}}","{{encrypt($topic->id)}}",3,"{{$id_random}}")' id="{{$id_random}}3" name="{{$topic->id.$teacher->id}}"
                                          @if(    \App\VoteResultSheet::where('poll_id',$poll->id)->
                                                  where('perticipant_id',Auth::user()->id)
                                                  ->where('teacher_id',$teacher->id)
                                                  ->where('topic_id',$topic->id)->get()->isNotEmpty())
                                            disabled
                                          
                                          @endif
                                          @if(    \App\VoteResultSheet::where('poll_id',$poll->id)->
                                                  where('perticipant_id',Auth::user()->id)
                                                  ->where('teacher_id',$teacher->id)
                                                  ->where('topic_id',$topic->id)->where('point',3)->get()->isNotEmpty())
                                            checked
                                          
                                          @endif>
                                          <label class="custom-control-label" style="cursor: pointer;" for="{{$id_random}}3">3</label>
                                        </div>
                                        <!-- Default inline 3-->
                                        <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" style="cursor: pointer;" class="custom-control-input vote_radio_mark {{$id_random}}" onchange='voteFormFillUp("{{encrypt($poll->id)}}","{{encrypt($teacher->id)}}","{{encrypt($topic->id)}}",4,"{{$id_random}}")' id="{{$id_random}}4" name="{{$topic->id.$teacher->id}}"
                                          @if(    \App\VoteResultSheet::where('poll_id',$poll->id)->
                                                  where('perticipant_id',Auth::user()->id)
                                                  ->where('teacher_id',$teacher->id)
                                                  ->where('topic_id',$topic->id)->get()->isNotEmpty())
                                            disabled
                                          
                                          @endif
                                          @if(    \App\VoteResultSheet::where('poll_id',$poll->id)->
                                                  where('perticipant_id',Auth::user()->id)
                                                  ->where('teacher_id',$teacher->id)
                                                  ->where('topic_id',$topic->id)->where('point',4)->get()->isNotEmpty())
                                            checked
                                          
                                          @endif>
                                          <label class="custom-control-label" style="cursor: pointer;" for="{{$id_random}}4">4</label>
                                        </div>
                                        <!-- Default inline 3-->
                                        <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" style="cursor: pointer;" class="custom-control-input vote_radio_mark {{$id_random}}" onchange='voteFormFillUp("{{encrypt($poll->id)}}","{{encrypt($teacher->id)}}","{{encrypt($topic->id)}}",5,"{{$id_random}}")' id="{{$id_random}}5"  name="{{$topic->id.$teacher->id}}"
                                          @if(    \App\VoteResultSheet::where('poll_id',$poll->id)->
                                                  where('perticipant_id',Auth::user()->id)
                                                  ->where('teacher_id',$teacher->id)
                                                  ->where('topic_id',$topic->id)->get()->isNotEmpty())
                                            disabled
                                          
                                          @endif
                                          @if(    \App\VoteResultSheet::where('poll_id',$poll->id)->
                                                  where('perticipant_id',Auth::user()->id)
                                                  ->where('teacher_id',$teacher->id)
                                                  ->where('topic_id',$topic->id)->where('point',5)->get()->isNotEmpty())
                                            checked
                                          
                                          @endif>
                                          <label class="custom-control-label" style="cursor: pointer;" for="{{$id_random}}5">5</label>
                                        </div>
                                  </div>
                                </div>
                              </div>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                        
                        @endforeach
                      </div>
                    
                  </form>
                  
              @else
              <div class="card  bg-white "  >

                <div class="card-body" style="height: 90vh !important">

                  <h3 class="text-muted text-center">There is no ongoing poll</h3>
                </div>
              </div>
                  
              @endif

              </div>



              


              
              
            </div>
          </div>
        </div>
    </div>
@endsection