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



 <div class="client-speak pb-5 mb-5">
  <div class="container">
    <div class="row align-items-baseline">
      <div class="col-lg-4">
        <div class="testimo-image">
          <img src="{{ asset('asset/frontend/images/Mask group.png')}}">
        </div>
      </div>
      <div class="col-lg-8">
        <div class="testimo-content">
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar eu sapien non dignissim. Mauris vel libero pharetra sapien volutpat aliquet</p>
          <span>Teylama Miabey</span>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="professor position-relative">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="prof-content">
          <div class="about-content-right mb-4">
            <h2>  <strong>Professor</strong></h2>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar eu sapien non dignissim. Mauris vel libero pharetra sapien volutpat aliquet. Maecenas vulputate felis felis, sit amet malesuada justo scelerisque a. Pellentesque habitant morbi tristique senectus et netus et malesuada ac turpis egestas. Suspendisse faucibus diam nulla, nec dapibus lorem suscipit sed. Proin non risus mi. Nam luctus porttitor ultricies</p>
          <p> Morbi pulvinar laoreet magna non lobortis. Aenean blandit fermentum urna ac placerat. Sed ut molestie nunc. Morbi velit tellus, interdum eu placerat a, tincidunt sed elit. Donec interdum justo scelerisque, semper elit vel, congue ex. Nam pellentesque aliquam magna, </p>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="prof-image">
        <img src="{{ asset('asset/frontend/images/professor.png')}}">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="activities">
  <div class="container">
      <div class="about-content-right text-center mb-lg-5">
          <h2> <strong>Activities</strong></h2>
      </div>

      <ul class="d-flex activities-image-list">
        <li style="background: url({{ asset('asset/frontend/images/activities-image-1.png')}}) no-repeat center;">
          <img src="{{ asset('asset/frontend/images/activities-icon-1.png')}}">

          <div class="activities-text">
            <h4>Medical</h4>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar </p>
          </div>
        </li>

        <li style="background: url(images/activities-image-2.png) no-repeat center;">
          <img src="{{ asset('asset/frontend/images/education.png')}}">

          <div class="activities-text">
            <h4>Education</h4>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar </p>
          </div>
        </li>

        <li style="background: url(images/activities-image-3.png) no-repeat center;">
          <img src="{{ asset('asset/frontend/images/Food-Nutrition.png')}}">

          <div class="activities-text">
            <h4> Food & Nutrition </h4>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar  </p>
          </div>
        </li>

        <li style="background: url({{ asset('asset/frontend/images/activities-image-4.png')}}) no-repeat center;">
          <img src="{{ asset('asset/frontend/images/emergency.png')}}">

          <div class="activities-text">
            <h4> Emergency </h4>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar  </p>
          </div>
        </li>


      </ul>

  </div>
</div>

<div class="politician">
  <div class="container">

    <div class="politi-content">

      <div class="about-content-right">
          <h2 class="mb-0"> <strong>Politician</strong></h2>
          <p>How we can build a better country together!</p>
      </div>

      <ul class="secgment d-flex">
        <li>
          <img src="{{ asset('asset/frontend/images/economy.png')}}">
          <span>Economy</span>
        </li>
        <li>
          <img src="{{ asset('asset/frontend/images/open-book.png')}}">
          <span>Education</span>
        </li>
      </ul>

    </div>

     <ul class="secgment d-flex justify-content-end">
        <li>
          <img src="{{ asset('asset/frontend/images/economy.png')}}">
          <span>Healthcare</span>
        </li>
        <li>
          <img src="{{ asset('asset/frontend/images/tax.png')}}">
          <span>Tax Reforms</span>
        </li>
         <li>
          <img src="{{ asset('asset/frontend/images/sustainable.png')}}">
          <span>Environment</span>
        </li>
        <li>
          <img src="{{ asset('asset/frontend/images/policy.png')}}">
          <span>Foreign Policy</span>
        </li>
      </ul>

  </div>
</div>



  <!-- Gallery   -->

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


<!-- Gallery End  -->



@endsection

