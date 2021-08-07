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
              <h3 class="card-title">Add Course</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('course.store')}}" method="POST">
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
    
                <div class="form-group">
                  <label for="courseName">Course Name</label>
                  <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Enter course name">
                  <span class="text-danger">@error('courseName') {{$message}}@enderror</span>
                </div>
                <div class="form-group">
                  <label for="courseFee">Course Fee</label>
                  <input type="number" min="0" class="form-control" id="courseFee" name="courseFee"
                    placeholder="Enter course fees">
                  <span class="text-danger">@error('courseFee') {{$message}}@enderror</span>
                </div>
              </div>
              <!-- /.card-body -->
    
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add course</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.Main content -->
</div>
@endsection
