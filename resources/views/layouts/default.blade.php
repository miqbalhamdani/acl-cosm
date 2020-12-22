<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
		<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

		<!-- Title -->
		<title>{{ @$og_title ? $og_title . ' | Aulia Citra Lestari' : 'Aulia Citra Lestari | Be a good partner for the customer' }}</title>
		<meta name="description" content="{{ $og_description ?? 'Menjadi perusahaan kosmetik lokal yang mengutamakan keamanan dan mutu produk dengan harga yang terjangkau.' }}">
		<meta name="author" content="Aulia Citra Lestari">
		<link rel="canonical" href="{{ $og_url ?? 'https://www.aclcosm.com/' }}">

		<!-- Twitter Card -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="{{ $og_title ?? 'Aulia Citra Lestari | Be a good partner for the customer' }}">

		<!-- OpenGraph -->
		<meta property="og:title" content="{{ $og_title ?? 'Aulia Citra Lestari | Be a good partner for the customer' }}">
		<meta property="og:description" content="{{ $og_description ?? 'Menjadi perusahaan kosmetik lokal yang mengutamakan keamanan dan mutu produk dengan harga yang terjangkau.' }}">
		<meta property="og:type" content="website">
		<meta property="og:url" content="{{ $og_url ?? 'https://www.aclcosm.com/' }}">
		<meta property="og:site_name" content="Aulia Citra Lestari">
		<meta property="og:image" content="{{ $og_image ?? URL('img/sleep-project-1280x720.jpg') }}"> <!-- here -->
    <meta property="og:locale" content="id_ID">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ URL('img/logo/logo.png') }}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{ URL('img/logo/logo.png') }}">

		<!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;700;900&amp;display=swap"/>

    @if (Route::current()->getName() == 'home')
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    @endif

    <!--build:css assets/css/styles.min.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/slick.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/jquery.modal.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/bootstrap-drawer.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fe/css/custom.css?v=1.0.1')}}">
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

      @include('partial.whatsapp')

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
    <script src="{{asset('fe/js/main.min.js?v=1.0.1')}}"></script>
    <!--endbuild-->

    <!-- START: Laravel Vue -->
    <script src="{{ mix('vue/js/manifest.js') }}"></script>
    <script src="{{ mix('vue/js/vendor.js') }}"></script>
    <script src="{{ mix('vue/js/app.js') }}"></script>
    <!-- END: Laravel Vue -->

    @stack('css-body')

    @stack('javascript')
  </body>
</html>
