@extends('user.layout.guest_layout')


@section('content')
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


    <div class="space-section mt-5 pt-4 pb-4 mb-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="details-contact">
                        <h3 class="heading-contact mb-4">Contact Us</h3>

                        <div class="foot-description d-flex align-items-center mb-3">
                            <span class="round-icon"> <i class="bi bi-geo-alt"></i> </span>
                            <div>
                                <b>Our Location</b>
                                {!! $data['contact_data']['address'] !!}
                            </div>
                        </div>

                        <div class="foot-description d-flex align-items-center mb-3">
                            <span class="round-icon"> <i class="bi bi-telephone"></i> </span>
                            <div>
                                <p> {{ $data['contact_data']['phone'] }} </p>
                            </div>
                        </div>

                        <div class="foot-description d-flex align-items-center mb-3">
                            <span class="round-icon"> <i class="bi bi-envelope"></i> </span>
                            <div>
                                <p> {{ $data['contact_data']['email'] }} </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="contact-form">
                        <div class="mb-4">
                            <h3 class="heading"> Get A Quote</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control mb-3" type="text" placeholder="Name">
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control mb-3" type="text" placeholder="Email">
                            </div>
                            <div class="col-lg-12">
                                <input class="form-control mb-3" type="text" placeholder="Phone Number">
                            </div>
                            <div class="col-lg-12">
                                <textarea class="form-control mb-3" placeholder="Message" rows="5"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <input class="submit-btn" type="submit" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection
