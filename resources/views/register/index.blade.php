<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BUC - Register | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('adminlte2/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte2/font-awesome/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('adminlte2/ionicons/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte2/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte2/plugins/iCheck/square/blue.css') }}">

  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><b>BUC </b>- Register</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new account</p>
        <form action="{{ route('register.store') }}" method="POST">
          @csrf
          <div class="form-group @error('fullname') has-error @enderror">
            <input type="text" name="fullname" class="form-control" placeholder="Fullname">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @error('fullname')
            <div class="help-block">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group @error('username') has-error @enderror">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @error('username')
            <div class="help-block">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group @error('email') has-error @enderror">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @error('email')
            <div class="help-block">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group @error('project_code') has-error @enderror">
            <input type="text" name="project_code" class="form-control" placeholder="Project Code">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
            @error('project_code')
            <div class="help-block">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group @error('password') has-error @enderror">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @error('fullname')
            <div class="help-block">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="{{ route('login') }}" class="text-center">I already have an account</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('adminlte2/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('adminlte2/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('adminlte2/plugins/iCheck/icheck.min.js') }}"></script>
  </body>
</html>
