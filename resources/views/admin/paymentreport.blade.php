@extends('layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card mt-3">
            <div class="card-header">
              <h3 class="card-title">Payment Report</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if ($message=Session::get('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{$message}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Student Name</th>
                  <th>Phone</th>
                  <th>Course </th>
                  <th>Course Fees</th>
                  <th>Total Paid</th>
                  <th>Due</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($collection as $item)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->contact}}</td>
                    <td>{{$item->getCourse->courseName}}</td>
                    <td>{{$total = $item->getCourse->courseFee}}</td>
                    <td>{{$paid = $item->getPayment->sum('amount')}}</td>
                    <td>{{$total - $paid}}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Sl No</th>
                    <th>Student Name</th>
                    <th>Phone</th>
                    <th>Course </th>
                    <th>Course Fees</th>
                    <th>Total Paid</th>
                    <th>Due</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.Main content -->
</div>
@endsection

