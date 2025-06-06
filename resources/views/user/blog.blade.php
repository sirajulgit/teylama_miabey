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




<div class="blog-area pb-5 mt-5">
  <div class="container">
    <div class="about-content-right text-center mb-5 pb-4">
      <h2> <strong>Our Blogs</strong> </h2>
    </div>

    <div class="row">

      <div class="col-lg-4 mb-4">
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
            <a href="{{ route('blog_details','demo') }}"> Read More <i class="bi bi-arrow-right"></i> </a>
          </div>
        </div>
      </div>

       <div class="col-lg-4 mb-4">
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
            <a href="details.html"> Read More <i class="bi bi-arrow-right"></i> </a>
          </div>
        </div>
      </div>

       <div class="col-lg-4 mb-4">
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
            <a href="details.html"> Read More <i class="bi bi-arrow-right"></i> </a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-4">
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
            <a href="details.html"> Read More <i class="bi bi-arrow-right"></i> </a>
          </div>
        </div>
      </div>

       <div class="col-lg-4 mb-4">
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
            <a href="details.html"> Read More <i class="bi bi-arrow-right"></i> </a>
          </div>
        </div>
      </div>

       <div class="col-lg-4 mb-4">
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
            <a href="details.html"> Read More <i class="bi bi-arrow-right"></i> </a>
          </div>
        </div>
      </div>



    </div>

    <nav class="Page navigation pagination-area mt-4">
    <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
    </nav>

  </div>
</div>

@endsection

