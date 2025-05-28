@extends('user.layout.auth_layout')


@section('content')
    <div class="edit-profile-banner pt-3 p-3">
        <div class="top-details d-flex align-items-center justify-content-between">
            <div class="left-details d-flex align-items-center">

<a href="{{ url()->previous() }}">
<button class="btn-back-frw"> <i class="bi bi-chevron-left"></i> </button>
</a>
                <div>


                </div>
            </div>

            <div class="right-details-balance text-end">
                <p>Balance</p>
                <strong> {{auth()->user()->wallet_bal}} USDT</strong>
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
                            <input name="withdrawl_amount" id="withdrawl_amount" class="form-control" type="text"
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
                    var wallet_bal= "{{auth()->user()->wallet_bal}}";
                    var withdrawl_amt = $("#withdrawl_amount").val();
//alert(wallet_bal+"wallet_bal")
//alert(withdrawl_amt+"withdrawl_amt")
                    if(parseInt(withdrawl_amt) <= parseInt(wallet_bal)){
                        form.submit();

                    }else{
                        alert("Invalid Withdrawl Amount");
                    }


                }
            });
            ////////////// end form validation ////////////////////
        })
    </script>
@endsection
