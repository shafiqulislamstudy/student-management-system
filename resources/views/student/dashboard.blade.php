@extends('layout.stuapp')
@section('stucontent')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
         <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline mt-3">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('assets/img/student')}}/{{$collection->image}}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{$collection->name}}</h3>

              <p class="text-muted text-center">{{$collection->email}}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Course</b> <a class="float-right">{{$collection->getCourse->courseName}}</a>
                </li>
                <li class="list-group-item">
                  <b>Course Fee</b> <a class="float-right">{{$courseFee=$collection->getCourse->courseFee}} TK</a>
                </li>
                <li class="list-group-item">
                  <b>Total Paid</b> <a class="float-right">{{$totalPaid=$collection->getPayment->sum('amount')}} TK</a>
                </li>
                <li class="list-group-item">
                  <b>Due</b> <a class="float-right">{{$courseFee - $totalPaid}} TK</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
         </div>
         <div class="col-md-9">
          <div class="card card-primary mt-3">
            <div class="card-header">Details</div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $i=1;
                  @endphp
                  @foreach ($collection->getPayment as $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>Payment</td>
                        <td>{{$item->amount}}</td>
                        <td>{{$item->updated_at}}</td>
                      </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Date</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
         </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.Main content -->
  </div>
@endsection