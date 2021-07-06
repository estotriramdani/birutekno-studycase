@extends('layouts.app')

@section('title', 'Add Recap')

@section('content')
  <div class="container mt-3">
    <div class="row mb-3">
      <div class="col-md">
        <h2>Tambah Rekap Karyawan</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        @include('components.alert')
        <form action="/recaps/add" method="POST">
          @method('POST')
          @include('recaps.partials.form-control', ['submit' => 'Tambah'])
        </form>
      </div>
    </div>
  </div>
@endsection