@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Book Add</h3>

                            <div class="card-tools">
                                <a href="{{ route('book_list') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form id="quickForm" action="{{ route('post_book_create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">
                                {{-- <div class="form-group col-md-6">
                                    <label for="order_no">Order No</label>
                                    <input type="text" name="order_no" class="form-control" id="order_no"
                                        value="{{ $data['order_no'] }}">
                                </div> --}}

                                <input type="hidden" name="order_no" class="form-control" id="order_no"
                                value="{{ $data['order_no'] }}">

                                <div class="form-group col-md-6">
                                    <label for="title">Book Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        value="{{ old('title') }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="link">Amazon Link</label>
                                    <input type="url" name="link" class="form-control" id="link"
                                        value="{{ old('link') }}">
                                </div>

                                {{-- <div class="form-group col-md-6">
                                    <label for="price">Book Price</label>
                                    <input type="number" name="price" class="form-control" id="price">
                                </div> --}}

                                <div class="form-group col-md-6">
                                    <label for="image">Book Cover</label>

                                    <div class="admin_upload">
                                        <label class="admin-upload-wrap">
                                            <input type="file" class="form-control mt-3 uploadFile" name="image"
                                                id="image" accept="image/png, image/jpg, image/jpeg, image/webp">
                                            {{-- <img src="{{ asset('asset/images/icons/bigg-size-upload.png') }}"> --}}
                                        </label>

                                        <div class="profile_image">
                                            <img class="profile_img" id="thumbnail_show_image"
                                                src="{{ asset('asset/images/default_image.png') }}" width="148px"
                                                height="221px">
                                        </div>


                                    </div>

                                    @if ($errors->has('image'))
                                        <span class="form_error">{{ $errors->first('image') }}</span>
                                    @endif

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="details">Book Details</label>
                                    <textarea id="details" name="details">{{ old('details') }}</textarea>

                                    @if ($errors->has('details'))
                                        <span class="form_error">{{ $errors->first('details') }}</span>
                                    @endif
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

            ////////// Summernote /////////////
            $("#details").summernote({
                height: 200
            });


            /////////////////// preview image ///////////////////
            $('#image').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#thumbnail_show_image').attr('src', '/asset/images/default_image.png');

                }


            })
            ///////////////// end preview image  ////////////////////



            ////////////// form validation ////////////////////////
            $('#quickForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    order_no: {
                        required: true,
                    },
                    link: {
                        required: true,
                        urlValidation: true
                    },
                    image: {
                        required: true
                    },
                    price: {
                        required: false
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
                    // Toast.create("Voila!", "How easy was that?", TOAST_STATUS.SUCCESS, 5000);

                    // var formData = new FormData();

                    // var other_data = $('#chatoutForm').serializeArray();
                    // $.each(other_data, function(key, input) {
                    //     formData.append(input.name, input.value);
                    // });


                    // let url = "/cashout";

                    // $.ajax({
                    //     // headers: {
                    //     //     'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    //     // },
                    //     url: "/cashout",
                    //     method: "POST",
                    //     contentType: false,
                    //     // processData: false,
                    //     data: formData,
                    //     success: function(response) {
                    //         console.log(response);
                    //     },
                    //     error: function(error) {
                    //         console.log("error" + error);
                    //     }
                    // });
                }
            });
            ////////////// end form validation ////////////////////
        })
    </script>
@endsection
