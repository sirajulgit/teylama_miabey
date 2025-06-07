@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Event Edit</h3>

                            <div class="card-tools">
                                <a href="{{ route('event_list') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form id="quickForm" action="{{ route('post_event_edit', $data['item']['id']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="title">Event Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        value="{{ $data['item']['title'] }}">

                                    @if ($errors->has('title'))
                                        <span class="form_error">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="slug">Event Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug"
                                        value="{{ $data['item']['slug'] }}">

                                    @if ($errors->has('slug'))
                                        <span class="form_error">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="start_date">Event Start Date</label>
                                    <input type="datetime-local" name="start_date" class="form-control" id="start_date"
                                        value="{{ Carbon\Carbon::parse($data['item']['start_date'])->format('Y-m-d\TH:i') }}">

                                    @if ($errors->has('start_date'))
                                        <span class="form_error">{{ $errors->first('start_date') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="end_date">Event End Date</label>
                                    <input type="datetime-local" name="end_date" class="form-control" id="end_date"
                                        value="{{ Carbon\Carbon::parse($data['item']['end_date'])->format('Y-m-d\TH:i') }}">

                                    @if ($errors->has('end_date'))
                                        <span class="form_error">{{ $errors->first('end_date') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="image">Event Image</label>

                                    <div class="admin_upload">
                                        <label class="admin-upload-wrap">
                                            <input type="file" class="form-control mt-3 uploadFile" name="image"
                                                id="image" accept="image/png, image/jpg, image/jpeg, image/webp">
                                            {{-- <img src="{{ asset('asset/images/icons/bigg-size-upload.png') }}"> --}}
                                        </label>

                                        <div class="profile_image">
                                            <img class="profile_img" id="thumbnail_show_image"
                                                src="{{ $data['item']['image'] }}" width="148px" height="221px">
                                        </div>

                                    </div>

                                    @if ($errors->has('image'))
                                        <span class="form_error">{{ $errors->first('image') }}</span>
                                    @endif

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Event Status</label>
                                    <select class="form-control select2" style="width: 100%;" name="status">
                                        <option value="1" {{ $data['item']['status'] == "active" ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $data['item']['status'] == "inactive" ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="form_error">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="short_description">Event Short Details</label>
                                    <textarea id="short_description" name="short_description" class="form-control" rows="5">{{ $data['item']['short_description'] }}</textarea>
                                    {{-- <h5 id="maxContentPost" style="text-align:right"></h5> --}}

                                    @if ($errors->has('short_description'))
                                        <span class="form_error">{{ $errors->first('short_description') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="long_description">Event Long Details</label>
                                    <textarea id="long_description" name="long_description" class="form-control">{{ $data['item']['long_description'] }}</textarea>

                                    @if ($errors->has('long_description'))
                                        <span class="form_error">{{ $errors->first('long_description') }}</span>
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
                    start_date: {
                        required: true,
                    },
                    end_date: {
                        required: true
                    },
                    image: {
                        required: false
                    },
                    short_description: {
                        required: true,
                    },
                    long_description: {
                        required: false
                    },
                    status: {
                        required: false
                    },
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
