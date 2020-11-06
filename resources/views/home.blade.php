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
@role('member')   
@if($cek_event == 0 ) 
          <div class="box"> 
            <!-- /.box-header -->
            <div class="box-body">  
            <p>Segera Gabung Pelatihan Gratis Khusus Untuk Anggota Rohis Baru Klik Di <a href="https://chat.whatsapp.com/KZtfbVvYrrm2H9WkgqMtkc" target="_blank">SINI</a></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box --> 

<center><h3>Tidak Ada Event Hari Ini.</h3></center>
@else
  <!-- Main content --> 
  
@if($history_event > 0 )    
                   <center> <h3>Anda Sudah Mengikuti Event Hari ini.</h3></center>   
@else  
            <!-- /.row -->
            <div class="row">  
              <div class="col-xs-12"> 
                <div class="box"> 
                <!-- /.box-header -->
                  <div class="box-body">   
                    <div class="form-group">
                      <label class="col-sm-2">
                        <h4 class="box-title"><b>Masukan KODE EVENT : </b></h4>  </label> 
                      <div class="col-sm-8">
                      {!! Form::open(['url' => route('event.ikutevent'),'method' => 'post', 'class'=>'form-horizontal']) !!}
                        {!! Form::text('id_event', null, ['class'=>'form-control','placeholder'=>'Masuk KODE Event','autocomplete'=>'off']) !!}
                        {!! $errors->first('id_event', '<p class="help-block">:message</p>') !!} 
                      </div> <br>
                      <div class="col-sm-2">
                            <button type="submit" class="btn btn-block btn-info btn-flat"> Cek Event</button>      
                      </div> 
                      {!! Form::close() !!}
                    </div>
                  </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>          
@endif   
  <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><b>Daftar Peserta Event.</b></h3> 
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> 
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="">
        {!! $html->table(['class'=>'table table-bordered table-hover']) !!}
        </div>
        <!-- /.box-body --> 
      </div>
@endif   
@endrole

</div>
            @role('admin')   
              <div class="col-xs-12">    
                <div class="box"> 
                  <!-- /.box-header -->
                  <div class="box-body">   
                  <!-- /.content --> 
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
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>
            @endrole
    </section>
    <!-- /.content -->
  </div> 
</section>
<!-- /.content -->

@endsection
@section('scripts')
{!! $html->scripts() !!}

@endsection