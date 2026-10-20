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

       /* ABOUT PAGE CSS */
			.edu-about-page {
            background: #ffffff;
            color: #26352d;
        }

        /* HERO */
        .edu-about-hero {
            position: relative;
            min-height: 430px;
            display: flex;
            align-items: center;
            background: linear-gradient(90deg, rgba(13, 67, 38, .94), rgba(25, 135, 84, .80)), url("https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1800&q=85") center/cover no-repeat;
        }

        .edu-about-hero-content {
            max-width: 800px;
            color: #ffffff;
            padding: 80px 0;
        }

        .edu-about-label {
            display: inline-block;
            margin-bottom: 18px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2.5px;
            color: #d9f7e6;
        }

        .edu-about-hero h1 {
            margin: 0;
            font-size: 56px;
            line-height: 1.12;
            font-weight: 800;
        }

        .edu-about-hero h1 span {
            display: block;
            color: #b9f2cf;
        }

        .edu-about-hero p {
            max-width: 680px;
            margin: 25px 0;
            font-size: 17px;
            line-height: 1.8;
            color: rgba(255, 255, 255, .88);
        }

        .edu-about-breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 14px;
        }

        .edu-about-breadcrumb a {
            color: #ffffff;
            text-decoration: none;
        }

        .edu-about-breadcrumb span {
            color: #c9ead7;
        }

        /* INTRO */
        .edu-about-intro {
            padding: 100px 0;
        }

        .edu-about-image-area {
            position: relative;
            padding-right: 30px;
        }

        .edu-about-main-image {
            overflow: hidden;
            border-radius: 24px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .12);
        }

        .edu-about-main-image img {
            width: 100%;
            height: 530px;
            object-fit: cover;
            display: block;
            transition: transform .5s ease;
        }

        .edu-about-main-image:hover img {
            transform: scale(1.03);
        }

        .edu-about-floating-card {
            position: absolute;
            right: 0;
            bottom: 35px;
            display: flex;
            align-items: center;
            gap: 13px;
            min-width: 190px;
            padding: 18px 20px;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, .16);
        }

        .edu-floating-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e8f7ee;
            color: #198754;
            border-radius: 12px;
            font-size: 24px;
        }

        .edu-about-floating-card strong,
        .edu-about-floating-card span {
            display: block;
        }

        .edu-about-floating-card strong {
            font-size: 18px;
            color: #172b1f;
        }

        .edu-about-floating-card span {
            margin-top: 2px;
            font-size: 13px;
            color: #68766e;
        }

        /* CONTENT */
        .edu-section-label {
            display: inline-block;
            margin-bottom: 13px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #198754;
        }

        .edu-about-content h2,
        .edu-section-heading h2 {
            margin: 0;
            font-size: 43px;
            line-height: 1.2;
            font-weight: 750;
            color: #172b1f;
        }

        .edu-about-content h2 span,
        .edu-section-heading h2 span {
            color: #198754;
        }

        .edu-heading-line {
            width: 60px;
            height: 4px;
            margin: 20px 0;
            background: #198754;
            border-radius: 20px;
        }

        .edu-about-content p {
            margin-bottom: 16px;
            color: #68766e;
            font-size: 15px;
            line-height: 1.85;
        }

        .edu-about-content .edu-lead {
            color: #34483c;
            font-size: 18px;
            line-height: 1.75;
        }

        .edu-about-checks {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 13px;
            margin-top: 25px;
        }

        .edu-check-item {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 14px;
            font-weight: 600;
            color: #34483c;
        }

        .edu-check-item i {
            color: #198754;
            font-size: 19px;
        }

        /* STATS */
        .edu-about-stats {
            padding: 70px 0;
            background: #f5faf7;
        }

        .edu-stat-box {
            text-align: center;
            padding: 20px;
        }

        .edu-stat-icon {
            width: 62px;
            height: 62px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            background: #e1f4e9;
            color: #198754;
            border-radius: 50%;
            font-size: 27px;
        }

        .edu-stat-box h3 {
            margin: 0;
            color: #172b1f;
            font-size: 36px;
            font-weight: 800;
        }

        .edu-stat-box p {
            margin: 5px 0 0;
            color: #718078;
            font-size: 14px;
        }

        /* MISSION */
        .edu-mission-section {
            padding: 100px 0;
        }

        .edu-section-heading {
            max-width: 700px;
            margin: 0 auto;
        }

        .edu-section-heading p {
            margin: 18px auto 0;
            max-width: 620px;
            color: #718078;
            font-size: 16px;
            line-height: 1.8;
        }

        .edu-purpose-card {
            height: 100%;
            display: flex;
            gap: 22px;
            padding: 35px;
            background: #ffffff;
            border: 1px solid #e5eee8;
            border-radius: 20px;
            box-shadow: 0 12px 35px rgba(30, 80, 50, .06);
            transition: all .3s ease;
        }

        .edu-purpose-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(30, 80, 50, .10);
        }

        .edu-purpose-icon {
            flex: 0 0 58px;
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e8f7ee;
            color: #198754;
            border-radius: 15px;
            font-size: 26px;
        }

        .edu-purpose-card span {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: #198754;
        }

        .edu-purpose-card h3 {
            margin: 7px 0 10px;
            font-size: 21px;
            color: #172b1f;
        }

        .edu-purpose-card p {
            margin: 0;
            color: #718078;
            font-size: 14px;
            line-height: 1.75;
        }

        /* VALUES */
        .edu-values-section {
            padding: 100px 0;
            background: #f7fbf8;
        }

        .edu-value-card {
            height: 100%;
            padding: 32px 25px;
            background: #ffffff;
            border: 1px solid #e4eee7;
            border-radius: 18px;
            text-align: center;
            transition: all .3s ease;
        }

        .edu-value-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 20px 40px rgba(24, 90, 50, .10);
        }

        .edu-value-icon {
            width: 62px;
            height: 62px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            background: #e7f6ed;
            color: #198754;
            border-radius: 50%;
            font-size: 27px;
        }

        .edu-value-card h3 {
            margin-bottom: 10px;
            font-size: 19px;
            color: #172b1f;
        }

        .edu-value-card p {
            margin: 0;
            color: #718078;
            font-size: 14px;
            line-height: 1.75;
        }

        /* CTA */
        .edu-about-cta {
            padding: 100px 0;
            background: linear-gradient(135deg, #12633c, #198754);
        }

        .edu-cta-content {
            max-width: 800px;
            margin: auto;
            text-align: center;
            color: #ffffff;
        }

        .edu-cta-content>span {
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #c9f4d9;
        }

        .edu-cta-content h2 {
            margin: 15px 0;
            font-size: 43px;
            line-height: 1.2;
            font-weight: 800;
        }

        .edu-cta-content p {
            max-width: 650px;
            margin: 0 auto 28px;
            color: rgba(255, 255, 255, .85);
            font-size: 16px;
            line-height: 1.8;
        }

        .edu-cta-buttons {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 13px;
            flex-wrap: wrap;
        }

        .edu-btn-primary,
        .edu-btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 13px 23px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: all .3s ease;
        }

        .edu-btn-primary {
            background: #ffffff;
            color: #198754;
        }

        .edu-btn-primary:hover {
            background: #e9f8ef;
            color: #146c43;
            transform: translateY(-2px);
        }

        .edu-btn-outline {
            border: 1px solid rgba(255, 255, 255, .7);
            color: #ffffff;
        }

        .edu-btn-outline:hover {
            background: #ffffff;
            color: #198754;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .edu-about-hero {
                min-height: 400px;
            }

            .edu-about-hero h1 {
                font-size: 46px;
            }

            .edu-about-intro,
            .edu-mission-section,
            .edu-values-section {
                padding: 75px 0;
            }

            .edu-about-content h2,
            .edu-section-heading h2,
            .edu-cta-content h2 {
                font-size: 36px;
            }

            .edu-about-main-image img {
                height: 450px;
            }
        }

        @media (max-width: 767px) {
            .edu-about-hero {
                min-height: 430px;
            }

            .edu-about-hero-content {
                padding: 65px 15px;
            }

            .edu-about-hero h1 {
                font-size: 36px;
            }

            .edu-about-hero p {
                font-size: 15px;
            }

            .edu-about-image-area {
                padding-right: 15px;
            }

            .edu-about-main-image img {
                height: 380px;
            }

            .edu-about-floating-card {
                bottom: 20px;
                right: 0;
                min-width: 165px;
                padding: 14px;
            }

            .edu-about-content h2,
            .edu-section-heading h2,
            .edu-cta-content h2 {
                font-size: 31px;
            }

            .edu-about-content .edu-lead {
                font-size: 16px;
            }

            .edu-about-checks {
                grid-template-columns: 1fr;
            }

            .edu-purpose-card {
                padding: 25px;
            }

            .edu-about-stats {
                padding: 55px 0;
            }

            .edu-stat-box h3 {
                font-size: 30px;
            }

            .edu-about-cta {
                padding: 70px 0;
            }
        }

        @media (max-width: 480px) {
            .edu-about-hero h1 {
                font-size: 31px;
            }

            .edu-about-hero-content {
                padding: 55px 15px;
            }

            .edu-about-main-image img {
                height: 300px;
            }

            .edu-about-floating-card {
                min-width: 145px;
            }

            .edu-floating-icon {
                width: 42px;
                height: 42px;
                font-size: 20px;
            }

            .edu-about-content h2,
            .edu-section-heading h2,
            .edu-cta-content h2 {
                font-size: 28px;
            }

            .edu-purpose-card {
                flex-direction: column;
            }

            .edu-purpose-icon {
                flex-basis: auto;
            }

            .edu-btn-primary,
            .edu-btn-outline {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
@endsection
@section('content')
    {{-- ========================= ABOUT PAGE ========================= --}}

	<section class="school-breadcrumb">
    <div class="school-breadcrumb-shape shape-one"></div>
    <div class="school-breadcrumb-shape shape-two"></div>

    <div class="container">
        <div class="school-breadcrumb-wrapper">

            <div class="school-breadcrumb-content">

                {{-- <span class="school-breadcrumb-label">
                    <i class="ti ti-news"></i>
                    ABOUT US
                </span> --}}

                <h1>
                    About <span>Us</span>
                </h1>

                <div class="school-breadcrumb-line"></div>

                <p>
                    About Edu Green Infant & Primary School, our mission, vision and core values that guide our approach to education and child development.
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
                            About Us
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
    <section class="edu-about-page">
		
		{{-- INTRODUCTION --}} 
		<section class="edu-about-intro">
            <div class="container">
                <div class="row align-items-center g-5"> {{-- IMAGE --}} <div class="col-lg-6">
                        <div class="edu-about-image-area">
                            <div class="edu-about-main-image">  <img
                            src="{{ !empty($about?->image) ? asset('storage/' . $about->image) : asset('frontend/assets/img/about.jpeg') }}"
                            alt="Students learning at Edu Green School"> </div>
                            <div class="edu-about-floating-card">
                                <div class="edu-floating-icon"> <i class="ti ti-school"></i> </div>
                                <div> <strong>Quality</strong> <span>Education</span> </div>
                            </div>
                        </div>
                    </div> 
					{{-- CONTENT --}}
					 <div class="col-lg-6">
                        <div class="edu-about-content"> <span class="edu-section-label"> WHO WE ARE </span>
                            <h2> A Place Where <span>Every Child Matters</span> </h2>
                            <div class="edu-heading-line"></div>
                            {{-- <p class="edu-lead"> Edu Green Infant & Primary School is committed to providing quality
                                education in a warm, safe and supportive environment where children can thrive. </p> --}}
                            <p> {{ $about->content}} </p>
                            {{-- <p> From the early years through primary education, we combine strong academic foundations with
                                character development, creativity, discipline and essential life skills. </p> --}}
                            <div class="edu-about-checks">
                                <div class="edu-check-item"> <i class="ti ti-circle-check"></i> <span>Qualified & Caring
                                        Teachers</span> </div>
                                <div class="edu-check-item"> <i class="ti ti-circle-check"></i> <span>Safe & Supportive
                                        Environment</span> </div>
                                <div class="edu-check-item"> <i class="ti ti-circle-check"></i> <span>Child-Centred
                                        Learning</span> </div>
                                <div class="edu-check-item"> <i class="ti ti-circle-check"></i> <span>Strong Academic
                                        Foundation</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
		
		{{-- MISSION & VISION --}}
		 <section class="edu-mission-section">
            <div class="container">
                <div class="edu-section-heading text-center"> <span class="edu-section-label">OUR PURPOSE</span>
                    <h2> Inspiring Excellence, <span>Every Step of the Way</span> </h2>
                    <p> Everything we do is centred around helping children become confident, responsible and successful
                        individuals. </p>
                </div>
                <div class="row g-4 mt-4"> {{-- MISSION --}} <div class="col-lg-6">
                        <div class="edu-purpose-card">
                            <div class="edu-purpose-icon"> <i class="ti ti-target-arrow"></i> </div>
                            <div> <span>OUR MISSION</span>
                                <h3> Nurturing Potential Through Education </h3>
                                <p> {{ $about->mission}}. </p>
                            </div>
                        </div>
                    </div> {{-- VISION --}} <div class="col-lg-6">
                        <div class="edu-purpose-card">
                            <div class="edu-purpose-icon"> <i class="ti ti-eye"></i> </div>
                            <div> <span>OUR VISION</span>
                                <h3> Preparing Children for a Brighter Future </h3>
                                <p> {{ $about->vision}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> {{-- CORE VALUES --}} <section class="edu-values-section">
            <div class="container">
                <div class="edu-section-heading text-center"> <span class="edu-section-label">WHAT WE STAND FOR</span>
                    <h2> Our Core <span>Values</span> </h2>
                    <p> The principles that guide how we teach, support and inspire every child at Edu Green School. </p>
                </div>
                <div class="row g-4 mt-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="edu-value-card">
                            <div class="edu-value-icon"> <i class="ti ti-heart-handshake"></i> </div>
                            <h3>Care</h3>
                            <p> We create a warm and supportive environment where every child feels valued and respected.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="edu-value-card">
                            <div class="edu-value-icon"> <i class="ti ti-bulb"></i> </div>
                            <h3>Curiosity</h3>
                            <p> We encourage children to ask questions, explore ideas and develop a lifelong love for
                                learning. </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="edu-value-card">
                            <div class="edu-value-icon"> <i class="ti ti-award"></i> </div>
                            <h3>Excellence</h3>
                            <p> We encourage every child to give their best and continually develop their abilities. </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="edu-value-card">
                            <div class="edu-value-icon"> <i class="ti ti-shield-check"></i> </div>
                            <h3>Integrity</h3>
                            <p> We teach honesty, responsibility, respect and strong character from an early age. </p>
                        </div>
                    </div>
                </div>
            </div>
      
    </section>
@endsection
