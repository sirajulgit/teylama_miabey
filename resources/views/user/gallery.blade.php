@extends('user.layout.guest_layout')


@section('content')

<div class="banner-area position-relative">
<div class="inner-banner">
<div>
<img src="{{ asset('asset/frontend/images/banner.png')}}">
</div>
</div>
<div class="home-banner-content">
<img data-aos="fade-right" data-aos-duration="2000" src="{{ asset('asset/frontend/images/hello-i-am.png')}}">
<h1 data-aos="fade-right" data-aos-duration="2000"> Teylama Miabey  </h1>
</div>
</div>



<div class="gallery-area mb-5">
  <div class="container">

    <div class="about-content-right text-center pb-4">
      <h2> <strong>Our Gallery</strong> </h2>
    </div>


    <div class="gallerys tz-gallery">
      <div id="image" class="tabcontent">
        <div class="row no-gutters">

          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
            <div class="gallery-holder">
              <img src="{{ asset('asset/frontend/images/rashio-gallery.png')}}" alt="empty">
              <div class="holder" style="background: url({{ asset('asset/frontend/images/gallery-1.png')}});">
                <div class="capson">
                  <a class="lightbox" href="{{ asset('asset/frontend/images/gallery-1.png')}}">
                  <i class="fa fa-search" ></i>
                </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
            <div class="gallery-holder">
              <img src="{{ asset('asset/frontend/images/rashio-gallery.png')}}" alt="empty">
              <div class="holder" style="background: url({{ asset('asset/frontend/images/gallery-2.png')}});">
                <div class="capson">
                  <a class="lightbox" href="{{ asset('asset/frontend/images/gallery-2.png')}}">
                  <i class="fa fa-search" ></i>
                </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
            <div class="gallery-holder">
              <img src="{{ asset('asset/frontend/images/rashio-gallery.png')}}" alt="empty">
              <div class="holder" style="background: url({{ asset('asset/frontend/images/gallery-3.png')}});">
                <div class="capson">
                  <a class="lightbox" href="{{ asset('asset/frontend/images/gallery-3.png')}}">
                  <i class="fa fa-search" ></i>
                </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
            <div class="gallery-holder">
              <img src="{{ asset('asset/frontend/images/rashio-gallery.png')}}" alt="empty">
              <div class="holder" style="background: url({{ asset('asset/frontend/images/gallery-4.png')}});">
                <div class="capson">
                  <a class="lightbox" href="{{ asset('asset/frontend/images/gallery-4.png')}}">
                  <i class="fa fa-search" ></i>
                </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
            <div class="gallery-holder">
              <img src="{{ asset('asset/frontend/images/rashio-gallery.png')}}" alt="empty">
              <div class="holder" style="background: url({{ asset('asset/frontend/images/gallery-5.png')}});">
                <div class="capson">
                  <a class="lightbox" href="{{ asset('asset/frontend/images/gallery-5.png')}}">
                  <i class="fa fa-search" ></i>
                </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
            <div class="gallery-holder">
              <img src="{{ asset('asset/frontend/images/rashio-gallery.png')}}" alt="empty">
              <div class="holder" style="background: url({{ asset('asset/frontend/images/gallery-4.png')}});">
                <div class="capson">
                  <a class="lightbox" href="{{ asset('asset/frontend/images/gallery-4.png')}}">
                  <i class="fa fa-search" ></i>
                </a>
                </div>
              </div>
            </div>
          </div>





        </div>
      </div>
    </div>
  </div>
</div>

@endsection

