@extends('user.layout.guest_layout')


@section('content')
    <main class="home-content">
        <div class="container-fluid pt-3">
            <div class="logo">
                <img src="{{ asset('asset/frontend/images/logo.jpg') }}" />
            </div>

            <h1 class="welcome-heading">
                Welcome <br />
                Back!
            </h1>

            <div class="password-change-from login-from">

                <form id="form1" method="POST" action="{{ route('post_user_register') }}">
                    @csrf

                    <div class="mb-2">
                        <div class="pw-area position-relative">
                            <input name="invitation_code" class="form-control" type="text"
                                placeholder="Please enter the 8-digit invitation code" minlength="8" maxlength="8"
                                value="{{ old('invitation_code') }}" />
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="pw-area position-relative">
                            <input name="username" class="form-control" type="text" placeholder="Please enter username"
                                value="{{ old('username') }}" />

                            {{-- +++++ | error message | +++++ --}}
                            @if ($errors->has('username'))
                                <span class="form_error">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                    </div>

                    <div class="mb-2">
                        <div class="pw-area position-relative">
                            <input name="phn_no" class="form-control" type="text"
                                placeholder="Please enter phone number" minlength="10" maxlength="10"
                                value="{{ old('phn_no') }}" />
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="mb-2 label-design"> Set Password </label>
                        <div class="pw-area position-relative">
                            <input name="password" id="password" class="form-control" type="password"
                                placeholder="Please Enter 6 to 16 characters" value="{{ old('password') }}" />
                            <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                        </div>
                    </div>

                    <div class="mt-4">
                        <input type="submit" class="submit-btn" value="Register" />
                    </div>
                </form>

                <div class="text-end live-support mt-2">
                    <p><a href="#">Live Support</a></p>
                </div>

                <div class="mt-4">
                    <a href="{{ route('user_login') }}">
                        <input type="submit" class="submit-btn have-account" value="Already have an account? Login" />
                    </a>
                </div>
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
                    invitation_code: {
                        minlength: 8,
                        maxlength: 8,
                    },
                    username: {
                        required: true,
                    },
                    phn_no: {
                        digits: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                    },
                },
                messages: {
                    invitation_code: {
                        minlength: "Please enter a valid invitation code with 8 digits",
                        maxlength: "Please enter a valid invitation code with 8 digits",
                    },
                    username: {
                        required: "Please enter a username",
                    },
                    phn_no: {
                        digits: "Please enter only digits",
                        minlength: "Please enter a valid phone number with 10 digits",
                        maxlength: "Please enter a valid phone number with 10 digits",
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
