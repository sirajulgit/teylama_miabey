@extends('user.layout.auth_layout')

@section('content')
    <header>
        <div class="top-cover d-flex align-items-center justify-content-between">
          <a href="{{ url()->previous() }}">
<button class="btn-back-frw"> <i class="bi bi-chevron-left"></i> </button>
</a>
            <strong class="center-heading">Payment QR Code</strong>
            <strong> </strong>
        </div>
    </header>

    <main class="home-content">
        <div class="container-fluid">
            <div class="price-part pt-3 pb-3">
                <img src="{{ $data['payment_qr_code_img'] }}" alt="QR Code" class="img-fluid mb-3">

                <p class="mb-5">Payment QR Code: <span style="word-break: break-word;"> {{ $data['payment_qr_code'] }} </span> </p>

                <a href="{{route('user_dashboard')}}" class="btn btn-primary" style="color:#fff;">Back to Dashboard</a>

            </div>
        </div>
    </main>

@endsection
