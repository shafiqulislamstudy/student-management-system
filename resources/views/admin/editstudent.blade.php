@extends('layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Update student</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('student.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
        
                                @if ($message=Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>{{$message}}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                @endif
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Course</label>
                                        <select class="form-control select2" name="course" style="width: 100%;">
                                          <option value="">Choose course</option>
                                         @foreach ($collection as $item)
                                             <option value="{{$item->id}}"
                                                @if ($item->id == $stuData->course_id)
                                                    {{'selected'}}
                                                @endif
                                              >{{$item->courseName}}</option>
                                         @endforeach 
                                        </select>
                                        <span class="text-danger">@error('course'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="studentName">Student Name</label>
                                        <input type="text" class="form-control" name="name" id="studentName" value="{{$stuData->name}}" placeholder="Enter student name">
                                        <input type="hidden" name="id" value="{{$stuData->id}}">
                                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" value="{{$stuData->address}}" placeholder="Enter address">
                                        <span class="text-danger">@error('address'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{$stuData->contact}}" placeholder="Enter phone no">
                                        <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image">Student Image</label>
                                        <input type="file" class="form-control" name="image" id="image" onchange="preview()">
                                        <input type="hidden" name="oldImg" value="{{$stuData->image}}">
                                        <span class="text-danger">@error('image'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <img src="{{asset('assets/img/student')}}/{{$stuData->image}}" alt="" id="previewImg" style="max-width: 120px;">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
        
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.Main content -->
</div>
@endsection