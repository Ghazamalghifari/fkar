<!-- /.box -->   
<div class="box-body">
        <div class="form-group">
            <label for="namasekolah" class="col-sm-2 control-label">Nama</label> 
            <div class="col-sm-8">
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama ','id'=>'nama','autocomplete'=>'off']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!} 
            </div>
		</div> 
		
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label> 
            <div class="col-sm-8">
                {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Email','id'=>'email','autocomplete'=>'off']) !!}
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!} 
            </div>
		</div>  
@if (isset($data_users) && $data_users)  
<div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
	{!! Form::label('role_id', 'Otoritas', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-8">
		{!! Form::select('role_id', []+App\Role::pluck('name','id')->all(), $data_users->role->role_id, ['class'=>'form-control js-selectize-reguler', 'placeholder' => 'Pilih Otoritas']) !!}
		{!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

		{!! Form::hidden('role_lama', $data_users->role->role_id, ['class'=>'form-control','required','autocomplete'=>'off']) !!}

@else
<div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
	{!! Form::label('role_id', 'Otoritas', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-8">
		{!! Form::select('role_id', []+App\Role::pluck('name','id')->all(), null, ['class'=>'form-control js-selectize-reguler', 'placeholder' => 'Pilih Otoritas']) !!}
		{!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
@endif
 
<!-- /.box-body -->  
 
<div class="col-md-12">
                <button type="submit" class="btn btn-block btn-info pull-flat">
				<i class="fa fa-floppy-o"></i>  Simpan</button> 
</div>
	 
</div>
