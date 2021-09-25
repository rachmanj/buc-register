<form action="{{ route('person_incharge.activate') }}" method="POST">
  <a href="{{ route('person_incharge.edit', $model->id) }}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
  @csrf @method('PUT')
  <input type="hidden" name="id" value="{{ $model->id }}">
  <button onclick="confirm('Yakin diaktivasi?')" class="btn btn-xs btn-info" ><i class="glyphicon glyphicon-ok"></i></button>
</form>