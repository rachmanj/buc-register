@extends('templates.main')

@section('page_title')
    Person Incharge
@endsection

@section('content')
<div class="box box-default">
  <div class="box-header with-border">
    <a href="{{ route('person_incharge.index') }}" class="btn btn-md btn-primary pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
    <h3 class="box-title">New Person Incharge</h3>
  </div>
  <form action="{{ route('person_incharge.store') }}" method="POST">
    @csrf
   <div class="box-body">
      <div class="form-group @error('name') has-error @enderror">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nama penanggung jawab kegiatan pembangunan">
        @error('name')
          <div class="help-block">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group @error('name') has-error @enderror">
        <label for="title">Jabatan</label>
        <input type="text" name="title" class="form-control" id="title">
        @error('title')
          <div class="help-block">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group @error('project_code') has-error @enderror">
        <label for="project_code">Project Code</label>
        <select name="project_code" id="project_code" class="form-control select2">
          <option value="">-- select project --</option>
          @if ($projects)
              @foreach ($projects as $project)
                <option value="{{ $project['kode_project'] }}">{{ $project['kode_project'] }}</option>
              @endforeach
          @else
              <option value="">-- sedang load data --</option>
          @endif
        </select>
      </div>

      <div class="form-group @error('project_code') has-error @enderror">
        <label for="remarks">Remarks</label>
        <textarea name="remarks" class="form-control" id="remarks" cols="20" rows="2"></textarea>
      </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn=md btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
    </div>
  </form>

</div><!-- /.box -->
@endsection

@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte2/plugins/select2/select2.min.css') }}">
@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('adminlte2/plugins/select2/select2.full.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
@endsection