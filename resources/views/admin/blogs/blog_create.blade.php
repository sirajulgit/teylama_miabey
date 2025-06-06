@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Blog Add</h3>

                            <div class="card-tools">
                                <a href="{{ route('blog_list') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form id="quickForm" action="{{ route('post_blog_create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        value="{{ old('title') }}">

                                    @if ($errors->has('title'))
                                        <span class="form_error">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug"
                                        value="{{ old('slug') }}">

                                    @if ($errors->has('slug'))
                                        <span class="form_error">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="image">Image</label>

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
                                    <label for="short_description">Short Details</label>
                                    <textarea id="short_description" name="short_description" class="form-control" rows="5">{{ old('short_description') }}</textarea>

                                    @if ($errors->has('short_description'))
                                        <span class="form_error">{{ $errors->first('short_description') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="long_description">Long Details</label>
                                    <textarea id="long_description" name="long_description" class="form-control">{{ old('long_description') }}</textarea>

                                    @if ($errors->has('long_description'))
                                        <span class="form_error">{{ $errors->first('long_description') }}</span>
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
            $("#long_description").summernote({
                height: 200,
            });


            const text_limit = 200; // text timit
            $("#short_description").summernote({
                height: 200,
                callbacks: {
                    onKeydown: function(e) {
                        var t = e.currentTarget.innerText;
                        if (t.trim().length >= text_limit) {
                            //delete keys, arrow keys, copy, cut, select all
                            if (e.keyCode != 8 && !(e.keyCode >= 37 && e.keyCode <= 40) && e
                                .keyCode != 46 && !(e.keyCode == 88 && e.ctrlKey) && !(e.keyCode ==
                                    67 && e.ctrlKey) && !(e.keyCode == 65 && e.ctrlKey))
                                e.preventDefault();
                        }
                    },
                    onKeyup: function(e) {
                        var t = e.currentTarget.innerText;
                        $('#maxContentPost').text(text_limit - t.trim().length);
                    },
                    onPaste: function(e) {
                        var t = e.currentTarget.innerText;
                        var bufferText = ((e.originalEvent || e).clipboardData || window
                            .clipboardData).getData('Text');
                        e.preventDefault();
                        var maxPaste = bufferText.length;
                        if (t.length + bufferText.length > text_limit) {
                            maxPaste = text_limit - t.length;
                        }
                        if (maxPaste > 0) {
                            document.execCommand('insertText', false, bufferText.substring(0,
                                maxPaste));
                        }
                        $('#maxContentPost').text(text_limit - t.length);
                    }
                },
            })



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


            /////////////////// slug validation ///////////////////////
            function convertToSlug(text) {
                return text
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }

            $('#title').on('input', function() {
                const titleVal = $(this).val();
                const slug = convertToSlug(titleVal);
                $('#slug').val(slug);
            });
            /////////////////// end slug validation ///////////////////



            ////////////// form validation ////////////////////////
            $('#quickForm').validate({

                rules: {
                    title: {
                        required: true,
                    },
                    slug: {
                        required: true,
                    },
                    image: {
                        required: true
                    },
                    short_description: {
                        required: false,
                    },
                    long_description: {
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
                    // alert(1);
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
