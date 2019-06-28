@extends('layouts.app')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Data User 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li> 
      <li class="active">Data User</li>
    </ol>
  </section>
   
<!-- Main content -->
<section class="content"> 
<!-- /.row -->
<div class="row"> 
        <div class="col-xs-12">
	<a class="btn btn-info" href="{{ route('data-users.create') }}"><i class="fa fa-plus"></i> Tambah</a> 
	<a class="btn btn-info" href="{{ route('data-users.index') }}">Semua</a> 
				<div class="btn-group">
                  <button type="button" class="btn btn-info">Otoritas User</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
					@foreach($role as $roles)
						<li><a href="{{ route('data-users.filter_otoritas',$roles->id) }}">{{ $roles->display_name }}</a></li>
					@endforeach
                  </ul>
				</div>
				
          <div class="box"> 
            <!-- /.box-header -->
            <div class="box-body">  
 	<div class="table-responsive">
                {!! $html->table(['class'=>'table table-bordered table-hover']) !!}
</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div> 
</section>
<!-- /.content --> 
@endsection

@section('scripts')
{!! $html->scripts() !!} 
@endsection
