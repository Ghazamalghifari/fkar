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
  <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}    ">
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}    ">
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}    ">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}    ">


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
<div class="register-box">
  <div class="register-logo">
  <div class="row">
        <div class="col-xs-3">
          <img src="{{ asset('images/fkar.PNG') }}" height="125" width="100">
        </div>
          <div class="col-xs-9" style=" padding-top: 2px;">
            <a><b style="font-size: 50px;color:white;">ROHIS <br></b></a><b style="font-size: 25px;color:white;">BANDAR LAMPUNG</b> 
          </div>
  </div>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Daftar Sebagai Sohib/Mitra.</p>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/registersohib') }}">
                        {{ csrf_field() }}

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama Pemilik" autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email Perusahaan" autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>  

      <div class="form-group{{ $errors->has('no_wa') ? ' has-error' : '' }} has-feedback">
        <input id="no_wa" type="number" class="form-control" name="no_wa" value="{{ old('no_wa') }}" required autofocus placeholder="Nomor WhatsApp">
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>
      <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }} has-feedback"> 
      {!! Form::textarea('alamat', null, ['class'=>'form-control','rows'=>'2','placeholder'=>'Alamat Perusahaan']) !!} 
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div> 
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
            <p  style="font-size:13px"> <input type="checkbox">  Saya setuju dengan <a href="#">persyaratan.</a>
            <a href="{{ url('/') }}" class="text-center">Saya sudah daftar menjadi anggota.</a></p> 
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4" style=" padding-top: 15px;" >
          <button  type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
 

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
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>  
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    $( "#datepicker" ).datepicker( "option", "showAnim", 'slideDown');
  })
</script> 
</body>
</html>
