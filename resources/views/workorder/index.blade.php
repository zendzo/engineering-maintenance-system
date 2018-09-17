@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Hover Data Table</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="workorder-datatable" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>No</th>
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
            <th>Photo</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($workorders as $workorder)
                <tr>
                    <td>{{ $workorder->id }}</td>
                    <td>{{ $workorder->created_at }}</td>
                    <td>{{ $workorder->finish_at }}</td>
                    <td>{{ $workorder->location_id }}</td>
                    <td>{{ $workorder->priority }}</td>
                    <td>{{ $workorder->category_id }}</td>
                    <td>{{ $workorder->job }}</td>
                    <td>{{ $workorder->order_by }}</td>
                    <td>{{ $workorder->departement_id }}</td>
                    <td>{{ $workorder->status }}</td>
                    <td>{{ $workorder->follow_up }}</td>
                    <td><img src="{{ asset($workorder->photo) }}" class="img-responsive"></td>
                    <td>
                      <a class="btn btn-small btn-primary" href="{{ route('admin.workorder.edit', $workorder->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
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
<link rel="stylesheet" href="{{ asset("AdminLTE/plugins/datatables/dataTables.bootstrap.cs") }}">
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset("AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>

<script>
   $(function () {
    $('#workorder-datatable').DataTable();
  });
</script>
@endsection