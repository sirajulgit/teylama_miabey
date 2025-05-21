<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | OTP</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">

    <style>
        .loader {
            border: 10px solid #f3f3f3;
            border-radius: 50%;
            border-top: 10px solid #3498db;
            width: 50px;
            height: 50px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Admin</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Verify OTP</p>

                {{-- //////////////// Verify Otp /////////////////// --}}
                <form action="" method="post" id="otpForm" autocomplete="off">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="OTP" name="otp">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" id="optSubmitBtn" class="btn btn-primary btn-block">Submit</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                {{-- <p class="mb-1" id="otp_send">
                    <a href="#">Send OTP</a>
                </p> --}}

                <div class="loader" style="display: none;"></div>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('asset/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('asset/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>



    <script>
        $(document).ready(function() {

            ////////////// toast message ///////////////
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            let error = "{{ Session::has('error') }}";
            let errorMsg = "{{ Session::get('error') }}";

            let success = "{{ Session::has('success') }}";
            let successMsg = "{{ Session::get('success') }}";

            let warning = "{{ Session::has('warning') }}";
            let warningMsg = "{{ Session::get('warning') }}";

            if (error == 1) {
                // Toast.fire({
                //     icon: 'error',
                //     title: errorMsg
                // })

                Swal.fire({
                    icon: "error",
                    title: errorMsg,
                });
            }

            if (success == 1) {
                // Toast.fire({
                //     icon: 'success',
                //     title: successMsg
                // })

                Swal.fire({
                    icon: "success",
                    title: successMsg,
                });
            }

            if (warning == 1) {
                // Toast.fire({
                //     icon: 'warning',
                //     title: warningMsg
                // })

                Swal.fire({
                    icon: "warning",
                    title: warningMsg,
                });
            }


            //////// form validdation ////////////////////////
            $('#otpForm').validate({
                rules: {
                    otp: {
                        required: true,
                    },
                },
                messages: {},
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    // form.submit();

                    $(".loader").show();

                    var formData = new FormData();

                    var other_data = $('#otpForm').serializeArray();
                    $.each(other_data, function(key, input) {
                        formData.append(input.name, input.value);
                    });


                    let url = "{{ route('otp_verify') }}";

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: url,
                        method: "POST",
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function(response) {
                            // console.log(response);

                            $(".loader").hide();

                            if (response.status) {
                                window.location.replace("/admin/confirm-password");
                            } else {
                                Swal.fire({
                                    title: "OTP",
                                    text: response.msg,
                                    icon: "error"
                                });
                            }


                        },
                        error: function(error) {
                            console.log("error" + error);
                        }
                    });
                }
            });



            $("#otp_send").on("click", function() {

                $(".loader").show();
                $("#otp_send").hide();

                let url = "{{ route('otp_send') }}";

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: url,
                    method: "POST",
                    processData: false,
                    contentType: false,
                    data: {},
                    success: function(response) {
                        // console.log(response);

                        $("#optSubmitBtn").removeAttr("disabled");
                        $(".loader").hide();

                        Swal.fire({
                            title: "OTP",
                            text: response.msg,
                            icon: "success"
                        });
                    },
                    error: function(error) {
                        console.log("error" + error);
                    }
                });
            })


        })
    </script>
</body>

</html>
