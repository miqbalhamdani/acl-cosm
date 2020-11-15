<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <title>Product Detail</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;700;900&amp;display=swap"/>
    <link rel="shortcut icon" type="image/png" href="./assets/images/fav.png"/>

    <!--build:css assets/css/styles.min.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/slick.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/jquery.modal.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/bootstrap-drawer.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/style.css')}}">
    <!--endbuild-->

    <!-- BEGIN: Laravel Vue-->
    <link rel="stylesheet" type="text/css" href="{{asset('vue/css/app.css')}}">
    <!-- END: Laravel Vue-->

    @stack('css')
  </head>
  <body>
    @include('partial.navbar')

    <div id="app">
      @if (Route::current()->getName() != 'home')
        @include('partial.title')
      @endif

      @yield('content')

      @include('partial.footer')

      @include('partial.navbar-mobile')
    </div>

    <!--build:js assets/js/main.min.js-->
    <script src="{{asset('fe/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('fe/js/parallax.min.js')}}"></script>
    <script src="{{asset('fe/js/slick.min.js')}}"></script>
    <script src="{{asset('fe/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('fe/js/jquery.modal.min.js')}}"></script>
    <script src="{{asset('fe/js/bootstrap-drawer.min.js')}}"></script>
    <script src="{{asset('fe/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('fe/js/main.min.js')}}"></script>
    <!--endbuild-->

    <!-- START: Laravel Vue -->
    <script src="{{ mix('vue/js/manifest.js') }}"></script>
    <script src="{{ mix('vue/js/vendor.js') }}"></script>
    <script src="{{ mix('vue/js/app.js') }}"></script>
    <!-- END: Laravel Vue -->

    @stack('css-body')
  </body>
</html>
