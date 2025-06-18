@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                {{-- /////////////// section_1 /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header" style="background-color: #3498db;">
                            <h3 class="card-title badge badge-success font-weight-bold ">Section 1</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="section_1_form" action="{{ route('post_cms_about') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="id" value="{{ $items['section_1']['id'] }}" />

                            <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="content">Details</label>
                                    <textarea id="content1" name="content" class="form-control" rows="5">{{ $items['section_1']['content'] }}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="title_1_1">Sub Details</label>
                                    <textarea id="title_1_1" name="title_1" class="form-control" rows="5">{{ $items['section_1']['title_1'] }}</textarea>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="image">Image 1</label>

                                    <div class="admin_upload">
                                        <label class="admin-upload-wrap">
                                            <input type="file" class="form-control mt-3 uploadFile" name="image_1"
                                                id="image_1_section_1"
                                                accept="image/png, image/jpg, image/jpeg, image/webp">
                                        </label>

                                        <div class="profile_image">
                                            @if ($items['section_1']['image_1'])
                                                <img class="profile_img" id="thumbnail_show_image_1_section_1"
                                                    src="{{ $items['section_1']['image_1'] }}" width="148px"
                                                    height="221px">
                                            @else
                                                <img class="profile_img" id="thumbnail_show_image_1_section_1"
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

                {{-- /////////////// section_2 /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header" style="background-color: #3498db;">
                            <h3 class="card-title badge badge-success font-weight-bold ">Section 2</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="section_2_form" action="{{ route('post_cms_about') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="id" value="{{ $items['section_2']['id'] }}" />

                            <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="title_1_2">Sub Details</label>
                                    <textarea id="title_1_2" name="title_1" class="form-control" rows="5">{{ $items['section_2']['title_1'] }}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="content2">Details</label>
                                    <textarea id="content2" name="content" class="form-control" rows="5">{{ $items['section_2']['content'] }}</textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="image">Image 1</label>

                                    <div class="admin_upload">
                                        <label class="admin-upload-wrap">
                                            <input type="file" class="form-control mt-3 uploadFile" name="image_1"
                                                id="image_1_section_2"
                                                accept="image/png, image/jpg, image/jpeg, image/webp">
                                        </label>

                                        <div class="profile_image">
                                            @if ($items['section_2']['image_1'])
                                                <img class="profile_img" id="thumbnail_show_image_1_section_2"
                                                    src="{{ $items['section_2']['image_1'] }}" width="148px"
                                                    height="221px">
                                            @else
                                                <img class="profile_img" id="thumbnail_show_image_1_section_2"
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

                {{-- /////////////// activities_section /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header" style="background-color: #3498db;">
                            <h3 class="card-title badge badge-success font-weight-bold ">Activities</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="activities_section_form" action="{{ route('post_cms_about') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $items['activities_section']['id'] }}" />

                            <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="head_title_3">Head Title</label>
                                    <textarea id="head_title_3" name="head_title" class="form-control" rows="5">{{ $items['activities_section']['head_title'] }}</textarea>
                                </div>


                                {{-- image 1 --}}
                                <div class="multi_choice_sections" style="margin-left: 20px;">
                                    <div class="form-group col-md-12">
                                        <label for="badge_1_text_3">Image 1 Title</label>
                                        <textarea id="badge_1_text_3" name="badge_1_text" class="form-control" rows="5">{{ $items['activities_section']['badge_1_text'] }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="image_1_text_1_3">Image 1 Details</label>
                                        <textarea id="image_1_text_1_3" name="image_1_text_1" class="form-control" rows="5">{{ $items['activities_section']['image_1_text_1'] }}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image_1_3_activities_section">Image 1</label>

                                        <div class="admin_upload">
                                            <label class="admin-upload-wrap">
                                                <input type="file" class="form-control uploadFile" name="image_1"
                                                    id="image_1_3_activities_section"
                                                    accept="image/png, image/jpg, image/jpeg, image/webp">
                                            </label>

                                            <div class="profile_image">
                                                @if ($items['activities_section']['image_1'])
                                                    <img class="profile_img" id="preview_image_1_3_activities_section"
                                                        src="{{ $items['activities_section']['image_1'] }}"
                                                        width="148px" height="221px">
                                                @else
                                                    <img class="profile_img" id="preview_image_1_3_activities_section"
                                                        src="{{ asset('asset/images/default_image.png') }}"
                                                        width="148px" height="221px">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- image 2 --}}
                                <div class="multi_choice_sections" style="margin-left: 20px;">
                                    <div class="form-group col-md-12">
                                        <label for="badge_2_text_3">Image 2 Title</label>
                                        <textarea id="badge_2_text_3" name="badge_2_text" class="form-control" rows="5">{{ $items['activities_section']['badge_2_text'] }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="image_2_text_1_3">Image 2 Details</label>
                                        <textarea id="image_2_text_1_3" name="image_2_text_1" class="form-control" rows="5">{{ $items['activities_section']['image_2_text_1'] }}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image_2_3_activities_section">Image 2</label>

                                        <div class="admin_upload">
                                            <label class="admin-upload-wrap">
                                                <input type="file" class="form-control uploadFile" name="image_2"
                                                    id="image_2_3_activities_section"
                                                    accept="image/png, image/jpg, image/jpeg, image/webp">
                                            </label>

                                            <div class="profile_image">
                                                @if ($items['activities_section']['image_2'])
                                                    <img class="profile_img" id="preview_image_2_3_activities_section"
                                                        src="{{ $items['activities_section']['image_2'] }}"
                                                        width="148px" height="221px">
                                                @else
                                                    <img class="profile_img" id="preview_image_2_3_activities_section"
                                                        src="{{ asset('asset/images/default_image.png') }}"
                                                        width="148px" height="221px">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- image 3 --}}
                                <div class="multi_choice_sections" style="margin-left: 20px;">
                                    <div class="form-group col-md-12">
                                        <label for="badge_3_text_3">Image 3 Title</label>
                                        <textarea id="badge_3_text_3" name="badge_3_text" class="form-control" rows="5">{{ $items['activities_section']['badge_3_text'] }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="image_3_text_1_3">Image 3 Details</label>
                                        <textarea id="image_3_text_1_3" name="image_3_text_1" class="form-control" rows="5">{{ $items['activities_section']['image_3_text_1'] }}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image_3_3_activities_section">Image 3</label>

                                        <div class="admin_upload">
                                            <label class="admin-upload-wrap">
                                                <input type="file" class="form-control uploadFile" name="image_3"
                                                    id="image_3_3_activities_section"
                                                    accept="image/png, image/jpg, image/jpeg, image/webp">
                                            </label>

                                            <div class="profile_image">
                                                @if ($items['activities_section']['image_3'])
                                                    <img class="profile_img" id="preview_image_3_3_activities_section"
                                                        src="{{ $items['activities_section']['image_3'] }}"
                                                        width="148px" height="221px">
                                                @else
                                                    <img class="profile_img" id="preview_image_3_3_activities_section"
                                                        src="{{ asset('asset/images/default_image.png') }}"
                                                        width="148px" height="221px">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- image 4 --}}
                                <div class="multi_choice_sections" style="margin-left: 20px;">
                                    <div class="form-group col-md-12">
                                        <label for="badge_4_text_3">Image 4 Title</label>
                                        <textarea id="badge_4_text_3" name="badge_4_text" class="form-control" rows="5">{{ $items['activities_section']['badge_4_text'] }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="image_4_text_1_3">Image 4 Details</label>
                                        <textarea id="image_4_text_1_3" name="image_4_text_1" class="form-control" rows="5">{{ $items['activities_section']['image_4_text_1'] }}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image_4_3_activities_section">Image 4</label>

                                        <div class="admin_upload">
                                            <label class="admin-upload-wrap">
                                                <input type="file" class="form-control uploadFile" name="image_4"
                                                    id="image_4_3_activities_section"
                                                    accept="image/png, image/jpg, image/jpeg, image/webp">
                                            </label>

                                            <div class="profile_image">
                                                @if ($items['activities_section']['image_4'])
                                                    <img class="profile_img" id="preview_image_4_3_activities_section"
                                                        src="{{ $items['activities_section']['image_4'] }}"
                                                        width="148px" height="221px">
                                                @else
                                                    <img class="profile_img" id="preview_image_4_3_activities_section"
                                                        src="{{ asset('asset/images/default_image.png') }}"
                                                        width="148px" height="221px">
                                                @endif
                                            </div>
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


                {{-- /////////////// politician_section /////////////////// --}}
                <div class="col-lg-12 mb-5">
                    <div class="card">

                        <div class="card-header" style="background-color: #3498db;">
                            <h3 class="card-title badge badge-success font-weight-bold">Politician</h3>
                        </div>
                        <!-- /.card-header -->

                        <form id="politician_section_form" action="{{ route('post_cms_about') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $items['politician_section']['id'] }}" />

                            <div class="card-body row">


                                <div class="form-group col-md-12">
                                    <label for="title_1">Title</label>
                                    <textarea id="title_1_4" name="title_1" class="form-control" rows="5">{{ $items['politician_section']['title_1'] }}</textarea>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="content_4">Details</label>
                                    <textarea id="content_4" name="content" class="form-control" rows="5">{{ $items['politician_section']['content'] }}</textarea>
                                </div>

                                {{-- ######## | multi_choice_sections | ######## --}}
                                <div class="form-group col-md-12" style="display: none;">
                                    <label for="" class="mt-3 mb-3">Syllabus</label>
                                    <br>

                                    <button type="button" class="btn btn-primary mb-3" id="addInput">Add Field</button>

                                    <div id="inputContainer">
                                        @if (count($items['politician_section']['badge_data']) > 0)
                                            @foreach ($items['politician_section']['badge_data'] as $item)
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
                                                        <textarea name="old_badge_details_1[]" class="form-control badge_details_1_{{ $item['id'] }}" rows="5"
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
            $("#content1").summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'lineHeight']], // Include lineHeight here
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['height', ['height']]


                ]
            });
            $("#title_1_1").summernote({
                height: 100,
            });


            $("#content2").summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'lineHeight']], // Include lineHeight here
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['height', ['height']]


                ]
            });
            $("#title_1_2").summernote({
                height: 100,
            });



            $("#head_title_3").summernote({
                height: 100,
            });
            $("#badge_1_text_3").summernote({
                height: 100,
            });
            $("#badge_2_text_3").summernote({
                height: 100,
            });
            $("#badge_3_text_3").summernote({
                height: 100,
            });
            $("#badge_4_text_3").summernote({
                height: 100,
            });
            $("#image_1_text_1_3").summernote({
                height: 100,
            });
            $("#image_2_text_1_3").summernote({
                height: 100,
            });
            $("#image_3_text_1_3").summernote({
                height: 100,
            });
            $("#image_4_text_1_3").summernote({
                height: 100,
            });


            $("#content_4").summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'lineHeight']], // Include lineHeight here
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['height', ['height']]


                ]
            });
            $("#title_1_4").summernote({
                height: 100,
            });




            /////////////////// preview image ///////////////////
            $('#image_1_section_1').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image_1_section_1').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {
                    $('#thumbnail_show_image_1_section_1').attr('src', '/asset/images/default_image.png');
                }


            })

            $('#image_1_section_2').on('change', function() {

                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail_show_image_1_section_2').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {
                    $('#thumbnail_show_image_1_section_2').attr('src', '/asset/images/default_image.png');
                }


            })

            $("#image_1_3_activities_section").on("change", function() {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#preview_image_1_3_activities_section').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#preview_image_1_3_activities_section').attr('src',
                        '/asset/images/default_image.png');

                }
            })

            $("#image_2_3_activities_section").on("change", function() {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#preview_image_2_3_activities_section').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#preview_image_2_3_activities_section').attr('src',
                        '/asset/images/default_image.png');

                }
            })

            $("#image_3_3_activities_section").on("change", function() {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#preview_image_3_3_activities_section').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#preview_image_3_3_activities_section').attr('src',
                        '/asset/images/default_image.png');

                }
            })

            $("#image_4_3_activities_section").on("change", function() {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg" ||
                        ext == 'webp')) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#preview_image_4_3_activities_section').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#jquery_form_error_msg").text("");

                } else {

                    $('#preview_image_4_3_activities_section').attr('src',
                        '/asset/images/default_image.png');

                }
            })
            ///////////////// end preview image  ////////////////////




            ////////////// form validation ////////////////////////
            $('#section_1_form').validate({
                rules: {
                    title_1: {
                        required: true,
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
                    event.preventDefault();
                    form.submit();
                }
            });

            $('#section_2_form').validate({
                rules: {
                    title_1: {
                        required: true,
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
                    event.preventDefault();
                    form.submit();
                }
            });

            $('#activities_section').validate({
                rules: {
                    head_title: {
                        required: true,
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

            $('#politician_section_form').validate({
                rules: {
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
                    // $('#inputContainer input[type="text"]').each(function() {
                    //     if ($(this).val() == '') {
                    //         isValid = false;
                    //         $(this).addClass('is-invalid');
                    //     } else {
                    //         $(this).removeClass('is-invalid');
                    //     }
                    // });

                    ///////// dynamic textarea validate /////////////
                    // $('#inputContainer textarea').each(function() {
                    //     if ($(this).val() == '') {
                    //         isValid = false;
                    //         $(this).addClass('is-invalid');
                    //     } else {
                    //         $(this).removeClass('is-invalid');
                    //     }
                    // });


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


                    // console.log($("#politician_section").serializeArray())
                    // event.preventDefault();

                    form.submit();
                    // alert(1);
                }
            });
            ////////////// end form validation ////////////////////



            /////////////////////////



            ///////////////// dynamic add more fields (politician_section) ////////////////////////////////
            var pre_badge_count = "{{ count($items['politician_section']['badge_data']) }}";
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


                            let url = "{{ route('post_cms_about_badge_delete') }}";


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
                var badge_text_1 = $(`.badge_text_1_${badge_id}`).val() || "";
                var badge_text_2 = $(`.badge_text_2_${badge_id}`).val() || "";
                var badge_file_1 = $(`.badge_file_1_${badge_id}`)[0]?.files?.[0] ?? "";
                var badge_file_2 = $(`.badge_file_2_${badge_id}`)[0]?.files?.[0] ?? "";
                var badge_icon_1 = $(`.badge_icon_1_${badge_id}`)[0]?.files?.[0] ?? "";
                var badge_image_1 = $(`.badge_image_1_${badge_id}`)[0]?.files?.[0] ?? "";
                var badge_title_1 = $(`.badge_title_1_${badge_id}`).val() || "";
                var badge_details_1 = $(`.badge_details_1_${badge_id}`).val() || "";



                var formData = new FormData();
                formData.append('badge_id', badge_id);

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

                let url = "{{ route('post_cms_about_badge_update') }}";

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
            ///////////////// End dynamic add more fields (politician_section) ////////////////////////////



        })
    </script>
@endsection
