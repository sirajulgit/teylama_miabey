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




    <div class="blog-area pb-5 mt-5">
        <div class="container">
            <div class="about-content-right text-center mb-5 pb-4">
                <h2> <strong>Our Blogs</strong> </h2>
            </div>


            {{-- ########### | Blogs | ########### --}}
            <div class="row">
                @foreach ($data['blog_data'] as $item)
                    <div class="col-lg-4 mb-4">
                        <div class="blog-card">
                            <div class="blog-image">
                                <img src="{{ asset($item['image']) }}">
                            </div>
                            <div class="blog-content">
                                <span class="date-blog">
                                    <i class="bi bi-calendar-check-fill"></i>
                                    {{ \Carbon\Carbon::parse($item['created_at'])->format('F d, Y') }}
                                </span>
                                <h4> {{ $item['title'] }} </h4>
                                @if ($item['short_description'])
                                    {!! \Illuminate\Support\Str::limit($item['short_description'], 100, '...') !!}
                                @endif
                            </div>
                            <div class="readmore-btn">
                                <a href="{{ route('blog_details', $item['slug']) }}"> Read More <i
                                        class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>



            {{-- ########### | Pagination | ########### --}}
            @if ($data['blog_data']->hasPages())
                <nav class="Page navigation pagination-area mt-4">
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($data['blog_data']->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $data['blog_data']->previousPageUrl() }}"
                                    rel="prev">Previous</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($data['blog_data']->links()->elements[0] as $page => $url)
                            @if ($page == $data['blog_data']->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($data['blog_data']->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $data['blog_data']->nextPageUrl() }}" rel="next">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                        @endif
                    </ul>
                </nav>
            @endif

        </div>
    </div>
@endsection
