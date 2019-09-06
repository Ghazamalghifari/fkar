<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/fkar.PNG') }}">
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
<body background="{{ asset('images/login-bg.jpg') }}"  > 

<div class="login-box">
  <div class="login-logo"> 
    <div class="row">
          <div class="col-xs-3">
            <img src="{{ asset('images/fkar.PNG') }}" height="125" width="100">
          </div>
          <div class="col-xs-9" style=" padding-top: 2px;">
            <a><b style="font-size: 50px;color:white;">ROHIS <br></b></a><b style="font-size: 25px;color:white;">BANDAR LAMPUNG</b> 
          </div>
    </div>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login sebagai anggota rohis.</p>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input id="password" type="password" class="form-control" name="password" required placeholder="Password atau Id Rohis">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Ingatkan saya.
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
 

    <a href="{{ url('/password/reset') }}">Saya lupa kata sandi saya</a><br>
    <a href="{{ url('/register') }}" class="text-center"><b style="color:red"> Belum Punya Akun Rohis? </b><br> Daftar Sebagai Anggota Rohis.</a>

  </div>
  <br> 

  <div class="login-box-body">
    <p class="login-box-msg">Cek <b>ID ROHIS </b>.</p>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('cek-rohis') }}">
                    {{ csrf_field() }}
      <div class="row">
        <div class="col-xs-8"> 
            <div class="form-group{{ $errors->has('id_rohis') ? ' has-error' : '' }} has-feedback">
              <input id="id_rohis" type="text" class="form-control" name="id_rohis" required placeholder="Cek ID Rohis">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div> 
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Cek</button>
        </div>
        <!-- /.col -->
      </div>
    </form> 
  </div>
  <!-- /.login-box-body --> 
  @if($result == null)    
  @else

<div class="login-box-body">   
<b>Data Anggota :</b>
    <ul>  
      <li> Nama : <b>{{ $result->name }}</b></li>  
      <li> Kelas : <b>{{ $result->kelas }}</b></li>  
      <li> Sekolah : <b>{{ $result->data_sekolah->nama_sekolah }}</b></li>  
    </ul>      
  <!-- /.login-box-body -->
</div>
  @endif 
<!-- /.login-box -->

<!-- /.login-box -->

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
