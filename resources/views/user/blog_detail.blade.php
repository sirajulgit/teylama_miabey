@extends('user.layout.guest_layout')


@section('content')
    {{-- <div class="banner-area position-relative">
        <div class="inner-banner">
            <div>
                <img src="{{ asset('asset/frontend/images/banner.png') }}">
            </div>
        </div>
        <div class="home-banner-content">
            <img data-aos="fade-right" data-aos-duration="2000" src="{{ asset('asset/frontend/images/hello-i-am.png') }}">
            <h1 data-aos="fade-right" data-aos-duration="2000"> Teylama Miabey </h1>
        </div>
    </div> --}}


    {{-- ############# | BLOG IMAGE | ############# --}}
    <div class="banner-area position-relative">
        @if ($data['blog_data']['image'])
            <div class="inner-banner">
                <div>
                    <img src="{{ asset($data['blog_data']['image']) }}" alt="">
                </div>
            </div>
        @endif
        <div class="home-banner-content">
            <h1 data-aos="fade-right" data-aos-duration="2000"> {{ $data['blog_data']['title'] }} </h1>
        </div>
    </div>




    {{-- ############# | BLOG DETAILS | ############# --}}
    <div class="details-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="details-content-area">
                        {!! $data['blog_data']['long_description'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
