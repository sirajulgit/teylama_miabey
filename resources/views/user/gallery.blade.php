@extends('user.layout.guest_layout')


@section('content')
    {{-- ############# | CMS BANNER | ############# --}}
    <div class="banner-area position-relative">
        <div class="banner-slide">
            @foreach ($data['banner_data'] as $item)
                <div>
                    <img src="{{ asset($item['image']) }}">
                </div>
            @endforeach
        </div>

    </div>




    <div class="gallery-area mb-5">
        <div class="container">

            <div class="about-content-right text-center pb-4">
                <h2> <strong>Our Gallery</strong> </h2>
            </div>


            {{-- ############# | GALLERY | ############# --}}
            <div class="gallerys tz-gallery">
                <div id="image" class="tabcontent">
                    <div class="row no-gutters">
                        @foreach ($data['gallery_data'] as $item)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                                <div class="gallery-holder">
                                    <img src="{{ asset('asset/frontend/images/rashio-gallery.png') }}" alt="empty">
                                    <div class="holder" style="background: url({{ asset($item['image']) }});">
                                        <div class="capson">
                                            <a class="lightbox" href="{{ asset($item['image']) }}">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                {{-- ########### | Pagination | ########### --}}
                @if ($data['gallery_data']->hasPages())
                    <nav class="Page navigation pagination-area mt-4">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($data['gallery_data']->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">Previous</span></li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $data['gallery_data']->previousPageUrl() }}"
                                        rel="prev">Previous</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($data['gallery_data']->links()->elements[0] as $page => $url)
                                @if ($page == $data['gallery_data']->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($data['gallery_data']->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $data['gallery_data']->nextPageUrl() }}"
                                        rel="next">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled"><span class="page-link">Next</span></li>
                            @endif
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
@endsection
