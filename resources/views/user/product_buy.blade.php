@extends('user.layout.auth_layout')

@section('content')

<header>


<div class="top-cover d-flex align-items-center justify-content-between">

<button class="btn-back-frw"> <i class="bi bi-chevron-left"></i> </button>

 <strong class="center-heading">Buy</strong>
 <strong> </strong>

</header>


<main class="home-content">

  <div class="container-fluid p-0">
    <div class="product-title">
      <h3> Product Title: {{$product_title}} </h3>
    </div>

  </div>

  <div class="container-fluid">
    <div class="price-part pt-3 pb-3">
    <p>Contract unit price: <span> {{$product_amount}} </span> {{$product_currency}} </p>


    <label class="mb-2">Buy shares</label>
    <div class="d-flex align-items-center price-inc-part mb-2">
      <input class="form-control ctrl-wid-price" type="number" placeholder="0">
      <span class="ms-2 me-2">Share</span>
      <div class="inc-dec-btn">
      <button class="ms-2 me-2"> - </button>
      <button class="ms-2 me-2"> + </button>
      </div>
    </div>

    <div class="text-end total-width-price">
    <p>Total: <span> 10.00 </span> USDT </p>
    <p> = <span> 1000.00 </span> INR </p>
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
@endsection
