@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Work Order Data</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="workorder-datatable" class="table table-striped table-bordered table-hover dataTable">
          <thead>
          <tr>
            <th>#</th>
            <th>Wo Date</th>
            <th>Finish Date</th>
            <th>Location</th>
            <th>Priority</th>
            <th>Category</th>
            <th>Job</th>
            <th>Ordered By</th>
            <th>Departement</th>
            <th>Status</th>
            <th>Follow Up</th>
            {{-- <th>Photo</th> --}}
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($workorders as $workorder)
                <tr>
                    <td>{{ $workorder->id }}</td>
                    <td>{{ $workorder->created_at->format('d/m/y') }}</td>
                    <td>{{ $workorder->finish_at ? $workorder->finish_at->format('d/m/y') : 'N/A' }}</td>
                    <td>{{ $workorder->location ? $workorder->location->name : 'N/A' }}</td>
                    <td>
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
                    </td>
                    <td>{{ $workorder->category ? $workorder->category->name : 'N/A' }}</td>
                    <td>{{ $workorder->job }}</td>
                    <td>{{ $workorder->orderBy->fullName }}</td>
                    <td>{{ $workorder->department ? $workorder->department->name : 'N/A' }}</td>
                    <td>
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
                    </td>
                    <td>{{ $workorder->followUpBy ? $workorder->followUpBy->fullName : 'N/A' }}</td>
                    {{-- <td><img src="{{ asset($workorder->photo) }}" class="img-responsive"></td> --}}
                    <td>
                        <a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#workOrderModal-{{ $workorder->id }}">
                          <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    @include('workorder.modal')
                </tr>
            @endforeach
          </tbody>
        </table>
        {{-- workorder modal --}}
        @include('workorder.create_modal')
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("AdminLTE/plugins/datatables/dataTables.bootstrap.css") }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.css"/>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset("AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.js"></script>

<script>
   $(function () {
    $('#workorder-datatable').DataTable({
      responsive: true,
      dom: 'Bfrtip',
        buttons: [
            {
                text: 'Create New WO',
                action: function ( e, dt, node, config ) {
                   $('#createWorkOrder').modal('show');
                }
            },
            { extend:'copy', attr: { id: 'allan' } },
            'csv', 'excel', 'pdf', 'print'
        ]
    });
  });
</script>
@endsection