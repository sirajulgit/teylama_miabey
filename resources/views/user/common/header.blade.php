   <header>

       <div class="header-top pt-3 pb-3">
           <div class="container-fluid">
               <div class="top-cover d-flex align-items-center justify-content-between">
                   <ul class="d-flex left-head">
                       <li><a href=""><i class="bi bi-telephone-fill"></i> {{ $settings['contact_no'] }}</a></li>
                       <li><a href=""><i class="bi bi-envelope-fill"></i> {{ $settings['contact_email'] }} </a>
                       </li>
                   </ul>

                   <ul class="d-flex social-head">
                       <li><a href="{{ $settings['fb_link'] }}"><i class="bi bi-facebook"></i> </a></li>
                       <li><a href="{{ $settings['twitter_link'] }}"> <i class="bi bi-twitter-x"></i> </a></li>
                       <li><a href="{{ $settings['insra_link'] }}"> <i class="bi bi-instagram"></i> </a></li>
                       <li><a href="{{ $settings['youtube_link'] }}"> <i class="bi bi-youtube"></i> </a></li>
                   </ul>

                   <a href="#" id="pull">
                       <div class="hamburger hamburger--spring">
                           <div class="hamburger-box">
                               <div class="hamburger-inner"></div>
                           </div>
                       </div>
                   </a>

               </div>
           </div>
       </div>


       <div class="container">

        <div class="logo-image">
            <img src="{{ asset('asset/frontend/images/logo_new.png') }}">
        </div>

           <!-- MENU -->
           <div class="nav d-flex justify-content-center">
                <div class="logo-mobile">
                    <img src="{{ asset('asset/frontend/images/logo_new.png') }}">
                </div>
               <ul id="menu-bg">
                   <li class="{{ $data['activePageName'] == 'home' ? 'current-menu-item' : '' }}">
                       <a href="{{ route('home') }}"> Home </a>
                   </li>
                   <li class="{{ $data['activePageName'] == 'about_us' ? 'current-menu-item' : '' }}">
                       <a href="{{ route('about_us') }}"> About Us </a>
                   </li>
                   <li class="{{ $data['activePageName'] == 'blog' ? 'current-menu-item' : '' }}">
                       <a href="{{ route('blogs') }}"> Blog </a>
                   </li>
                   <li class="{{ $data['activePageName'] == 'event' ? 'current-menu-item' : '' }}">
                       <a href="{{ route('events') }}"> Events </a>
                   </li>
                   <li class="{{ $data['activePageName'] == 'gallery' ? 'current-menu-item' : '' }}">
                       <a href="{{ route('gallery') }}"> Gallery </a>
                   </li>
                   <li class="{{ $data['activePageName'] == 'contact_us' ? 'current-menu-item' : '' }}">
                       <a href="{{ route('contact_us') }}"> Contact Me </a>
                   </li>
               </ul>
           </div>
           <!-- MENU -->

       </div>

   </header>
