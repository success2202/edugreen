@extends('layouts.app')

@section('title', 'Gallery | ' . $school->school_name)

@section('styles')
<style>


/* Mobile: display two gallery cards per row */
@media (max-width: 767px) {
    .edugreen-gallery-section .col-sm-6 {
        width: 50%;
        float: left;
        padding-left: 8px;
        padding-right: 8px;
    }
}


    
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
   EDUGREEN GALLERY
========================================= */

.edugreen-gallery-section {
    padding: 80px 0;
    background: #f8f8f6;
}

.edugreen-gallery-header {
    text-align: center;
    max-width: 720px;
    margin: 0 auto 45px;
}

.gallery-subtitle {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: #6dcc2c;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.edugreen-gallery-header h2 {
    margin: 0;
    color: #263746;
    font-family: "Roboto Slab", serif;
    font-size: 36px;
    font-weight: 700;
}

.edugreen-gallery-header h2 span {
    color: #6dcc2c;
}

.gallery-line {
    width: 55px;
    height: 3px;
    background: #6dcc2c;
    margin: 16px auto;
}

.edugreen-gallery-header p {
    color: #68757e;
    font-size: 15px;
    line-height: 1.8;
    margin: 0;
}


/* Gallery Item */

.edugreen-gallery-item {
    background: #fff;
    margin-bottom: 30px;
    border: 1px solid #e5e9e3;
    transition: .3s ease;
}

.edugreen-gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(38, 55, 70, .12);
}


/* Media */

.gallery-media {
    position: relative;
    height: 245px;
    overflow: hidden;
    background: #263746;
}

.gallery-media img {
    width: 100%;
    height: 245px;
    object-fit: cover;
    transition: transform .5s ease;
}

.edugreen-gallery-item:hover .gallery-media img {
    transform: scale(1.06);
}

.gallery-video {
    width: 100%;
    height: 245px;
    object-fit: cover;
}


/* Overlay */

.gallery-overlay {
    position: absolute;
    inset: 0;
    background: rgba(38, 55, 70, .86);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: .35s ease;
}

.edugreen-gallery-item:hover .gallery-overlay {
    opacity: 1;
    visibility: visible;
}

.gallery-overlay-content {
    text-align: center;
    padding: 20px;
}

.gallery-category {
    display: inline-block;
    color: #fff;
    background: #6dcc2c;
    padding: 5px 11px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .8px;
    margin-bottom: 10px;
}

.gallery-overlay h3 {
    color: #fff;
    font-family: "Roboto Slab", serif;
    font-size: 20px;
    margin: 0 0 15px;
}

.gallery-view-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 15px;
    background: #fff;
    color: #263746;
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
}

.gallery-view-btn:hover {
    background: #6dcc2c;
    color: #fff;
}


/* Details */

.gallery-details {
    padding: 18px 20px 20px;
}

.gallery-details-category {
    display: inline-block;
    color: #6dcc2c;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 6px;
}

.gallery-details h3 {
    margin: 0 0 8px;
    color: #263746;
    font-family: "Roboto Slab", serif;
    font-size: 18px;
    font-weight: 700;
}

.gallery-details p {
    color: #68757e;
    font-size: 13px;
    line-height: 1.6;
    margin: 0;
}


/* Empty State */

.gallery-empty {
    background: #fff;
    border: 1px solid #e5e9e3;
    text-align: center;
    padding: 70px 20px;
}

.gallery-empty i {
    font-size: 50px;
    color: #6dcc2c;
}

.gallery-empty h3 {
    color: #263746;
    font-family: "Roboto Slab", serif;
    margin: 15px 0 8px;
}

.gallery-empty p {
    color: #68757e;
}


/* Pagination */

.edugreen-pagination {
    text-align: center;
    margin-top: 20px;
}

.edugreen-pagination .pagination {
    display: inline-flex;
    padding: 0;
    margin: 0;
}

.edugreen-pagination .pagination li {
    margin: 0 3px;
}

.edugreen-pagination .pagination li a,
.edugreen-pagination .pagination li span {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 38px;
    height: 38px;
    border: 1px solid #e1e6df;
    background: #fff;
    color: #263746;
    text-decoration: none;
    font-size: 13px;
}

.edugreen-pagination .pagination li.active span {
    background: #6dcc2c;
    border-color: #6dcc2c;
    color: #fff;
}

.edugreen-pagination .pagination li a:hover {
    background: #6dcc2c;
    border-color: #6dcc2c;
    color: #fff;
}


/* Responsive */

@media(max-width: 767px) {

    .edugreen-gallery-section {
        padding: 55px 0;
    }

    .edugreen-gallery-header h2 {
        font-size: 28px;
    }

    .gallery-media,
    .gallery-media img,
    .gallery-video {
        height: 230px;
    }

}

