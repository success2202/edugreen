
@extends('layouts.app')

@section('title', 'Our Curriculum | Edugreen Schools')

@section('content')

<style>
    .curriculum-page {
        font-family: inherit;
        color: #183e30;
        background: #fff;
        padding-bottom: 60px;
    }

    .curriculum-hero {
        position: relative;
        min-height: 300px;
        display: flex;
        align-items: center;
        overflow: hidden;
        background:
            linear-gradient(90deg, rgba(10, 79, 53, .98) 0%,
            rgba(10, 79, 53, .91) 45%,
            rgba(10, 79, 53, .25) 100%),
            url('{{ asset('frontend/assets/img/curriculum-banner.jpg') }}')
            center/cover no-repeat;
    }

    .curriculum-hero-content {
        width: 100%;
        max-width: 1140px;
        margin: auto;
        padding: 65px 20px;
        position: relative;
        z-index: 1;
    }

    .curriculum-eyebrow {
        color: #f1d17c;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 12px;
        display: block;
    }

    .curriculum-hero h1 {
        color: #fff;
        font-size: 46px;
        font-weight: 800;
        margin: 0 0 18px;
        line-height: 1.2;
    }

    .curriculum-hero .hero-line {
        width: 65px;
        height: 5px;
        background: #f1d17c;
        border-radius: 5px;
        margin-bottom: 25px;
    }

    .curriculum-breadcrumb {
        color: rgba(255,255,255,.9);
        font-size: 13px;
    }

    .curriculum-breadcrumb a {
        color: #fff;
        text-decoration: none;
    }

    .curriculum-breadcrumb a:hover {
        color: #f1d17c;
    }

    .curriculum-container {
        max-width: 1140px;
        padding: 0 20px;
        margin: 0 auto;
    }

    .curriculum-intro {
        padding: 42px 0 28px;
    }

    .curriculum-intro .gold-line {
        width: 35px;
        height: 5px;
        background: #f1c65d;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .curriculum-intro p {
        color: #50675c;
        font-size: 16px;
        line-height: 1.9;
        max-width: 780px;
        margin: 0;
        text-align: left;
    }

    .curriculum-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 28px;
        align-items: stretch;
    }

    .curriculum-card {
        background: #f3f8f3;
        border: 1px solid #e2ece2;
        border-radius: 16px;
        padding: 28px 24px 22px;
        display: flex;
        flex-direction: column;
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .curriculum-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 30px rgba(16, 59, 43, .09);
    }

    .curriculum-card-heading {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 18px;
    }

    .curriculum-icon {
        flex: 0 0 76px;
        width: 76px;
        height: 76px;
        border-radius: 50%;
        background: #08734c;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 30px;
    }

    .curriculum-card h2 {
        color: #176b45;
        font-size: 25px;
        line-height: 1.35;
        font-weight: 800;
        margin: 0;
    }

    .curriculum-card p {
        color: #50675c;
        font-size: 14px;
        line-height: 1.9;
        margin: 0 0 16px;
        text-align: left;
    }

    .curriculum-card .curriculum-description {
        padding-left: 96px;
    }

    .curriculum-skills {
        list-style: none;
        padding: 0;
        margin: 0 0 22px;
    }

    .curriculum-skills li {
        display: flex;
        align-items: flex-start;
        gap: 11px;
        color: #3e5d4c;
        font-size: 14px;
        line-height: 1.7;
        margin-bottom: 10px;
    }

    .curriculum-skills i {
        color: #08734c;
        font-size: 17px;
        margin-top: 3px;
    }

    .curriculum-card-image {
        margin-top: auto;
        padding-top: 12px;
    }

    .curriculum-card-image img {
        width: 100%;
        height: 225px;
        display: block;
        object-fit: cover;
        border-radius: 12px;
    }

    .curriculum-benefit {
        margin-top: 26px;
        background: linear-gradient(115deg, #07563c, #176b45);
        border-radius: 15px;
        padding: 30px;
        display: flex;
        align-items: center;
        gap: 30px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .curriculum-benefit-icon {
        color: #f1d17c;
        font-size: 48px;
        min-width: 110px;
        text-align: center;
    }

    .curriculum-benefit-divider {
        width: 2px;
        height: 65px;
        background: rgba(241, 209, 124, .8);
    }

    .curriculum-benefit h3 {
        color: #fff;
        font-size: 22px;
        font-weight: 800;
        margin: 0 0 10px;
    }

    .curriculum-benefit p {
        color: rgba(255,255,255,.9);
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
        max-width: 650px;
    }

    .curriculum-cta {
        margin-top: 35px;
        padding: 25px;
        text-align: center;
        background: #f7faf7;
        border-radius: 12px;
        border: 1px solid #e5eee6;
    }

    .curriculum-cta h3 {
        color: #176b45;
        font-size: 23px;
        font-weight: 800;
        margin: 0 0 12px;
    }

    .curriculum-cta p {
        color: #607267;
        font-size: 14px;
        line-height: 1.8;
        margin: 0 0 20px;
    }

    .curriculum-cta .curriculum-btn {
        display: inline-block;
        background: #176b45;
        color: #fff;
        text-decoration: none;
        padding: 13px 25px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 700;
        transition: background .2s ease;
    }

    .curriculum-cta .curriculum-btn:hover {
        background: #103b2b;
        color: #fff;
    }

    @media (max-width: 767px) {
        .curriculum-hero {
            min-height: 250px;
            background-position: center;
        }

        .curriculum-hero-content {
            padding: 50px 20px;
        }

        .curriculum-hero h1 {
            font-size: 34px;
        }

        .curriculum-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .curriculum-card {
            padding: 23px 18px;
        }

        .curriculum-card h2 {
            font-size: 21px;
        }

        .curriculum-card-heading {
            gap: 14px;
        }

        .curriculum-icon {
            flex-basis: 62px;
            width: 62px;
            height: 62px;
            font-size: 25px;
        }

        .curriculum-card .curriculum-description {
            padding-left: 0;
        }

        .curriculum-card-image img {
            height: 220px;
        }

        .curriculum-benefit {
            padding: 25px 20px;
            gap: 18px;
        }

        .curriculum-benefit-icon {
            min-width: 55px;
            font-size: 35px;
        }

        .curriculum-benefit-divider {
            height: 75px;
        }

        .curriculum-benefit h3 {
            font-size: 18px;
        }
    }

    @media (max-width: 420px) {
        .curriculum-hero h1 {
            font-size: 29px;
        }

        .curriculum-benefit {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .curriculum-benefit-divider {
            display: none;
        }

        .curriculum-card-image img {
            height: 190px;
        }
    }
</style>

<div class="curriculum-page">

    {{-- Hero Section --}}
    <section class="curriculum-hero">
        <div class="curriculum-hero-content">
            <span class="curriculum-eyebrow">Academics</span>

            <h1>Our Curriculum</h1>

            <div class="hero-line"></div>

            <div class="curriculum-breadcrumb">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i> Home
                </a>
                &nbsp; <i class="fa fa-angle-right"></i> &nbsp;
                Our Curriculum
            </div>
        </div>
    </section>

    <div class="curriculum-container">

        {{-- Introduction --}}
        <section class="curriculum-intro">
            <div class="gold-line"></div>

            <p>
                Edugreen Infant and Junior School (EIJS) operates a hybrid
                curriculum comprising the British curriculum and the Nigerian
                curriculum. This provides a balanced curriculum that meets
                the needs of our learners.
            </p>
        </section>

        {{-- Curriculum Cards --}}
        <section class="curriculum-grid">

            {{-- British Curriculum --}}
            <article class="curriculum-card">

                <div class="curriculum-card-heading">
                    <div class="curriculum-icon">
                        <i class="fa fa-book"></i>
                    </div>

                    <h2>British Curriculum</h2>
                </div>

                <div class="curriculum-description">
                    <p>
                        The British curriculum provides a curriculum framework
                        to develop the following skills:
                    </p>

                    <ul class="curriculum-skills">
                        <li>
                            <i class="fa fa-check-circle"></i>
                            <span>Science Skill</span>
                        </li>

                        <li>
                            <i class="fa fa-check-circle"></i>
                            <span>English Language</span>
                        </li>

                        <li>
                            <i class="fa fa-check-circle"></i>
                            <span>Mathematics</span>
                        </li>

                        <li>
                            <i class="fa fa-check-circle"></i>
                            <span>Social Sciences</span>
                        </li>

                        <li>
                            <i class="fa fa-check-circle"></i>
                            <span>Life Skills</span>
                        </li>
                    </ul>
                </div>

                <div class="curriculum-card-image">
                    <img
                        src="{{ asset('frontend/assets/img/british-curriculum.jpg') }}"
                        alt="Edugreen pupils developing their learning skills"
                        loading="lazy"
                        onerror="this.style.display='none';"
                    >
                </div>

            </article>

            {{-- Nigerian Curriculum --}}
            <article class="curriculum-card">

                <div class="curriculum-card-heading">
                    <div class="curriculum-icon">
                        <i class="fa fa-globe"></i>
                    </div>

                    <h2>Nigerian Curriculum</h2>
                </div>

                <div class="curriculum-description">
                    <p>
                        The Nigerian curriculum provides Edugreen learners
                        with knowledge and skills about our country while
                        also preparing learners to be adequately equipped
                        for their secondary education.
                    </p>
                </div>

                <div class="curriculum-card-image">
                    <img
                        src="{{ asset('frontend/assets/img/nursery.jpeg') }}"
                        alt="Edugreen pupils learning about their country"
                        loading="lazy"
                        onerror="this.style.display='none';"
                    >
                </div>

            </article>

        </section>

        {{-- Closing Message --}}
        <section class="curriculum-benefit">

            <div class="curriculum-benefit-icon">
                <i class="fa fa-graduation-cap"></i>
            </div>

            <div class="curriculum-benefit-divider"></div>

            <div>
                <h3>Balanced Curriculum, Brighter Futures</h3>

                <p>
                    At Edugreen, we combine the British and Nigerian
                    curricula to give our learners a balanced educational
                    foundation that supports their growth and prepares
                    them for future academic success.
                </p>
            </div>

        </section>

        {{-- Call to Action --}}
        <section class="curriculum-cta">
            <h3>Give Your Child a Balanced Education</h3>

            <p>
                Discover an environment where children are encouraged
                to learn, grow, build confidence, and develop their
                fullest potential.
            </p>

            <a href="{{ url('/admissions') }}" class="curriculum-btn">
                Explore Admissions
                <i class="fa fa-arrow-right"></i>
            </a>
        </section>

    </div>
</div>

@endsection
