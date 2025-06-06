@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                {{-- /////////////// about /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title badge badge-success font-weight-bold ">About</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="aboutForm" action="{{ route('post_cms_home') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="id" value="{{ $items['about']['id'] }}" />

                            <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="head_title">Head Title</label>
                                    <textarea id="head_title1" name="head_title" class="form-control" rows="5">{{ $items['about']['head_title'] }}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="content">Details</label>
                                    <textarea id="content1" name="content" class="form-control" rows="5">{{ $items['about']['content'] }}</textarea>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="image">Image 1</label>

                                    <div class="admin_upload">
                                        <label class="admin-upload-wrap">
                                            <input type="file" class="form-control mt-3 uploadFile" name="image_1"
                                                id="image_1_about" accept="image/png, image/jpg, image/jpeg, image/webp">
                                        </label>

                                        <div class="profile_image">
                                            @if ($items['about']['image_1'])
                                                <img class="profile_img" id="thumbnail_show_image_1_about"
                                                    src="{{ $items['about']['image_1'] }}" width="148px" height="221px">
                                            @else
                                                <img class="profile_img" id="thumbnail_show_image_1_about"
                                                    src="{{ asset('asset/images/default_image.png') }}" width="148px"
                                                    height="221px">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="image_1_text_1">Image 1 Text 1</label>
                                    <textarea id="image_1_text_1_1" name="image_1_text_1" class="form-control" rows="5">{{ $items['about']['image_1_text_1'] }}</textarea>

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="image_1_text_2">Image 1 Text 2</label>
                                    <textarea id="image_1_text_2_1" name="image_1_text_2" class="form-control" rows="5">{{ $items['about']['image_1_text_2'] }}</textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="image">Image 2</label>

                                    <div class="admin_upload">
                                        <label class="admin-upload-wrap">
                                            <input type="file" class="form-control mt-3 uploadFile" name="image_2"
                                                id="image_2_about" accept="image/png, image/jpg, image/jpeg, image/webp">

                                            {{-- @if (!is_null($items['about']['image_2']))
                                                <button type="button" data-id="{{ $items['about']['id'] }}"
                                                    data-field-name="image_2"
                                                    class="btn btn-sm btn-danger del_about_right_img mt-3 mb-3"><i class="fas fa-trash" aria-hidden="true"></i> Delete</button>
                                            @endif --}}
                                        </label>

                                        <div class="profile_image">

                                            @if ($items['about']['image_2'])
                                                <img class="profile_img" id="thumbnail_show_image_2_about"
                                                    src="{{ $items['about']['image_2'] }}" width="148px" height="221px">
                                            @else
                                                <img class="profile_img" id="thumbnail_show_image_2_about"
                                                    src="{{ asset('asset/images/default_image.png') }}" width="148px"
                                                    height="221px">
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


                {{-- /////////////// what_we_do /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title badge badge-success font-weight-bold">What We Do</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="what_we_do_form" action="{{ route('post_cms_home') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $items['what_we_do']['id'] }}" />

                            <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="head_title">Head Title</label>
                                    <textarea id="head_title2" name="head_title" class="form-control" rows="5">{{ $items['what_we_do']['head_title'] }}</textarea>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="title_1">Title</label>
                                    <textarea id="title_1_2" name="title_1" class="form-control" rows="5">{{ $items['what_we_do']['title_1'] }}</textarea>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="content">Details</label>
                                    <textarea id="content2" name="content" class="form-control" rows="5">{{ $items['what_we_do']['content'] }}</textarea>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="" class="mt-3 mb-3">Syllabus</label>
                                    <br>

                                    <button type="button" class="btn btn-primary mb-3" id="addInput">Add Field</button>

                                    <div id="inputContainer">
                                        @if (count($items['what_we_do']['badge_data']) > 0)
                                            @foreach ($items['what_we_do']['badge_data'] as $item)
                                                <div class="row multi_choice_sections">

                                                    {{-- Category ID --}}
                                                    <input type="hidden" value="{{ $item['id'] }}"
                                                        name="badge_id[]" />


                                                    {{-- Category Name --}}
                                                    <div class="form-group col-md-4">
                                                        <input type="text"
                                                            class="form-control text-input badge_text_1_{{ $item['id'] }}"
                                                            name="old_badge_text_1[]" value="{{ $item['badge_text_1'] }}"
                                                            placeholder="Category Name">
                                                    </div>


                                                    {{-- Category Title --}}
                                                    <div class="form-group col-md-4">
                                                        <input type="text"
                                                            class="form-control text-input badge_title_1_{{ $item['id'] }}"
                                                            name="old_badge_title_1[]"
                                                            value="{{ $item['badge_title_1'] }}"
                                                            placeholder="Category Title">
                                                    </div>


                                                    {{-- Category Details --}}
                                                    <div class="form-group col-md-4">
                                                        <textarea name="old_badge_details_1[]" class="form-control" rows="5 badge_details_1_{{ $item['id'] }}"
                                                            placeholder="Category Details">{{ $item['badge_details_1'] }}</textarea>
                                                    </div>


                                                    {{-- Category Icon --}}
                                                    <div class="form-group col-md-4">
                                                        <label for="badge_icon_1_{{ $item['id'] }}">Category
                                                            Icon</label>
                                                        <input type="file"
                                                            class="form-control file-input badge_icon_1_{{ $item['id'] }}"
                                                            name="old_badge_icon_1[]" placeholder="Category Icon"
                                                            accept="image/png, image/jpg, image/jpeg, image/webp">

                                                        @if ($item['badge_icon_1'])
                                                            <img src="{{ asset($item['badge_icon_1']) }}" alt=""
                                                                width="128px" height="128px" class="mt-3" />
                                                        @endif
                                                    </div>


                                                    {{-- Category Image --}}
                                                    <div class="form-group col-md-4">
                                                        <label for="badge_image_1_{{ $item['id'] }}">Category
                                                            Image</label>
                                                        <input type="file"
                                                            class="form-control file-input badge_image_1_{{ $item['id'] }}"
                                                            name="old_badge_image_1[]" placeholder="Category Image"
                                                            accept="image/png, image/jpg, image/jpeg, image/webp">

                                                        @if ($item['badge_image_1'])
                                                            <img src="{{ asset($item['badge_image_1']) }}" alt=""
                                                                width="464.8px" height="456.4px" class="mt-3" />
                                                        @endif
                                                    </div>

                                                    {{-- Category Action Button --}}
                                                    <div class="form-group col-md-4">

                                                        <button type="button" class="btn btn-info mb-3 updateInput"
                                                            data-badge-id="{{ $item['id'] }}">Update</button>

                                                        <button type="button" class="btn btn-danger mb-3 removeInput"
                                                            data-badge-id="{{ $item['id'] }}">Remove</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row multi_choice_sections">
                                                <input type="hidden" value="" name="badge_id[]" />


                                                {{-- Category Name --}}
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control text-input"
                                                        name="badge_text_1[]" placeholder="Category Name">
                                                </div>

                                                {{-- Category Title --}}
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control text-input"
                                                        name="badge_title_1[]" placeholder="Category Title">
                                                </div>

                                                {{-- Category Details --}}
                                                <div class="form-group col-md-4">
                                                    <textarea name="badge_details_1[]" class="form-control" rows="5" placeholder="Category Details"></textarea>
                                                </div>

                                                {{-- Category Icon --}}
                                                <div class="form-group col-md-4">
                                                    <label for="badge_icon_1">Category Icon</label>
                                                    <input type="file" class="form-control file-input"
                                                        name="badge_icon_1[]" placeholder="Category Icon"
                                                        accept="image/png, image/jpg, image/jpeg, image/webp">
                                                </div>

                                                {{-- Category Image --}}
                                                <div class="form-group col-md-4">
                                                    <label for="badge_image_1">Category Image</label>
                                                    <input type="file" class="form-control file-input"
                                                        name="badge_image_1[]" placeholder="Category Image"
                                                        accept="image/png, image/jpg, image/jpeg, image/webp">
                                                </div>

                                                {{-- Category Action Button --}}
                                                <div class="form-group col-md-4">
                                                    <button type="button"
                                                        class="btn btn-danger mb-3 removeInput">Remove</button>
                                                </div>
                                            </div>
                                        @endif
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


                {{-- /////////////// video_section /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title badge badge-success font-weight-bold">Video Section</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="video_sectionForm" action="{{ route('post_cms_home') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $items['video_section']['id'] }}" />

                            <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="title_1">Title</label>
                                    <textarea id="title_1_3" name="title_1" class="form-control" rows="5">{{ $items['video_section']['title_1'] }}</textarea>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="content">Details</label>
                                    <textarea id="content3" name="content" class="form-control" rows="5">{{ $items['video_section']['content'] }}</textarea>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="video_1_3">Video URL</label>

                                    <input type="url" class="form-control mt-3 uploadFile" name="video_1"
                                        id="video_1_3">

                                    <div class="preview_video">
                                        @if ($items['video_section']['video_1'])
                                            <!-- Video container -->
                                            <div id="videoPlayerContainer_3_video_section" style="margin-top: 20px;">
                                                <!-- Dynamic content will be injected here -->
                                            </div>
                                        @else
                                            <!-- Video container -->
                                            <div id="videoPlayerContainer_3_video_section" style="margin-top: 20px;">
                                                <!-- Dynamic content will be injected here -->
                                            </div>
                                        @endif
                                    </div>

                                    {{-- <div class="admin_upload">
                                        <label class="admin-upload-wrap">
                                            <input type="text" class="form-control mt-3 uploadFile" name="video_1"
                                                id="video_1_3" accept="video/mp4, video/webm, video/ogg, video/x-msvideo">
                                        </label>

                                        <div class="preview_video">
                                            @if ($items['video_section']['video_1'])
                                                <video id="thumbnail_show_video_3_video_section" width="320" height="240" controls src="{{ $items['video_section']['video_1'] }}"></video>
                                            @else
                                                <video id="thumbnail_show_video_3_video_section" width="320" height="240" controls src=""></video>
                                            @endif
                                        </div>
                                    </div> --}}

                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>


                {{-- /////////////// book /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title badge badge-success font-weight-bold ">Featured Books</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="bookForm" action="{{ route('post_cms_home') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $items['book']['id'] }}" />

                            <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="head_title">Title</label>
                                    <textarea id="head_title4" name="head_title" class="form-control" rows="5">{{ $items['book']['head_title'] }}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="content">Details</label>
                                    <textarea id="content4" name="content" class="form-control" rows="5">{{ $items['book']['content'] }}</textarea>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>


                {{-- /////////////// event /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title badge badge-success font-weight-bold ">Upcoming Events</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="eventForm" action="{{ route('post_cms_home') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $items['event']['id'] }}" />

                            <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="head_title">Title</label>
                                    <textarea id="head_title5" name="head_title" class="form-control" rows="5">{{ $items['event']['head_title'] }}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="content">Details</label>
                                    <textarea id="content5" name="content" class="form-control" rows="5">{{ $items['event']['content'] }}</textarea>
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


            ////////// Summernote /////////////
            $("#head_title1").summernote({
                height: 100,
            });
            $("#content1").summernote({
                height: 200,
            });
            $("#image_1_text_1_1").summernote({
                height: 100,
            });
            $("#image_1_text_2_1").summernote({
                height: 100,
            });


            $("#head_title2").summernote({
                height: 100,
            });
            $("#title_1_2").summernote({
                height: 100,
            });
            $("#content2").summernote({
                height: 200,
            });



            $("#content3").summernote({
                height: 200,
            });
            $("#title_1_3").summernote({
                height: 100,
            });


            $("#content4").summernote({
                height: 200,
            });
            $("#head_title4").summernote({
                height: 100,
            });


            $("#content5").summernote({
                height: 200,
            });
            $("#head_title5").summernote({
                height: 100,
            });


            /////////////////// preview image ///////////////////
            $('#image_1_about').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image_1_about').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#thumbnail_show_image_1_about').attr('src', '/asset/images/default_image.png');

                }


            })


            $('#image_2_about').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image_2_about').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#thumbnail_show_image_2_about').attr('src', '/asset/images/default_image.png');

                }


            })



            $('#image_1_what_i_teach').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image_1_what_i_teach').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#thumbnail_show_image_1_what_i_teach').attr('src',
                        '/asset/images/default_image.png');

                }


            })



            $('#image_1_my_expertise').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image_1_my_expertise').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#thumbnail_show_image_1_my_expertise').attr('src',
                        '/asset/images/default_image.png');

                }


            })

            $('#image_2_my_expertise').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image_2_my_expertise').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#thumbnail_show_image_2_my_expertise').attr('src',
                        '/asset/images/default_image.png');

                }


            })

            $('#image_3_my_expertise').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image_3_my_expertise').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#thumbnail_show_image_3_my_expertise').attr('src',
                        '/asset/images/default_image.png');

                }


            })

            $('#image_4_my_expertise').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image_4_my_expertise').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#thumbnail_show_image_4_my_expertise').attr('src',
                        '/asset/images/default_image.png');

                }


            })
            ///////////////// end preview image  ////////////////////


            /////////////////// preview video ///////////////////////
            function getVideoType(url) {
                if (url.match(/\.(mp4|webm|ogg)$/i)) return 'file';
                if (url.includes('youtube.com') || url.includes('youtu.be')) return 'youtube';
                if (url.includes('vimeo.com')) return 'vimeo';
                if (url.includes('facebook.com')) return 'facebook';
                return null;
            }

            function extractYouTubeId(url) {
                const match = url.match(/(?:v=|\/)([0-9A-Za-z_-]{11})(?:\?|&|$)/);
                return match ? match[1] : null;
            }

            function extractVimeoId(url) {
                const match = url.match(/vimeo\.com\/(\d+)/);
                return match ? match[1] : null;
            }

            $('#video_1_3').on('change', function() {
                const url = $(this).val().trim();
                const type = getVideoType(url);
                const $container = $('#videoPlayerContainer_3_video_section');

                $container.html(''); // Clear previous content

                if (!type) {
                    $container.html('<p style="color:red;">Unsupported video type</p>');
                    return;
                }

                if (type === 'file') {
                    $container.html(`
                        <video id="dynamic-player" class="plyr" controls style="height:400px;">
                            <source src="${url}" type="video/mp4" />
                        </video>
                    `);
                }

                if (type === 'youtube') {
                    const ytId = extractYouTubeId(url);
                    if (ytId) {
                        $container.html(`
                            <div id="dynamic-player" data-plyr-provider="youtube" data-plyr-embed-id="${ytId}" style="height:400px;"></div>
                            `);
                    }
                }

                if (type === 'vimeo') {
                    const vimeoId = extractVimeoId(url);
                    if (vimeoId) {
                        $container.html(`
                            <div id="dynamic-player" data-plyr-provider="vimeo" data-plyr-embed-id="${vimeoId}" style="height:400px;"></div>
                            `);
                    }
                }

                if (type === 'facebook') {
                    $container.html(`
                        <iframe src="https://www.facebook.com/plugins/video.php?href=${encodeURIComponent(url)}&show_text=0&width=560"
                        width="560" height="315" style="border:none;overflow:hidden" scrolling="no"
                        frameborder="0" allowfullscreen></iframe>
                    `);
                    return; // Skip Plyr init for Facebook
                }

                // Initialize Plyr
                setTimeout(() => {
                    const player = new Plyr('#dynamic-player');
                }, 100);
            });
            /////////////////// end preview video ///////////////////



            ////////////// form validation ////////////////////////
            $('#aboutForm').validate({
                rules: {
                    head_title: {
                        required: true,
                    },
                    content: {
                        required: true
                    },
                    image_1_text_1: {
                        required: true
                    },
                    image_1_text_2: {
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
                    form.submit();
                }
            });

            $('#what_we_do_form').validate({
                rules: {
                    head_title: {
                        required: true,
                    },
                    title_1: {
                        required: false
                    },
                    content: {
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
                    // event.preventDefault();


                    /////////// dynamic text validate /////////////
                    var isValid = true;
                    $('#inputContainer input[type="text"]').each(function() {
                        if ($(this).val() == '') {
                            isValid = false;
                            $(this).addClass('is-invalid');
                        } else {
                            $(this).removeClass('is-invalid');
                        }
                    });

                    ///////// dynamic textarea validate /////////////
                    $('#inputContainer textarea').each(function() {
                        if ($(this).val() == '') {
                            isValid = false;
                            $(this).addClass('is-invalid');
                        } else {
                            $(this).removeClass('is-invalid');
                        }
                    });


                    ///////// dynamic file validate /////////////
                    // $('#inputContainer input[type="file"]').each(function() {
                    //     if ($(this).val() == '') {
                    //         isValid = false;
                    //         $(this).addClass('is-invalid');
                    //     } else {
                    //         $(this).removeClass('is-invalid');
                    //     }
                    // });





                    if (!isValid) {
                        event.preventDefault();
                        return false;
                    }


                    // $('.text-input, .file-input').each(function() {
                    //     console.log($(this).val())
                    // });


                    // console.log($("#what_we_do").serializeArray())
                    // event.preventDefault();

                    form.submit();
                    // alert(1);
                }
            });

            $('#video_sectionForm').validate({
                rules: {
                    title_1: {
                        required: true,
                    },
                    content: {
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
                }
            });

            $('#bookForm').validate({
                rules: {
                    content: {
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
                    form.submit();
                }
            });

            $('#eventForm').validate({
                rules: {
                    content: {
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
                    form.submit();
                }
            });
            ////////////// end form validation ////////////////////



            /////////////////////////



            ///////////////// dynamic add more fields (what_we_do) ////////////////////////////////
            var pre_badge_count = "{{ count($items['what_we_do']['badge_data']) }}";
            var badge_fields_current_length = (Number(pre_badge_count) != 0) ? Number(pre_badge_count) : 1;
            const badge_fields_max_length = 16;

            if (badge_fields_current_length >= badge_fields_max_length) {
                $("#addInput").hide();
            }

            // Add input field
            $('#addInput').click(function() {

                // alert(badge_fields_current_length)

                if (badge_fields_current_length >= badge_fields_max_length) {
                    $("#addInput").hide();
                    return false;
                }

                $('#inputContainer').append(`
                    <div class="row multi_choice_sections">
                        <input type="hidden" value="" name="badge_id[]" />

                        <div class="form-group col-md-4">
                            <input type="text" class="form-control text-input"
                                name="badge_text_1[]" placeholder="Category Name">
                        </div>

                        <div class="form-group col-md-4">
                            <input type="text" class="form-control text-input"
                                name="badge_title_1[]" placeholder="Category Title">
                        </div>

                        <div class="form-group col-md-4">
                            <textarea name="badge_details_1[]" class="form-control" rows="5" placeholder="Category Details"></textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="badge_icon_1">Category Icon</label>
                            <input type="file" class="form-control file-input"
                                name="badge_icon_1[]" placeholder="Category Icon"
                                accept="image/png, image/jpg, image/jpeg, image/webp">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="badge_image_1">Category Image</label>
                            <input type="file" class="form-control file-input"
                                name="badge_image_1[]" placeholder="Category Image"
                                accept="image/png, image/jpg, image/jpeg, image/webp">
                        </div>

                        <div class="form-group col-md-4">
                            <button type="button"
                                class="btn btn-danger mb-3 removeInput">Remove</button>
                        </div>


                    </div>
                `);

                badge_fields_current_length += 1;
                if (badge_fields_current_length >= badge_fields_max_length) {
                    $("#addInput").hide();
                }
            });

            // Remove input field
            $('#inputContainer').on('click', '.removeInput', function() {

                const current_pointer = $(this);

                var badge_id = $(current_pointer).attr("data-badge-id");
                if (badge_id != undefined) {
                    // alert(badge_id);

                    Swal.fire({
                        title: "Do you want to delete?",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {


                            let url = "{{ route('post_badge_delete') }}";


                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                },
                                url: `${url}`,
                                method: "POST",
                                contentType: "application/json; charset=utf-8",
                                traditional: true,
                                data: JSON.stringify({
                                    id: badge_id
                                }),
                                success: function(response) {
                                    console.log(response);

                                    $(current_pointer).closest('.row').remove();
                                    badge_fields_current_length -= 1;
                                    $("#addInput").show();
                                },
                                error: function(error) {
                                    console.log("error" + error);
                                }
                            });



                        }
                    });


                } else {

                    $(current_pointer).closest('.row').remove();
                    badge_fields_current_length -= 1;
                    $("#addInput").show();

                }
            });


            // Update input field
            $('#inputContainer').on('click', '.updateInput', function() {

                const current_pointer = $(this);
                var badge_id = $(current_pointer).attr("data-badge-id");
                var badge_text_1 = $(`.badge_text_1${badge_id}`).val() || "";
                var badge_text_2 = $(`.badge_text_2${badge_id}`).val() || "";
                var badge_file_1 = $(`.badge_file_1${badge_id}`).prop('files')[0] || "";
                var badge_file_2 = $(`.badge_file_2${badge_id}`).prop('files')[0] || "";
                var badge_icon_1 = $(`.badge_icon_1${badge_id}`).prop('files')[0] || "";
                var badge_image_1 = $(`.badge_image_1${badge_id}`).prop('files')[0] || "";
                var badge_title_1 = $(`.badge_title_1${badge_id}`).val() || "";
                var badge_details_1 = $(`.badge_details_1${badge_id}`).val() || "";



                var formData = new FormData();

                // if (badge_file != undefined) {
                //     formData.append('badge_file', badge_file);
                // }

                if (badge_text_1 != undefined && badge_text_1 != "") {
                    formData.append('badge_text_1', badge_text_1);
                }
                if (badge_text_2 != undefined && badge_text_2 != "") {
                    formData.append('badge_text_2', badge_text_2);
                }
                if (badge_file_1 != undefined && badge_file_1 != "") {
                    formData.append('badge_file_1', badge_file_1);
                }
                if (badge_file_2 != undefined && badge_file_2 != "") {
                    formData.append('badge_file_2', badge_file_2);
                }
                if (badge_icon_1 != undefined && badge_icon_1 != "") {
                    formData.append('badge_icon_1', badge_icon_1);
                }
                if (badge_image_1 != undefined && badge_image_1 != "") {
                    formData.append('badge_image_1', badge_image_1);
                }
                if (badge_title_1 != undefined && badge_title_1 != "") {
                    formData.append('badge_title_1', badge_title_1);
                }
                if (badge_details_1 != undefined && badge_details_1 != "") {
                    formData.append('badge_details_1', badge_details_1);
                }

                let url = "{{ route('post_badge_update') }}";

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: url,
                    method: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log("error" + error);
                    }
                });

            });
            ///////////////// End dynamic add more fields (what_we_do) ////////////////////////////



            /////// delete about right image ///////
            $(document).on('click', '.del_about_right_img', function() {

                const current_pointer = $(this);

                var ID = $(current_pointer).attr("data-id");
                var FIELD_NAME = $(current_pointer).attr("data-field-name");

                Swal.fire({
                    title: "Do you want to delete?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {


                        let url = "{{ route('post_about_right_img_delete') }}";


                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            url: `${url}`,
                            method: "POST",
                            contentType: "application/json; charset=utf-8",
                            traditional: true,
                            data: JSON.stringify({
                                id: ID,
                                field_name: FIELD_NAME
                            }),
                            success: function(response) {
                                console.log(response);

                                window.location.reload();
                            },
                            error: function(error) {
                                console.log("error" + error);
                            }
                        });

                    }
                });

            });


            /////// delete My Expertise badge image ///////
            $(document).on('click', '.del_badge_img', function() {

                const current_pointer = $(this);

                var ID = $(current_pointer).attr("data-id");
                var FIELD_NAME = $(current_pointer).attr("data-field-name");

                Swal.fire({
                    title: "Do you want to delete?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {


                        let url = "{{ route('post_del_badge_img') }}";


                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            url: `${url}`,
                            method: "POST",
                            contentType: "application/json; charset=utf-8",
                            traditional: true,
                            data: JSON.stringify({
                                id: ID,
                                field_name: FIELD_NAME
                            }),
                            success: function(response) {
                                console.log(response);

                                window.location.reload();
                            },
                            error: function(error) {
                                console.log("error" + error);
                            }
                        });

                    }
                });

            });


        })
    </script>
@endsection
