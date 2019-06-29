@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Data Anggota 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/master-data/data-anggota') }}"></i> Data Anggota</a></li>
      <li class="active">Tambah Anggota</li>
    </ol>
</section>
  
<!-- Main content -->
<section class="content"> 
  <!-- Horizontal Form -->
  <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Anggota</h3>
              </div>
              {!! Form::open(['url' => route('data-anggota.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}
              @include('data_anggota._form')
              {!! Form::close() !!}
  </div>     
</section>
<!-- /.content -->
@endsection
@section('scripts')
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

@endsection