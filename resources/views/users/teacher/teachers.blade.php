	@extends('layouts.app')

@section('title', 'Teachers | ' . $school->school_name)
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

/* ================================
   EDUGREEN TEACHERS
================================ */

.edugreen-teachers {
    padding: 80px 0;
    background: #f8f8f6;
}

/* Header */

.teachers-section-header {
    max-width: 720px;
    margin: 0 auto 45px;
}

.teachers-subtitle {
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

.teachers-section-header h2 {
    margin: 0;
    color: #263746;
    font-family: "Roboto Slab", serif;
    font-size: 36px;
    font-weight: 700;
}

.teachers-section-header h2 span {
    color: #6dcc2c;
}

.teachers-line {
    width: 55px;
    height: 3px;
    background: #6dcc2c;
    margin: 16px auto;
}

.teachers-section-header p {
    color: #68757e;
    font-size: 15px;
    line-height: 1.8;
    margin: 0;
}


/* Teacher Card */

.edugreen-teacher-card {
    background: #fff;
    margin-bottom: 30px;
    border: 1px solid #e5e9e3;
    transition: all .3s ease;
}

.edugreen-teacher-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(38, 55, 70, .12);
}


/* Image */

.edugreen-teacher-image {
    position: relative;
    height: 280px;
    overflow: hidden;
    background: #eef2ec;
}

.edugreen-teacher-image img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    transition: transform .5s ease;
}

.edugreen-teacher-card:hover
.edugreen-teacher-image img {
    transform: scale(1.05);
}


/* No Image */

.teacher-no-image {
    width: 100%;
    height: 280px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #eef9e8;
    color: #6dcc2c;
}

.teacher-no-image i {
    font-size: 70px;
}


/* Overlay */

.edugreen-teacher-overlay {
    position: absolute;
    inset: 0;

    display: flex;
    align-items: flex-end;
    justify-content: center;

    padding-bottom: 20px;

    background: linear-gradient(
        to top,
        rgba(38, 55, 70, .85),
        transparent 55%
    );

    opacity: 0;
    visibility: hidden;

    transition: all .35s ease;
}

.edugreen-teacher-card:hover
.edugreen-teacher-overlay {
    opacity: 1;
    visibility: visible;
}


/* Social */

.teacher-social {
    display: flex;
    gap: 7px;
}

.teacher-social a {
    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #fff;
    color: #263746;

    text-decoration: none;

    transition: all .3s ease;
}

.teacher-social a:hover {
    background: #6dcc2c;
    color: #fff;
}


/* Teacher Info */

.edugreen-teacher-info {
    padding: 18px 20px 20px;
    text-align: center;
}

.edugreen-teacher-info h3 {
    margin: 0 0 6px;

    color: #263746;

    font-family: "Roboto Slab", serif;
    font-size: 18px;
    font-weight: 700;
}

.edugreen-teacher-info span {
    display: block;

    color: #6dcc2c;

    font-size: 12px;
    font-weight: 600;

    text-transform: uppercase;
    letter-spacing: .5px;
}

.edugreen-teacher-info p {
    margin: 7px 0 0;

    color: #68757e;
    font-size: 12px;
}


/* Empty */

.teachers-empty {
    text-align: center;
    background: #fff;

    border: 1px solid #e5e9e3;

    padding: 70px 20px;
}

.teachers-empty i {
    font-size: 50px;
    color: #6dcc2c;
}

.teachers-empty h3 {
    margin: 15px 0 8px;

    color: #263746;
    font-family: "Roboto Slab", serif;
}

.teachers-empty p {
    color: #68757e;
}


/* Pagination */

.teachers-pagination {
    text-align: center;
    margin-top: 20px;
}

.teachers-pagination .pagination {
    display: inline-flex;
    padding: 0;
}

.teachers-pagination .pagination li {
    margin: 0 3px;
}

.teachers-pagination .pagination li a,
.teachers-pagination .pagination li span {
    min-width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border: 1px solid #e1e6df;
    background: #fff;

    color: #263746;

    text-decoration: none;
}

.teachers-pagination .pagination li.active span {
    background: #6dcc2c;
    border-color: #6dcc2c;
    color: #fff;
}


/* Responsive */

@media (max-width: 767px) {

    .edugreen-teachers {
        padding: 55px 0;
    }

    .teachers-section-header h2 {
        font-size: 28px;
    }

    .edugreen-teacher-image,
    .edugreen-teacher-image img,
    .teacher-no-image {
        height: 260px;
    }

}

@media (max-width: 480px) {

    .teachers-section-header h2 {
        font-size: 25px;
    }

    .teachers-section-header p {
        font-size: 13px;
    }

}
</style>

