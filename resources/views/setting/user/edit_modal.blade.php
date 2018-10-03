<div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">{{ $page_title or config('app.name') }} - Add New User <i class="fa fa-users"></i></h4>
       </div>
       <div class="modal-body">
          <form class="form-horizontal"  action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
    
                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-sm-2 control-label">Username</label>
    
                    <div class="col-sm-10">
                      <input id="name" name="username" type="text" class="form-control" placeholder="username" value="{{ $user->username }}" required>
    
                      @if ($errors->has('username'))
                          <span class="help-block">
                              <strong>{{ $errors->first('username') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-sm-2 control-label">email</label>
      
                      <div class="col-sm-10">
                        <input id="email" name="email" type="text" class="form-control" placeholder="email address" value="{{ $user->email  }}" required>
      
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-sm-2 control-label">password</label>
        
                        <div class="col-sm-10">
                          <input id="password" name="password" type="password" class="form-control" placeholder="password" value="{{ old('password') }}" required>
        
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label for="password" class="col-sm-2 control-label">Pass Confirmation</label>
          
                          <div class="col-sm-10">
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="password" value="{{ old('password') }}" required>
          
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>

                      <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                          <label for="role" class="col-sm-2 control-label">User Role</label>
          
                          <div class="col-sm-10">
                            <select class="form-control" name="role" id="role">
                              @foreach ($roles as $role)
                                  <option {{ $user->role_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                              @endforeach
                            </select>
          
                            @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
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