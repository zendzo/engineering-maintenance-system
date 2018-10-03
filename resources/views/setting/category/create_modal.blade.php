<div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">{{ $page_title or config('app.name') }} - Add New Category <i class="fa fa-bars"></i></h4>
       </div>
       <div class="modal-body">
          <form class="form-horizontal"  action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
    
                  <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                    <label for="category" class="col-sm-2 control-label">Category </label>
    
                    <div class="col-sm-10">
                      <input id="name" name="category" type="text" class="form-control" placeholder="category" value="{{ old('category') }}" required>
    
                      @if ($errors->has('category'))
                          <span class="help-block">
                              <strong>{{ $errors->first('category') }}</strong>
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