@extends('layouts.app')

@section('title', 'Edit Recap')

@section('content')
  <div class="container mt-3">
    <div class="row mb-3">
      <div class="col-md">
        <h2>Ubah Rekap Karyawan</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        @include('components.alert')
        <form action="/recaps/edit/{{ $detail->id }}" method="POST">
          @method('patch')
          @include('recaps.partials.form-control', ['submit' => 'Tambah'])
        </form>
      </div>
    </div>
  </div>
@endsection