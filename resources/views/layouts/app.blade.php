<!doctype html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/jquery.ui.theme.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js')}}"></script>
  <link rel="stylesheet" href="{{ asset('backend/fontawesome/css/all.min.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
   @include('includes.header')
   @yield('content')
   <footer class="row">
       @include('includes.footer')
   </footer>
</body>
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>

</html>
