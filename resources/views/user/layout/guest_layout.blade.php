<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ env('APP_NAME') }} | {{ $data['page_title'] ?? '' }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/bootstrap.min.css') }}" />
    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/animate.min.css') }}" />
    <!-- Gallery CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/baguetteBox.min.css') }}" />
    <!-- Slider CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/slick-theme.css') }}" />
    <!-- icon -->
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <!-- toastify -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/toastify.min.css') }}" />
    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/style.css') }}" />
</head>

<body>

    <main class="home-content">
        {{-- +++++++++++++++++ | Main Content | +++++++++++++++++ --}}
        @yield('content')
    </main>

    {{-- ################# | Jquery | ################# --}}
    <!-- jquery Min js -->
    <script src="{{ asset('asset/frontend/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('asset/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Slider JS -->
    <script src="{{ asset('asset/frontend/js/slick.js') }}" type="text/javascript"></script>
    <!-- matchHeight js -->
    <script src="{{ asset('asset/frontend/js/jquery.matchHeight-min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('asset/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- toastify -->
    <script type="text/javascript" src="{{ asset('asset/frontend/js/toastify.min.js') }}"></script>
    <!-- Custome js -->
    <script src="{{ asset('asset/frontend/js/custome.js') }}"></script>

    <script>
        $(document).ready(function () {
        let error = "{{ Session::has('error') ? Session::get('error') : '' }}";
        let success = "{{ Session::has('success') ? Session::get('success') : '' }}";
        let warning = "{{ Session::has('warning') ? Session::get('warning') : '' }}";

        function showToast(message, backgroundColor = "#007bff") {
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background: backgroundColor,
                    color: "#fff",
                }
            }).showToast();
        }

        if (error) {
            showToast(error, "#dc3545"); // red
        }

        if (success) {
            showToast(success, "#28a745"); // green
        }

        if (warning) {
            showToast(warning, "#ffc107"); // yellow
        }
    });
    </script>

    {{-- custom own page script --}}
    @yield('script_content')
</body>

</html>
