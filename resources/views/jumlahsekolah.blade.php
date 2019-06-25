@extends('layouts.app')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Data Sekolah 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li> 
      <li class="active">Data Sekolah</li>
    </ol>
  </section>
  
<!-- Main content -->
<section class="content"> 
<!-- /.row -->
<div class="row"> 
        <div class="col-xs-12"> 
          <div class="box"> 
            <!-- /.box-header -->
            <div class="box-body">  
                {!! $html->table(['class'=>'table table-bordered table-hover']) !!}
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