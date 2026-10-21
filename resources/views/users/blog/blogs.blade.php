@extends('layouts.app')
@section('styles')
<style> 


.school-breadcrumb {
    background-image:
        linear-gradient(
            rgba(10, 55, 35, 0.72),
            rgba(10, 55, 35, 0.72)
        ),
        url('frontend/assets/img/nursery.jpeg');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
/* =========================================
   RECENT POSTS - ALIGNMENT FIX
========================================= */

.latest-news .news-single {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    width: 100%;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #e8eee9;
    overflow: hidden;
}

.latest-news .news-thumb {
    flex: 0 0 80px;
    width: 80px;
    height: 70px;
    overflow: hidden;
    border-radius: 5px;
}

.latest-news .news-thumb a {
    display: block;
    width: 100%;
    height: 100%;
}

.latest-news .news-thumb img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.latest-news .news-excerpt {
    flex: 1;
    min-width: 0;
    margin: 0;
    padding: 0;
}

.latest-news .news-excerpt h4 {
    margin: 0 0 8px;
    padding: 0;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 600;
    overflow-wrap: anywhere;
}

.latest-news .news-excerpt h4 a {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-decoration: none;
}

.latest-news .news-excerpt span {
    display: block;
    margin: 0;
    font-size: 12px;
    line-height: 1.5;
    color: #777;
}

.latest-news .news-single:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}



</style>
@endsection
@section('content')


<section class="school-breadcrumb">
    <div class="school-breadcrumb-shape shape-one"></div>
    <div class="school-breadcrumb-shape shape-two"></div>

    <div class="container">
        <div class="school-breadcrumb-wrapper">

            <div class="school-breadcrumb-content">

                {{-- <span class="school-breadcrumb-label">
                    <i class="ti ti-news"></i>
                    SCHOOL BLOG
                </span> --}}

                <h1>
                    Our <span>Blog</span>
                </h1>

                <div class="school-breadcrumb-line"></div>

                <p>
                    Explore educational insights, school updates, helpful
                    resources, achievements and stories from our school community.
                </p>

                <nav aria-label="breadcrumb">
                    <ol class="school-breadcrumb-list">

                        <li>
                            <a href="{{ url('/') }}">
                                <i class="ti ti-home"></i>
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-arrow">
                            <i class="ti ti-chevron-right"></i>
                        </li>

                        <li class="active">
                            Blog
                        </li>

                    </ol>
                </nav>

            </div>

            <div class="school-breadcrumb-visual">

                <div class="breadcrumb-icon-box">
                    <i class="ti ti-news"></i>
                </div>

                <div class="breadcrumb-small-icon">
                    <i class="ti ti-book"></i>
                </div>

            </div>

        </div>
    </div>
</section>

<section class="blog-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-md-9 col-sm-8">
                <div class="blog-two-content">

                    @forelse($blogs as $blog)
                        <div class="post-single">
                            <div class="row">

                                <div class="col-sm-2">
                                    <div class="post-date">
                                        <span>{{ $blog->created_at->format('d') }}</span>
                                        <span>{{ $blog->created_at->format('M') }}</span>
                                    </div>

                                    @if($loop->first)
                                        <div class="post-sticky">
                                            <span>
                                                <i class="fa fa-thumb-tack"></i>
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-sm-10">
                                    <div class="post-details">

                                        <a href="{{ route('user.blog.details', $blog->id) }}">
                                            <img
                                                src="{{ asset('frontend/assets/blog/' . $blog->image) }}"
                                                alt="{{ $blog->title }}"
                                                class="img-responsive"
                                            >
                                        </a>

                                        <h3>
                                            <a href="{{ route('user.blog.details', $blog->id) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>

                                        <p>
                                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 250) }}
                                        </p>

                                        <a href="{{ route('user.blog.details', $blog->id) }}" class="rm-btn">
                                            Read More
                                        </a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="post-single">
                            <div class="post-details">
                                <p>No blog posts available at the moment.</p>
                            </div>
                        </div>
                    @endforelse

                </div><!-- Ends: .blog-two-content -->

                <div class="blog-pagination">
                    <ul class="list-unstyled">

                        @if($blogs instanceof \Illuminate\Pagination\LengthAwarePaginator && $blogs->hasPages())

                            @if($blogs->onFirstPage())
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $blogs->previousPageUrl() }}">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                            @endif

                            @foreach($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                <li class="{{ $blogs->currentPage() == $page ? 'active' : '' }}">
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if($blogs->hasMorePages())
                                <li>
                                    <a href="{{ $blogs->nextPageUrl() }}">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            @endif

                        @endif

                    </ul>
                </div><!-- Ends: .blog-pagination -->

            </div><!-- Ends: .col-md-9/.col-sm-8 -->

            <div class="col-md-3 col-sm-4">
                <div class="blog-sidebar">

                    <div class="sidebar-widget">
                        <div class="widget-content search-widget">
                            <form action="{{ url('/blogs') }}" method="GET">
                                <input
                                    type="text"
                                    name="search"
                                    placeholder="Search"
                                    value="{{ request('search') }}"
                                >
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div><!-- Ends: .sidebar-widget -->

                    <div class="sidebar-widget">
                        <h3>Recent Posts</h3>

                        <div class="widget-content latest-news">
                            <div class="widget-content">

                                @forelse($recentBlogs as $recentBlog)
                                    <div class="news-single">

                                        <div class="news-thumb">
                                            <a href="{{ url('/blog/' . $recentBlog->id) }}">
                                                <img
                                                    src="{{ asset('frontend/assets/blog/' . $recentBlog->image) }}"
                                                    alt="{{ $recentBlog->title }}"
                                                >
                                            </a>
                                        </div>

                                        <div class="news-excerpt">
                                            <h4>
                                                <a href="{{ url('/blog/' . $recentBlog->id) }}">
                                                    {{ $recentBlog->title }}
                                                </a>
                                            </h4>

                                            <span>
                                                {{ $recentBlog->created_at->format('M d - Y') }}
                                            </span>
                                        </div>

                                    </div>
                                @empty
                                    <p>No recent posts available.</p>
                                @endforelse

                            </div>
                        </div>
                    </div><!-- Ends: .sidebar-widget -->

                </div><!-- Ends: .blog-sidebar -->
            </div><!-- Ends: .col-sm-3 -->

        </div>
    </div>
</section>



@endsection