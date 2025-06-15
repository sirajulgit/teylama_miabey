
<footer class="pt-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-4 col-md-6">
        <div class="foot-description d-flex align-items-center">
          <span class="round-icon"> <i class="bi bi-geo-alt"></i> </span>
          <div>
            <b>Our Location</b>
            <p>{!! $settings['address'] !!} </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="foot-description d-flex align-items-center">
          <span class="round-icon"> <i class="bi bi-telephone"></i> </span>
          <div>
            <p>  {{$settings['contact_no']}} </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="foot-description d-flex align-items-center">
          <span class="round-icon"> <i class="bi bi-envelope"></i> </span>
          <div>
            <p> {{$settings['contact_email']}}  </p>
          </div>
        </div>
      </div>
    </div>

    <div class="midle-footer d-flex align-items-center justify-content-between">
      <div>
        <ul class="d-flex social-footer">
          <li class="me-4">Social: </li>
          <li><a href="{{$settings['fb_link']}}"><i class="bi bi-facebook"></i> </a></li>
          <li><a href="{{$settings['twitter_link']}}"> <i class="bi bi-twitter-x"></i> </a></li>
          <li><a href="{{$settings['insra_link']}}"> <i class="bi bi-instagram"></i> </a></li>
          <li><a href="{{$settings['youtube_link']}}"> <i class="bi bi-youtube"></i> </a></li>
        </ul>
      </div>

      <ul class="d-flex footer-link">
        <li><a href="">Terms & Conditions </a></li>
        <li><a href=""> Privacy Policy </a></li>
      </ul>


    </div>

    <div class="copy-right text-center pt-4 pb-4 justify-content-between">
      <p> Copyright © 2025 All Right Reserved  </p>
      <p> Powered by The Tech On Point, Inc.  <a href="https://www.thetechonpoint.com/"> www.thetechonpoint.com</a>  </p>
    </div>



  </div>
</footer>
