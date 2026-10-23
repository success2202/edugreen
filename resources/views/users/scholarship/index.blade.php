
@extends('layouts.app')

@section('content')

<style>
    .scholarship-page {
        --sch-green: #176b43;
        --sch-dark: #103b2b;
        --sch-light: #f3f8f4;
        --sch-gold: #d6ad58;
        color: #33443a;
        font-family: inherit;
    }

    .scholarship-page * {
        box-sizing: border-box;
    }

    .scholarship-hero {
        position: relative;
        overflow: hidden;
        padding: 90px 20px;
        background: linear-gradient(125deg, #103b2b, #176b43 65%, #248052);
        color: #fff;
    }

    .scholarship-hero::before,
    .scholarship-hero::after {
        position: absolute;
        content: "";
        border: 1px solid rgba(255,255,255,.13);
        border-radius: 50%;
        pointer-events: none;
    }

    .scholarship-hero::before {
        top: -160px;
        right: -100px;
        width: 390px;
        height: 390px;
    }

    .scholarship-hero::after {
        top: -100px;
        right: -40px;
        width: 270px;
        height: 270px;
    }

    .scholarship-hero-inner {
        position: relative;
        z-index: 1;
        max-width: 1140px;
        margin: auto;
    }

    .scholarship-eyebrow {
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

    .scholarship-hero h1 {
        max-width: 800px;
        margin: 0 0 20px;
        color: #fff;
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 800;
        line-height: 1.2;
    }

    .scholarship-hero p {
        max-width: 700px;
        margin: 0;
        color: rgba(255,255,255,.86);
        font-size: 17px;
        line-height: 1.9;
    }

    .scholarship-section {
        padding: 80px 20px;
    }

    .scholarship-container {
        max-width: 1140px;
        margin: auto;
    }

    .scholarship-heading {
        margin-bottom: 35px;
    }

    .scholarship-heading span {
        display: block;
        margin-bottom: 12px;
        color: var(--sch-green);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .scholarship-heading h2 {
        margin: 0 0 16px;
        color: var(--sch-dark);
        font-size: clamp(28px, 3vw, 38px);
        font-weight: 800;
        line-height: 1.35;
    }

    .scholarship-heading p {
        max-width: 760px;
        margin: 0;
        color: #69786f;
        font-size: 15px;
        line-height: 1.9;
    }

    .scholarship-intro-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.5fr) minmax(250px, .8fr);
        gap: 40px;
        align-items: start;
    }

    .scholarship-copy p {
        margin: 0 0 20px;
        color: #58675d;
        font-size: 15px;
        line-height: 2;
    }

    .scholarship-highlight {
        padding: 30px;
        background: var(--sch-light);
        border: 1px solid #e1ece3;
        border-top: 4px solid var(--sch-gold);
        border-radius: 14px;
    }

    .scholarship-highlight-icon {
        display: flex;
        width: 58px;
        height: 58px;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        border-radius: 14px;
        background: #e1efe4;
        color: var(--sch-green);
        font-size: 26px;
    }

    .scholarship-highlight h3 {
        margin: 0 0 13px;
        color: var(--sch-dark);
        font-size: 21px;
        font-weight: 800;
        line-height: 1.5;
    }

    .scholarship-highlight p {
        margin: 0;
        color: #647469;
        font-size: 14px;
        line-height: 1.9;
    }

    .scholarship-programmes {
        background: #f5f8f5;
    }

    .scholarship-programme-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
        margin-top: 40px;
    }

    .scholarship-programme-card {
        position: relative;
        display: flex;
        min-width: 0;
        flex-direction: column;
        padding: 30px 26px;
        overflow: hidden;
        background: #fff;
        border: 1px solid #e4ece5;
        border-radius: 15px;
        box-shadow: 0 8px 28px rgba(20,60,35,.045);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .scholarship-programme-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 35px rgba(20,60,35,.09);
    }

    .scholarship-programme-card::before {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--sch-green);
        content: "";
    }

    .scholarship-programme-icon {
        display: flex;
        width: 58px;
        height: 58px;
        align-items: center;
        justify-content: center;
        margin-bottom: 22px;
        border-radius: 15px;
        background: #eaf4ec;
        color: var(--sch-green);
        font-size: 25px;
    }

    .scholarship-programme-card h3 {
        margin: 0 0 15px;
        color: var(--sch-dark);
        font-size: 20px;
        font-weight: 800;
        line-height: 1.5;
    }

    .scholarship-programme-card p {
        margin: 0 0 15px;
        color: #68776c;
        font-size: 14px;
        line-height: 1.9;
    }

    .scholarship-programme-card p:last-child {
        margin-bottom: 0;
    }

    .scholarship-benefit {
        margin-top: 8px;
        padding: 13px 15px;
        background: var(--sch-light);
        border-radius: 8px;
        color: var(--sch-green);
        font-size: 13px;
        font-weight: 700;
        line-height: 1.7;
    }

    .scholarship-how {
        background: #fff;
    }

    .scholarship-steps {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
        margin-top: 40px;
    }

    .scholarship-step {
        display: flex;
        gap: 18px;
        align-items: flex-start;
        padding: 25px;
        border: 1px solid #e4ece5;
        border-radius: 13px;
        background: #fff;
    }

    .scholarship-step-number {
        display: flex;
        flex: 0 0 46px;
        width: 46px;
        height: 46px;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #eaf4ec;
        color: var(--sch-green);
        font-size: 17px;
        font-weight: 800;
    }

    .scholarship-step h3 {
        margin: 0 0 9px;
        color: var(--sch-dark);
        font-size: 17px;
        font-weight: 800;
        line-height: 1.5;
    }

    .scholarship-step p {
        margin: 0;
        color: #68776c;
        font-size: 14px;
        line-height: 1.9;
    }

    .scholarship-terms {
        margin-top: 28px;
        padding: 25px 28px;
        border-left: 4px solid var(--sch-gold);
        border-radius: 8px;
        background: var(--sch-light);
    }

    .scholarship-terms h3 {
        margin: 0 0 10px;
        color: var(--sch-dark);
        font-size: 18px;
        font-weight: 800;
    }

    .scholarship-terms p {
        margin: 0;
        color: #647469;
        font-size: 14px;
        line-height: 1.9;
    }

    .scholarship-cta {
        padding: 65px 20px;
        background: var(--sch-dark);
        color: #fff;
    }

    .scholarship-cta-inner {
        display: flex;
        max-width: 1140px;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
        margin: auto;
    }

    .scholarship-cta h2 {
        margin: 0 0 12px;
        color: #fff;
        font-size: clamp(26px, 3vw, 35px);
        font-weight: 800;
        line-height: 1.35;
    }

    .scholarship-cta p {
        max-width: 680px;
        margin: 0;
        color: rgba(255,255,255,.8);
        font-size: 15px;
        line-height: 1.9;
    }

    .scholarship-cta-button {
        display: inline-flex;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 15px 23px;
        border-radius: 7px;
        background: var(--sch-gold);
        color: #173b2b !important;
        font-size: 14px;
        font-weight: 800;
        text-decoration: none !important;
        transition: background .2s ease;
    }

    .scholarship-cta-button:hover {
        background: #edca7d;
    }

    @media (max-width: 991px) {
        .scholarship-intro-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .scholarship-programme-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .scholarship-cta-inner {
            align-items: flex-start;
            flex-direction: column;
        }
    }

    @media (max-width: 575px) {
        .scholarship-hero {
            padding: 62px 18px;
        }

        .scholarship-hero p {
            font-size: 15px;
        }

        .scholarship-section {
            padding: 55px 16px;
        }

        .scholarship-programme-grid,
        .scholarship-steps {
            grid-template-columns: 1fr;
            gap: 17px;
        }

        .scholarship-programme-card {
            padding: 25px 22px;
        }

        .scholarship-highlight {
            padding: 24px 20px;
        }

        .scholarship-step {
            padding: 21px 18px;
        }

        .scholarship-terms {
            padding: 22px 20px;
        }

        .scholarship-cta {
            padding: 48px 18px;
        }

        .scholarship-cta-button {
            width: 100%;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .scholarship-programme-card,
        .scholarship-cta-button {
            transition: none;
        }
    }
</style>

<div class="scholarship-page">

    {{-- Hero --}}
    <section class="scholarship-hero">
        <div class="scholarship-hero-inner">
            <span class="scholarship-eyebrow">Equal Opportunities Through Education</span>

            <h1>Edugreen Scholarship Scheme</h1>

            <p>
                Every child deserves the opportunity to learn, grow, and fulfil
                their potential, regardless of their family's financial
                background or social circumstances.
            </p>
        </div>
    </section>

    {{-- Scholarship Introduction --}}
    <section class="scholarship-section">
        <div class="scholarship-container">

            <div class="scholarship-intro-grid">

                <div class="scholarship-copy">
                    <div class="scholarship-heading">
                        <span>Our Belief</span>
                        <h2>Education Opens Doors to a Better Future</h2>
                    </div>

                    <p style="text-align:justify;">
                        Education is what liberates the mind and emancipates
                        a people. We cannot think of a better future without
                        paying adequate attention to educational standards
                        and opportunities available to the younger generation,
                        who are the true actors of the future we dream of.
                    </p>

                    <p style="text-align:justify;">
                        Edugreen Schools recognises that we live in a world
                        of unequal opportunities. We have therefore taken a
                        significant step towards helping indigent students
                        and children from disadvantaged backgrounds gain
                        educational opportunities alongside their more
                        privileged counterparts. Our aim is to help every
                        child develop their fullest potential and become
                        a responsible citizen.
                    </p>

                    <p style="text-align:justify;">
                        Education is a long-term investment with a long
                        gestation period, but it remains one of the greatest
                        legacies we can leave individuals, groups, and society
                        at large. This has been the firm belief of Mrs.
                        Christopher Bolanle, founder of Edugreen Schools,
                        since 2019.
                    </p>

                    <p style="text-align:justify;">
                        This firm belief and her passion for ensuring that
                        every child feels loved, respected, and encouraged
                        to develop their innate potential, regardless of
                        family finances or social standing, gave birth to
                        the Edugreen Scholarship Scheme.
                    </p>
                </div>

                <aside class="scholarship-highlight">
                    <div class="scholarship-highlight-icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>

                    <h3>Opportunity for Every Child</h3>

                    <p style="text-align: left; line-height: 1.8;">
                        Our scholarship scheme seeks to reduce educational
                        inequality and help children from less-privileged
                        backgrounds access opportunities to learn, grow,
                        and build a brighter future.
                    </p>
                </aside>

            </div>
        </div>
    </section>

    {{-- How It Works --}}
    <section class="scholarship-section scholarship-programmes">
        <div class="scholarship-container">

            <div class="scholarship-heading">
                <span>How It Works</span>
                <h2>Scholarship Programmes</h2>
                <p style="text-align: left; line-height: 1.8;">
                    Scholarships are competitive awards based on academic
                    excellence, personal suitability, motivation, and
                    financial need. They reward scholastic ability and
                    extracurricular achievements while improving
                    opportunities for less-privileged children.
                </p>
            </div>

            <div class="scholarship-programme-grid">

                {{-- Cradle-to-Career --}}
                <article class="scholarship-programme-card">
                    <div class="scholarship-programme-icon">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>

                    <h3>Cradle-to-Career Scholarship</h3>

                    <p>
                        This all-inclusive programme provides opportunities
                        for brilliant pupils from less-privileged backgrounds
                        to attend both primary and high school.
                    </p>

                    <p>
                        It is designed to bridge educational inequalities
                        arising from socioeconomic differences and help
                        improve literacy levels in society.
                    </p>

                    <div class="scholarship-benefit">
                        Tuition waivers of up to 100%, subject to the
                        scholarship award and its conditions.
                    </div>

                    <p style="margin-top:15px;">
                        Recipients retain their scholarships by maintaining
                        high academic performance and moral integrity.
                    </p>
                </article>

                {{-- Special Awards --}}
                <article class="scholarship-programme-card">
                    <div class="scholarship-programme-icon">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                    </div>

                    <h3>Edugreen Special Awards</h3>

                    <p>
                        Open to all students and pupils of Edugreen Schools,
                        these annual awards recognise outstanding classroom
                        performance and positive contributions to
                        extracurricular activities and skill acquisition.
                    </p>

                    <p>
                        The awards are competitive and strictly based on
                        performance.
                    </p>

                    <div class="scholarship-benefit">
                        Winners receive gift items or cash scholarships
                        for use at the school or a university of their choice.
                    </div>
                </article>

                {{-- Collegiate Dream --}}
                <article class="scholarship-programme-card">
                    <div class="scholarship-programme-icon">
                        <i class="fa fa-university" aria-hidden="true"></i>
                    </div>

                    <h3>Collegiate Dream Scholarship</h3>

                    <p>
                        Through its Office of Advancement, Edugreen assists
                        students in securing tertiary institution scholarships
                        within and outside the country.
                    </p>

                    <p>
                        The programme gives students an opportunity to begin
                        building their education fund before leaving home
                        for college and pursuing their chosen careers.
                    </p>

                    <div class="scholarship-benefit">
                        Support towards tertiary education opportunities
                        within Nigeria and internationally.
                    </div>
                </article>

            </div>
        </div>
    </section>

    {{-- How to Apply --}}
    <section class="scholarship-section scholarship-how">
        <div class="scholarship-container">

            <div class="scholarship-heading">
                <span>Your Next Step</span>
                <h2>How to Apply</h2>
                <p>
                    Follow these steps to begin your Edugreen Scholarship
                    application.
                </p>
            </div>

            <div class="scholarship-steps">

                <article class="scholarship-step">
                    <div class="scholarship-step-number">01</div>

                    <div>
                        <h3>Complete the Application</h3>
                        <p>
                            Fill in and submit your application online through
                            the Edugreen Schools website, or visit the Office
                            of Advancement on campus to obtain an application
                            form.
                        </p>
                    </div>
                </article>

                <article class="scholarship-step">
                    <div class="scholarship-step-number">02</div>

                    <div>
                        <h3>Attend an Interview</h3>
                        <p>
                            You may be required to attend an interview.
                            Details of the interview will be communicated
                            through the phone number or email address
                            provided in your application.
                        </p>
                    </div>
                </article>

                <article class="scholarship-step">
                    <div class="scholarship-step-number">03</div>

                    <div>
                        <h3>Eligibility and Performance</h3>
                        <p>
                            The information you provide will be used to
                            confirm your eligibility. Your performance
                            will determine whether the scholarship is awarded.
                        </p>
                    </div>
                </article>

                <article class="scholarship-step">
                    <div class="scholarship-step-number">04</div>

                    <div>
                        <h3>Review the Terms and Conditions</h3>
                        <p>
                            Read the applicable scholarship terms and
                            conditions carefully before submitting your
                            application.
                        </p>
                    </div>
                </article>

            </div>

            <div class="scholarship-terms">
                <h3>Terms and Conditions</h3>
                <p>
                    Applicants should read the scholarship terms and
                    conditions policy carefully to understand the
                    requirements and obligations associated with the
                    scholarship scheme.
                </p>
            </div>

        </div>
    </section>

    {{-- Call to Action --}}
    <section class="scholarship-cta">
        <div class="scholarship-cta-inner">

            <div>
                <h2>Help a Child Reach Their Potential</h2>
                <p>
                    The Edugreen Scholarship Scheme is committed to expanding
                    educational opportunities for children from disadvantaged
                    backgrounds. Contact our Office of Advancement for
                    information about the scheme and its application process.
                </p>
            </div>

            <a href="mailto:chrisjessey301@gmail.com"
               class="scholarship-cta-button">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                Contact Advancement
            </a>

        </div>
    </section>

</div>

@endsection
