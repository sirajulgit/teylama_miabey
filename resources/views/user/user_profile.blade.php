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
                <strong>  {{auth()->user()->wallet_bal}} USDT</strong>
            </div>

        </div>
    </div>

    {{-- <div class="progress-area text-center p-2">
        <p>Progress 0% > </p>
        <div class="bar-area d-flex align-items-center justify-content-between">
            <p>V0</p>
            <div class="progress w-100">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>V1</p>
        </div>
        <p> Still Need to buy <span>10.00</span> USDT Can be promoted to VIP1 </p>

    </div> --}}


    <main class="home-content">
        <div class="container-fluid">

            <div class="changes-profile-details mt-3">
                <ul class="mb-3">


                    <a href="{{ route('user_account.change_password') }}">
                    <li class="d-flex align-items-center justify-content-between">Change Payment Password <i
                            class="bi bi-chevron-right"></i></li>
                    </a>
                     <a href="{{ route('user_account.withdrawl') }}"><li class="d-flex align-items-center justify-content-between">Withdrawal <i
                            class="bi bi-chevron-right"></i></li></a>

                      <a href="{{ route('user_account.transaction_history') }}">
                    <li class="d-flex align-items-center justify-content-between">Transaction Record <i
                            class="bi bi-chevron-right"></i></li>
                    </a>
                    <a href="{{ route('user_account.purchase_history') }}"><li class="d-flex align-items-center justify-content-between"> Purchase History <i
                            class="bi bi-chevron-right"></i></li></a>
                </ul>

                <ul class="mb-3">
                    <li class="d-flex align-items-center justify-content-between">Agency Center <i
                            class="bi bi-chevron-right"></i></li>
                    <li class="d-flex align-items-center justify-content-between"> Agency Promotion <i
                            class="bi bi-chevron-right"></i></li>

                </ul>

                <ul class="mb-3">
                    <li class="d-flex align-items-center justify-content-between"> Digital Currency Purchase Tutorial <i
                            class="bi bi-chevron-right"></i></li>
                    <li class="d-flex align-items-center justify-content-between"> Download APP <i
                            class="bi bi-chevron-right"></i></li>

                </ul>

                <ul class="mb-3">
                    <li class="d-flex align-items-center justify-content-between" id="user_logout">Logout</li>
                </ul>

            </div>


        </div>
    </main>

@endsection
