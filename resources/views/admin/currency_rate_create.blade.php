@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>

                            <div class="card-tools">
                                <a href="{{ route('product_list') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form id="quickForm" action="{{ route('post_product_create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">

                                <div class="form-group col-md-6">
                                    <label for="widthdraw_perc">Widthdraw %</label>
                                    <input type="text" name="widthdraw_perc" class="form-control" id="widthdraw_perc"
                                        value="{{ old('widthdraw_perc') }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="amount">Amount</label>
                                    <input type="amount" name="amount" class="form-control" id="amount"
                                        value="{{ old('amount') }}">
                                </div>





                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
