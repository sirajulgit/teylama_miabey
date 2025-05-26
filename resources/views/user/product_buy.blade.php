@extends('user.layout.auth_layout')

@section('content')

<header>
  <div class="top-cover d-flex align-items-center justify-content-between">
    <button class="btn-back-frw"> <i class="bi bi-chevron-left"></i> </button>
    <strong class="center-heading">Buy</strong>
    <strong> </strong>
  </div>
</header>

<main class="home-content">
  <div class="container-fluid p-0">
    <div class="product-title">
      <h3> Product Title: {{$product_title}} </h3>
    </div>
  </div>

  <div class="container-fluid">
    <div class="price-part pt-3 pb-3">
      <p>Contract unit price: <span id="unit-price"> {{$product_amount}} </span> {{$product_currency}} </p>

      <label class="mb-2">Buy shares</label>
      <div class="d-flex align-items-center price-inc-part mb-2">
        <input id="share-input" class="form-control ctrl-wid-price" type="number" placeholder="0" value="1" min="1">
        <span class="ms-2 me-2">Share</span>
        <div class="inc-dec-btn">
          <button id="decrease-btn" class="ms-2 me-2" type="button"> - </button>
          <button id="increase-btn" class="ms-2 me-2" type="button"> + </button>
        </div>
      </div>

      <div class="text-end total-width-price">
        <p>Total: <span id="total-amount"> {{$product_amount}} </span> {{$product_currency}} </p>
        <p>= <span id="total-inr"> {{ number_format($product_amount * 100, 2) }} </span> INR </p>
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
  </div>
</main>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const unitPrice = parseFloat(document.getElementById('unit-price').innerText);
    const inrRate = {{ $currency_value }}; // Assume 1 USDT = 100 INR (adjust if needed)
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
</script>

@endsection
