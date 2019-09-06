<!-- /.box -->   
<div class="box-body">
        <div class="form-group">
            <label for="namakupon" class="col-sm-2 control-label">Nama Promo</label> 
            <div class="col-sm-8">
                {!! Form::text('nama_kupon', null, ['class'=>'form-control','placeholder'=>'Nama Promo','id'=>'namasekolah','autocomplete'=>'off']) !!}
                {!! $errors->first('nama_kupon', '<p class="help-block">:message</p>') !!} 
            </div>
            <div class="col-sm-2">  
                <button type="submit" class="btn btn-block btn-info pull-flat">
                <i class="fa fa-floppy-o"></i>  Simpan</button>
            </div>
        </div> 
    </div>
<!-- /.box-body -->  