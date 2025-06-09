<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">

        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ $data['activePageName'] == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                {{-- <li class="nav-item">
                    <a href="{{ route('user_list') }}"
                        class="nav-link {{ $data['activePageName'] == 'user' ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="{{ route('bibliography_list') }}"
                        class="nav-link {{ $data['activePageName'] == 'bibliography' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Bibliography</p>
                    </a>
                </li> --}}


                {{-- <li class="nav-item">
                    <a href="{{ route('cms_banner_list') }}"
                        class="nav-link {{ $data['activePageName'] == 'banner' ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-image"></i>
                        <p>Banners</p>
                    </a>
                </li> --}}


               <li class="nav-item {{ $data['activePageName'] == 'banner' ? 'menu-open' : '' }} ">

                    <a href="#" class="nav-link {{ $data['activePageName'] == 'banner' ? 'active' : '' }} ">
                        <i class="fa-solid fa-image"></i>
                        <p>
                            Banners
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cms_banner_list') }}"
                                class="nav-link {{ $data['activeSubMenu'] == 'cms_banner' ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home Banner</p>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a href="{{ route('cms_book_banner_list') }}"
                                class="nav-link {{ $data['activeSubMenu'] == 'cms_book_banner' ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About Banner</p>
                            </a>
                        </li>
                      <li class="nav-item">
                            <a href="{{ route('cms_bibliography_banner_list') }}"
                                class="nav-link {{ $data['activeSubMenu'] == 'cms_bibliography_banner' ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact Banner</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{ route('cms_awardHonors_banner_list') }}"
                                class="nav-link {{ $data['activeSubMenu'] == 'cms_awardHonors_banner' ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gallery Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cms_newsEvents_banner_list') }}"
                                class="nav-link {{ $data['activeSubMenu'] == 'cms_newsEvents_banner' ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>News & Events Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cms_blogs_banner_list') }}"
                                class="nav-link {{ $data['activeSubMenu'] == 'cms_blogs_banner' ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blogs Banner</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item {{ $data['activePageName'] == 'cms' ? 'menu-open' : '' }} ">

                    <a href="#" class="nav-link {{ $data['activePageName'] == 'cms' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            CMS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cms_home') }}"
                                class="nav-link {{ $data['activeSubMenu'] == 'cms_home_page' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home Page</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('cms_about') }}"
                                class="nav-link {{ $data['activeSubMenu'] == 'cms_about_page' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About Page</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('cms_contact') }}"
                                class="nav-link {{ $data['activeSubMenu'] == 'cms_contact_page' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact Page</p>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-item">
                    <a href="{{ route('blog_list') }}"
                        class="nav-link {{ $data['activePageName'] == 'blog' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-rss"></i>
                        <p>Blogs</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('event_list') }}"
                        class="nav-link {{ $data['activePageName'] == 'event' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-rss"></i>
                        <p>Events</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gallery_list') }}"
                        class="nav-link {{ $data['activePageName'] == 'gallery' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-rss"></i>
                        <p>Gallery</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact_query_list') }}"
                        class="nav-link {{ $data['activePageName'] == 'contact_query' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-rss"></i>
                        <p>Contact Query</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('cms_list') }}"
                        class="nav-link {{ $data['activePageName'] == 'cms_social_link_contract_email' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Social Links & Email</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('setting') }}"
                        class="nav-link {{ $data['activePageName'] == 'setting' ? 'active' : '' }} ">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>Settings</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link logOUT">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Log Out</p>
                    </a>
                </li>

            </ul>


            {{-- ///////////////////// sidebar link for testing /////////////////////////////////// --}}
            {{-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Simple Link</p>
                    </a>
                </li>
            </ul> --}}
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
