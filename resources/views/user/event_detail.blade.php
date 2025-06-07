@extends('user.layout.guest_layout')


@section('content')
    {{-- ############# | EVENT IMAGE | ############# --}}
    <div class="banner-area position-relative">
        @if ($data['event_data']['image'])
            <div class="inner-banner">
                <div>
                    <img src="{{ asset($data['event_data']['image']) }}" alt="">
                </div>
            </div>
        @endif
        <div class="home-banner-content">
            <h1 data-aos="fade-right" data-aos-duration="2000"> {{ $data['event_data']['title'] }} </h1>
        </div>
    </div>



    {{-- ############# | EVENT DETAILS | ############# --}}
    <div class="details-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <h1 class="date-blog">
                        <i class="bi bi-calendar-check-fill"></i>
                        {{ \Carbon\Carbon::parse($data['event_data']['start_date'])->format('F d, Y h:i A') }}
                        -
                        {{ \Carbon\Carbon::parse($data['event_data']['end_date'])->format('F d, Y h:i A') }}
                    </h1>
                </div>
                <div class="col-lg-12">
                    <div class="details-content-area">
                        {!! $data['event_data']['long_description'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
