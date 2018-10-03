<div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">{{ $page_title or config('app.name') }} - Add New Department <i class="fa fa-map-marker"></i></h4>
       </div>
       <div class="modal-body">
          <form class="form-horizontal"  action="{{ route('admin.department.store') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
    
                  <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                    <label for="department" class="col-sm-2 control-label">Department </label>
    
                    <div class="col-sm-10">
                      <input id="name" name="name" type="text" class="form-control" placeholder="Department Name" value="{{ old('department') }}" required>
    
                      @if ($errors->has('department'))
                          <span class="help-block">
                              <strong>{{ $errors->first('department') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
          
       </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">@lang('application.close')</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> @lang('application.save')</button>
       </div>
    </div>
    <!-- /.modal-content -->
    </div>
    </form>