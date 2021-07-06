@extends('layouts.app')

@section('title', 'Employees')

@section('content')
  <div class="container">
    @include('components.alert')
    <div class="row mb-3">
      <div class="col-md"><h2>Data Karyawan</h2></div>
      <div class="col-md"><a href="/employees/add" class="btn btn-secondary border float-right">Tambah</a></div>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Gaji Pokok</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employees as $employee)
          <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>Rp{{ number_format($employee->salary) }}</td>
            <td>
              <a href="/employees/edit/{{ $employee->id }}" class="btn btn-warning d-inline-block">Edit</a>
              <form action="/employees/delete/{{ $employee->id }}" method="POST" class="d-inline-block">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@section('customScripts')
<script src="js/employee.js"></script>    
@endsection