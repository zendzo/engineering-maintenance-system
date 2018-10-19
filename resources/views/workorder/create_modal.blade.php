<div class="modal fade" id="createWorkOrder" tabindex="-1" role="dialog" aria-labelledby="createWorkOrderLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Create New Work Order</h4>
      </div>
      <div class="modal-body">
          <form role="form"  action="{{ route('workorder.store') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                <label class="control-label">Priority</label>
                <div class="radio">
                    <label class="control-label"><input type="radio" id="priority" name="priority" value="1"> Low</label>
                </div>
                <div class="radio">
                    <label class="control-label"><input type="radio" id="priority" name="priority" value="1"> Medium</label>
                </div>
                <div class="radio">
                    <label class="control-label"><input type="radio" id="priority" name="priority" value="1"> High</label>
                </div>
                  @if ($errors->has('priority'))
                      <span class="help-block">
                          <strong>{{ $errors->first('priority') }}</strong>
                      </span>
                  @endif
              </div>

              @if (Auth::user()->role_id === 1)
              <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    <label for="status" class="control-label">Status</label>
                    <select class="form-control" name="status" id="status">
                        @foreach ($workordersStatus as $key => $value)
                        <option value="{{$key}}">{{ title_case($value) }}</option>
                        @endforeach
                    </select>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </div>
              @endif

              <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                <label for="location" class="control-label">Location</label>
                <select class="form-control" name="location" id="location">
                  @foreach ($locations as $location)
                      <option value="{{ $location->id }}">{{ $location->name }}</option>
                  @endforeach
                </select>
                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('location') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                  <label for="department" class="control-label">Department</label>
                  <select class="form-control" name="department" id="department">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                  </select>
                    @if ($errors->has('department'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                    <label for="category" class="control-label">Category</label>
                    <select class="form-control" name="category" id="category">
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                      @if ($errors->has('category'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                </div>

                @if (Auth::user()->role_id === 1)
                <div class="form-group{{ $errors->has('follow_up') ? ' has-error' : '' }}">
                    <label for="follow_up" class="control-label">Follow Up By</label>
                    <select class="form-control" name="follow_up" id="follow_up">
                        @foreach ($engineers as $engineer)
                            <option value="{{ $engineer->id }}">{{ $engineer->username }}</option>
                        @endforeach
                    </select>
                        @if ($errors->has('engineer'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                </div>
                @endif

                <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                  <label for="job" class="control-label">Job</label>
                  <textarea name="job" class="form-control" rows="3" placeholder="Enter Job Description ..."></textarea>
                    @if ($errors->has('job'))
                        <span class="help-block">
                            <strong>{{ $errors->first('job') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                    <label for="photo" class="control-label">Photo</label>
                    <input class="form-control" type="file" name="photo" id="photo">
                      @if ($errors->has('photo'))
                          <span class="help-block">
                              <strong>{{ $errors->first('photo') }}</strong>
                          </span>
                      @endif
                  </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>