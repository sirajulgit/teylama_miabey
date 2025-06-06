@extends('user.layout.guest_layout')


@section('content')

 <div class="banner-area position-relative">
<div class="banner-slide">

    @foreach ($bannerdata as $item)
  <div>
    <img src="{{ $item->image }}">
  </div>
   @endforeach

</div>
@foreach ($bannerdata as $item)
  @if ($item->id == 1)
  <div class="home-banner-content">

          <img data-aos="fade-right" data-aos-duration="2000" src="{{ asset('asset/frontend/images/hello-i-am.png')}}">
    <h1 data-aos="fade-right" data-aos-duration="2000"> {{ $item->title_1 }}  </h1>
    <p data-aos="fade-right" data-aos-duration="2000"> {{ $item->details }}</p>


  </div>
   @endif
  @endforeach
 </div>



 <div class="about-miabey pt-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="about-image position-relative" data-aos="fade-right" data-aos-duration="1000">
          <img src="{{ $homedata['about']['image_1']}}" alt="">
          <div class="ab-img-2">
            <img src="{{ $homedata['about']['image_2']}}">
          </div>

          <div class="about-image-content d-flex align-items-center">
            <div class="text-center pe-2">
             {!! $homedata['about']['image_1_text_1']!!}
            </div>
            <div class="small-text-about">
             {!! $homedata['about']['image_1_text_2']!!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 ">
        <div class="about-content-right ps-lg-5 ms-lg-5" data-aos="fade-left" data-aos-duration="1000">
          <h2>{!! $homedata['about']['head_title'] !!}</h2>
          {!! $homedata['about']['content'] !!}

          <div class="about-poinnt mt-5">
            <ul class="d-flex flex-wrap">
              <li>
                <img src="{{ asset('asset/frontend/images/point-icon-1.png')}}">
                <p> Professor </p>
              </li>
              <li>
                <img src="{{ asset('asset/frontend/images/point-icon-2.png')}}">
                <p> Activities </p>
              </li>
              <li>
                <img src="{{ asset('asset/frontend/images/point-icon-3.png')}}">
                <p> Politician </p>
              </li>
            </ul>
          </div>

          <div class="signature-area d-flex align-items-center">
            <img src="{{ asset('asset/frontend/images/rounded-client.png')}}">
            <img src="{{ asset('asset/frontend/images/signature.png')}}">
          </div>

        </div>

      </div>
    </div>
  </div>
 </div>

 <div class="what-we-do" data-aos="fade-up" data-aos-duration="1500">
  <div class="container">
      <div class="about-content-right">
        {!! $homedata['what_we_do']['head_title'] !!}
      </div>

      <div class="middle-text d-flex align-items-sm-start pt-4 pb-5">
       {!! $homedata['what_we_do']['title_1'] !!}
        {!! $homedata['what_we_do']['content'] !!}
      </div>

      <div class="tab-area">

        <div class="d-flex align-items-start">
          <div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <div>
  @if (count($homedata['what_we_do']['badge_data']) > 0)
                                            @foreach ($homedata['what_we_do']['badge_data'] as $index => $item)
              <button class="nav-link text-start  @if ($index == 0) active @endif" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{$item['id']}}" type="button" role="tab" aria-controls="v-pills-{{$item['id']}}" aria-selected="true">0{{$index + 1}}. {{$item['badge_text_1']}}</button>
              @endforeach
              @endif

            </div>
            <div class="button-join">
            <a href="">Join Our Team <i class="bi bi-arrow-right"></i> </a>
          </div>
          </div>
        <div class="tab-content" id="v-pills-tabContent">
 @foreach ($homedata['what_we_do']['badge_data'] as $index => $item)
        <div class="tab-pane fade show @if ($index == 0) active @endif" id="v-pills-{{$item['id']}}" role="tabpanel" aria-labelledby="v-pills-{{$item['id']}}-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="tab-content-area">
                  <img src="{{ $item['badge_icon_1']}}">
                  <h3>{{ $item['badge_title_1']}}</h3>
                  <p> {{ $item['badge_details_1']}}</p>
              </div>
              </div>
               <div class="col-lg-6">
                <img src=" {{ $item['badge_image_1']}}">
              </div>
          </div>
        </div>
         @endforeach

        </div>
        </div>

      </div>

  </div>
 </div>

 <div class="video-sec mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-lg-7">
        <div class="video-area" data-aos="fade-right" data-aos-duration="1000">
          <iframe width="100%" height="480" src="https://www.youtube.com/embed/gErbKpIozNE?si=mLiatg3nJPeLTv4F" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="video-content ps-lg-5" data-aos="fade-left" data-aos-duration="1000">
          <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </h3>
          <p> Vivamus pulvinar eu sapien non dignissim. Mauris vel libero pharetra sapien volutpat aliquet. Maecenas vulputate felis felis, sit amet malesuada justo scelerisque a. </p>

          <div class="watch-video mt-5">
            <a href="">
              <i class="bi bi-play-circle-fill"></i>
              <img src="{{ asset('asset/frontend/images/Watch-the-video.png')}}">
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>
 </div>

 <div class="congo-president" data-aos="fade-up" data-aos-duration="1500">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="congo-text">
          <h3>Congo President</h3>
          <p>Congo President Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar eu sapien non dignissim. Mauris vel libero pharetra sapien volutpat aliquet. </p>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="congo-image">
        <img src="{{ asset('asset/frontend/images/congo-president-image.png')}}">
        </div>
      </div>

    </div>
  </div>
 </div>



 <div class="grid-gallery" data-aos="fade-up" data-aos-duration="1500">
  <div class="container">

    <div class="about-content-right text-center mb-5">
        <h2>Our <strong>Gallery</strong></h2>
      </div>

    <div class="grid-container">
      <div class="item1">
        <img src="{{ asset('asset/frontend/images/gallery-1.png')}}">
      </div>
      <div class="item2">
        <img src="{{ asset('asset/frontend/images/gallery-2.png')}}">
      </div>
      <div class="item3">
        <img src="{{ asset('asset/frontend/images/gallery-3.png')}}">
      </div>
      <div class="item4">
        <img src="{{ asset('asset/frontend/images/gallery-4.png')}}">
      </div>
      <div class="item5">
        <img src="{{ asset('asset/frontend/images/gallery-5.png')}}">
      </div>
    </div>
  </div>
 </div>


  <!-- Gallery -->
  <!-- <div class="gallerys tz-gallery">
  <div id="image" class="tabcontent">
    <div class="row no-gutters">
      <div class="col-lg-3 col-md-3 col-sm-6 col-12">
        <div class="gallery-holder">
          <img src="images/gallery-empty.png" alt="empty">
          <div class="holder" style="background: url(images/gallery1.png);">
            <div class="capson">
              <a class="lightbox" href="images/gallery1.png">
              <i class="fa fa-search" ></i>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->


