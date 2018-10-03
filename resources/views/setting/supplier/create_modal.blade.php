<div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">{{ $page_title or config('app.name') }} - Add New Supplier <i class="fa fa-map-truck"></i></h4>
       </div>
       <div class="modal-body">
          <form class="form-horizontal"  action="{{ route('admin.supplier.store') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
    
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Name </label>
    
                    <div class="col-sm-10">
                      <input id="name" name="name" type="text" class="form-control" placeholder="Supplier Name..." value="{{ old('name') }}" required>
    
                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                      <label for="address" class="col-sm-2 control-label">Address </label>
      
                      <div class="col-sm-10">
                        <input id="address" name="address" type="text" class="form-control" placeholder="Address" value="{{ old('address') }}" required>
      
                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-sm-2 control-label">Phone </label>
        
                        <div class="col-sm-10">
                          <input id="phone" name="phone" type="text" class="form-control" placeholder="Phone" value="{{ old('phone') }}" required>
        
                          @if ($errors->has('phone'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('phone') }}</strong>
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