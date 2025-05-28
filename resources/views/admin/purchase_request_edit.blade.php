@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Purchase Request</h3>

                            <div class="card-tools">
                                <a href="{{ route('purchase_request_list') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form id="quickForm" action="{{ route('post_purchase_request_edit', $data['item']['id']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">


                                <div class="form-group col-md-6">
                                    <label>Payment Status</label>
                                    <select class="form-control select2" style="width: 100%;" name="payment_status">
                                        <option value="pending" {{ $data['item']['payment_status'] == "pending" ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="complete" {{ $data['item']['payment_status'] == "complete" ? 'selected' : '' }}>Complete
                                        </option>
                                          <option value="complete" {{ $data['item']['payment_status'] == "failed" ? 'selected' : '' }}>Failed
                                        </option>

                                    </select>
                                </div>




                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection


@section('script_content')
    <script>
        $(document).ready(function() {





            ////////////// form validation ////////////////////////
            // $('#quickForm').validate({
            //     rules: {
            //         widthdraw_perc: {
            //             required: true,
            //              number: true
            //         },
            //         amount: {
            //             required: true,
            //              number: true
            //         }
            //     },
            //     messages: {

            //     },
            //     errorElement: 'span',
            //     errorPlacement: function(error, element) {
            //         error.addClass('invalid-feedback');
            //         element.closest('.form-group').append(error);
            //     },
            //     highlight: function(element, errorClass, validClass) {
            //         $(element).addClass('is-invalid');
            //     },
            //     unhighlight: function(element, errorClass, validClass) {
            //         $(element).removeClass('is-invalid');
            //     },
            //     submitHandler: function(form, event) {
            //         event.preventDefault();
            //          form.submit();

            //     }
            // });
            ////////////// end form validation ////////////////////
        })
    </script>
@endsection
