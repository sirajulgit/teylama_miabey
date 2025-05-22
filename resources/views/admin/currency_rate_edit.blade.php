@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Currency Rate</h3>

                            <div class="card-tools">
                                <a href="{{ route('currency_rate_list') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form id="quickForm" action="{{ route('post_currency_rate_edit', $data['item']['id']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">



                                <div class="form-group col-md-6">
                                    <label for="currency_value">Currency Value (INR)</label>
                                    <input type="currency_value" name="currency_value" class="form-control" id="currency_value"
                                       value="{{ $data['item']['currency_value'] }}">
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
            $('#quickForm').validate({
                rules: {
                    widthdraw_perc: {
                        required: true,
                         number: true
                    },
                    amount: {
                        required: true,
                         number: true
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
                    event.preventDefault();
                     form.submit();

                }
            });
            ////////////// end form validation ////////////////////
        })
    </script>
@endsection
