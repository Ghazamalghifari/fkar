{!! Form::model($model, ['url' =>  route('event.ikutevent', $model->id_event), 'method' => 'get', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!}
 
<div class="modal modal-warning fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pemberitahuan !!!</h4>
              </div>
              <div class="modal-body">
                <p>{{ $confirm_message }}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                {!! Form::submit('Iya',['class'=>'btn btn-outline']) !!} 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</div>
<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modal-danger'><i class='fa fa-plus'></i> {{$model->id_event }} Ikuti Event</button>

{!! Form::close() !!}