@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Asset Data List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="asset-table" class="table table-striped table-bordered table-hover dataTable">
          <thead>
          <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Category</th>
            <th>Location</th>
            <th>Proprety</th>
            <th>Merk</th>
            <th>Model</th>
            <th>SN No</th>
            <th>Capacity</th>
            <th>Date Purcashed</th>
            <th>Supplier</th>
            <th>Desc</th>
            <th>#</th>
          </tr>
          </thead>
          <tbody>
            @forelse ($assets as $key => $asset)
                <tr>
                  <td>{{ $key += 1 }}</td>
                  <td><img class="img-responsive" src="{{ $asset->getFirstMediaUrl('images') }}"></td>
                  <td>{{ $asset->category->name }}</td>
                  <td>{{ $asset->location->name }}</td>
                  <td>{{ $asset->property }}</td>
                  <td>{{ $asset->merk }}</td>
                  <td>{{ $asset->model }}</td>
                  <td>{{ $asset->serial_number }}</td>
                  <td>{{ $asset->capacity }}</td>
                  <td>{{ $asset->purcashed_at }}</td>
                  <td>{{ $asset->supplier->name }}</td>
                  <td>{{ str_limit($asset->description, 20) }}</td>
                  <td>
                    <a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#assetEdit-{{ $asset->id }}">
                      <i class="fa fa-edit"></i>
                    </a>
                </td>
                @include('asset.edit_modal')
                </tr>
            @empty
                
            @endforelse
          </tbody>
        </table>
        {{-- workorder modal --}}
        @include('asset.create_modal')
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
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datepicker/datepicker3.css') }}"/>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset("AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.js"></script>
<script src="{{ asset('AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<script>
   $(function () {
    $('#asset-table').DataTable({
      responsive: true,
      dom: 'Bfrtip',
        buttons: [
            {
                text: '<i class="fa fa-plus"></i> Add New Asset',
                attr: {class : 'btn btn-info'},
                action: function ( e, dt, node, config ) {
                   $('#addNewAsset').modal('show');
                }
            },
            { 
              extend:'copy', 
              attr: { id: 'allan' },
              text:      '<i class="fa fa-files-o"></i> Copy',
              titleAttr: 'Copy rows to clipboard',
              title: 'Assets Data ' + '{{ config('app.name') }}',
              messageTop: 'List Data Asset',
              exportOptions: {
                    columns: [0,2,3,4,5,6,7,8,9]
                }
              },
            {
                extend: 'pdfHtml5',
                // orientation: 'landscape',
                pageSize: 'LEGAL',
                messageTop: 'List Data Asset',
                title: 'Assets Data ' + '{{ config('app.name') }}',
                text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'Export rows to PDF format',
                exportOptions: {
                    columns: [0,2,3,4,5,6,7,8,9]
                },
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i> CSV',
                titleAttr: 'Export rows to CSV format',
                title: 'Assets Data ' + '{{ config('app.name') }}',
                messageTop: 'List Data Asset',
                exportOptions: {
                    columns: [0,2,3,4,5,6,7,8,9]
                },
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i> Excel',
                titleAttr: 'Export rows to Excel format',
                messageTop: 'List Data Asset',
                title: 'Assets Data ' + '{{ config('app.name') }}',
                exportOptions: {
                    columns: [0,2,3,4,5,6,7,8,9]
                },
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> Print',
                titleAttr: 'Print rows',
                messageTop: 'List Data Asset',
                title: 'Assets Data ' + '{{ config('app.name') }}',
                exportOptions: {
                    columns: [0,2,3,4,5,6,7,8,9]
                },
            },
        ]
    });
    $('#purcashed_at').datepicker();
    $('#purcashed_at_edit').datepicker();
  });
</script>
@endsection