@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                {{-- /////////////// Social Links And Contract Email /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title ">Social Links & Email</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="quickForm" action="{{ route('post_cms') }}" method="POST" enctype="multipart/form-data">
                            @csrf




                            <div class="card-body row">

                                <div class="form-group col-md-6">
                                    <label for="details">Header & Footer Email</label>
                                    <input type="email" name="details[]" class="form-control" id="details"
                                        value="{{ $items['contact_email']['details'] }}">

                                    <input type="hidden" name="id[]" value="{{ $items['contact_email']['id'] }}" />
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="fb_link">Facebook Link</label>
                                    <input type="url" name="details[]" class="form-control" id="fb_link"
                                        value="{{ $items['fb_link']['details'] }}">

                                    <input type="hidden" name="id[]" value="{{ $items['fb_link']['id'] }}" />
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="twitter_link">Twitter Link</label>
                                    <input type="url" name="details[]" class="form-control" id="twitter_link"
                                        value="{{ $items['twitter_link']['details'] }}">

                                    <input type="hidden" name="id[]" value="{{ $items['twitter_link']['id'] }}" />
                                </div>


                                {{-- <div class="form-group col-md-6">
                                    <label for="gmail_link">linkedin Link</label>
                                    <input type="url" name="details[]" class="form-control" id="gmail_link"
                                        value="{{ $items['gmail_link']['details'] }}">

                                    <input type="hidden" name="id[]" value="{{ $items['gmail_link']['id'] }}" />
                                </div> --}}


                                <div class="form-group col-md-6">
                                    <label for="insra_link">Instagram Link</label>
                                    <input type="url" name="details[]" class="form-control" id="insra_link"
                                        value="{{ $items['insra_link']['details'] }}">

                                    <input type="hidden" name="id[]" value="{{ $items['insra_link']['id'] }}" />
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="youtube_link">YouTube Link</label>
                                    <input type="url" name="details[]" class="form-control" id="youtube_link"
                                        value="{{ $items['youtube_link']['details'] }}">

                                    <input type="hidden" name="id[]" value="{{ $items['youtube_link']['id'] }}" />
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>

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
            $('#aboutForm').validate({
                rules: {
                    title_1: {
                        required: true,
                    },
                    content: {
                        required: true
                    },
                    file_1: {
                        extension: "pdf"
                    }
                },
                messages: {
                    // email: {
                    //     required: "Please enter a email address",
                    //     email: "Please enter a valid email address"
                    // },
                    // password: {
                    //     required: "Please provide a password",
                    //     minlength: "Your password must be at least 5 characters long"
                    // },
                    file_1: {
                        extension: "plese select .pdf format file"
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
