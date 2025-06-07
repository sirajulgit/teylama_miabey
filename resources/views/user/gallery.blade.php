@extends('user.layout.guest_layout')


@section('content')
    {{-- ############# | CMS BANNER | ############# --}}
    <div class="banner-area position-relative">
        <div class="inner-banner">
            @foreach ($data['banner_data'] as $item)
                <div>
                    <img src="{{ asset($item['image']) }}">
                </div>
            @endforeach
        </div>
        <div class="home-banner-content">
            @foreach ($data['banner_data'] as $item)
                <img data-aos="fade-right" data-aos-duration="2000" src="{{ asset('asset/frontend/images/hello-i-am.png') }}">
                <h1 data-aos="fade-right" data-aos-duration="2000"> {{ $item['title_1'] }} </h1>
            @endforeach
        </div>
    </div>




    <div class="gallery-area mb-5">
        <div class="container">

            <div class="about-content-right text-center pb-4">
                <h2> <strong>Our Gallery</strong> </h2>
            </div>


            {{-- ############# | GALLERY | ############# --}}
            <div class="gallerys tz-gallery">
                <div id="image" class="tabcontent">
                    <div class="row no-gutters">

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                            <div class="gallery-holder">
                                <img src="{{ asset('asset/frontend/images/rashio-gallery.png') }}" alt="empty">
                                <div class="holder"
                                    style="background: url({{ asset('asset/frontend/images/gallery-1.png') }});">
                                    <div class="capson">
                                        <a class="lightbox" href="{{ asset('asset/frontend/images/gallery-1.png') }}">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($data['gallery_data'] as $item)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                                <div class="gallery-holder">
                                    <img src="{{ asset('asset/frontend/images/rashio-gallery.png') }}" alt="empty">
                                    <div class="holder" style="background: url({{ asset($item['image']) }});">
                                        <div class="capson">
                                            <a class="lightbox" href="{{ asset($item['image']) }}">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
