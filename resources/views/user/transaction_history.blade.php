@extends('user.layout.auth_layout')


@section('content')

<header>

<div class="top-cover d-flex align-items-center justify-content-between">

<a href="{{ url()->previous() }}">
<button class="btn-back-frw"> <i class="bi bi-chevron-left"></i> </button>
</a>

 <strong class="center-heading">Transaction History</strong>
 <strong> </strong>

</header>
    <main class="home-content">

  <div class="container-fluid">

    <div class="account-tab mt-2">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
      <button class="nav-link active" id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button" role="tab" aria-controls="pills-today" aria-selected="true"> Today </button>
      </li>
      <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-last-day-tab" data-bs-toggle="pill" data-bs-target="#pills-last-day" type="button" role="tab" aria-controls="pills-last-day" aria-selected="false"> Last 7 days </button>
      </li>

      <li class="nav-item" role="presentation">
      <button class="nav-link" id="one-month-tab" data-bs-toggle="pill" data-bs-target="#one-month" type="button" role="tab" aria-controls="one-month" aria-selected="false"> Nearly 30 days </button>
      </li>


    </ul>

    <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-today" role="tabpanel" aria-labelledby="pills-upi-tab">


       @foreach ($data['transdata_today'] as $item)
                            <div class="tra-list p-3 d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span>Buy</span>
                                    <div class="pay-info">
                                        <b>{{ $item->title }}</b>
                                        <p>{{ $item->created_at }}</p>
                                    </div>
                                </div>
                                <div class="hist-amount text-end">
                                    <strong>{{ $item->amount }} USDT</strong>
                                    <p>{{ $item->platform }}</p>
                                </div>
                            </div>
                         @endforeach




    </div>
    <div class="tab-pane fade" id="pills-last-day" role="tabpanel" aria-labelledby="pills-last-day-tab-tab">

       @foreach ($data['transdata_7'] as $item)
                            <div class="tra-list p-3 d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span>Buy</span>
                                    <div class="pay-info">
                                        <b>{{ $item->title }}</b>
                                        <p>{{ $item->created_at }}</p>
                                    </div>
                                </div>
                                <div class="hist-amount text-end">
                                    <strong>{{ $item->amount }} USDT</strong>
                                    <p>{{ $item->platform }}</p>
                                </div>
                            </div>
                         @endforeach


    </div>
    <div class="tab-pane fade" id="one-month" role="tabpanel" aria-labelledby="one-month-tab">

       @foreach ($data['transdata_30'] as $item)
                            <div class="tra-list p-3 d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span>Buy</span>
                                    <div class="pay-info">
                                        <b>{{ $item->title }}</b>
                                        <p>{{ $item->created_at }}</p>
                                    </div>
                                </div>
                                <div class="hist-amount text-end">
                                    <strong>{{ $item->amount }} USDT</strong>
                                    <p>{{ $item->platform }}</p>
                                </div>
                            </div>
                         @endforeach





    </div>

    </div>

    </div>


  </div>


</main>

@endsection
