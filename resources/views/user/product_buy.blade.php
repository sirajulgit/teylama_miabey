@extends('user.layout.auth_layout')

@section('content')
    <header>
        <div class="top-cover d-flex align-items-center justify-content-between">
            <a href="{{ url()->previous() }}">
<button class="btn-back-frw"> <i class="bi bi-chevron-left"></i> </button>
</a>

            <strong class="center-heading">Buy</strong>
            <strong> </strong>
        </div>
    </header>

    <main class="home-content">
        <div class="container-fluid p-0">
            <div class="product-title">
                <h3> Product Title: {{ $data['product_title'] }} </h3>
            </div>
        </div>

        <div class="container-fluid">
            <div class="price-part pt-3 pb-3">
                <p>Contract unit price: <span id="unit-price"> {{ $data['product_amount'] }} </span>
                    {{ $data['product_currency'] }} </p>

                <label class="mb-2">Buy shares</label>
                <div class="d-flex align-items-center price-inc-part mb-2">
                    <input id="share-input" class="form-control ctrl-wid-price" type="number" placeholder="0"
                        value="1" min="1">
                    <span class="ms-2 me-2">Share</span>
                    <div class="inc-dec-btn">
                        <button id="decrease-btn" class="ms-2 me-2" type="button"> - </button>
                        <button id="increase-btn" class="ms-2 me-2" type="button"> + </button>
                    </div>
                </div>

                <div class="text-end total-width-price">
                    <p>Total: <span id="total-amount"> {{ $data['product_amount'] }} </span> {{ $data['product_currency'] }}
                    </p>
                    <p>= <span id="total-inr"> {{ number_format($data['product_amount'] * 100, 2) }} </span> INR </p>
                </div>
            </div>
        </div>

        <div class="container-fluid p-0">
            <div class="payment-title">
                <h3> Payment Method </h3>
            </div>
        </div>




        <div class="container-fluid p-0">
            <div class="mode-payment-title d-flex justify-content-between align-items-center">
                <p> please select mode of payment</p>
                <i class="bi bi-chevron-right"></i>
            </div>

            <div id="payment-options" class="container-fluid p-3" style="display: none;">
                @foreach ($data['crypto_app_list'] as $item)
                    <div class="form-check d-flex align-items-center mb-2">
                        <input class="form-check-input me-2" type="radio" name="payment_method" id="{{ $item['name'] }}"
                            value="{{ $item['id'] }}">
                        <label class="form-check-label d-flex align-items-center" for="{{ $item['name'] }}">
                            <img src="{{ $item['brand_image_url'] }}" alt="{{ $item['name'] }}"
                                style="width: 40px; height: 40px;" class="me-2">
                            {{ $item['name'] }}
                        </label>
                    </div>
                @endforeach
            </div>

            {{-- <div id="payment-options" class="container-fluid p-3" style="display: none;">
                <div class="form-check d-flex align-items-center mb-2">
                    <input class="form-check-input me-2" type="radio" name="payment_method" id="usdt" value="usdt">
                    <label class="form-check-label d-flex align-items-center" for="usdt">
                        <img src="{{ asset('asset/frontend/images/Bitget.svg') }}" alt="USDT"
                            style="width: 40px; height: 40px;" class="me-2">
                        Bitget
                    </label>
                </div>

                <div class="form-check d-flex align-items-center mb-2">
                    <input class="form-check-input me-2" type="radio" name="payment_method" id="bank" value="bank">
                    <label class="form-check-label d-flex align-items-center" for="bank">
                        <img src="{{ asset('asset/frontend/images/binance.svg') }}" alt="Bank"
                            style="width: 40px; height: 40px;" class="me-2">
                        Binance
                    </label>
                </div>

                <div class="form-check d-flex align-items-center mb-2">
                    <input class="form-check-input me-2" type="radio" name="payment_method" id="card" value="card">
                    <label class="form-check-label d-flex align-items-center" for="card">
                        <img src="{{ asset('asset/frontend/images/bybit.svg') }}" alt="Card"
                            style="width: 40px; height: 40px;" class="me-2">
                        Bybit
                    </label>
                </div>

                <div class="form-check d-flex align-items-center mb-2">
                    <input class="form-check-input me-2" type="radio" name="payment_method" id="card" value="card">
                    <label class="form-check-label d-flex align-items-center" for="card">
                        <img src="{{ asset('asset/frontend/images/htx.svg') }}" alt="Card"
                            style="width: 40px; height: 40px;" class="me-2">
                        HTX
                    </label>
                </div>
            </div> --}}
        </div>
        <input type="hidden" id="product-id" value="{{ $data['product_id'] }}">
        <div class="mt-4">

            <input type="button" id="make-payment-btn" class="submit-btn" value="Make Payment" />

        </div>
    </main>
@endsection

@section('script_content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const unitPrice = parseFloat(document.getElementById('unit-price').innerText);
            const inrRate = {{ $data['currency_value'] }}; // Assume 1 USDT = 100 INR (adjust if needed)
            const shareInput = document.getElementById('share-input');
            const totalAmount = document.getElementById('total-amount');
            const totalINR = document.getElementById('total-inr');
            const btnIncrease = document.getElementById('increase-btn');
            const btnDecrease = document.getElementById('decrease-btn');

            function updateTotals() {
                let shares = parseInt(shareInput.value) || 0;
                shares = shares < 1 ? 1 : shares;
                shareInput.value = shares;

                const total = (unitPrice * shares).toFixed(2);
                const totalINRValue = (total * inrRate).toFixed(2);

                totalAmount.innerText = total;
                totalINR.innerText = totalINRValue;
            }

            btnIncrease.addEventListener('click', () => {
                shareInput.value = parseInt(shareInput.value || 0) + 1;
                updateTotals();
            });

            btnDecrease.addEventListener('click', () => {
                shareInput.value = Math.max(1, parseInt(shareInput.value || 1) - 1);
                updateTotals();
            });

            shareInput.addEventListener('input', updateTotals);
            updateTotals(); // Initial call
        });

        const modePaymentTitle = document.querySelector('.mode-payment-title');
        const paymentOptions = document.getElementById('payment-options');

        modePaymentTitle.addEventListener('click', function() {
            if (paymentOptions.style.display === 'none') {
                paymentOptions.style.display = 'block';
            } else {
                paymentOptions.style.display = 'none';
            }
        });

        // 💳 AJAX Payment Submission

        $('#make-payment-btn').on('click', function() {
            const qnty = $('#share-input').val();
            const crypto_app_id = $('input[name="payment_method"]:checked').val();
            const productId = $('#product-id').val();

            if (!crypto_app_id) {
                alert("Please select a payment method.");
                return;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ route('user_account.make_payment') }}",
                type: 'POST',
                data: {
                    product_id: productId,
                    qnty: qnty,
                    crypto_app_id: crypto_app_id,
                },
                success: function(response) {
                    response = JSON.parse(response);
                    // console.log(response);
                    // Optional: redirect or show success message
                    //alert(response.message);
                    // window.location.href = response.redirect_url;

                    window.location.href = "{{ route('user_account.payment_qr_generate', '__ID__') }}"
                        .replace('__ID__', response.purchase_request_id);

                },
                error: function(xhr) {
                    alert("Payment failed: " + xhr.responseJSON?.message || "Unknown error.");
                }
            });
        });
    </script>
@endsection
