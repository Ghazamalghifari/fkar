<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/fkar.png') }}">

    <!-- Styles -->
  <!-- Styles -->
   
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('dist/css/AdminLTE.min.css') }}" rel="stylesheet">
<link href="{{ asset('dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet">
<link href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">

<link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}    ">
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}    "> 

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div id="app">
    <div class="wrapper">

<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>R</b>BL</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Rohis BaLam</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav"> 
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('images/icon.png') }}" class="user-image" alt="User Image">
            <span class="hidden-xs"> {{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu">  <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('images/icon.png') }}" class="img-circle" alt="User Image">

                <p>
                {{ Auth::user()->name }}
                @role('member')  
                  <small>ID ROHIS : {{ Auth::user()->id_rohis }}</small>
                @endrole 
                </p>
              </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ url('/profil') }}" class="btn btn-default btn-flat">Profile</a> 
              </div>
                <div class="pull-right">
                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> 

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              </div>
            </li>
          </ul>
        </li> 
      </ul>
    </div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('images/icon.png') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="tree">
        <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i>Dashboard</a> 
      </li> 

      @role('admin')  
      <li class="tree">
        <a href="{{ url('data-anggota') }}"><i class="fa fa-dashboard"></i>Anggota Rohis</a> 
      </li> 
      <li class="treeview">
            <a href="#">
              <i class="fa fa-th"></i>
              <span>Master Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('data-sekolah.index') }}"><i class="fa fa-circle-o"></i>Data Sekolah</a></li> 
              <li><a href="{{ route('data-users.index') }}"><i class="fa fa-circle-o"></i>User</a></li> 
            </ul>
      </li>
      @endrole
    </ul>

  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
        @yield('content')
</div> 
 
</div>
<!-- ./wrapper -->

    </div>

    

<style>
.dataTables_filter {
  float: right !important
}
.dataTables_paginate.paging_simple_numbers {
  float: right !important
}
</style>

    <!-- Scripts -->
     <!-- Scripts -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>  
<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script> 
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

@yield('scripts')
<script>
  $(function () { 
    $('#html').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
