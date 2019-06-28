@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Data Sekolah 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/master-data/data-sekolah') }}"></i> Data Sekolah</a></li>
      <li class="active">Tambah Sekolah</li>
    </ol>
</section>
  
<!-- Main content -->
<section class="content"> 
  <!-- Horizontal Form -->
  <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Sekolah</h3>
              </div>
              {!! Form::open(['url' => route('data-sekolah.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}
              @include('data_sekolah._form')
              {!! Form::close() !!}
  </div>     
</section>
<!-- /.content -->
@endsection