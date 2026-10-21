@extends('layouts.app')

@section('title', $blog->title)

@section('styles')
    
<style> 
/* =========================================
EDU-GREEN BLOG DETAILS
========================================= */

.blog-details-section {
background: #f7faf8;
padding-bottom: 80px;
}

/* =========================================
BREADCRUMB
========================================= */

.blog-breadcrumb {
background: #123c2a;
padding: 25px 0;
margin-bottom: 55px;
}

.blog-breadcrumb-content {
display: flex;
align-items: center;
flex-wrap: wrap;
gap: 10px;
color: rgba(255, 255, 255, 0.75);
font-size: 14px;
}

.blog-breadcrumb-content span {
display: flex;
align-items: center;
gap: 6px;
}

.blog-breadcrumb-content a {
color: #ffffff;
text-decoration: none;
transition: 0.3s ease;
}

.blog-breadcrumb-content a:hover {
color: #7ed957;
}

.blog-breadcrumb-content > i {
font-size: 15px;
color: #7ed957;
}

.blog-breadcrumb-content .current {
color: #7ed957;
font-weight: 600;
}

/* =========================================
BLOG CONTAINER
========================================= */

.blog-details {
max-width: 1000px;
margin: 0 auto;
background: #ffffff;
border-radius: 18px;
overflow: hidden;
box-shadow: 0 15px 45px rgba(18, 60, 42, 0.10);
}

/* =========================================
FEATURED IMAGE
========================================= */

.blog-details-image {
width: 100%;
height: 500px;
overflow: hidden;
background: #e9efeb;
}

.blog-details-image img {
width: 100%;
height: 100%;
display: block;
object-fit: cover;
transition: transform 0.5s ease;
}

.blog-details:hover .blog-details-image img {
transform: scale(1.02);
}

/* =========================================
BLOG CONTENT
========================================= */

.blog-details-content {
padding: 45px 55px 55px;
}

.blog-meta {
display: flex;
align-items: center;
flex-wrap: wrap;
gap: 15px;
margin-bottom: 20px;
}

.blog-date {
display: flex;
align-items: center;
gap: 7px;
color: #6b7771;
font-size: 14px;
}

.blog-date i {
color: #4c9b2e;
font-size: 18px;
}

.blog-category {
display: inline-flex;
align-items: center;
padding: 7px 14px;
border-radius: 30px;
background: rgba(126, 217, 87, 0.15);
color: #27751b;
font-size: 12px;
font-weight: 700;
text-transform: uppercase;
letter-spacing: 0.5px;
}

/* =========================================
TITLE
========================================= */

.blog-details-content h1 {
margin: 0;
color: #123c2a;
font-size: 42px;
line-height: 1.2;
font-weight: 800;
letter-spacing: -0.7px;
}

.blog-title-line {
width: 65px;
height: 4px;
background: #7ed957;
border-radius: 10px;
margin: 22px 0 30px;
}

/* =========================================
ARTICLE CONTENT
========================================= */

.blog-content {
color: #505b55;
font-size: 16px;
line-height: 1.9;
}

.blog-content p {
margin-bottom: 20px;
}

.blog-content h2,
.blog-content h3,
.blog-content h4 {
color: #123c2a;
font-weight: 700;
line-height: 1.4;
margin-top: 30px;
margin-bottom: 15px;
}

.blog-content h2 {
font-size: 28px;
}

.blog-content h3 {
font-size: 23px;
}

.blog-content h4 {
font-size: 20px;
}

.blog-content strong {
color: #123c2a;
}

.blog-content a {
color: #368b27;
font-weight: 600;
text-decoration: underline;
}

.blog-content ul,
.blog-content ol {
padding-left: 25px;
margin-bottom: 25px;
}

.blog-content li {
margin-bottom: 8px;
}

.blog-content blockquote {
margin: 30px 0;
padding: 20px 25px;
border-left: 4px solid #7ed957;
background: #f4f8f5;
color: #123c2a;
font-size: 18px;
font-style: italic;
}

.blog-content img {
max-width: 100%;
height: auto;
display: block;
margin: 25px auto;
border-radius: 10px;
}

/* =========================================
BACK TO BLOG
========================================= */

.blog-back {
margin-top: 40px;
padding-top: 25px;
border-top: 1px solid #e7ece9;
}

