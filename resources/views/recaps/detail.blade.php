@extends('layouts.app')

@section('title', 'Detail')

@section('content')
  <div class="container mt-3">
    <div class="header mb-3">
      <h2>Slip Gaji atas nama {{ $detail->employee->name }}</h2>
      <h4>ID Karyawan: {{ $detail->employee->id }} | Bulan ke-{{ $detail->month }}</h4>
    </div>
    
    <div class="row">
      <div class="col-md">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <td>Gaji Pokok</td>
              <td>Rp{{ number_format($detail->employee->salary, 2) }}</td>
            </tr>
            <tr>
              <td>Uang Lembur</td>
              <td>Rp{{ number_format(hitungUangLembur($detail->employee->salary, $detail->overtime), 2) }}</td>
            </tr>
            <tr>
              <td>Uang Makan</td>
              <td>Rp{{ number_format(hitungUangMakan($detail->presence), 2) }}</td>
            </tr>
            <tr>
              <td>BPJS (Ketenagakerjaan dan/atau Kesehatan)</td>
              <td>Rp{{ number_format(hitungBpjs($detail->allowance_id, $detail->employee->salary), 2) }}</td>
            </tr>
            <tr>
              <td>PPh 21</td>
              <td>Rp{{ number_format(hitungPph($detail->employee->salary), 2) }}</td>
            </tr>
            <tr>
              <td><strong>Take Home Pay</strong></td>
              <td><strong>Rp{{ number_format(hitungTakeHomePay($detail->employee->salary, $detail->overtime, $detail->presence, $detail->allowance_id), 2) }}</strong></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row buttons">
      <a href="/recaps" class="btn btn-primary mr-3">Kembali</a>
      <button class="btn btn-success" onclick="cetakSlip()">Cetak</button>
    </div>
  </div>
@endsection

@section('customStyles')
  <style>
    @media print {
      .buttons {
        display: none;
      }
    }
  </style>
@endsection

@section('customScripts')
  <script>
    function cetakSlip(){
      window.print();
    }
  </script>
@endsection