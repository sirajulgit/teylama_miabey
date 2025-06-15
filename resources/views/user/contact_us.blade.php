@extends('user.layout.guest_layout')


@section('content')
    {{-- ############# | CMS BANNER | ############# --}}
    <div class="banner-area position-relative">
        <div class="banner-slide">
            @foreach ($data['banner_data'] as $item)
                <div>
                    <img src="{{ asset($item['image']) }}">
                </div>
            @endforeach
        </div>

    </div>


    <div class="space-section mt-5 pt-4 pb-4 mb-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="details-contact">
                        <h3 class="heading-contact mb-4">Contact Us</h3>

                        <div class="foot-description d-flex align-items-center mb-3">
                            <span class="round-icon"> <i class="bi bi-geo-alt"></i> </span>
                            <div>
                                <b>Our Location</b>
                                {!! $data['contact_data']['address'] !!}
                            </div>
                        </div>

                        <div class="foot-description d-flex align-items-center mb-3">
                            <span class="round-icon"> <i class="bi bi-telephone"></i> </span>
                            <div>
                                <p> {{ $data['contact_data']['phone'] }} </p>
                            </div>
                        </div>

                        <div class="foot-description d-flex align-items-center mb-3">
                            <span class="round-icon"> <i class="bi bi-envelope"></i> </span>
                            <div>
                                <p> {{ $data['contact_data']['email'] }} </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="contact-form">
                        <div class="mb-4">
                            <h3 class="heading"> Get A Quote</h3>
                        </div>
                        <form id="contact_form" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <input class="form-control mb-3" type="text" placeholder="Name" name="name">

                                        @if ($errors->has('name'))
                                            <span class="form_error">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <input class="form-control mb-3" type="text" placeholder="Email" name="email">

                                        @if ($errors->has('email'))
                                            <span class="form_error">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control mb-3" type="text" placeholder="Phone Number"
                                            name="phone">

                                        @if ($errors->has('phone'))
                                            <span class="form_error">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control mb-3" placeholder="Message" rows="5" name="message"></textarea>

                                        @if ($errors->has('message'))
                                            <span class="form_error">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input class="submit-btn" type="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('script_content')
    <script>
        $(document).ready(function() {

            ////////////// form validation ////////////////////////
            $('#contact_form').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    phone: {
                        required: true,
                        number: true,
                    },
                    message: {
                        required: true
                    },
                },
                messages: {
                    name: "Please enter your name",
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    phone: {
                        required: "Please enter your phone number",
                        number: "Please enter a valid phone number"
                    },
                    message: "Please enter your message"
                },
                errorElement: 'span',
                errorClass: 'form_error text-danger',
                errorPlacement: function(error, element) {
                    element.closest('.form-group').append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form, event) {
                    event.preventDefault();

                    const formData = new FormData(form);
                    const url = "{{ route('post_contact_us') }}";

                    // ++++++++++++++ | form submit | +++++++++++++++
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: url,
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $(form).find('input[type="submit"]').prop('disabled', true);
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Thank you for contacting us.",
                                showConfirmButton: true,
                                confirmButtonText: "OK",
                            });
                        },
                        error: function(error) {
                            console.log("error" + error);
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Something went wrong!",
                                showConfirmButton: true,
                                confirmButtonText: "OK",
                            });
                        },
                        complete: function() {
                            form.reset();
                            $(form).find('input[type="submit"]').prop('disabled', false);
                        }
                    });
                }
            });
            ////////////// end form validation ////////////////////

        });
    </script>
@endsection
