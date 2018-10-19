@forelse ($workorders as $workorder)
<div class="row">
    <div class="box box-primary">
        <div class="box-header with-border">
                <h3 class="box-title">WO-{{ $workorder->id }}</h3>
            </div>
            <div class="box-body">
                <div class="col-lg-4">
                    <img class="img-responsive" src="{{ $workorder->getFirstMediaUrl('images') }}" alt="">
                </div>
                <div class="col-lg-4">
                    <dl>
                        <dt>Description :</dt>
                        <dd>{{ $workorder->job }}</dd>
                        <dt>Lokasi :</dt>
                        <dd>{{ $workorder->location ? $workorder->location->name : 'N/A' }}</dd>
                        <dt>WO Date :</dt>
                        <dd>{{ $workorder->created_at->format('d-m-Y') }}</dd>
                        <dt>Ordered By :</dt>
                        @if ($workorder->orderBy)
                        <dd>{{ $workorder->orderBy->username}} - {{ $workorder->orderBy->email }} </dd>
                        @endif
                        <dt>Follow Up</dt>
                        @if ($workorder->followUpBy)
                            <dd>{{ $workorder->followUpBy->username }} - {{ $workorder->followUpBy->email }}</dd>
                        @endif
                        <dt>Status : 
                        @switch($workorder->status)
                          @case(0)
                              <p class="text-red"><i class="fa fa-star"></i> New</p>
                              @break
                          @case(1)
                              <p class="text-aqua"><i class="fa fa-spinner"></i> On Progress</p>
                              @break
                          @case(2)
                              <p class="text-yellow"><i class="fa fa-clock-o"></i> Pending</p>
                              @break
                          @default
                              <p class="text-green"><i class="fa fa-check-square-o"></i> Done</p>
                      @endswitch
                    </dt>
                    <dt>Priority :</dt>
                    <dd>
                        @switch($workorder->priority)
                            @case(1)
                              <a href="#" class="disabled btn btn-xs btn-danger" style="width:100%;">High</a>
                                @break
                            @case(2)
                              <a href="#" class="disabled btn btn-xs btn-primary" style="width:100%;">Medium</a>
                                @break
                            @default
                              <a href="#" class="disabled btn btn-xs btn-warning" style="width:100%;">Low</a>
                        @endswitch
                    </dd>
                    </dl>
                </div>
                <div class="col-lg-4">
                    @if (Auth::user()->role_id === 4)
                    <form action="{{ route('workorder.status.update',$workorder->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="control-label">Status</label>
                                <select class="form-control" name="status" id="status"  {{ $workorder->status === 3 ? 'disabled' : '' }}>
                                    @foreach ($workordersStatus as $key => $value)
                                    <option value="{{$key}}" {{ $workorder->status == $key ? "selected" : ''  }}>{{ title_case($value) }}</option>
                                    @endforeach
                                </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            <button type="submit" class="btn btn-sm btn-primary" {{ $workorder->status === 3 ? 'disabled' : '' }}><i class="fa fa-check"></i> Update</button>
                        </form>
                    @endif
                    @if (Auth::user()->role_id !== 4)
                        <a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#workOrderModal-{{ $workorder->id }}">
                            Edit Work Order <i class="fa fa-edit"></i>
                        </a>
                        @include('user.edit_modal')
                    @endif
                </div>
            </div>
            <!-- /.box-body -->
        </div>
</div>
@empty
<div class="row">
        <div class="box box-danger">
            <div class="box-header with-border">
                    <h3 class="box-title">No Work Order</h3>
                </div>
                <div class="box-body">
                    <p>No Have No Issue.</p>
                </div>
                <!-- /.box-body -->
            </div>
    </div>
@endforelse