<a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#workOrderModal-{{ $workorder->id }}">
    <i class="fa fa-edit"></i>
  </a>
  <div class="modal fade" id="workOrderModal-{{ $workorder->id }}" tabindex="-1" role="dialog" aria-labelledby="workOrderModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Default Modal</h4>
          </div>
          <div class="modal-body">
            <p>{{ $workorder->id }}</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>