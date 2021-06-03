<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Danilo Carvalho">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>

@include('_shared.header')
<div class="container-fluid">
  <div class="row">
      @include('_shared.nav')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      @yield('content')
    </main>
  </div>
</div>
</body>
</html>
