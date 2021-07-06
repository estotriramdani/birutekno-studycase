@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
      <div class="jumbotron bg-light">
        <h1 class="display-4">Selamat Datang</h1>
        <p class="lead">Silakan pilih menu di bawah.</p>
        <a href="/employees" class="btn btn-light border">Daftar Karyawan</a>
        <a href="/recaps" class="btn btn-light border">Buat Rekap Bulanan</a>
        <hr class="my-4">
      </div>
    </div>
@endsection