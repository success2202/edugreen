
@extends('layouts.app')

@section('content')

<style>
    .giving-page {
        --giving-green: #176b43;
        --giving-dark: #103b2b;
        --giving-light: #f3f8f4;
        --giving-gold: #d6ad58;
        color: #33443a;
        font-family: inherit;
    }

    .giving-page * {
        box-sizing: border-box;
    }

    .giving-hero {
        position: relative;
        overflow: hidden;
        padding: 90px 20px;
        background: linear-gradient(125deg, #103b2b, #176b43 65%, #248052);
        color: #fff;
    }

    .giving-hero::before,
    .giving-hero::after {
        position: absolute;
        content: "";
        border: 1px solid rgba(255,255,255,.13);
        border-radius: 50%;
        pointer-events: none;
    }

    .giving-hero::before {
        top: -170px;
        right: -100px;
        width: 390px;
        height: 390px;
    }

    .giving-hero::after {
        top: -105px;
        right: -40px;
        width: 270px;
        height: 270px;
    }

    .giving-hero-inner {
        position: relative;
        z-index: 1;
        max-width: 1140px;
        margin: auto;
    }

    .giving-eyebrow {
        display: inline-block;
        margin-bottom: 18px;
        padding: 8px 15px;
        border: 1px solid rgba(255,255,255,.28);
        border-radius: 30px;
        color: #f0d79e;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .giving-hero h1 {
        max-width: 800px;
        margin: 0 0 20px;
        color: #fff;
        font-size: clamp(34px, 5vw, 55px);
        font-weight: 800;
        line-height: 1.2;
    }

    .giving-hero p {
        max-width: 690px;
        margin: 0;
        color: rgba(255,255,255,.86);
        font-size: 17px;
        line-height: 1.9;
    }

    .giving-section {
        padding: 80px 20px;
    }

    .giving-container {
        max-width: 1140px;
        margin: auto;
    }

    .giving-heading {
        max-width: 720px;
        margin: 0 auto 45px;
        text-align: center;
    }

    .giving-heading span {
        display: block;
        margin-bottom: 12px;
        color: var(--giving-green);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .giving-heading h2 {
        margin: 0 0 16px;
        color: var(--giving-dark);
        font-size: clamp(28px, 3vw, 38px);
        font-weight: 800;
        line-height: 1.3;
    }

    .giving-heading p {
        margin: 0;
        color: #69786f;
        font-size: 15px;
        line-height: 1.9;
    }

    .giving-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 25px;
    }

    .giving-card {
        position: relative;
        display: flex;
        min-width: 0;
        flex-direction: column;
        align-items: flex-start;
        padding: 30px 27px;
        overflow: hidden;
        background: #fff;
        border: 1px solid #e4ece5;
        border-radius: 15px;
        box-shadow: 0 8px 28px rgba(20, 60, 35, .045);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .giving-card::before {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--giving-green);
        content: "";
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .25s ease;
    }

    .giving-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 35px rgba(20, 60, 35, .09);
    }

    .giving-card:hover::before {
        transform: scaleX(1);
    }

    .giving-icon {
        display: flex;
        width: 58px;
        height: 58px;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
        border-radius: 15px;
        background: #eaf4ec;
        color: var(--giving-green);
        font-size: 25px;
    }

    .giving-card h3 {
        margin: 0 0 13px;
        color: var(--giving-dark);
        font-size: 19px;
        font-weight: 800;
        line-height: 1.5;
    }

    .giving-card p {
        margin: 0;
        color: #68776c;
        font-size: 14px;
        line-height: 1.9;
    }

    .giving-card-number {
        align-self: flex-end;
        margin-top: 22px;
        color: #dce9df;
        font-size: 26px;
        font-weight: 800;
        line-height: 1;
    }

    .giving-impact {
        padding: 65px 20px;
        background: var(--giving-light);
    }

    .giving-impact-inner {
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) minmax(0, 1fr);
        gap: 40px;
        align-items: center;
        max-width: 1140px;
        margin: auto;
    }

    .giving-impact h2 {
        margin: 0 0 18px;
        color: var(--giving-dark);
        font-size: clamp(27px, 3vw, 36px);
        font-weight: 800;
        line-height: 1.35;
    }

    .giving-impact p {
        margin: 0;
        color: #617166;
        font-size: 15px;
        line-height: 1.9;
    }

    .giving-impact-note {
        padding: 30px;
        background: #fff;
        border: 1px solid #e0ebe2;
        border-left: 4px solid var(--giving-gold);
        border-radius: 12px;
        color: var(--giving-dark);
        font-size: 17px;
        font-weight: 600;
        line-height: 1.9;
    }

    .giving-cta {
        padding: 65px 20px;
        background: var(--giving-dark);
        color: #fff;
    }

    .giving-cta-inner {
        display: flex;
        max-width: 1140px;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
        margin: auto;
    }

    .giving-cta h2 {
        margin: 0 0 12px;
        color: #fff;
        font-size: clamp(26px, 3vw, 35px);
        font-weight: 800;
        line-height: 1.35;
    }

    .giving-cta p {
        max-width: 680px;
        margin: 0;
        color: rgba(255,255,255,.78);
        font-size: 15px;
        line-height: 1.9;
    }

    .giving-cta-button {
        display: inline-flex;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 15px 23px;
        border-radius: 7px;
        background: var(--giving-gold);
        color: #173b2b !important;
        font-size: 14px;
        font-weight: 800;
        text-decoration: none !important;
        transition: background .2s ease;
    }

    .giving-cta-button:hover {
        background: #edca7d;
    }

    @media (max-width: 991px) {
        .giving-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .giving-impact-inner {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .giving-cta-inner {
            align-items: flex-start;
            flex-direction: column;
        }
    }

    @media (max-width: 575px) {
        .giving-hero {
            padding: 62px 18px;
        }

        .giving-hero p {
            font-size: 15px;
        }

        .giving-section {
            padding: 55px 16px;
        }

        .giving-heading {
            margin-bottom: 30px;
        }

        .giving-grid {
            grid-template-columns: 1fr;
            gap: 17px;
        }

        .giving-card {
            padding: 25px 22px;
        }

        .giving-impact {
            padding: 50px 16px;
        }

        .giving-impact-note {
            padding: 23px;
            font-size: 15px;
        }

        .giving-cta {
            padding: 48px 18px;
        }

        .giving-cta-button {
            width: 100%;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .giving-card,
        .giving-card::before,
        .giving-cta-button {
            transition: none;
        }
    }
</style>

<div class="giving-page">

    {{-- Hero Section --}}
    <section class="giving-hero">
        <div class="giving-hero-inner">
            <span class="giving-eyebrow">Supporting Edugreen Schools</span>

            <h1>Giving at Edugreen Schools</h1>

            <p>
                Every gift creates an opportunity to strengthen education,
                support our students, and build a lasting foundation for
                future generations.
            </p>
        </div>
    </section>

    {{-- Giving Options --}}
    <section class="giving-section">
        <div class="giving-container">

            <div class="giving-heading">
                <span>Ways to Make a Difference</span>
                <h2>Choose How You Want to Give</h2>
                <p>
                    Your generosity can support the daily needs of our school,
                    create lasting financial stability, expand scholarship
                    opportunities, and strengthen our educational community.
                </p>
            </div>

            <div class="giving-grid">

                {{-- Edugreen Fund --}}
                <article class="giving-card">
                    <div class="giving-icon">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>

                    <h3>Edugreen Fund</h3>

                    <p>
                        Gifts that support annual operating expenses,
                        helping Edugreen Schools meet its ongoing needs
                        and sustain its educational mission.
                    </p>

                    <span class="giving-card-number">01</span>
                </article>

                {{-- Endowment --}}
                <article class="giving-card">
                    <div class="giving-icon">
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                    </div>

                    <h3>Endowment</h3>

                    <p>
                        Gifts that generate income in perpetuity,
                        providing long-term financial stability and
                        flexibility for the school.
                    </p>

                    <span class="giving-card-number">02</span>
                </article>

                {{-- Scholarship --}}
                <article class="giving-card">
                    <div class="giving-icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>

                    <h3>Edugreen Scholarship</h3>

                    <p>
                        Gifts dedicated to sustaining the scholarship scheme
                        and providing equal educational opportunities for
                        indigent children within the school community.
                    </p>

                    <span class="giving-card-number">03</span>
                </article>

                {{-- Special Events --}}
                <article class="giving-card">
                    <div class="giving-icon">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>

                    <h3>Special Events</h3>

                    <p>
                        Support annual fundraising events, including
                        the end-of-year Founder's Gala, which brings
                        our community together around our mission.
                    </p>

                    <span class="giving-card-number">04</span>
                </article>

                {{-- Restricted Gifts --}}
                <article class="giving-card">
                    <div class="giving-icon">
                        <i class="fa fa-bullseye" aria-hidden="true"></i>
                    </div>

                    <h3>Restricted Gifts</h3>

                    <p>
                        Gifts directed toward specific projects or
                        departments, allowing donors to support
                        particular priorities within the school.
                    </p>

                    <span class="giving-card-number">05</span>
                </article>

                {{-- Planned Gifts --}}
                <article class="giving-card">
                    <div class="giving-icon">
                        <i class="fa fa-university" aria-hidden="true"></i>
                    </div>

                    <h3>Planned Gifts</h3>

                    <p>
                        Gifts arranged through wills and estate plans
                        to support sustainable infrastructural
                        development for the future.
                    </p>

                    <span class="giving-card-number">06</span>
                </article>

            </div>
        </div>
    </section>

    {{-- Impact Section --}}
    <section class="giving-impact">
        <div class="giving-impact-inner">

            <div>
                <h2>Investing in Education. Building the Future.</h2>

                <p>
                    Giving to Edugreen Schools is an opportunity to contribute
                    to a stronger educational community. Whether your gift
                    supports annual operations, scholarships, special events,
                    or long-term development, every contribution can help
                    advance the school's mission.
                </p>
            </div>

            <div class="giving-impact-note">
                “Together, we can create meaningful opportunities for our
                students today and build a stronger foundation for the
                generations that follow.”
            </div>

        </div>
    </section>

    {{-- Call to Action --}}
    <section class="giving-cta">
        <div class="giving-cta-inner">

            <div>
                <h2>Be Part of the Edugreen Story</h2>

                <p>
                    Interested in supporting Edugreen Schools?
                    Contact our Office of Advancement to discuss giving
                    opportunities and how you can contribute to our mission.
                </p>
            </div>

            <a href="mailto:chrisjessey301@gmail.com"
               class="giving-cta-button">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                Contact Advancement
            </a>

        </div>
    </section>

</div>

@endsection
