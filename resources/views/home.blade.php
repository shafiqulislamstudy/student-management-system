@extends('layout.login')
@section('loginContent')
<div class="card card-outline card-primary">
  <div class="card-header text-center">
    <a href="{{route('home')}}" class="h1"><b>Login</b>SMS</a>
  </div>
  <div class="card-body">
    <p class="login-box-msg">Sign in to start your session</p>

    @if ($message=Session::get('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{$message}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <form action="{{route('login')}}" method="post">
      @csrf
      <span class="text-danger">@error('role'){{$message}}@enderror</span>
      <div class="input-group mb-3">
        <select class="custom-select" name="role" id="inputGroupSelect02">
          <option value="">Choose Role</option>
          <option value="1">Admin</option>
          <option value="2">Student</option>
          <option value="3">Teacher</option>
        </select>
        <div class="input-group-append">
          <label class="input-group-text" for="inputGroupSelect02"><i class="fas fa-user"></i></label>
        </div>
      </div>

      <span class="text-danger">@error('email'){{$message}}@enderror</span>
      <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>

      <span class="text-danger">@error('password'){{$message}}@enderror</span>
      <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
              Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <p class="mb-1">
      <a href="{{route('home')}}">forgot password?</a>
    </p>
    <p class="mb-0">
      <a href="{{route('home')}}" class="text-center">Register here</a>
    </p>
  </div>
  <!-- /.card-body -->
</div>
@endsection