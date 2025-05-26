@extends('user.layout.auth_layout')

@section('content')
    {{-- +++++++++++++++++ | Header | +++++++++++++++++ --}}
    @include('user.common.header')


    <main class="home-content">
        <div class="container-fluid">
            <div class="banner pt-3">
                <div class="banner-slider m-0">
                     @foreach ($banner as $item)
                    <div class="rounded-3 overflow-hidden"><img src="{{ $item->image }}"></div>
                     @endforeach
                </div>
            </div>

            <div class="mt-3">
                <div class="how-buy d-flex align-items-center justify-content-between">
                    <span> <i class="bi bi-question-circle-fill"></i> How to buy USDT?</span>
                    <a href="digital-currency-purchase-tutorial.html"></a><button class="video-btn">Video tutorial <i
                            class="bi bi-chevron-right"></i> </button>
                </div>
            </div>





            <div class="link-area w-100 pt-3 pb-3">

                <div class="product-slider">
                    <div class="text-center">
                        <img src="{{ asset('asset/frontend/images/Bitget.svg') }}">
                        <p>Bitget</p>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('asset/frontend/images/binance.svg') }}">
                        <p>Binance</p>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('asset/frontend/images/bybit.svg') }}">
                        <p>Bybit</p>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('asset/frontend/images/htx.svg') }}">
                        <p>HTX</p>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('asset/frontend/images/Bitget.svg') }}">
                        <p>Bitget</p>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('asset/frontend/images/binance.svg') }}">
                        <p>Binance</p>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('asset/frontend/images/bybit.svg') }}">
                        <p>Bybit</p>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('asset/frontend/images/htx.svg') }}">
                        <p>HTX</p>
                    </div>


                </div>

            </div>


            <div class="price-list mb-2">
                <p>withdraw money immediately after purchase</p>
                <a href="buy.html">
                    <div class="middle-price d-flex justify-content-between">
                        <div class="left-price">
                            <div class="d-flex justify-content-between pb-2">
                                <strong>25%</strong>
                                <strong> Buy </strong>
                            </div>
                            <p>Within 48 Hours, Can Withdraw </p>
                        </div>
                        <div class="right-price text-end">
                            <span>10 USDT</span><br>
                            <span class="small-price">1,000 INR </span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="price-list mb-2">
                <p>withdraw money immediately after purchase</p>
                <a href="buy.html">
                    <div class="middle-price d-flex justify-content-between">
                        <div class="left-price">
                            <div class="d-flex justify-content-between pb-2">
                                <strong>25%</strong>
                                <strong> Buy </strong>
                            </div>
                            <p>Within 48 Hours, Can Withdraw </p>
                        </div>
                        <div class="right-price text-end">
                            <span>20 USDT</span><br>
                            <span class="small-price">2,000 INR </span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="price-list mb-2">
                <p>withdraw money immediately after purchase</p>
                <div class="middle-price d-flex justify-content-between">
                    <div class="left-price">
                        <div class="d-flex justify-content-between pb-2">
                            <strong>25%</strong>
                            <strong> Buy </strong>
                        </div>
                        <p>Within 48 Hours, Can Withdraw </p>
                    </div>
                    <div class="right-price text-end">
                        <span>30 USDT</span><br>
                        <span class="small-price">3,000 INR </span>
                    </div>
                </div>
            </div>

            <div class="price-list mb-2">
                <p>withdraw money immediately after purchase</p>
                <div class="middle-price d-flex justify-content-between">
                    <div class="left-price">
                        <div class="d-flex justify-content-between pb-2">
                            <strong>25%</strong>
                            <strong> Buy </strong>
                        </div>
                        <p>Within 48 Hours, Can Withdraw </p>
                    </div>
                    <div class="right-price text-end">
                        <span>40 USDT</span><br>
                        <span class="small-price">4,000 INR </span>
                    </div>
                </div>
            </div>

            <div class="price-list mb-2">
                <p>withdraw money immediately after purchase</p>
                <div class="middle-price d-flex justify-content-between">
                    <div class="left-price">
                        <div class="d-flex justify-content-between pb-2">
                            <strong>25%</strong>
                            <strong> Buy </strong>
                        </div>
                        <p>Within 48 Hours, Can Withdraw </p>
                    </div>
                    <div class="right-price text-end">
                        <span>50 USDT</span><br>
                        <span class="small-price">5,000 INR </span>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
