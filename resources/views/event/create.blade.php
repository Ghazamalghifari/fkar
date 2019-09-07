@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Event 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/master-data/event') }}"></i> Event</a></li>
      <li class="active">Tambah Event</li>
    </ol>
</section>
  
<!-- Main content -->
<section class="content"> 
  <!-- Horizontal Form -->
  <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Event</h3>
              </div>
              {!! Form::open(['url' => route('event.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}
              
              <!-- /.box -->   
    <div class="box-body">
        <div class="form-group">
            <label for="namaevent" class="col-sm-2 control-label">ID EVENT</label> 
            <div class="col-sm-6">
                {!! Form::number('id_event', null, ['class'=>'form-control','placeholder'=>'ID EVENT (menggunakan angka)','id'=>'idevent','autocomplete'=>'off']) !!}
                {!! $errors->first('id_event', '<p class="help-block">:message</p>') !!} 
            </div>
        </div>
        <div class="form-group">
            <label for="namaevent" class="col-sm-2 control-label">Nama Event</label> 
            <div class="col-sm-6">
                {!! Form::text('nama_event', null, ['class'=>'form-control','placeholder'=>'Nama Event','id'=>'namaevent','autocomplete'=>'off']) !!}
                {!! $errors->first('nama_event', '<p class="help-block">:message</p>') !!} 
            </div>
        </div>
        <div class="form-group">
            <label for="tanggalevent" class="col-sm-2 control-label">Tanggal Event</label> 
            <div class="col-sm-6">
                {!! Form::text('tanggal_event', null, ['class'=>'form-control date','placeholder'=>'Tanggal Event','id'=>'datepicker','autocomplete'=>'off']) !!}
                {!! $errors->first('tanggal_event', '<p class="help-block">:message</p>') !!} 
            </div> 
            <div class="col-sm-2">  
                <button type="submit" class="btn btn-block btn-info pull-flat">
                <i class="fa fa-floppy-o"></i>  Simpan</button>
            </div>
        </div> 
    </div>
<!-- /.box-body -->  
              {!! Form::close() !!}
  </div>     
</section>
<!-- /.content -->
@endsection 