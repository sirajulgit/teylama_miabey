@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Crypto App Edit</h3>

                            <div class="card-tools">
                                <a href="{{ route('crypto_app_list') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form id="quickForm" action="{{ route('post_crypto_app_edit', $data['item']['id']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">

                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ $data['item']['name'] }}">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="tutorial_video_url">Tutorial Video Link</label>
                                    <input type="url" name="tutorial_video_url" class="form-control" id="tutorial_video_url"
                                        value="{{ $data['item']['tutorial_video_url'] }}">
                                </div>

                                {{-- <div class="form-group col-md-6">
                                    <label for="price">Book Price</label>
                                    <input type="number" name="price" class="form-control" id="price"
                                        value="{{ $data['item']['price'] }}">
                                </div> --}}

                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <select class="form-control select2" style="width: 100%;" name="status">
                                        <option value="1" {{ $data['item']['status'] == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $data['item']['status'] == 0 ? 'selected' : '' }}>No
                                            Active
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="image">Logo</label>

                                    <div class="admin_upload">
                                        <label class="admin-upload-wrap">
                                            <input type="file" class="form-control mt-3 uploadFile" name="image"
                                                id="image" accept="image/png, image/jpg, image/jpeg, image/webp">
                                            {{-- <img src="{{ asset('asset/images/icons/bigg-size-upload.png') }}"> --}}
                                        </label>

                                        <div class="profile_image">
                                            <img class="profile_img" id="thumbnail_show_image"
                                                src="{{ $data['item']['brand_image'] }}" width="148px" height="221px">
                                        </div>


                                    </div>

                                    @if ($errors->has('image'))
                                        <span class="form_error">{{ $errors->first('image') }}</span>
                                    @endif

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
                      name: {
                        required: true,
                    },
                    link: {
                        required: true,
                        urlValidation: true
                    },
                    image: {
                        required: true
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
