@extends('layouts.app')
@section('content')

<!-- Main content -->
<section class="content"> 
<!-- /.row -->
<div class="row"> 
        <div class="col-xs-12">
@include('layouts._flash') 
          </div>
        <div class="col-xs-12">    
          <div class="box"> 
            <!-- /.box-header -->
            <div class="box-body">  
            @role('member')  
  <!-- Main content -->
    <section class="content">  
             
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Event 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li> 
      <li class="active">Event</li>
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
                {!! $html->table(['class'=>'table']) !!}
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
    </section>
   <!-- /.content -->
@endrole

<!-- /.content --> 
@role('admin')  
  <!-- Main content -->
    <section class="content">  
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{ $jumlahanggota }}</h3> 
                  <p>Jumlah Anggota</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ url('/data-anggota') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{ $datasekolah }}</h3>

                  <p>Jumlah Sekolah</p>
                </div>
                <div class="icon">
                  <i class="ion ion-home"></i>
                </div>
                <a href="{{ url('/jumlah-sekolah') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div> 
    </section>
   <!-- /.content -->
@endrole
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

<script>
$(document).ready(function() {
  $("#btnEvt").click(function(){
    console.log($(this).attr('data-id'))
  })
})
</script>
@endsection 