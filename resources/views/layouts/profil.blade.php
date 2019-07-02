@extends('layouts.app')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Profil 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li> 
      <li class="active">Profil</li>
    </ol>
  </section>
  
<!-- Main content -->
<section class="content"> 
<!-- /.row --> 
<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/icon.png') }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              @role('member')  
              <p class="text-muted text-center">ID ROHIS : {{ Auth::user()->id_rohis }}</p>
                @endrole   
            </div>
            <!-- /.box-body -->
          </div>
        </div>
          <!-- /.box -->
          <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Data</a></li> 
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post --> 
 
                @role('member')  
                {!! Form::model($datauser, ['url' => route('profil.update_profil', $datauser->id), 'method' => 'get', 'files'=>'true', 'class'=>'form-horizontal']) !!}
                
                <!-- /.box -->   
<div class="box-body">
        <div class="form-group">
            <label class="col-sm-3 control-label">Nama</label> 
            <div class="col-sm-9">
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama','autocomplete'=>'off']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 

        <div class="form-group">
            <label class="col-sm-3 control-label">Email</label> 
            <div class="col-sm-9">
                {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Email','autocomplete'=>'off']) !!}
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Lahir</label> 
            <div class="col-sm-9">
                {!! Form::text('tanggal_lahir', null, ['class'=>'form-control pull-right','placeholder'=>'Tanggal Lahir','id'=>'datepicker','autocomplete'=>'off']) !!}
                {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label">Sekolah</label> 
            <div class="col-sm-9">
            {!! Form::select('id_sekolah', []+App\DataSekolah::pluck('nama_sekolah','id')->all(), null,['class'=>'form-control select2','style'=>'width: 100%;', 'placeholder' => 'Pilih Sekolah','required']) !!}      
                {!! $errors->first('id_sekolah', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label">Kelas</label> 
            <div class="col-sm-9">
            {!! Form::select('kelas', ['7 SMP'=>'7 SMP','8 SMP'=>'8 SMP','9 SMP'=>'9 SMP','10 SMA'=>'10 SMA','11 SMA'=>'11 SMA','12 SMA'=>'12 SMA'],null,['class'=>'form-control select2','style'=>'width: 100%;', 'placeholder' => 'Pilih Kelas','required']) !!}  
                {!! $errors->first('kelas', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label">Golongan Darah</label> 
            <div class="col-sm-9">
            {!! Form::select('golongan_darah', ['O'=>'O','A'=>'A','B'=>'B','AB'=>'AB'],null,['class'=>'form-control select2','style'=>'width: 100%;', 'placeholder' => 'Pilih Golongan Darah','required']) !!}  
                {!! $errors->first('golongan_darah', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label">Jenis Kelamin</label> 
            <div class="col-sm-9">
            {!! Form::select('jenis_kelamin', ['Laki-Laki'=>'Laki-Laki','Perempuan'=>'Perempuan'],null,['class'=>'form-control select2','style'=>'width: 100%;', 'placeholder' => 'Pilih Jenis Kelamin']) !!}  
                {!! $errors->first('jenis_kelamin', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label">Kategori Daftar</label> 
            <div class="col-sm-9">
            {!! Form::select('kategori_daftar', ['Anggota Baru'=>'Anggota Baru','Anggota Lama'=>'Anggota Lama'],null,['class'=>'form-control select2','style'=>'width: 100%;', 'placeholder' => 'Pilih Kategori Anggota']) !!}  
                {!! $errors->first('kategori_daftar', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label">Nomor Telphone</label> 
            <div class="col-sm-9">
                {!! Form::number('no_wa', null, ['class'=>'form-control','placeholder'=>'Nomor Telphone','autocomplete'=>'off']) !!}
                {!! $errors->first('no_wa', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 

        <div class="form-group">
            <label class="col-sm-3 control-label">Alamat</label> 
            <div class="col-sm-9">
                {!! Form::textarea('alamat', null, ['class'=>'form-control','placeholder'=>'Alamat','autocomplete'=>'off','rows'=>'2']) !!}
                {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 

    <div class="col-sm-3">
    </div>
  <div class="col-sm-9">
                <button type="submit" class="btn btn-block btn-info pull-flat">
                <i class="fa fa-floppy-o"></i>  Simpan</button> 
    </div>
    </div>
<!-- /.box-body -->  

 

                {!! Form::close() !!}  
                
                @endrole   
              </div>
            </div> 
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div> 
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