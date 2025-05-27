@extends('user.layout.auth_layout')

@section('content')
    <div class="banner-image mb-3">
        <img src="{{ asset('asset/frontend/images/support-image.png') }}" />
    </div>

    <main class="home-content">
        <div class="container-fluid">

            <div class="livesupport mb-3 d-flex align-items-center justify-content-between">
                <div class="common-left-part d-flex align-items-center">
                    <div class="rounded-client">
                        <img src="{{ asset('asset/frontend/images/call-us.jpg') }}">
                    </div>
                    <div class="live-content">
                        <strong> Live Support </strong>
                        <p>7x24 hours online service </p>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-white"></i>
            </div>

            <a href="https://t.me/Cryptoconvertcs" target="_blank">
            <div class="livesupport teligrame-color mb-3 d-flex align-items-center justify-content-between">
                <div class="common-left-part d-flex align-items-center">
                    <div class="rounded-client">
                        <img src="{{ asset('asset/frontend/images/teligrame.png') }}">
                    </div>
                    <div class="live-content">
                        <strong> Telegram </strong>
                        <p>7x24 hours online service </p>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-white"></i>
            </div>
            </a>


            <div class="livesupport whatsapp-color mb-3 d-flex align-items-center justify-content-between">
                <div class="common-left-part d-flex align-items-center">
                    <div class="rounded-client">
                        <img src="{{ asset('asset/frontend/images/whatsapp.jpg') }}">
                    </div>
                    <div class="live-content">
                        <strong> Whatsapp </strong>
                        <p>7x24 hours online service </p>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-white"></i>
            </div>
        </div>
    </main>
@endsection
