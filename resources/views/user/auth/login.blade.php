@extends('user.layout.guest_layout')

@section('content')
    <main class="home-content">
        <div class="container-fluid pt-3">
            <div class="mb-5">
                <div class="logo">
                    <img src="{{ asset('asset/frontend/images/logo.jpg') }}" alt="logo" />
                </div>
            </div>
            <h1 class="welcome-heading mb-5">
                Welcome <br />
                Back!
            </h1>
            <div class="password-change-from login-from">
                <form id="form1" action="{{ route('post_user_login') }}" method="post">
                    @csrf

                    <div class="mb-2">
                        <div class="pw-area position-relative">
                            <input name="username" class="form-control" type="text"
                                placeholder="Please input username" />
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="pw-area position-relative">
                            <input id="password" name="password" class="form-control" type="password"
                                placeholder="Please Enter password" />
                            <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                        </div>
                    </div>

                    {{-- <div class="mt-4">

                            <input type="submit" class="submit-btn" value="Login" />

                    </div> --}}
                </form>

                {{-- <div class="mt-4">
                    <a href="{{ route('user_register') }}">
                        <input type="submit" class="submit-btn have-account" value="Register Now" />
                    </a>
                </div> --}}
            </div>
            <div>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>

                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>

                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>
                <p style="font-size: 20px;color:red">
                    Make the balance payment to avoid discontinuation of services .
                </p>

            </div>
        </div>
    </main>
@endsection


@section('script_content')
    <script>
        $(document).ready(function() {

            $('#togglePassword').on('click', function() {
                const passwordInput = $('#password');
                const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
                passwordInput.attr('type', type);

                // Toggle icon class
                $(this).toggleClass('bi-eye bi-eye-slash');
            });


            //////// form validdation ////////////////////////
            $('#form1').validate({
                rules: {
                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                    },
                },
                messages: {
                    username: {
                        required: "Please enter a username",
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.after(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

        });
    </script>
@endsection
