@csrf
<div class="form-group row">
  <div class="col-sm-3">
    <label for="name">Nama Karyawan</label>
  </div>
  <div class="col-sm-9">
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $detail->name }}">
    @error('name')
      <small class="text-danger">
        {{ $message }}
      </small>
    @enderror
  </div>
</div>
<div class="form-group row">
  <div class="col-sm-3">
    <label for="salary">Gaji Pokok</label>
  </div>
  <div class="col-sm-9">
    <input type="number" name="salary" id="salary" class="form-control" value="{{ old('salary') ?? $detail->salary }}">
    @error('salary')
      <small class="text-danger">
        {{ $message }}
      </small>
    @enderror
  </div>
</div>
<button class="btn btn-success">{{ $submit ?? 'Edit Post' }}</button>