
@extends('layouts.app')

@section('title', 'Our Services | Edugreen Schools')

@section('content')

<style>
    .edu-services-page {
        background: #fff;
        color: #34483b;
        padding-bottom: 65px;
    }

    /* Hero */
    .edu-services-hero {
        position: relative;
        background:
            linear-gradient(110deg, rgba(10, 70, 47, .98),
            rgba(23, 107, 69, .88)),
            url('{{ asset('frontend/assets/img/nursery.jpeg') }}')
            center/cover no-repeat;
        padding: 75px 20px;
        color: #fff;
    }

    .edu-services-hero .hero-inner {
        max-width: 1140px;
        margin: auto;
    }

    .edu-services-hero .eyebrow {
        color: #f1d17c;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 3px;
        text-transform: uppercase;
        display: block;
        margin-bottom: 13px;
    }

    .edu-services-hero h1 {
        color: #fff;
        font-size: 44px;
        font-weight: 800;
        margin: 0 0 18px;
    }

    .edu-services-hero p {
        max-width: 700px;
        color: rgba(255,255,255,.9);
        font-size: 15px;
        line-height: 1.9;
        margin: 0 0 22px;
    }

    .edu-services-hero .hero-line {
        height: 5px;
        width: 60px;
        border-radius: 5px;
        background: #f1d17c;
        margin-bottom: 20px;
    }

    .edu-services-hero .breadcrumb-links {
        font-size: 13px;
        color: rgba(255,255,255,.9);
    }

    .edu-services-hero .breadcrumb-links a {
        color: #fff;
        text-decoration: none;
    }

    /* Introduction */
    .edu-services-intro {
        max-width: 850px;
        margin: 0 auto;
        padding: 55px 20px 35px;
        text-align: center;
    }

    .edu-services-intro .intro-label {
        color: #278553;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .edu-services-intro h2 {
        color: #103b2b;
        font-size: 32px;
        font-weight: 800;
        margin: 12px 0 15px;
    }

    .edu-services-intro p {
        color: #627267;
        font-size: 15px;
        line-height: 1.9;
        margin: 0;
        text-align: left;
    }

    /* Service sections */
    .edu-services-container {
        max-width: 1140px;
        margin: auto;
        padding: 0 20px;
    }

    .edu-service-detail {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
        align-items: center;
        gap: 45px;
        padding: 35px 0;
        margin-bottom: 20px;
        scroll-margin-top: 25px;
    }

    .edu-service-detail.reverse .service-detail-image {
        order: 2;
    }

    .edu-service-detail.reverse .service-detail-content {
        order: 1;
    }

    .service-detail-image {
        min-width: 0;
    }

    .service-detail-image img {
        width: 100%;
        height: 340px;
        object-fit: cover;
        display: block;
        border-radius: 16px;
        box-shadow: 0 15px 35px rgba(16,59,43,.09);
    }

    .service-detail-content {
        min-width: 0;
    }

    .service-number {
        color: #278553;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 12px;
        display: inline-block;
    }

    .service-detail-content h2 {
        color: #103b2b;
        font-size: 30px;
        font-weight: 800;
        margin: 0 0 17px;
    }

    .service-detail-content > p {
        color: #5b6c60;
        font-size: 14px;
        line-height: 1.95;
        text-align: left;
        margin-bottom: 18px;
    }

    .service-facts {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 20px 0;
    }

    .service-fact {
        background: #edf6ef;
        color: #176b45;
        border-radius: 7px;
        padding: 10px 13px;
        font-size: 12px;
        font-weight: 700;
    }

    .service-fact i {
        margin-right: 5px;
    }

    .service-benefits {
        list-style: none;
        padding: 0;
        margin: 20px 0 0;
    }

    .service-benefits li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: #52665a;
        font-size: 13px;
        line-height: 1.8;
        margin-bottom: 10px;
    }

    .service-benefits i {
        color: #278553;
        margin-top: 4px;
    }

    .service-separator {
        height: 1px;
        background: #e8efe9;
        border: none;
        margin: 10px 0;
    }

    /* Closing banner */
    .edu-services-cta {
        max-width: 1100px;
        margin: 35px auto 0;
        padding: 45px 25px;
        border-radius: 16px;
        background: linear-gradient(120deg, #103b2b, #176b45);
        text-align: center;
        color: #fff;
    }

    .edu-services-cta .cta-icon {
        font-size: 38px;
        color: #f1d17c;
        margin-bottom: 15px;
    }

    .edu-services-cta h2 {
        color: #fff;
        font-size: 29px;
        font-weight: 800;
        margin: 0 0 15px;
    }

    .edu-services-cta p {
        max-width: 690px;
        color: rgba(255,255,255,.9);
        font-size: 14px;
        line-height: 1.9;
        margin: 0 auto 24px;
    }

    .edu-services-cta .cta-button {
        display: inline-block;
        padding: 14px 25px;
        border-radius: 6px;
        background: #f1d17c;
        color: #103b2b;
        text-decoration: none;
        font-size: 13px;
        font-weight: 800;
        transition: background .2s ease;
    }

    .edu-services-cta .cta-button:hover {
        background: #fff;
    }

    @media (max-width: 767px) {
        .edu-services-hero {
            padding: 55px 20px;
        }

        .edu-services-hero h1 {
            font-size: 34px;
        }

        .edu-services-intro {
            padding: 40px 20px 20px;
        }

        .edu-services-intro h2 {
            font-size: 26px;
        }

        .edu-service-detail {
            grid-template-columns: 1fr;
            gap: 24px;
            padding: 25px 0;
        }

        .edu-service-detail.reverse .service-detail-image,
        .edu-service-detail.reverse .service-detail-content {
            order: initial;
        }

        .service-detail-image img {
            height: 250px;
        }

        .service-detail-content h2 {
            font-size: 26px;
        }

        .edu-services-cta {
            margin: 25px 15px 0;
            padding: 35px 20px;
        }

        .edu-services-cta h2 {
            font-size: 24px;
        }
    }
</style>

<div class="edu-services-page">

    {{-- Hero --}}
    <section class="edu-services-hero">
        <div class="hero-inner">

            <span class="eyebrow">Learn • Grow • Excel</span>

            <h1>Our Services</h1>

            <div class="hero-line"></div>

            <p>
                Discover a nurturing educational journey designed
                for every stage of childhood, from early care and
                exploration to foundational academic learning.
            </p>

            <div class="breadcrumb-links">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i> Home
                </a>
                &nbsp; <i class="fa fa-angle-right"></i> &nbsp;
                Our Services
            </div>

        </div>
    </section>

    {{-- Introduction --}}
    <section class="edu-services-intro">
        <span class="intro-label">Education for Every Stage</span>

        <h2>Supporting Every Step of Your Child's Journey</h2>

        <p>
            At Edugreen Schools, we recognise that every stage of childhood
            brings new opportunities for learning and development. Our
            services are designed to provide age-appropriate care, encourage
            curiosity, build confidence, and establish a strong foundation
            for future learning.
        </p>
    </section>

    <div class="edu-services-container">

        {{-- Creche --}}
        <section class="edu-service-detail" id="creche">

            <div class="service-detail-image">
                <img
                    src="{{ asset('frontend/assets/img/creche.jpeg') }}"
                    alt="Young children receiving care at Edugreen Schools"
                    loading="lazy"
                >
            </div>

            <div class="service-detail-content">
                <span class="service-number">01 — Early Care</span>

                <h2>Creche</h2>

                <p>
                    Our creche service provides a motherly approach to
                    caring for babies while their parents are away.
                    We aim to create a warm, welcoming environment
                    where little ones receive attentive care and
                    age-appropriate support.
                </p>

                <p>
                    Our stated weekday operating hours are from
                    7:00 AM to 5:30 PM, helping parents plan their
                    daily routines around their child's care.
                </p>

                <div class="service-facts">
                    <span class="service-fact">
                        <i class="fa fa-clock-o"></i>
                        Weekdays: 7:00 AM – 5:30 PM
                    </span>

                    <span class="service-fact">
                        <i class="fa fa-heart"></i>
                        Caring Environment
                    </span>
                </div>

                <ul class="service-benefits">
                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Attentive, nurturing care for babies.</span>
                    </li>

                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>A welcoming environment focused on children's comfort and wellbeing.</span>
                    </li>

                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Communication with parents about their child's care and needs.</span>
                    </li>
                </ul>
            </div>

        </section>

        <hr class="service-separator">

        {{-- Preschool --}}
        <section class="edu-service-detail reverse" id="preschool">

            <div class="service-detail-image">
                <img
                    src="{{ asset('frontend/assets/img/pre.jpeg') }}"
                    alt="Toddlers exploring early learning activities"
                    loading="lazy"
                >
            </div>

            <div class="service-detail-content">
                <span class="service-number">02 — Explore and Discover</span>

                <h2>Preschool</h2>

                <p>
                    Our preschool service provides premium care for
                    toddlers between the ages of one and two years.
                    At this stage, children are encouraged to explore
                    their surroundings and discover new experiences
                    through sensory activities.
                </p>

                <p>
                    These early experiences help introduce children
                    to structured learning and prepare them for the
                    next stage of their educational journey.
                </p>

                <ul class="service-benefits">
                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Sensory activities that encourage exploration.</span>
                    </li>

                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Opportunities to discover new objects, sounds, and experiences.</span>
                    </li>

                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Early preparation for a more structured school environment.</span>
                    </li>
                </ul>
            </div>

        </section>

        <hr class="service-separator">

        {{-- Kindergarten --}}
        <section class="edu-service-detail" id="kindergarten">

            <div class="service-detail-image">
                <img
                    src="{{ asset('frontend/assets/img/kid.jpeg') }}"
                    alt="Kindergarten learners participating in classroom activities"
                    loading="lazy"
                >
            </div>

            <div class="service-detail-content">
                <span class="service-number">03 — Build Foundations</span>

                <h2>Kindergarten</h2>

                <p>
                    Kindergarten marks an exciting new chapter in a
                    child's learning journey. Edugreen's Kindergarten
                    programme runs from Kindergarten 1 to Kindergarten 3
                    and serves learners between the ages of three and five.
                </p>

                <p>
                    Children are introduced to foundational concepts
                    that help them develop early academic skills,
                    confidence, and readiness for further learning.
                </p>

                <ul class="service-benefits">
                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Basic mathematics and number concepts.</span>
                    </li>

                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Early reading and language development.</span>
                    </li>

                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Writing skills, including cursive writing.</span>
                    </li>

                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Additional learning experiences that support children's development.</span>
                    </li>
                </ul>
            </div>

        </section>

        <hr class="service-separator">

        {{-- Grade School --}}
        <section class="edu-service-detail reverse" id="grade-school">

            <div class="service-detail-image">
                <img
                    src="{{ asset('frontend/assets/img/nursery.jpeg') }}"
                    alt="Edugreen grade school pupils learning in class"
                    loading="lazy"
                >
            </div>

            <div class="service-detail-content">
                <span class="service-number">04 — Learn and Excel</span>

                <h2>Grade School</h2>

                <p>
                    Our Grade School programme welcomes pupils between
                    the ages of six and ten, covering Grade 1 through
                    Grade 5.
                </p>

                <p>
                    At this stage, learners continue building on their
                    foundational knowledge and developing the academic
                    skills they need for continued educational growth.
                    We aim to encourage curiosity, responsibility,
                    confidence, and a positive attitude towards learning.
                </p>

                <ul class="service-benefits">
                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Continued development of reading, writing, and mathematics.</span>
                    </li>

                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Opportunities to build knowledge across the curriculum.</span>
                    </li>

                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Support for academic progress and independent learning.</span>
                    </li>

                    <li>
                        <i class="fa fa-check-circle"></i>
                        <span>Preparation for the next stage of education.</span>
                    </li>
                </ul>
            </div>

        </section>

    </div>

    {{-- Closing CTA --}}
    <section class="edu-services-cta">
        <div class="cta-icon">
            <i class="fa fa-graduation-cap"></i>
        </div>

        <h2>Give Your Child a Great Start</h2>

        <p>
            Every child deserves an environment where they feel cared
            for, supported, and encouraged to reach their potential.
            Discover the right stage of learning for your child at
            Edugreen Schools.
        </p>

        <a href="{{ url('/admissions') }}" class="cta-button">
            Explore Admissions
            &nbsp; <i class="fa fa-arrow-right"></i>
        </a>
    </section>

</div>

@endsection
