<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  @yield('customStyles')
</head>
<body class="bg-light">

  @include('layouts.navbar')
  <div class="py-3">
    @yield('content')
  </div>
  
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
  @yield('customScripts')
</body>
</html>