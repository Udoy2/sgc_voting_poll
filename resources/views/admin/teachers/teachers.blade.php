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
                <span>Teachers</span>
                </h4>

                <div class="float-right">
                <a id="add_teacher_button"  data-toggle="modal"  data-target="#teacher_add_modal"><strong><i data-toggle="tooltip" title="Add Teacher!!" class="fas fa-plus-circle text-success fa-2x"></i></strong></a>


                </div>



            </div>

            </div>
            <!-- Heading -->
            <h3  class="font-weight-bold mb-3">Science</h3>
            @php
              $k = 0
            @endphp

            @foreach ($teachers as $teacher)
            
                @if ($teacher->sector == 'science')
                    
                    <div class="card text-left mb-2">
                    
                      <div class="card-body">
                          <div class="row">
                              <div class="col-xl-1 col-lg-2 col-md-2 col-sm-6">
                                <img  src="{{asset($teacher->profile)}}" width="100px" height="100px" alt="">
      
                              </div>
                              <div class="col-xl-7 col-lg-6 col-md-6 col-sm-6 ml-xl-2">
                                  <div class="mt-2">
                                    <h4 class="card-title">{{$teacher->name}}</h4>
                                    <p class="card-text">{{$teacher->subject}}</p>
                                  </div>
                              </div>

                          </div>
                          <div class="row">
                            <div class="col-lg-12 ">
                              <form action="{{route('admin.teacher.delete_teacher')}}" method="post" class="form_teacher_delete{{$k}}">
                                @csrf
                                <input type="hidden" name="id" value="{{encrypt($teacher->id)}}">
                                <a class="float-right text-danger mr-3" onclick='document.getElementsByClassName("form_teacher_delete{{$k}}")[0].submit();' ><strong><i class="fas fa-trash   fa-2x  "></i></strong></a>
                                
                            </form>
                            <a class="float-right text-info mr-3" onclick="passDataToModal('{{encrypt($teacher->id)}}','{{$teacher->name}}','{{$teacher->subject}}','{{$teacher->sector}}')" ><strong><i data-toggle="tooltip" title="Edit!" class="fas fa-user-edit   fa-2x  "></i></strong></a>
                            </div>
                          </div>
                      </div>
                    </div>
                @endif


                @php
                $k = 0
            @endphp
            @endforeach
            <hr>
            <h3  class="font-weight-bold mt-3 mb-3">Commerce</h3>
            @php
              $j = 0
            @endphp
            @foreach ($teachers as $teacher)
            
                @if ($teacher->sector == 'commerce')
                
                <div class="card text-left mb-2">
                
                  <div class="card-body">
                      <div class="row">
                          <div class="col-xl-1 col-lg-2 col-md-2 col-sm-6">
                            <img  src="{{asset($teacher->profile)}}" width="100px" height="100px" alt="">

                          </div>
                          <div class="col-xl-7 col-lg-6 col-md-6 col-sm-6 ml-xl-2">
                              <div class="mt-2">
                                <h4 class="card-title">{{$teacher->name}}</h4>
                                <p class="card-text">{{$teacher->subject}}</p>
                              </div>
                          </div>

                      </div>
                      <div class="row">
                        <div class="col-lg-12 ">
                          <form action="{{route('admin.teacher.delete_teacher')}}" method="post" class="form_teacher_delete{{$j}}">
                            @csrf
                            <input type="hidden" name="id" value="{{encrypt($teacher->id)}}">
                            <a class="float-right text-danger mr-3" onclick='document.getElementsByClassName("form_teacher_delete{{$j}}")[0].submit();' ><strong><i class="fas fa-trash   fa-2x  "></i></strong></a>
                            
                        </form>
                        <a class="float-right text-info mr-3" onclick="passDataToModal('{{encrypt($teacher->id)}}','{{$teacher->name}}','{{$teacher->subject}}','{{$teacher->sector}}')" ><strong><i data-toggle="tooltip" title="Edit!" class="fas fa-user-edit   fa-2x  "></i></strong></a>
                        </div>
                      </div>
                  </div>
                </div>
                @php
                $j = 0
            @endphp
            @endif

          @endforeach
          <hr>
          <h3  class="font-weight-bold mt-3 mb-3">Arts</h3>
          @php
            $i = 0
          @endphp
            @foreach ($teachers as $teacher)
            
                @if ($teacher->sector == 'arts')
                
                <div class="card text-left mb-2">
                
                  <div class="card-body">
                      <div class="row">
                          <div class="col-xl-1 col-lg-2 col-md-2 col-sm-6">
                            <img  src="{{asset($teacher->profile)}}" width="100px" height="100px" alt="">

                          </div>
                          <div class="col-xl-7 col-lg-6 col-md-6 col-sm-6 ml-xl-2">
                              <div class="mt-2">
                                <h4 class="card-title">{{$teacher->name}}</h4>
                                <p class="card-text">{{$teacher->subject}}</p>
                              </div>
                          </div>

                      </div>
                      <div class="row">
                        <div class="col-lg-12 ">
                          
                          <form action="{{route('admin.teacher.delete_teacher')}}" method="post" class="form_teacher_delete{{$i}}">
                            @csrf
                            <input type="hidden" name="id" value="{{encrypt($teacher->id)}}">
                            <a class="float-right text-danger mr-3" onclick='document.getElementsByClassName("form_teacher_delete{{$i}}")[0].submit();' ><strong><i class="fas fa-trash   fa-2x  "></i></strong></a>
                            
                        </form>
                        <a class="float-right text-info mr-3" onclick="passDataToModal('{{encrypt($teacher->id)}}','{{$teacher->name}}','{{$teacher->subject}}','{{$teacher->sector}}')" ><strong><i data-toggle="tooltip" title="Edit!" class="fas fa-user-edit   fa-2x  "></i></strong></a>
                        </div>
                      </div>
                  </div>
                </div>
            @endif

            @php
            $i = 0
          @endphp

          @endforeach


        </div>


                {{-- poll add modal start///////////////////////////// --}}
                <div class="modal fade" id="teacher_add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h4 class="modal-title w-100 font-weight-bold">Add Teacher</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                      <form action="{{route('admin.teacher.add_teacher')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body mx-3">
                          <div class="md-form mb-5">
                            <i class="fas fa-user-plus prefix grey-text"></i>
                            <input type="text"  id="Name" name="name"  class="form-control ">
                            <label  for="Name">Name</label>
                          </div>
                  
                          <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="text" id="defaultForm-pass" name="subject" class="form-control ">
                            <label  for="defaultForm-pass">Subject</label>
                          </div>

                          <div class="md-form mb-4">
                            
                            <div class="row">
                                <div class="col-1"><i class="fas fa-pen-square prefix grey-text"></i></div>
                                <div class="col-11">
                                    <select class="browser-default custom-select" name="sector">
                                        <option value="science">Science</option>
                                        <option value="commerce">Commerce</option>
                                        <option value="arts">Arts</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <div class=" ">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center" >
                                        <input type="file" id="teacher_profile" name="profile" accept="image/*" style="display: none;">
                                        <label for="teacher_profile" class="btn btn-info text-white rounded-pill" >Profile</label>
                                    </div>
                                </div>
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



                {{-- poll edit modal start///////////////////////////// --}}
                <div class="modal fade" id="teacher_edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h4 class="modal-title w-100 font-weight-bold">edit Teacher</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                      <form action="{{route('admin.teacher.edit_teacher')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="edit_teacher_id" name="id">
                        <div class="modal-body mx-3">
                          <div class="md-form mb-5">
                            <i class="fas fa-user-plus prefix grey-text"></i>
                            <input type="text"  id="edit_teacher_name" name="name"  class="form-control ">
                            <label  for="edit_teacher_name" class="edit_teacher_labels">Name</label>
                          </div>
                  
                          <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="text" id="edit_teacher_subject" name="subject" class="form-control ">
                            <label  for="edit_teacher_subject" class="edit_teacher_labels">Subject</label>
                          </div>

                          <div class="md-form mb-4">
                            
                            <div class="row">
                                <div class="col-1"><i class="fas fa-pen-square prefix grey-text"></i></div>
                                <div class="col-11">
                                    <select class="browser-default custom-select" id="edit_teacher_sector" name="sector">
                                        <option value="science">Science</option>
                                        <option value="commerce">Commerce</option>
                                        <option value="arts">Arts</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <div class=" ">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center" >
                                        <input type="file" id="teacher_profile_edit" name="profile" accept="image/*" style="display: none;">
                                        <label for="teacher_profile_edit" class="btn btn-info text-white rounded-pill" >Profile</label>
                                    </div>
                                </div>
                          </div>
                  
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                          <button class="btn btn-default" type="submit">Edit</button>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
              
        
        
        
            {{-- poll edit modal end///////////////////////////// --}}


@endsection