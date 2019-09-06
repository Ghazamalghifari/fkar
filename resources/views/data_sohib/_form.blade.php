<!-- /.box -->   
<div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Pemilik</label> 
            <div class="col-sm-9">
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama Pemilik','autocomplete'=>'off']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 

        <div class="form-group">
            <label class="col-sm-2 control-label">Email Perusahaan</label> 
            <div class="col-sm-9">
                {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Email Perusahaan','autocomplete'=>'off']) !!}
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 
              
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Nomor Telphone Perusahaan</label> 
            <div class="col-sm-9">
                {!! Form::number('no_wa', null, ['class'=>'form-control','placeholder'=>'Nomor Telphone Perusahaan','autocomplete'=>'off']) !!}
                {!! $errors->first('no_wa', '<p class="help-block">:message</p>') !!} 
            </div>
        </div> 

        <div class="form-group">
            <label class="col-sm-2 control-label">Alamat Perusahaan</label> 
            <div class="col-sm-9">
                {!! Form::text('alamat', null, ['class'=>'form-control','placeholder'=>'Alamat Perusahaan','autocomplete'=>'off']) !!}
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

 