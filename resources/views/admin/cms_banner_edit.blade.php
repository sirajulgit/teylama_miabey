@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Cms Banner Edit</h3>

                            <div class="card-tools">
                                <a href="{{ route('cms_banner_list') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form id="quickForm" action="{{ route('post_cms_banner_edit', $data['item']['id']) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group col-md-6">
                                <label>Banner Type</label>
                                <select disabled class="form-control select2" style="width: 100%;" name="type">
                                    <option value="">Select Banner Type</option>
                                    <option value="home_page" {{ $data['item']['type'] == 'home_page' ? 'selected' : '' }}>Home Page</option>
                                    <option value="about_page" {{ $data['item']['type'] == 'about_page' ? 'selected' : '' }}>About Page</option>
                                    <option value="blog_page" {{ $data['item']['type'] == 'blog_page' ? 'selected' : '' }}>Blog Page</option>
                                    <option value="event_page" {{ $data['item']['type'] == 'event_page' ? 'selected' : '' }}>Event Page</option>
                                    <option value="gallery_page" {{ $data['item']['type'] == 'gallery_page' ? 'selected' : '' }}>Gallery Page</option>
                                    <option value="contact_page" {{ $data['item']['type'] == 'contact_page' ? 'selected' : '' }}>Contact Page</option>
                                </select>
                            </div>


                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="title_1">Title 1</label>
                                    <input type="text" name="title_1" class="form-control" id="title_1"
                                        value="{{ $data['item']['title_1'] }}">
                                </div>


                                {{-- <div class="form-group col-md-6">
                                    <label for="title_2">Title 2</label>
                                    <input type="text" name="title_2" class="form-control" id="title_2"
                                        value="{{ $data['item']['title_2'] }}">
                                </div> --}}


                                <div class="form-group col-md-12">
                                    <label for="details">Details</label>
                                    <textarea id="details" name="details" class="form-control" rows="5">{{ $data['item']['details'] }}</textarea>
                                </div>


                                {{-- <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <select class="form-control select2" style="width: 100%;" name="status">
                                        <option value="1" {{ $data['item']['status'] == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $data['item']['status'] == 0 ? 'selected' : '' }}>No
                                            Active
                                        </option>
                                    </select>
                                </div> --}}


                                <div class="form-group col-md-6">
                                    <label for="image">Banner Image</label>
                                    <input type="file" class="form-control mt-3 uploadFile" name="image" id="image"
                                        accept="image/png, image/jpg, image/jpeg, image/webp">
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="admin_upload">
                                        <div class="profile_image">
                                            <img class="profile_img" id="thumbnail_show_image"
                                                src="{{ $data['item']['image'] }}" width="100%" height="714px">
                                        </div>
                                    </div>
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
                    title_1: {
                        required: false,
                    },
                    title_2: {
                        required: false,
                    },
                    details: {
                        required: false
                    },
                    image: {
                        required: false
                    },
                    type: {
                        required: true,
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
                    form.submit();
                }
            });
            ////////////// end form validation ////////////////////
        })
    </script>
@endsection
