@csrf
<div class="form-group row">
  <div class="col-sm-3">
    <label for="employee_id">Karyawan</label>
  </div>
  <div class="col-sm-9">
    <select name="employee_id" id="employee_id" class="form-control">
      <option value="">Pilih karyawan</option>
      @foreach ($employees as $employee)
        <option value="{{ $employee->id }}" {{ ($detail->employee->id == $employee->id ? "selected":"") }}>{{ $employee->name }}</option>
      @endforeach
    </select>
    @error('employee_id')
      <small class="text-danger">
        {{ $message }}
      </small>
    @enderror
  </div>
</div>
<div class="form-group row">
  <div class="col-sm-3">
    <label for="month">Bulan ke-</label>
  </div>
  <div class="col-sm-9">
    <select name="month" id="month" class="form-control">
      <option value="">Pilih bulan</option>
      @php
          $i = 1;
      @endphp
      @while ($i <= 12)
        <option value="{{ $i }}" {{ ($detail->month == $i ? "selected":"") }}>{{ $i }}</option>
      @php
        $i++;
      @endphp
      @endwhile
    </select>
    @error('month')
      <small class="text-danger">
        {{ $message }}
      </small>
    @enderror
  </div>
</div>
<div class="form-group row">
  <div class="col-sm-3">
    <label for="presence">Jumlah Kehadiran (hari)</label>
  </div>
  <div class="col-sm-9">
    <input type="number" min="0" name="presence" id="presence" class="form-control" value="{{ old('presence') ?? $detail->presence }}">
    @error('presence')
      <small class="text-danger">
        {{ $message }}
      </small>
    @enderror
  </div>
</div>
<div class="form-group row">
  <div class="col-sm-3">
    <label for="overtime">Jumlah Lembur (hari)</label>
  </div>
  <div class="col-sm-9">
    <input type="number" min="0" name="overtime" id="overtime" class="form-control" value="{{ old('overtime') ?? $detail->overtime }}">
    @error('overtime')
      <small class="text-danger">
        {{ $message }}
      </small>
    @enderror
  </div>
</div>
<div class="form-group row">
  <div class="col-sm-3">
    <label for="allowance_id">Jenis Tunjangan</label>
  </div>
  <div class="col-sm-9">
    <select name="allowance_id" id="allowance_id" class="form-control">
      <option value="">Pilih jenis tunjangan</option>
      <option value="1" {{ ($detail->allowance_id == 1 ? "selected":"") }}>BPJS TK</option>
      <option value="2" {{ ($detail->allowance_id == 2 ? "selected":"") }}>BPJS TK + Kesehatan</option>
    </select>
    @error('allowance_id')
      <small class="text-danger">
        {{ $message }}
      </small>
    @enderror
  </div>
</div>
<button class="btn btn-success">{{ $submit ?? 'Tambah' }}</button>