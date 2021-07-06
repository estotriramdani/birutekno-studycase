@extends('layouts.app')

@section('title', 'Recap')

@section('content')
  <div class="container">
    <div class="row mb-3">
      <div class="col-md"><h2>Buat Rekap</h2></div>
      <div class="col-md"><a href="/recaps/add" class="btn btn-info float-right">Tambah Data Gaji Karyawan</a></div>
    </div>
    @if (!isset($_GET['month']))
      <div class="alert alert-danger">Pilih bulan terlebih dahulu</div>
    @endif

    @include('components.alert')

    <div class="row mb-3">
      <div class="col-md-6">
        <form action="">
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <select name="month" id="month" class="form-control">
                  <option value="">Pilih Bulan</option>
                  @php
                    $i = 1;
                  @endphp
                  @while ($i <= 12)
                    <option value="{{ $i }}">{{ $i }}</option>
                  @php
                    $i++;
                  @endphp
                  @endwhile
                </select>
              </div>
            </div>
            <div class="col-md"><button type="submit" class="btn btn-info">Pilih</button></div>
          </div>
        </form>    
      </div>
    </div>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>Bulan ke-</th>
          <th>ID Karyawan</th>
          <th>Nama</th>
          <th>Gaji Pokok</th>
          <th>Kehadiran (Hari)</th>
          <th>Lembur (Hari)</th>
          <th>Tunjangan</th>
          <th>Take Home Pay</th>
          <th>Cetak Slip</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @php
            $pengeluaranBulanIni = 0;
        @endphp
        @foreach ($recaps as $recap)
          @if (isset($_GET['month']))
            @if ($recap->month == $_GET['month'])    
              <tr>
                <td>{{ $recap->month }}</td>
                <td>{{ $recap->employee->id }}</td>
                <td>{{ $recap->employee->name }}</td>
                <td>{{ number_format($recap->employee->salary, 2) }}</td>
                <td>{{ $recap->presence }}</td>
                <td>{{ $recap->overtime }}</td>
                <td>
                  @if ($recap->allowance_id === 1)
                    BJPS TK
                  @else
                    BJPS TK + Kesehatan
                  @endif
                </td>
                <td>
                  @php
                      $takeHomePay = hitungTakeHomePay($recap->employee->salary, $recap->overtime, $recap->presence, $recap->allowance_id)
                  @endphp
                  {{ number_format($takeHomePay) }}
                  @php
                      $pengeluaranBulanIni = $pengeluaranBulanIni + $takeHomePay;
                  @endphp
                </td>
                <td><a href="/recaps/detail/{{ $recap->id }}" class="btn btn-info">Cetak</a></td>
                <td>
                  <a href="/recaps/edit/{{ $recap->id }}" class="btn btn-warning mb-2">Edit</a>
                  <form action="/recaps/delete/{{ $recap->id }}" method="POST" class="d-inline mt-3">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Delete</button>
                  </form>
                </td>
              </tr>
            @endif
          @endif
        @endforeach
      </tbody>
    </table>
    <div class="alert alert-success mt-3">
      Total Pengeluaran Gaji Karyawan Bulan Ini <strong>Rp{{ number_format($pengeluaranBulanIni, 2) }}</strong>
    </div>
  </div>
@endsection

@section('customScripts')
<script src="js/employee.js"></script>    
@endsection