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
              <h3 class="card-title">Add payment</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('payment.store')}}" method="POST">
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
                  <label>Select Student</label>
                  <select class="form-control select3" name="student" style="width: 100%;">
                    <option value="">Choose student</option>
                   @foreach ($collection as $item)
                       <option value="{{$item->id}}">{{$item->name}}</option>
                   @endforeach 
                  </select>
                  <span class="text-danger">@error('student'){{$message}} @enderror</span>
              </div>
    
                <div class="form-group">
                  <label for="amount">Payment Amount</label>
                  <input type="number" min="0" class="form-control" id="amount" name="amount" placeholder="Enter amount">
                  <span class="text-danger">@error('amount') {{$message}}@enderror</span>
                </div>
              </div>
              <!-- /.card-body -->
    
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add payment</button>
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
