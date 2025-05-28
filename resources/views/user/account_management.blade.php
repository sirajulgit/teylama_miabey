@extends('user.layout.auth_layout')


@section('content')
    <header>
        <div class="top-cover d-flex align-items-center justify-content-between">

      <a href="{{ url()->previous() }}">
<button class="btn-back-frw"> <i class="bi bi-chevron-left"></i> </button>
</a>

            <strong class="center-heading">Account Management</strong>
            <strong> </strong>
    </header>


    <main class="home-content">

        <div class="container-fluid">

            <div class="account-tab">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-bank-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank"
                            aria-selected="true">Bank Card</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-upi-tab" data-bs-toggle="pill" data-bs-target="#pills-upi"
                            type="button" role="tab" aria-controls="pills-upi" aria-selected="false"> UPI </button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-bank" role="tabpanel" aria-labelledby="pills-upi-tab">
                        {{-- <div class="card-bound mb-3">
                            <p> Up to 99 cards can be bound </p>
                        </div> --}}

                        @foreach ($data['bank_accounts'] as $item)
                            <div class="bank-list p-3 rounded-3 mb-3">
                                <div class="d-flex align-items-center mb-3">

                                    <p>{{ $item->bank_name }} </p>

                                    <i class="bi bi-trash3 ms-2 del-record" data-id="{{ $item->id }}"
                                        style="color: red"></i>
                                </div>
                                <strong class="ac-number">{{ $item->ac_no }} </strong>
                            </div>
                        @endforeach

                        <div class="bank-list p-3 rounded-3 mb-3">
                            <div class="text-center" data-bs-toggle="modal" data-bs-target="#myModal">
                                <span class="borderd-plus">+</span>
                                <p class="mt-3">Add Bank Card </p>


                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="pills-upi" role="tabpanel" aria-labelledby="pills-upi-tab">

                        @foreach ($data['upi_accounts'] as $item)
                            <div class="bank-list p-3 rounded-3 mb-3">
                                <div class="d-flex align-items-center mb-3">

                                    <p>{{ $item->upi }} </p>
                                    <i class="bi bi-trash3 ms-2 del-record" data-id="{{ $item->id }}"
                                        style="color: red"></i>
                                </div>

                            </div>
                        @endforeach

                        <div class="bank-list p-3 rounded-3 mb-3">
                            <div class="text-center" data-bs-toggle="modal" data-bs-target="#upiModal">
                                <span class="borderd-plus">+</span>
                                <p class="mt-3">Add UPI </p>


                            </div>
                        </div>

                    </div>

                </div>

            </div>


        </div>

    </main>


    <!-- Bank Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Bank Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="myForm" class="modal-content needs-validation" novalidate>
                        @csrf

                        <div class="mb-2">
                            <label class="mb-2 label-design"> Bank Name</label>
                            <div class="pw-area position-relative">
                                <input name="bank_name" class="form-control" type="text"
                                    placeholder="Please enter Bank Name" value="{{ old('bank_name') }}" />
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="mb-2 label-design">Account Holder Name</label>
                            <div class="pw-area position-relative">
                                <input name="account_holder_name" class="form-control" type="text"
                                    placeholder="Account Holder Name" value="{{ old('account_holder_name') }}" />

                            </div>

                        </div>



                        <div class="mb-2">
                            <label class="mb-2 label-design"> Account Number </label>
                            <div class="pw-area position-relative">
                                <input name="ac_no" id="ac_no" class="form-control" type="text"
                                    placeholder="Please Enter Account Number" value="{{ old('ac_no') }}" />

                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="mb-2 label-design">IFSC code</label>
                            <div class="pw-area position-relative">
                                <input name="ifsc_code" id="ifsc_code" class="form-control" type="text"
                                    placeholder="Please Enter IFSC code" value="{{ old('ifsc_code') }}" />

                            </div>
                        </div>

                        <div class="mt-4">
                            <input type="submit" class="submit-btn" value="Save" />
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- UPI Modal -->
    <div class="modal fade" id="upiModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">UPI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="upiForm" class="modal-content needs-validation" novalidate>
                        @csrf

                        <div class="mb-2">
                            <label class="mb-2 label-design"> UPI ID</label>
                            <div class="pw-area position-relative">
                                <input name="upi" class="form-control" type="text"
                                    placeholder="Please enter UPI ID" value="{{ old('upi') }}" />
                            </div>
                        </div>



                        <div class="mt-4">
                            <input type="submit" class="submit-btn" value="Save" />
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_content')
    <script>
        $(document).ready(function() {





            ////////////// form validation ////////////////////////
            $('#myForm').validate({
                rules: {
                    bank_name: {
                        required: true,
                    },
                    account_holder_name: {
                        required: true,

                    },
                    ac_no: {
                        required: true,

                    },
                    ifsc_code: {
                        required: true,


                    }
                },
                messages: {

                },
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
                    //event.preventDefault();
                    //form.submit();

                    var formData = $(form).serialize();
                    // console.log(formData);
                    $.ajax({
                        url: "{{ route('user_account.post_create') }}",
                        type: "POST",

                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },


                        data: formData,
                        success: function(response) {
                            response = JSON.parse(response);
                            if (response.status == 'success') {
                                console.log(response)
                                $('#myModal').modal('hide');
                                alert(response.message);

                                location.reload();
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(xhr) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                // toastr.error(value[0]);
                            });
                        }
                    });

                }
            });
            ////////////// end form validation ////////////////////



            ////////////// UPI form validation ////////////////////////
            $('#upiForm').validate({
                rules: {
                    upi: {
                        required: true,
                    }
                },
                messages: {

                },
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
                    //event.preventDefault();
                    //form.submit();

                    var formData = $(form).serialize();
                    // console.log(formData);
                    $.ajax({
                        url: "{{ route('user_account.post_upi_create') }}",
                        type: "POST",

                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },


                        data: formData,
                        success: function(response) {
                            response = JSON.parse(response);
                            if (response.status == 'success') {
                                console.log(response)
                                $('#upiModal').modal('hide');
                                alert(response.message);

                                location.reload();
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(xhr) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                // toastr.error(value[0]);
                            });
                        }
                    });

                }
            });
            ////////////// end form validation ////////////////////


            $(document).on('click', '.del-record', function() {

                var data_id = $(this).attr('data-id');

                Swal.fire({
                    title: "Do you want to delete?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {


                        let url = "{{ route('user_account.delete') }}";


                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            url: `${url}`,
                            method: "POST",
                            contentType: "application/json; charset=utf-8",
                            traditional: true,
                            data: JSON.stringify({
                                id: data_id
                            }),
                            success: function(response) {
                                console.log(response);
                                window.location.reload();
                            },
                            error: function(error) {
                                console.log("error" + error);
                            }
                        });



                    }
                });


            })
        })
    </script>
@endsection
