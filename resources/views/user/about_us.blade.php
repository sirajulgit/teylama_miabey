@extends('user.layout.guest_layout')


@section('content')
    {{-- ############# | CMS BANNER | ############# --}}
    <div class="banner-area position-relative">
        <div class="banner-slide">
            @foreach ($data['banner_data'] as $item)
                <div>
                    <img src="{{ asset($item['image']) }}">
                </div>
            @endforeach
        </div>

    </div>


    {{-- ############# | SECTION 1 | ############# --}}
    <div class="client-speak pb-5 mb-5">
        <div class="container">
            <div class="row align-items-baseline">
                <div class="col-lg-4">
                    <div class="testimo-image">
                        <img src="{{ asset($data['page_data']['section_1']['image_1']) }}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="testimo-content">
                        {!! $data['page_data']['section_1']['content'] !!}
                        <span class="mt-5">{!! $data['page_data']['section_1']['title_1'] !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- ############# | SECTION 2 | ############# --}}
    <div class="professor position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="prof-content">
                        <div class="about-content-right mb-4">
                            {!! $data['page_data']['section_2']['title_1'] !!}
                        </div>
                        {!! $data['page_data']['section_2']['content'] !!}
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="prof-image">
                        <img src="{{ asset($data['page_data']['section_2']['image_1']) }}">
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- ############# | ACTIVITIES | ############# --}}
    <div class="activities">
        <div class="container">
            <div class="about-content-right text-center mb-lg-5">
                {!! $data['page_data']['activities_section']['head_title'] !!}
            </div>

            <ul class="d-flex activities-image-list">

                {{-- item 1 --}}
                <li
                    style="background: url({{ asset($data['page_data']['activities_section']['image_1']) }}) no-repeat center;">
                    <img src="{{ asset('asset/frontend/images/activities-icon-1.png') }}">

                    <div class="activities-text">
                        {!! $data['page_data']['activities_section']['badge_1_text'] !!}
                        {!! $data['page_data']['activities_section']['image_1_text_1'] !!}
                    </div>
                </li>

                {{-- item 2 --}}
                <li
                    style="background: url({{ asset($data['page_data']['activities_section']['image_2']) }}) no-repeat center;">
                    <img src="{{ asset('asset/frontend/images/education.png') }}">

                    <div class="activities-text">
                        {!! $data['page_data']['activities_section']['badge_2_text'] !!}
                        {!! $data['page_data']['activities_section']['image_2_text_1'] !!}
                    </div>
                </li>

                {{-- item 3 --}}
                <li
                    style="background: url({{ asset($data['page_data']['activities_section']['image_3']) }}) no-repeat center;">
                    <img src="{{ asset('asset/frontend/images/Food-Nutrition.png') }}">

                    <div class="activities-text">
                        {!! $data['page_data']['activities_section']['badge_3_text'] !!}
                        {!! $data['page_data']['activities_section']['image_3_text_1'] !!}
                    </div>
                </li>

                {{-- item 4 --}}
                <li
                    style="background: url({{ asset($data['page_data']['activities_section']['image_4']) }}) no-repeat center;">
                    <img src="{{ asset('asset/frontend/images/emergency.png') }}">

                    <div class="activities-text">
                        {!! $data['page_data']['activities_section']['badge_4_text'] !!}
                        {!! $data['page_data']['activities_section']['image_4_text_1'] !!}
                    </div>
                </li>
            </ul>
        </div>
    </div>


    {{-- ############# | POLITICIAN | ############# --}}
    <div class="politician">
        <div class="container">

            <div class="politi-content">

                <div class="about-content-right">
                    {!! $data['page_data']['politician_section']['title_1'] !!}
                    {!! $data['page_data']['politician_section']['content'] !!}
                </div>

                <ul class="secgment d-flex">
                    <li>
                        <img src="{{ asset('asset/frontend/images/economy.png') }}">
                        <span>Economy</span>
                    </li>
                    <li>
                        <img src="{{ asset('asset/frontend/images/open-book.png') }}">
                        <span>Education</span>
                    </li>
                </ul>
            </div>

            <ul class="secgment d-flex justify-content-end">
                <li>
                    <img src="{{ asset('asset/frontend/images/economy.png') }}">
                    <span>Healthcare</span>
                </li>
                <li>
                    <img src="{{ asset('asset/frontend/images/tax.png') }}">
                    <span>Tax Reforms</span>
                </li>
                <li>
                    <img src="{{ asset('asset/frontend/images/sustainable.png') }}">
                    <span>Environment</span>
                </li>
                <li>
                    <img src="{{ asset('asset/frontend/images/policy.png') }}">
                    <span>Foreign Policy</span>
                </li>
            </ul>

        </div>
    </div>


    {{-- ############# | GALLERY | ############# --}}
    <div class="grid-gallery" data-aos="fade-up" data-aos-duration="1500">
        <div class="container">

            <div class="about-content-right text-center mb-5">
                <h2>Our <strong>Gallery</strong></h2>
            </div>

            <div class="grid-container">
                @foreach ($data['gallery_data'] as $item)
                    <div class="item{{ $loop->iteration }}">
                        <img src="{{ $item['image'] }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Gallery End  -->
@endsection
