<!-- /.box -->   
<div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama</label> 
            <div class="col-sm-9">
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama','autocomplete'=>'off']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 

        <div class="form-group">
            <label class="col-sm-2 control-label">Email</label> 
            <div class="col-sm-9">
                {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Email','autocomplete'=>'off']) !!}
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Tanggal Lahir</label> 
            <div class="col-sm-9">
                {!! Form::text('tanggal_lahir', null, ['class'=>'form-control pull-right','placeholder'=>'Tanggal Lahir','id'=>'datepicker','autocomplete'=>'off']) !!}
                {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Sekolah</label> 
            <div class="col-sm-9">
            {!! Form::select('id_sekolah', []+App\DataSekolah::pluck('nama_sekolah','id')->all(), null,['class'=>'form-control select2','style'=>'width: 100%;', 'placeholder' => 'Pilih Sekolah','required']) !!}      
                {!! $errors->first('id_sekolah', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Kelas</label> 
            <div class="col-sm-9">
            {!! Form::select('kelas', ['7 SMP'=>'7 SMP','8 SMP'=>'8 SMP','9 SMP'=>'9 SMP','10 SMA'=>'10 SMA','11 SMA'=>'11 SMA','12 SMA'=>'12 SMA'],null,['class'=>'form-control select2','style'=>'width: 100%;', 'placeholder' => 'Pilih Kelas','required']) !!}  
                {!! $errors->first('kelas', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Golongan Darah</label> 
            <div class="col-sm-9">
            {!! Form::select('golongan_darah', ['O'=>'O','A'=>'A','B'=>'B','AB'=>'AB'],null,['class'=>'form-control select2','style'=>'width: 100%;', 'placeholder' => 'Pilih Golongan Darah','required']) !!}  
                {!! $errors->first('golongan_darah', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Jenis Kelamin</label> 
            <div class="col-sm-9">
            {!! Form::select('jenis_kelamin', ['Laki-Laki'=>'Laki-Laki','Perempuan'=>'Perempuan'],null,['class'=>'form-control select2','style'=>'width: 100%;', 'placeholder' => 'Pilih Jenis Kelamin']) !!}  
                {!! $errors->first('jenis_kelamin', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Kategori Daftar</label> 
            <div class="col-sm-9">
            {!! Form::select('kategori_daftar', ['Anggota Baru'=>'Anggota Baru','Anggota Lama'=>'Anggota Lama'],null,['class'=>'form-control select2','style'=>'width: 100%;', 'placeholder' => 'Pilih Kategori Anggota']) !!}  
                {!! $errors->first('kategori_daftar', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Nomor Telphone</label> 
            <div class="col-sm-9">
                {!! Form::number('no_wa', null, ['class'=>'form-control','placeholder'=>'Nomor Telphone','autocomplete'=>'off']) !!}
                {!! $errors->first('no_wa', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 

        <div class="form-group">
            <label class="col-sm-2 control-label">Alamat</label> 
            <div class="col-sm-9">
                {!! Form::text('alamat', null, ['class'=>'form-control','placeholder'=>'Alamat','autocomplete'=>'off']) !!}
                {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 

    <div class="col-sm-1">
    </div>
    <div class="col-sm-10">
                <button type="submit" class="btn btn-block btn-info pull-flat">
                <i class="fa fa-floppy-o"></i>  Simpan</button> 
    </div>
    </div>
<!-- /.box-body -->  

 