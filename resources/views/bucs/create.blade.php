@extends('templates.main')

@section('page_title')
    Buillding Under Construction
@endsection

@section('content')
<div class="box box-default">
  <div class="box-header with-border">
    <a href="{{ route('buc.index') }}" class="btn btn-md btn-primary pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
    <h3 class="box-title">New BUC</h3>
  </div>
  <form action="{{ route('buc.store') }}" method="POST">
    @csrf
   <div class="box-body">

      <div class="row">
        <div class="col-md-6 form-group @error('nomor') has-error @enderror">
          <label for="nomor">Nomor</label>
          <input type="text" name="nomor" class="form-control" id="nomor" placeholder="diisi otomatis" readonly>
          @error('nomor')
            <div class="help-block">
              {{ $message }}
            </div>
          @enderror
        </div>
  
        <div class="col-md-4 form-group @error('start_date') has-error @enderror">
          <label for="start_date">Start Date</label>
          <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Misal: pembangunan pos security" autofocus>
          @error('start_date')
            <div class="help-block">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 form-group @error('activity_name') has-error @enderror">
          <label for="activity_name">Keterangan Pekerjaan</label>
          <input type="text" name="activity_name" class="form-control" id="activity_name" placeholder="Misal: pembangunan pos security">
          @error('activity_name')
            <div class="help-block">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 form-group @error('project_code') has-error @enderror">
          <label for="project_code">Project Code</label>
          <select name="project_code" id="project_code" class="form-control">
            <option value="">-- select project --</option>
            @if ($projects)
                @foreach ($projects as $project)
                  <option value="{{ $project['kode_project'] }}">{{ $project['kode_project'] }}</option>
                @endforeach
            @else
                <option value="">-- sedang load data --</option>
            @endif
          </select>
            @error('project_code')
              <div class="help-block">
                {{ $message }}
              </div>
            @enderror
        </div>
  
        <div class="col-md-6 form-group @error('person_incharge_id') has-error @enderror">
          <label for="person_incharge_id">PIC Name</label>
          <select name="person_incharge_id" id="person_incharge_id" class="form-control">
              <option value="">-- select PIC name --</option>
            @foreach ($pincharges as $pincharge)
              <option value="{{ $pincharge->id }}">{{ $pincharge->name }}</option>
            @endforeach
          </select>
        </div>
      </div> {{-- end row --}}

      <div class="row">
        <div class="col-md-6 form-group @error('budget') has-error @enderror">
          <label for="budget">Budget</label>
          <input type="text" name="budget" class="form-control" id="budget">
          @error('budget')
            <div class="help-block">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-6 form-group @error('duration') has-error @enderror">
          <label for="duration">Duration (days)</label>
          <input type="text" name="duration" class="form-control" id="duration">
          @error('duration')
            <div class="help-block">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div> {{-- end row --}}

      <div class="row">
        <div class="col-md-12 form-group @error('remarks') has-error @enderror">
          <label for="remarks">Remarks</label>
          <textarea name="remarks" class="form-control" id="remarks" cols="20" rows="2"></textarea>
        </div>
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