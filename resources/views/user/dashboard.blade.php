@extends('user.layout.auth_layout')

@section('content')
    {{-- +++++++++++++++++ | Header | +++++++++++++++++ --}}
    @include('user.common.header')


    <main class="home-content">
        <div class="container-fluid">
            <div class="banner pt-3">
                <div class="banner-slider m-0">
                     @foreach ($bannerdata as $item)
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

 @foreach ($productdata as $item)
            <div class="price-list mb-2">
                <p>withdraw money immediately after purchase</p>
                <a href="{{ Route('user_account.buy_product', $item->id) }}">
                    <div class="middle-price d-flex justify-content-between">
                        <div class="left-price">
                            <div class="d-flex justify-content-between pb-2">
                                <strong>{{ $item->widthdraw_perc }}%</strong>
                                <strong> Buy </strong>
                            </div>
                            <p>Within 48 Hours, Can Withdraw </p>
                        </div>
                        <div class="right-price text-end">
                            <span>{{ $item->amount }} {{ $item->currency }}</span><br>
                            <span class="small-price">  {{ $currency_value * $item->amount}} INR</span>
                        </div>
                    </div>
                </a>
            </div>
 @endforeach


        </div>
    </main>
@endsection
