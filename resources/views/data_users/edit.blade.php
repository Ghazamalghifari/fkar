@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Data User 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/master-data/data-users') }}"></i> Data User</a></li>
      <li class="active">Ubah User</li>
    </ol>
</section>
  
<!-- Main content -->
<section class="content"> 
  <!-- Horizontal Form -->
  <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Ubah User</h3>
              </div>  
			{!! Form::model($data_users, ['url' => route('data-users.update', $data_users->id), 'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
              @include('data_users._form')
              {!! Form::close() !!}  
  </div>     
</section>
<!-- /.content -->  
@endsection 