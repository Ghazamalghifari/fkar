@if (session()->has('flash_notification.message')) 
<div class="alert alert-{{ session()->get('flash_notification.level') }}">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Info!</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! session()->get('flash_notification.message') !!}
            </div>
            <!-- /.box-body -->
          </div>
</div>
@endif