<div class="blog-area mb-5 pb-5">
  <div class="container">
    <div class="about-content-right text-center mb-5 pb-4">
      <h2> <strong>Recent Blogs</strong> & <strong>Updates</strong></h2>
    </div>

    <div class="row">

      <div class="col-lg-4">
        <div class="blog-card">
          <div class="blog-image">
            <img src="{{ asset('asset/frontend/images/blog-1.png')}}">
          </div>
          <div class="blog-content">
          <span class="date-blog"><i class="bi bi-calendar-check-fill"></i> May 24, 2023 </span>
          <h4> Maecenas sollicitudin molestie lorem ac fringilla. </h4>
          <p>Choosing the right builder is crucial for the success of your construction...</p>
          </div>
          <div class="readmore-btn">
            <a href=""> Read More <i class="bi bi-arrow-right"></i> </a>
          </div>
        </div>
      </div>

       <div class="col-lg-4">
        <div class="blog-card">
          <div class="blog-image">
            <img src="{{ asset('asset/frontend/images/blog-2.png')}}">
          </div>
          <div class="blog-content">
          <span class="date-blog"><i class="bi bi-calendar-check-fill"></i> May 24, 2023 </span>
          <h4> Maecenas sollicitudin molestie lorem ac fringilla. </h4>
          <p>Choosing the right builder is crucial for the success of your construction...</p>
          </div>
          <div class="readmore-btn">
            <a href=""> Read More <i class="bi bi-arrow-right"></i> </a>
          </div>
        </div>
      </div>

       <div class="col-lg-4">
        <div class="blog-card">
          <div class="blog-image">
            <img src="{{ asset('asset/frontend/images/blog-3.png')}}">
          </div>
          <div class="blog-content">
          <span class="date-blog"><i class="bi bi-calendar-check-fill"></i> May 24, 2023 </span>
          <h4> Maecenas sollicitudin molestie lorem ac fringilla. </h4>
          <p>Choosing the right builder is crucial for the success of your construction...</p>
          </div>
          <div class="readmore-btn">
            <a href=""> Read More <i class="bi bi-arrow-right"></i> </a>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>


@endsection

