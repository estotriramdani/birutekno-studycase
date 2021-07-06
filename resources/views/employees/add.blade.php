@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')
  <div class="container">
    <h2 class="mb-4">Tambah Data Karyawan</h2>
    <div class="row">
      <div class="col-md-6">
        @include('components.alert')
        <form action="/employees/add" method="POST">
          @method('POST')
          @include('employees.partials.form-control', ['submit' => 'Tambah'])
        </form>
      </div>
    </div>
  </div>
@endsection