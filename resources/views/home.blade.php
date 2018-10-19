@extends('layouts.user')

@section('content')
    {{-- workorder modal --}}
    @include('workorder.create_modal')

    @include('user.workorders_list')
@endsection

@section('script')
<script>
(function () {
    $('#create-modal').on('click', function (e) {
        e.preventDefault();
        $('#createWorkOrder').modal('show');
    });
})();
</script>
@endsection
