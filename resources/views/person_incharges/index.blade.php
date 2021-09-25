@extends('templates.main')

@section('page_title')
    Person Incharge
@endsection

@section('content')
<div class="box box-default">
  <div class="box-header with-border">

      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
      @endif

    <a href="{{ route('person_incharge.create') }}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-plus"></i> Person Incharge</a>
  </div>
  <div class="box-body">
    <table id="tabledata" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Title</th>
          <th>Project Code</th>
          <th>Created By</th>
          <th>Status</th>
          <th>action</th>
        </tr>
      </thead>
    </table>
  </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte2/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('adminlte2/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte2/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>
      $(function () {
        $("#tabledata").DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('person_incharge.index.data') }}',
          columns: [
            {data: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name'},
            {data: 'title'},
            {data: 'project_code'},
            {data: 'created_by'},
            {data: 'status'},
            {data: 'action'},
          ],
          fixedHeader: true,
        })
      });
    </script>
@endsection