@extends('layouts.master')

@section('content')
<div class="row">
<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-body no-padding">

        <div class="box-header with-border">
            <h3 class="box-title">Add Maintenance Schedule</h3>
        </div>

        <form role="form" method="POST" action="{{ route('admin.calendar.store') }}">
          {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                  <label for="title" class="control-label">Title</label>
                  <input class="form-control" type="text" name="title" id="title" autocomplete="off">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('asset_id') ? ' has-error' : '' }}">
                  <label for="asset_id" class="control-label">Asset to Sign</label>
                  <select class="form-control" name="asset_id" id="asset_id">
                    @foreach ($assets as $asset)
                       <option value="{{ $asset->id }}">{{ $asset->property }}</option>
                    @endforeach
                  </select>
                    @if ($errors->has('asset_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('asset_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('all_day') ? ' has-error' : '' }}">
                    <label for="all_day" class="control-label">All Day</label>
                    <select class="form-control" name="all_day" id="all_day">
                      <option value="1">True</option>
                      <option value="0">False</option>
                    </select>
                      @if ($errors->has('all_day'))
                          <span class="help-block">
                              <strong>{{ $errors->first('all_day') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                      <label for="start" class="control-label">Start Date</label>
                      <input class="form-control" type="text" name="start" id="start">
                      <input hidden type="text" name="end" id="start">
                        @if ($errors->has('start'))
                            <span class="help-block">
                                <strong>{{ $errors->first('start') }}</strong>
                            </span>
                        @endif
                  </div>

                  <div class="form-group{{ $errors->has('background_color') ? ' has-error' : '' }}">
                      <label for="background_color" class="control-label">Color Label</label>
                      <input class="form-control colorpicker-element" type="text" name="background_color" id="background_color" autocomplete="off">
                        @if ($errors->has('background_color'))
                            <span class="help-block">
                                <strong>{{ $errors->first('background_color') }}</strong>
                            </span>
                        @endif
                  </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
    </div>
  </div>
</div> <!-- col-md-3 -->

<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-body no-padding">
      {!! $calendar->calendar() !!}
    </div>
  </div>
</div> <!-- col-md-9 -->

<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Maintenance Schedule List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="schedule-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Title</th>
              <th>Asset</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Task</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($events as $event)
                  <tr>
                    <td>{{$event->title}}</td>
                    <td>{{$event->asset->property}}</td>
                    <td>{{$event->start}}</td>
                    <td>{{$event->end}}</td>
                    <td style="background-color: {{ $event->background_color }}">
                     @include('calendar.maintenance_task_modal')
                    </td>
                    <td>
                      <form method="POST" action="{{ route('admin.calendar.destroy',$event->id) }}" accept-charset="UTF-8" style="display:inline">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-xs btn-danger">
                              <i class="fa fa-close fa-fw"></i>
                          </button>
                        </form>
                  </td>
                  </tr>
              @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Task</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
</div>
</div> <!-- row -->
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fullcalendar/fullcalendar.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}"/>
<link rel="stylesheet" href="{{ asset("AdminLTE/plugins/datatables/dataTables.bootstrap.css") }}">
@endsection

@section('script')
<script src="{{ asset('AdminLTE/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset("AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<script>
  $('.colorpicker-element').colorpicker();
  $('#start').daterangepicker();
  $('#schedule-table').DataTable();
</script>
  {!! $calendar->script() !!}
@endsection