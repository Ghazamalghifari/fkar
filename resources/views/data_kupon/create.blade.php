@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Daftar Promo 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/kupon-sohib') }}"></i> Daftar Promo</a></li>
      <li class="active">Tambah Promo</li>
    </ol>
</section>
  
<!-- Main content -->
<section class="content"> 
  <!-- Horizontal Form -->
  <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Promo</h3>
              </div>
              {!! Form::open(['url' => route('kupon-sohib.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}
              @include('data_kupon._form')
              {!! Form::close() !!}
  </div>     
</section>
<!-- /.content -->
@endsection