@endsection
    @section('content')
        
   
	<!--============================
		Teacher Page Header
	=============================-->
	<section class="school-breadcrumb">
    <div class="school-breadcrumb-shape shape-one"></div>
    <div class="school-breadcrumb-shape shape-two"></div>

    <div class="container">
        <div class="school-breadcrumb-wrapper">

            <div class="school-breadcrumb-content">

                {{-- <span class="school-breadcrumb-label">
                    <i class="ti ti-users"></i>
                    OUR EDUCATORS
                </span> --}}

                <h1>
                    Meet Our <span>Teachers</span>
                </h1>

                <div class="school-breadcrumb-line"></div>

                <p>
                    Meet our dedicated teachers who inspire, guide and
                    empower every student to reach their full potential.
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
                            Our Teachers
                        </li>

                    </ol>
                </nav>

            </div>

            <div class="school-breadcrumb-visual">

                <div class="breadcrumb-icon-box">
                    <i class="ti ti-users"></i>
                </div>

                <div class="breadcrumb-small-icon">
                    <i class="ti ti-school"></i>
                </div>

            </div>

        </div>
    </div>
</section><!-- Ends: .page-header -->
	


	<!--============================
		Teacher Page Content
	=============================-->
	{{-- <section class="all-teachers-wrapper teachers">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="teachers-two-wrapper">
						<div class="row">
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher01.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher02.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher03.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher04.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher01.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher02.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher03.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher04.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher01.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher02.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher03.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
							<div class="col-sm-3">
								<div class="teacher-single-box">
									<figure>
										<img src="{{ asset('frontend/assets/images/teacher04.jpg') }}" alt="" class="img-responsive">
										<figcaption>
											<ul class="list-unstyled t-hover-social">
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-facebook "></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</figcaption>
									</figure>
									<div class="">
										<h3><a href="#">John Doe</a></h3>
										<span>English Teacher</span>
									</div>
								</div>
							</div><!-- Ends: .col-sm-3 -->
						</div>
					</div><!-- Ends: .teachers-two-wrapper -->
				
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
	</section> --}}

	<section class="all-teachers-wrapper teachers edugreen-teachers">
    <div class="container">

        <!-- Section Header -->
        {{-- <div class="teachers-section-header text-center">
            <span class="teachers-subtitle">
                <i class="ti ti-school"></i>
                OUR TEACHING STAFF
            </span>

            <h2>
                Meet Our
                <span>Dedicated Teachers</span>
            </h2>

            <div class="teachers-line"></div>

            <p>
                Our experienced and dedicated teachers are committed to
                providing quality education, guidance and support to every student.
            </p>
        </div> --}}

        <div class="row">

            @forelse($teachers as $teacher)

                <div class="col-md-3 col-sm-6">
                    <div class="edugreen-teacher-card">

                        <!-- Teacher Image -->
                        <div class="edugreen-teacher-image">

                            @if($teacher->image)
                                <a href="{{ route('user.teacher.details', $teacher->id) }}">
                                    <img src="{{ asset('storage/' . $teacher->image) }}"
                                         alt="{{ $teacher->name }}"
                                         class="img-responsive">
                                </a>
                            @else
                                <div class="teacher-no-image">
                                    <i class="ti ti-user"></i>
                                </div>
                            @endif

                            <!-- Social Links -->
                            <div class="edugreen-teacher-overlay">

                                <div class="teacher-social">

                                    @if($teacher->twitter)
                                        <a href="{{ $teacher->twitter }}"
                                           target="_blank"
                                           rel="noopener"
                                           title="Twitter">
                                            <i class="ti ti-brand-twitter"></i>
                                        </a>
                                    @endif

                                    @if($teacher->facebook)
                                        <a href="{{ $teacher->facebook }}"
                                           target="_blank"
                                           rel="noopener"
                                           title="Facebook">
                                            <i class="ti ti-brand-facebook"></i>
                                        </a>
                                    @endif

                                    @if($teacher->linkedin)
                                        <a href="{{ $teacher->linkedin }}"
                                           target="_blank"
                                           rel="noopener"
                                           title="LinkedIn">
                                            <i class="ti ti-brand-linkedin"></i>
                                        </a>
                                    @endif

                                </div>

                            </div>
                        </div>

                        <!-- Teacher Information -->
                        <div class="edugreen-teacher-info">

                            <h3> <a href="{{ route('user.teacher.details', $teacher->id) }}">
                                {{ $teacher->name }}
                            </a></h3>

                            <span>
                                {{ $teacher->email }}
                            </span>

                            @if($teacher->subject)
                                <p>
                                    {{ $teacher->subject }} Teacher
                                </p>
                            @endif

                        </div>

                    </div>
                </div>

            @empty

                <div class="col-md-12">
                    <div class="teachers-empty">
                        <i class="ti ti-users"></i>

                        <h3>
                            Our Teachers
                        </h3>

                        <p>
                            Our teaching staff information will be available here soon.
                        </p>
                    </div>
                </div>

            @endforelse

        </div>

        <!-- Pagination -->
        @if($teachers->hasPages())
            <div class="teachers-pagination">
                {{ $teachers->links() }}
            </div>
        @endif

    </div>
</section>

     @endsection