.blog-back a {
display: inline-flex;
align-items: center;
gap: 8px;
color: #123c2a;
font-size: 13px;
font-weight: 700;
text-decoration: none;
transition: 0.3s ease;
}

.blog-back a i {
color: #4c9b2e;
font-size: 18px;
}

.blog-back a:hover {
color: #4c9b2e;
transform: translateX(-3px);
}

/* =========================================
TABLET
========================================= */

@media (max-width: 991px) {

.blog-breadcrumb {
    margin-bottom: 40px;
    padding: 20px 0;
}

.blog-details-image {
    height: 400px;
}

.blog-details-content {
    padding: 40px;
}

.blog-details-content h1 {
    font-size: 35px;
}


}

/* =========================================
MOBILE
========================================= */

@media (max-width: 767px) {

.blog-details-section {
    padding-bottom: 50px;
}

.blog-breadcrumb {
    margin-bottom: 30px;
    padding: 17px 0;
}

.blog-breadcrumb-content {
    font-size: 12px;
    gap: 7px;
}

.blog-breadcrumb-content .current {
    max-width: 180px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.blog-details {
    border-radius: 12px;
}

.blog-details-image {
    height: 250px;
}

.blog-details-content {
    padding: 28px 22px 35px;
}

.blog-meta {
    gap: 10px;
}

.blog-details-content h1 {
    font-size: 28px;
    line-height: 1.3;
}

.blog-title-line {
    margin: 18px 0 25px;
}

.blog-content {
    font-size: 15px;
    line-height: 1.8;
}

.blog-content h2 {
    font-size: 23px;
}

.blog-content h3 {
    font-size: 20px;
}

.blog-content blockquote {
    font-size: 16px;
    padding: 17px 18px;
}
```

}

/* =========================================
SMALL MOBILE
========================================= */

@media (max-width: 480px) {


.blog-details-image {
    height: 210px;
}

.blog-details-content {
    padding: 24px 18px 30px;
}

.blog-details-content h1 {
    font-size: 24px;
}

.blog-category {
    font-size: 10px;
    padding: 6px 11px;
}


}


</style>
@endsection
@section('content') 

{{-- <section class="blog-details-section">

    <div class="container">

        <div class="blog-details">

            <div class="blog-details-image">
                <img
                    src="{{ asset('storage/' . $blog->image) }}"
                    alt="{{ $blog->title }}"
                >
            </div>

            <div class="blog-details-content">

                <div class="blog-date">
                    <i class="ti ti-calendar"></i>
                    {{ $blog->created_at->format('F d, Y') }}
                </div>

                <span class="blog-category">
                    {{ $blog->category }}
                </span>

                <h1>
                    {{ $blog->title }}
                </h1>

                <div class="blog-content">
                    {!! $blog->content !!}
                </div>

            </div>

        </div>

    </div>

</section> --}}

<section class="blog-details-section">


<!-- Breadcrumb -->
<div class="blog-breadcrumb">
    <div class="container">

        <div class="blog-breadcrumb-content">

            <span>
                <i class="ti ti-home"></i>
                <a href="{{ route('user.home') }}">Home</a>
            </span>

            <i class="ti ti-chevron-right"></i>

            <span>
                <a href="{{ url('/blog') }}">Blog</a>
            </span>

            <i class="ti ti-chevron-right"></i>

            <span class="current">
                {{ $blog->title }}
            </span>

        </div>

    </div>
</div>


<div class="container">

    <div class="blog-details">

        <div class="blog-details-image">

            <img
                src="{{ asset('frontend/assets/teacher/' . $blog->image) }}"
                alt="{{ $blog->title }}"
            >

        </div>


        <div class="blog-details-content">

            <div class="blog-meta">

                <div class="blog-date">
                    <i class="ti ti-calendar"></i>
                    {{ $blog->created_at->format('F d, Y') }}
                </div>

                <span class="blog-category">
                    {{ $blog->category }}
                </span>

            </div>


            <h1>
                {{ $blog->title }}
            </h1>


            <div class="blog-title-line"></div>


            <div class="blog-content">
                {!! $blog->content !!}
            </div>


            <div class="blog-back">

                <a href="{{ url('/blogs') }}">
                    <i class="ti ti-arrow-left"></i>
                    BACK TO BLOG
                </a>

            </div>

        </div>

    </div>

</div>


</section>


@endsection