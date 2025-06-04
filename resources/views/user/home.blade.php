@extends('user.layout.guest_layout')


@section('content')
<div class="banner-area position-relative">
  <img src="{{ asset('asset/frontend/images/banner.png')}}">
  <div class="home-banner-content">
    <img src="{{ asset('asset/frontend/images/hello-i-am.png')}}">
    <h1> Teylama Miabey  </h1>
    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum, metus nec lobortis gravida, sapien eros scelerisque quam. </p>
  </div>
 </div>

@endsection

