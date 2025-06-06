@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Gallery Add</h3>

                            <div class="card-tools">
                                <a href="{{ route('gallery_list') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form id="quickForm" action="{{ route('post_gallery_create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">

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
                    image: {
                        required: true
                    },
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
                }
            });
            ////////////// end form validation ////////////////////



        })
    </script>
@endsection
