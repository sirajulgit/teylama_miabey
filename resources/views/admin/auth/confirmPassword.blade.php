<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Reset Password</title>

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

    <link rel="stylesheet" href="{{ asset('asset/dist/css/style.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Admin</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg" id="form_title">Reset Password</p>

                {{-- //////////////// Forgrt Password /////////////////// --}}
                <form action="{{ route('post_confirmPassword_page') }}" method="post" id="confirmPasswordForm"
                    autocomplete="off">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="New Password" name="password"
                            id="password">
                        <div class="input-group-append">
                            <div class="input-group-text" id="show-password" style="cursor: pointer;">
                                <span class="fas fa-lock" id="show-password-icon"></span>
                            </div>
                        </div>

                        @if ($errors->has('password'))
                            <span class="form_error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Confirm New Password"
                            name="password_confirm" id="password_confirm">
                        <div class="input-group-append">
                            <div class="input-group-text" id="show-password-2" style="cursor: pointer;">
                                <span class="fas fa-lock" id="show-password-icon-2"></span>
                            </div>
                        </div>

                        @if ($errors->has('password_confirm'))
                            <span class="form_error">{{ $errors->first('password_confirm') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" id="optSubmitBtn" class="btn btn-primary btn-block">Submit</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


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

            $("body").on("click", "#show-password", (function() {
                if ($('#password').attr('type') == 'password') {
                    $(this).removeClass('visibility').addClass('visibility_off');
                    $('#password').attr('type', 'text');
                    $('#show-password-icon').removeClass();
                    $('#show-password-icon').addClass("fas fa-unlock");
                } else {
                    $(this).removeClass('visibility_off').addClass('visibility');
                    $('#password').attr('type', 'password');
                    $('#show-password-icon').removeClass();
                    $('#show-password-icon').addClass("fas fa-lock");
                }
            }));

            $("body").on("click", "#show-password-2", (function() {
                if ($('#password_confirm').attr('type') == 'password') {
                    $(this).removeClass('visibility').addClass('visibility_off');
                    $('#password_confirm').attr('type', 'text');
                    $('#show-password-icon-2').removeClass();
                    $('#show-password-icon-2').addClass("fas fa-unlock");
                } else {
                    $(this).removeClass('visibility_off').addClass('visibility');
                    $('#password_confirm').attr('type', 'password');
                    $('#show-password-icon-2').removeClass();
                    $('#show-password-icon-2').addClass("fas fa-lock");
                }
            }));

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
            $('#confirmPasswordForm').validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    password_confirm: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password",
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
                    form.submit();


                    // let url = "{{ route('otp_send') }}";

                    // $.ajax({
                    //     headers: {
                    //         'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    //     },
                    //     url: url,
                    //     method: "POST",
                    //     processData: false,
                    //     contentType: false,
                    //     data: {},
                    //     success: function(response) {
                    //         // console.log(response);

                    //         $("#optSubmitBtn").removeAttr("disabled");
                    //         $(".loader").hide();

                    //         Swal.fire({
                    //             title: "OTP",
                    //             text: response.msg,
                    //             icon: "success"
                    //         });
                    //     },
                    //     error: function(error) {
                    //         console.log("error" + error);
                    //     }
                    // });
                }
            });



        })
    </script>
</body>

</html>
