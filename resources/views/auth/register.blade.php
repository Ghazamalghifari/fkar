<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/fkar.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}    ">


  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
  <div class="row">
        <div class="col-xs-3">
          <img src="{{ asset('images/fkar.png') }}" height="125" width="100">
        </div>
        <div class="col-xs-9" style=" padding-top: 15px;">
          <a><b>ROHIS <br></b></a><a style="font-size: 30px">BANDAR LAMPUNG</a> 
        </div>
  </div>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
 

    <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
