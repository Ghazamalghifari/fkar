{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!}
    <a href="{{ $edit_url }}" class="btn btn-warning"><i class="fa fa-stack-exchange"></i> Ubah</a> 
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash"></i> Hapus</button>

<div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pemberitahuan!!!</h4>
              </div>
              <div class="modal-body">
                <p>{{ $confirm_message }}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                {!! Form::submit('Hapus',['class'=>'btn btn-outline']) !!} 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</div>

<a href="{{ $id_event }}" class="btn btn-default"><i class="fa fa-user"></i> Lihat Peserta</a> 
{!! Form::close() !!}