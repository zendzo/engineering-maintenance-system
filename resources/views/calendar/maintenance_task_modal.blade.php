<a style="color: #fff" href="#" data-toggle="modal" data-target="#maintenanceModal-{{ $event->id }}">
    <i class="fa fa-list"></i> Show Task
  </a>
  <div class="modal fade" id="maintenanceModal-{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="maintenanceModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">{{ $event->title }} Task</h4>
          </div>
          <div class="modal-body">
              <table class="table table-striped">
                  <tbody>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Job Task Description</th>
                    <th style="width: 40px">Action</th>
                  </tr>
                  @forelse ($event->tasks as $key => $task)
                      <tr>
                        <td>{{ $key += 1 }}</td>
                        <td>{{ $task->task }}</td>
                        <td><a class="btn btn-xs btn-primary" href="#"><i class="fa fa-edit"></i></a></td>
                      </tr>
                  @empty
                      <tr>
                        <td colspan="3" class="text-center">No Task For This {{ $event->title }}</td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
          </div>
          <div class="box-footer">
              <form action="{{ route('admin.maintenance_task.store') }}" method="POST">
                @csrf
              <div style="width: 100%" class="input-group">
                <input class="form-control" name="task" placeholder="Type task..." required autocomplete="off">
                <input type="text" name="maintenance_event_id" value="{{ $event->id }}" hidden>
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </form>
            </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>