<div class="modal fade" id="assetEdit-{{$asset->id}}" tabindex="-1" role="dialog" aria-labelledby="assetEditLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Edit New Asset Data</h4>
      </div>
      <div class="modal-body">
          <form role="form"  action="{{ route('admin.asset.store') }}" method="POST">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('property') ? ' has-error' : '' }}">
                <label class="control-label">Property</label>
                <input class="form-control" name="property" type="text" value="{{ $asset->property }}" required autocomplete="off">
                  @if ($errors->has('property'))
                      <span class="help-block">
                          <strong>{{ $errors->first('property') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }}">
                <label for="location_id" class="control-label">Location</label>
                <select class="form-control" name="location_id" id="location_id">
                  @foreach ($locations as $location)
                      <option {{ $asset->location_id == $location->id ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->name }}</option>
                  @endforeach
                </select>
                  @if ($errors->has('location_id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('location_id') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="form-group{{ $errors->has('supplier_id') ? ' has-error' : '' }}">
                  <label for="supplier_id" class="control-label">Supplier</label>
                  <select class="form-control" name="supplier_id" id="supplier_id">
                    @foreach ($suppliers as $supplier)
                        <option {{ $asset->supplier_id == $supplier->id ? 'selected' : '' }} value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                  </select>
                    @if ($errors->has('supplier_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('supplier_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                    <label for="category_id" class="control-label">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                      @foreach ($categories as $category)
                          <option {{ $asset->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                      @if ($errors->has('category_id'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                </div>

                <div class="form-group{{ $errors->has('merk') ? ' has-error' : '' }}">
                    <label for="merk" class="control-label">Merk </label>
                    <input class="form-control" type="text" name="merk" id="merk" value="{{ $asset->merk }}">
                      @if ($errors->has('merk'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                </div>

                <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                    <label for="model" class="control-label">Model </label>
                    <input class="form-control" type="text" name="model" id="merk" value="{{ $asset->model }}">
                      @if ($errors->has('model'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                </div>

                <div class="form-group{{ $errors->has('serial_number') ? ' has-error' : '' }}">
                    <label for="serial_number" class="control-label">Serial Number</label>
                    <input class="form-control" type="text" name="serial_number" id="serial_number" value="{{ $asset->serial_number }}">
                      @if ($errors->has('serial_number'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                </div>

                <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                    <label for="capacity" class="control-label">Capacity</label>
                    <input class="form-control" type="text" name="capacity" id="capacity" value="{{ $asset->capacity }}">
                      @if ($errors->has('capacity'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                </div>

                <div class="form-group{{ $errors->has('purcashed_at') ? ' has-error' : '' }}">
                    <label for="purcashed_at" class="control-label">Date Purcashed</label>
                    <input class="form-control" type="text" name="purcashed_at" id="purcashed_at_edit" autocomplete="off" value="{{ $asset->purcashed_at }}">
                      @if ($errors->has('purcashed_at'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                  <label for="description" class="control-label">Description</label>
                  <textarea name="description" class="form-control" rows="3" placeholder="Enter Asset Description ...">{{ $asset->description }}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div>
                    <img class="img-responsive" src="{{ $asset->getFirstMediaUrl('images') }}" alt="">
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