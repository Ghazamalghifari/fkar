@if (session()->has('flash_notification.message'))   
<div class="box box-{{ session()->get('flash_notification.level') }} box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Pemberitahuan!</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">{!! session()->get('flash_notification.message') !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
@endif