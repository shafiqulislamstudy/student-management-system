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
                            <h3 class="card-title">Add student</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
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
                                             <option value="{{$item->id}}">{{$item->courseName}}</option>
                                         @endforeach 
                                        </select>
                                        <span class="text-danger">@error('course'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="studentName">Student Name</label>
                                        <input type="text" class="form-control" name="name" id="studentName" placeholder="Enter student name">
                                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter address">
                                        <span class="text-danger">@error('address'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone no">
                                        <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email </label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                        <span class="text-danger">@error('password'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image">Student Image</label>
                                        <input type="file" class="form-control" name="image" id="image" onchange="preview()">
                                        <span class="text-danger">@error('image'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <img src="" alt="" id="previewImg" style="max-width: 120px;">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
        
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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