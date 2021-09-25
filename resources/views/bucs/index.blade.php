@extends('templates.main')

@section('page_title')
    Building Under Constructions
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

      <a href="{{ route('buc.create') }}" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-plus"></i> BUC</a>

        <div class="box-body">
          <table class="table table-bordered table-striped" id="tabledata">
            <thead>
              <tr>
                <th>No.</th>
                <th>BUC ID</th>
                <th>Start Date</th>
                <th>Project</th>
                <th>PIC</th>
                <th>Duration</th>
                <th>Status</th>
                <th>action</th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
    </div>
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
          ajax: '{{ route('buc.index.data') }}',
          columns: [
            {data: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'nomor'},
            {data: 'start_date'},
            {data: 'project_code'},
            {data: 'incharge'},
            {data: 'duration'},
            {data: 'status'},
            {data: 'action'},
          ],
          fixedHeader: true,
        })
      });
    </script>
@endsection