<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ env('APP_NAME') }} | {{ $data['page_title'] ?? '' }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/bootstrap.min.css') }}" />

  <!-- Animate CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/animate.min.css') }}">
  <!-- Gallery CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/baguetteBox.min.css') }}">
  <!-- Slider CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/slick-theme.css') }}">
  <!-- Font Awesome JS -->
  <link rel="stylesheet" href="{{ asset('asset/frontend/css/font-awesome.min.css') }}">
  <!-- Style CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/style.css') }}">
</head>

<body>


    {{-- +++++++++++++++++ | Main Content | +++++++++++++++++ --}}
    @yield('content')



    {{-- ################# | Jquery | ################# --}}
    <!-- Scroll Top -->
  <div class="scrollup"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>

  <!-- jquery Min js -->
  <script src="{{ asset('asset/frontend/js/jquery-3.7.1.min.js')}}"></script>
  <!-- Bootstrap JS -->
  <script src="{{ asset('asset/frontend/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Gallery JS -->
  <script src="{{ asset('asset/frontend/js/baguetteBox.js')}}"></script>
  <!-- Slider JS -->
  <script src="{{ asset('asset/frontend/js/slick.js')}}" type="text/javascript"></script>
  <!-- matchHeight js -->
  <script src="{{ asset('asset/frontend/js/jquery.matchHeight-min.js')}}"></script>
  <!-- Custome js -->
  <script src="{{ asset('asset/frontend/js/custome.js')}}"></script>

    {{-- custom own page script --}}
    @yield('script_content')
</body>

</html>

