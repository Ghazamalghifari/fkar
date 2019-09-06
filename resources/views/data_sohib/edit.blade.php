@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Data Anggota Sohib 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/data-sohib') }}"></i> Data Anggota Sohib</a></li>
      <li class="active">Ubah Anggota Sohib</li>
    </ol>
</section>
  
<!-- Main content -->
<section class="content"> 
  <!-- Horizontal Form -->
  <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Ubah Anggota Sohib</h3>
              </div>
              {!! Form::model($datasohib, ['url' => route('data-sohib.update', $datasohib->id), 'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
              @include('data_sohib._form')
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