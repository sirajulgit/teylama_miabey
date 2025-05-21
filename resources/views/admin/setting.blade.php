@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">




                {{-- /////////////// admin email /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title badge badge-success font-weight-bold">Admin Email</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="admin_emailForm" action="{{ route('updateAdminEmail') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">
                                <div class="form-group col-md-12">
                                    <label for="admin_email">Email</label>
                                    <input type="email" name="admin_email" class="form-control" id="admin_email"
                                        value="{{ $items['admin_email'] }}">
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>



                {{-- /////////////// header_logo /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title badge badge-success font-weight-bold">Header Logo</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="site_logoForm" action="{{ route('updateHeaderLogo') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="header_logo"> Logo</label>

                                    <div class="admin_upload">
                                        <label class="admin-upload-wrap">
                                            <input type="file" class="form-control mt-3 uploadFile" name="header_logo"
                                                id="header_logo" accept="image/png, image/jpg, image/jpeg, image/webp">
                                        </label>

                                        <div class="profile_image">
                                            @if ($items['header_logo'])
                                                <img class="profile_img" id="thumbnail_show_image_header_logo"
                                                    src="{{ $items['header_logo'] }}" width="95px" height="84px">
                                            @else
                                                <img class="profile_img" id="thumbnail_show_image_header_logo"
                                                    src="{{ asset('asset/images/default_image.png') }}" width="95px"
                                                    height="84px">
                                            @endif
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


                {{-- /////////////// footer_logo /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title badge badge-success font-weight-bold">Footer Logo</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="site_logoForm" action="{{ route('updateFooterLogo') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="footer_logo"> Logo</label>

                                    <div class="admin_upload">
                                        <label class="admin-upload-wrap">
                                            <input type="file" class="form-control mt-3 uploadFile" name="footer_logo"
                                                id="footer_logo" accept="image/png, image/jpg, image/jpeg, image/webp">
                                        </label>

                                        <div class="profile_image">
                                            @if ($items['footer_logo'])
                                                <img class="profile_img" id="thumbnail_show_image_footer_logo"
                                                    src="{{ $items['footer_logo'] }}" width="95px" height="84px" style="background-color: #060017;">
                                            @else
                                                <img class="profile_img" id="thumbnail_show_image_footer_logo"
                                                    src="{{ asset('asset/images/default_image.png') }}" width="95px"
                                                    height="84px">
                                            @endif
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
            $('#header_logo').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image_header_logo').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {
                    $('#thumbnail_show_image_header_logo').attr('src', '/asset/images/default_image.png');
                }

            })


            $('#footer_logo').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image_footer_logo').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {
                    $('#thumbnail_show_image_footer_logo').attr('src', '/asset/images/default_image.png');
                }

            })
            ///////////////// end preview image  ////////////////////



            ////////////// form validation ////////////////////////
            $('#admin_emailForm').validate({
                rules: {
                    admin_email: {
                        required: true,
                        email: true
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


            $('#site_logoForm').validate({
                rules: {
                    logo: {
                        required: true
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
                    // alert(1);
                }
            });
            ////////////// end form validation ////////////////////


        })
    </script>
@endsection
