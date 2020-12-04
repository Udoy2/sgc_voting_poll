@extends('layouts.admin.dashboard')

@section('content')
                <!-- Heading -->
                <div class="card mb-4 wow fadeIn">

                    <!--Card content-->
                    <div class="card-body d-sm-flex justify-content-between">
        
                        <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="" target="_blank">Dashboard</a>
                        <span>/</span>
                        <span><a href="{{route('admin.result')}}">Result</a></span>
                        <span>/</span>
                        <span>{{$poll->name}}</span>
                        </h4>
        
                        
        
        
        
                    </div>
        
                    </div>
                    <!-- Heading -->
                    <h3 class="text-muted py-3">Top 10</h3>
                    @foreach ($top_10_result as $teacher_result)
                    <div class="card text-left my-2">
                      <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-3 d-flex justify-content-center">
                              <img src="{{asset($teacher_result['teacher']->profile)}}" class="rounded" alt="Teacher" srcset="">
                            </div>
                          </div>
                          <div class="row d-flex justify-content-center mt-2">
                            <div class="col-md-6 col-sm-12  d-flex justify-content-center">
                              <strong>{{$teacher_result['teacher']->name}}</strong>
                          </div>
                        </div>
                          <div class="row d-flex justify-content-center mt-1">
                            <div class="col-md-6 col-sm-12  d-flex justify-content-center text-muted">
                              <strong>{{$teacher_result['teacher']->subject}}</strong>
                            </div>
                          </div>

                          {{-- result sheet start here-------------------------------------------------------------------------- --}}
                          @foreach ($teacher_result['vote_result'] as $result_sheet)

                          <div class="container">
                            <div class="row d-flex justify-content-center mt-2">
                              <div class="col-lg-6 col-md-12 d-flex justify-content-start">
                                <div class="row">
                                  <div class="col-12">
                                    <strong class="ml-lg-5">{{$result_sheet['topic']->topic}}</strong>
                                  </div>
                                </div>
                            </div>
                              <div class="col-lg-6 col-md-12 d-flex justify-content-start">
                              <div class="row" style="display: block !important; width: 100% !important;">
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{$result_sheet['mark']}}%;" aria-valuenow="{{$result_sheet['mark']}}" aria-valuemin="0" aria-valuemax="100">{{$result_sheet['mark']}}%</div>
                                      </div>
                                </div>
                              </div>
                            </div>
                            </div>
                          </div>
                          @endforeach

                          <div class="container">
                            <div class="row d-flex justify-content-center mt-2">
                              <div class="col-lg-6 col-md-12 d-flex justify-content-start">
                                <div class="row">
                                  <div class="col-12">
                                    <strong class="ml-lg-5">Overall mark:</strong>
                                  </div>
                                </div>
                            </div>
                              <div class="col-lg-6 col-md-12 d-flex justify-content-start">
                              <div class="row" style="display: block !important; width: 100% !important;">
                                <div class="col-12">
                                    

                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{$teacher_result['overall_mark']}}%;" aria-valuenow="{{$teacher_result['overall_mark']}}" aria-valuemin="0" aria-valuemax="100">{{$teacher_result['overall_mark']}}%</div>
                                      </div>
                                        
                                   
                                </div>
                              </div>
                            </div>
                            </div>
                          </div>

                      </div>
                    </div>
                  @endforeach


                  <h3 class="text-muted py-3">Last 10</h3>
                    @foreach ($last_10_result as $teacher_result)
                    <div class="card text-left my-2">
                      <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-3 d-flex justify-content-center">
                              <img src="{{asset($teacher_result['teacher']->profile)}}" class="rounded" alt="Teacher" srcset="">
                            </div>
                          </div>
                          <div class="row d-flex justify-content-center mt-2">
                            <div class="col-md-6 col-sm-12  d-flex justify-content-center">
                              <strong>{{$teacher_result['teacher']->name}}</strong>
                          </div>
                        </div>
                          <div class="row d-flex justify-content-center mt-1">
                            <div class="col-md-6 col-sm-12  d-flex justify-content-center text-muted">
                              <strong>{{$teacher_result['teacher']->subject}}</strong>
                            </div>
                          </div>

                          {{-- result sheet start here-------------------------------------------------------------------------- --}}
                          @foreach ($teacher_result['vote_result'] as $result_sheet)

                          <div class="container">
                            <div class="row d-flex justify-content-center mt-2">
                              <div class="col-lg-6 col-md-12 d-flex justify-content-start">
                                <div class="row">
                                  <div class="col-12">
                                    <strong class="ml-lg-5">{{$result_sheet['topic']->topic}}</strong>
                                  </div>
                                </div>
                            </div>
                              <div class="col-lg-6 col-md-12 d-flex justify-content-start">
                              <div class="row" style="display: block !important; width: 100% !important;">
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{$result_sheet['mark']}}%;" aria-valuenow="{{$result_sheet['mark']}}" aria-valuemin="0" aria-valuemax="100">{{$result_sheet['mark']}}%</div>
                                      </div>
                                </div>
                              </div>
                            </div>
                            </div>
                          </div>
                          @endforeach

                          <div class="container">
                            <div class="row d-flex justify-content-center mt-2">
                              <div class="col-lg-6 col-md-12 d-flex justify-content-start">
                                <div class="row">
                                  <div class="col-12">
                                    <strong class="ml-lg-5">Overall mark:</strong>
                                  </div>
                                </div>
                            </div>
                              <div class="col-lg-6 col-md-12 d-flex justify-content-start">
                              <div class="row" style="display: block !important; width: 100% !important;">
                                <div class="col-12">
                                    

                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{$teacher_result['overall_mark']}}%;" aria-valuenow="{{$teacher_result['overall_mark']}}" aria-valuemin="0" aria-valuemax="100">{{$teacher_result['overall_mark']}}%</div>
                                      </div>
                                        
                                   
                                </div>
                              </div>
                            </div>
                            </div>
                          </div>

                      </div>
                    </div>
                  @endforeach


@endsection