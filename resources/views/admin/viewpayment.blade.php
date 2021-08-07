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
              <h3 class="card-title">View payments</h3>
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
                  <th>Amount</th>
                  <th>Payment Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($collection as $item)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->getStudent->name}}</td>
                    <td>{{$item->amount}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                      <a href="editpayment/{{$item->id}}" class="btn btn-warning btn-small">Edit</a>
                      <a href="deletepayment/{{$item->id}}" class="btn btn-danger btn-small" onclick="return confirm('Do you want to delete permanently?')">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Sl No</th>
                    <th>Student Name</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Action</th>
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