@media(max-width: 480px) {

    .edugreen-gallery-header h2 {
        font-size: 25px;
    }

    .edugreen-gallery-header p {
        font-size: 13px;
    }

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
                    <i class="ti ti-photo"></i>
                    SCHOOL GALLERY
                </span> --}}

                <h1>
                    Our <span>Gallery</span>
                </h1>

                <div class="school-breadcrumb-line"></div>

                <p>
                    Take a look at memorable moments, school activities,
                    classroom experiences, facilities and student life.
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
                            Gallery
                        </li>

                    </ol>
                </nav>

            </div>

            <div class="school-breadcrumb-visual">

                <div class="breadcrumb-icon-box">
                    <i class="ti ti-photo"></i>
                </div>

                <div class="breadcrumb-small-icon">
                    <i class="ti ti-camera"></i>
                </div>

            </div>

        </div>
    </div>
</section>



{{-- <section class="portfolio-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="portfolio-content">
						<div class="row">
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-1.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-2.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-3.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-4.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-5.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-6.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-7.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-8.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-9.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-1.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-2.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-4">
								<figure>
									<img src="{{ asset('frontend/assets/images/portfolio/portfolio-3.jpg') }}" alt="" class="img-responsive">
									<figcaption>
										<div>
											<p><a href="#">Presentation</a></p>
											<h3><a href="#">Portfolio Title Here</a></h3>
										</div>
									</figcaption>
								</figure>
							</div><!-- Ends: .col-sm-3 -->
						</div>
					</div><!-- Ends: .portfolio-content -->
					
					<div class="blog-pagination">
						<ul class="list-unstyled">
							<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li class="active"><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
						</ul>
					</div><!-- Ends: .blog-pagination -->
				</div><!-- Ends: .col-md-12 -->

			</div>
		</div>
	</section><!-- Ends: .portfolio-wrapper --> --}}



	<section class="edugreen-gallery-section">

    <div class="container">

        {{-- Gallery Header --}}
        {{-- <div class="edugreen-gallery-header">

            <span class="gallery-subtitle">
                <i class="ti ti-school"></i>
                OUR SCHOOL LIFE
            </span>

            <h2>
                Explore Our
                <span>School Gallery</span>
            </h2>

            <div class="gallery-line"></div>

            <p>
                Take a look at memorable moments, activities,
                learning experiences and special events at EduGreen School.
            </p>

        </div> --}}


        {{-- Gallery --}}
        <div class="row">

            @forelse($galleries as $gallery)

                <div class="col-md-4 col-sm-6">

                    <div class="edugreen-gallery-item">

                        {{-- Media --}}
                        <div class="gallery-media">

                            @if($gallery->media_type === 'video')

                                <video
                                    controls
                                    autoplay
                                    muted
                                    lood
                                    playsinline
                                    preload="metadata"
                                    class="gallery-video"
                                >
                                    <source
                                        src="{{ asset('storage/' . $gallery->media) }}"
                                        type="video/mp4"
                                    >

                                    Your browser does not support
                                    the video tag.

                                </video>

                            @else

                                <img
                                    src="{{ asset('storage/' . $gallery->media) }}"
                                    alt="{{ $gallery->title ?? 'EduGreen School Gallery' }}"
                                    class="img-responsive"
                                >

                            @endif


                            {{-- Hover Overlay --}}
                            <div class="gallery-overlay">

                                <div class="gallery-overlay-content">

                                    @if($gallery->category)

                                        <span class="gallery-category">
                                            {{ $gallery->category }}
                                        </span>

                                    @endif


                                    <h3>
                                        {{ $gallery->title ?? 'EduGreen School' }}
                                    </h3>


                                    @if($gallery->media_type === 'image')

                                        <a
                                            href="{{ asset('storage/' . $gallery->media) }}"
                                            target="_blank"
                                            class="gallery-view-btn"
                                        >
                                            <i class="ti ti-eye"></i>
                                            View Image
                                        </a>

                                    @endif

                                </div>

                            </div>

                        </div>


                        {{-- Gallery Details --}}
                        <div class="gallery-details">

                            @if($gallery->category)

                                <span class="gallery-details-category">
                                    {{ $gallery->category }}
                                </span>

                            @endif


                            <h3>
                                {{ $gallery->title ?? 'EduGreen School' }}
                            </h3>


                           

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-md-12">

                    <div class="gallery-empty">

                        <i class="ti ti-photo"></i>

                        <h3>No Gallery Items Yet</h3>

                        <p>
                            School activities, events and memorable moments
                            will appear here.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- Pagination --}}
        @if($galleries->hasPages())

            <div class="edugreen-pagination">

                {{ $galleries->links() }}

            </div>

        @endif

    </div>

</section>
@endsection