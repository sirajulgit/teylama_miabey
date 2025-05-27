@extends('user.layout.auth_layout')


@section('content')
    <div class="edit-profile-banner pt-3 p-3">
        <div class="top-details d-flex align-items-center justify-content-between">
            <div class="left-details d-flex align-items-center">
                <div class="client-image">
                    <img src="{{ asset('asset/frontend/images/call-us.jpg') }}" alt="">
                </div>
                <div>

                    <strong class="profile-name">{{auth()->user()->username}}</strong>
                </div>
            </div>

            <div class="right-details-balance text-end">
                <p>Balance</p>
                <strong> <i class="bi bi-currency-rupee"></i> 0.00 </strong>
            </div>

        </div>
    </div>



    <main class="home-content">
        <div class="container-fluid">




        </div>
    </main>

@endsection
