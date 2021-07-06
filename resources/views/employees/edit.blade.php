@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')
  <div class="container">
    <h2 class="mb-4">Edit Data Karyawan</h2>
    <div class="row">
      <div class="col-md-6">
        @include('components.alert')
        <form action="/employees/edit/{{ $detail->id }}" method="POST">
          @method('patch')
          @include('employees.partials.form-control', ['submit' => 'Ubah'])
        </form>
      </div>
    </div>
  </div>
@endsection