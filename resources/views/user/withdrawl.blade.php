@extends('user.layout.auth_layout')


@section('content')
    <div class="edit-profile-banner pt-3 p-3">
        <div class="top-details d-flex align-items-center justify-content-between">
            <div class="left-details d-flex align-items-center">
                <div class="client-image">
                    <img src="{{ asset('asset/frontend/images/call-us.jpg') }}" alt="">
                </div>
                <div>

                    <strong class="profile-name">{{auth()->user()->username}}</strong>
                </div>
            </div>

            <div class="right-details-balance text-end">
                <p>Balance</p>
                <strong> <i class="bi bi-currency-rupee"></i> 0.00 </strong>
            </div>

        </div>
    </div>



    <main class="home-content">
        <div class="container-fluid">
            <form id="withdrawlForm"  action="{{ route('user_account.post_withdrawl_create') }}" method="post">
                    @csrf

                    <div class="mb-2">
                         <label class="mb-2 label-design"> Withdrawl Amount</label>
                        <div class="pw-area position-relative">
                            <input name="withdrawl_amount" class="form-control" type="text"
                                placeholder="Please enter Withdrawl Amount"
                                value="{{ old('withdrawl_amount') }}" />
                        </div>
                    </div>



                    <div class="mt-4">
                        <input type="submit" class="submit-btn" value="Send Withdrawl Request" />
                    </div>
                </form>




        </div>
    </main>

@endsection
@section('script_content')
    <script>
        $(document).ready(function() {





            ////////////// form validation ////////////////////////
            $('#withdrawlForm').validate({
                rules: {
                    withdrawl_amount: {
                        required: true,
                        number: true,
                    }
                },
                messages: {
                    withdrawl_amount: {
                        required: "Please enter Withdrawl Amount",
                        number: "Please enter a valid number",
                    }

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
                    event.preventDefault();
                    form.submit();

                }
            });
            ////////////// end form validation ////////////////////
        })
    </script>
@endsection
