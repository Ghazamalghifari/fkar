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
      <li class="active">Ubah Anggota</li>
    </ol>
</section>
  
<!-- Main content -->
<section class="content"> 
  <!-- Horizontal Form -->
  <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Ubah Anggota</h3>
              </div>
              {!! Form::model($dataanggota, ['url' => route('data-anggota.update', $dataanggota->id), 'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
              @include('data_anggota._form')
              {!! Form::close() !!}  
  </div>  
</section>
<!-- /.content -->
@endsection