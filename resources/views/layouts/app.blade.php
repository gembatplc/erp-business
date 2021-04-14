<!DOCTYPE html>
<html lang="de">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')  | {{ config('app.name')  }}</title>

    <!-- styles -->
    @include('layouts.styles')
    <!-- /styles -->

    @livewireStyles
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- main sidebar -->
        @auth
        @include('layouts.sidebar')
        @endauth
        <!-- /main sidebar -->

        <!-- top navigation -->
        @auth
        @include('layouts.navigation')
        @endauth
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('layouts.footer')
        <!-- /footer content -->

      </div>
    </div>

    <!-- scripts -->
    @include('layouts.scripts')
    <!-- scripts -->
    @yield('footer.js')
    @livewireScripts
  </body>
</html>
