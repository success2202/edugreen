
@extends('layouts.app')

@section('content')

<style>
    .advancement-page {
        --adv-green: #176b43;
        --adv-dark: #103b2b;
        --adv-light: #f3f8f4;
        --adv-gold: #d6ad58;
        color: #33443a;
        font-family: inherit;
    }

    .advancement-page * {
        box-sizing: border-box;
    }
 
    .advancement-hero {
        position: relative;
        padding: 95px 20px 90px;
        overflow: hidden;
        background:
            linear-gradient(110deg, rgba(10, 70, 47, .98),
            rgba(23, 107, 69, .88)),
            url('{{ asset('frontend/assets/img/nursery.jpeg') }}')
            center/cover no-repeat;
        color: #fff;
    }

    .advancement-hero::before,
    .advancement-hero::after {
        content: "";
        position: absolute;
        border: 1px solid rgba(255,255,255,.13);
        border-radius: 50%;
        pointer-events: none;
    }

    .advancement-hero::before {
        width: 390px;
        height: 390px;
        right: -100px;
        top: -170px;
    }

    .advancement-hero::after {
        width: 270px;
        height: 270px;
        right: -40px;
        top: -105px;
    }

    .advancement-hero-inner {
        position: relative;
        z-index: 1;
        max-width: 1140px;
        margin: auto;
    }

    .advancement-eyebrow {
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

    .advancement-hero h1 {
        max-width: 750px;
        margin: 0 0 20px;
        color: #fff;
        font-size: clamp(34px, 5vw, 57px);
        font-weight: 800;
        line-height: 1.15;
    }

    .advancement-hero p {
        max-width: 690px;
        margin: 0;
        color: rgba(255,255,255,.85);
        font-size: 17px;
        line-height: 1.9;
    }

    .advancement-section {
        padding: 80px 20px;
    }

    .advancement-container {
        max-width: 1140px;
        margin: auto;
    }

    .advancement-section-heading {
        margin-bottom: 35px;
    }

    .advancement-section-heading span {
        display: block;
        margin-bottom: 12px;
        color: var(--adv-green);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .advancement-section-heading h2 {
        margin: 0 0 15px;
        color: var(--adv-dark);
        font-size: clamp(27px, 3vw, 38px);
        font-weight: 800;
        line-height: 1.3;
    }

    .advancement-section-heading p {
        max-width: 680px;
        margin: 0;
        color: #69786f;
        font-size: 16px;
        line-height: 1.8;
    }

    .advancement-welcome {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(260px, .8fr);
        gap: 45px;
        align-items: start;
    }

    .advancement-copy p {
        margin-bottom: 20px;
        color: #56645b;
        font-size: 15px;
        line-height: 1.95;
    }

    .advancement-director-card {
        padding: 30px;
        background: var(--adv-light);
        border: 1px solid #e3eee6;
        border-radius: 16px;
        border-top: 4px solid var(--adv-gold);
    }

    .advancement-director-icon {
        display: flex;
        width: 65px;
        height: 65px;
        align-items: center;
        justify-content: center;
        margin-bottom: 22px;
        border-radius: 16px;
        background: #dceee1;
        color: var(--adv-green);
        font-size: 28px;
    }

    .advancement-director-card h3 {
        margin: 0 0 8px;
        color: var(--adv-dark);
        font-size: 20px;
        font-weight: 800;
        line-height: 1.5;
    }

    .advancement-director-card .director-role {
        margin-bottom: 22px;
        color: var(--adv-green);
        font-size: 14px;
        font-weight: 600;
    }

    .advancement-contact-link {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        margin-top: 17px;
        color: #4b5e51;
        font-size: 14px;
        line-height: 1.7;
        overflow-wrap: anywhere;
    }

    .advancement-contact-link i {
        margin-top: 4px;
        color: var(--adv-green);
    }

    .advancement-contact-link a {
        color: inherit;
        text-decoration: none;
    }

    .advancement-contact-link a:hover {
        color: var(--adv-green);
    }

    .advancement-team-section {
        background: #f5f8f5;
    }

    .advancement-team-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
        margin-top: 40px;
    }

    .advancement-team-card {
        position: relative;
        min-width: 0;
        padding: 30px 24px;
        overflow: hidden;
        background: #fff;
        border: 1px solid #e7eee8;
        border-radius: 14px;
        box-shadow: 0 7px 25px rgba(20, 60, 35, .045);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .advancement-team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 32px rgba(20, 60, 35, .09);
    }

    .advancement-team-card::before {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--adv-green);
        content: "";
    }

    .advancement-team-number {
        display: flex;
        width: 52px;
        height: 52px;
        align-items: center;
        justify-content: center;
        margin-bottom: 23px;
        border-radius: 14px;
        background: #eaf4ec;
        color: var(--adv-green);
        font-size: 18px;
        font-weight: 800;
    }

    .advancement-team-card h3 {
        margin: 0 0 10px;
        color: var(--adv-dark);
        font-size: 17px;
        font-weight: 800;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .advancement-team-card p {
        margin: 0;
        color: #728076;
        font-size: 14px;
        line-height: 1.7;
    }

    .advancement-team-divider {
        width: 42px;
        height: 3px;
        margin-top: 22px;
        border-radius: 4px;
        background: var(--adv-gold);
    }

    .advancement-cta {
        padding: 60px 20px;
        background: var(--adv-dark);
        color: #fff;
    }

    .advancement-cta-inner {
        display: flex;
        max-width: 1140px;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
        margin: auto;
    }

    .advancement-cta h2 {
        margin: 0 0 12px;
        color: #fff;
        font-size: clamp(25px, 3vw, 34px);
        font-weight: 800;
        line-height: 1.35;
    }

    .advancement-cta p {
        max-width: 650px;
        margin: 0;
        color: rgba(255,255,255,.78);
        font-size: 15px;
        line-height: 1.8;
    }

    .advancement-cta-button {
        display: inline-flex;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 15px 23px;
        border-radius: 7px;
        background: var(--adv-gold);
        color: #173b2b !important;
        font-size: 14px;
        font-weight: 800;
        text-decoration: none !important;
        transition: background .2s ease;
    }

    .advancement-cta-button:hover {
        background: #edca7d;
    }

    @media (max-width: 991px) {
        .advancement-welcome {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .advancement-director-card {
            max-width: 100%;
        }

        .advancement-team-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .advancement-cta-inner {
            align-items: flex-start;
            flex-direction: column;
        }
    }

    @media (max-width: 575px) {
        .advancement-hero {
            padding: 65px 18px;
        }

        .advancement-hero p {
            font-size: 15px;
        }

        .advancement-section {
            padding: 55px 16px;
        }

        .advancement-team-grid {
            grid-template-columns: 1fr;
            gap: 16px;
            margin-top: 28px;
        }

        .advancement-team-card {
            padding: 25px 22px;
        }

        .advancement-director-card {
            padding: 24px 20px;
        }

        .advancement-cta {
            padding: 45px 18px;
        }

        .advancement-cta-button {
            width: 100%;
        }
    }
</style>

<div class="advancement-page">

    {{-- Hero Section --}}
    <section class="advancement-hero">
        <div class="advancement-hero-inner">
            <span class="advancement-eyebrow">Edugreen Schools</span>

            <h1>Office of Advancement</h1>

            <p>
                Building meaningful partnerships, inspiring generosity,
                and creating brighter opportunities for every student.
            </p>
        </div>
    </section>

    {{-- Welcome Section --}}
    <section class="advancement-section">
        <div class="advancement-container">

            <div class="advancement-welcome">

                <div class="advancement-copy">
                    <div class="advancement-section-heading">
                        <span>Welcome to Advancement</span>
                        <h2>Working Together for a Brighter Future</h2>
                        <p style="text-align:justify;">
                            Thank you for visiting the Advancement web page
                            at Edugreen Schools. We welcome the opportunity
                            to answer your questions and share our passion
                            for Edugreen.
                        </p>
                    </div>

                    <p style="text-align:justify;">
                        Making meaningful memories is what we strive to do
                        every day while providing the best possible education
                        for our students.
                    </p>

                    <p style="text-align:justify;">
                        Since inception, we have relied on a partnership with
                        parents, community members, and international donors
                        to succeed in our mission of providing life-changing
                        education through the liberal arts and skill
                        acquisition experience. We also provide top-notch
                        professional development for our teachers,
                        administrators, and staff, while supporting our
                        programs and enhancing the classroom environment.
                    </p>

                    <p style="text-align:justify;">
                        As Director of Advancement, my role is to honor,
                        sustain, and expand this crucial partnership between
                        the school and its philanthropic community, ensuring
                        that philanthropy at Edugreen merits the respect and
                        trust of every donor.
                    </p>

                    <p style="text-align:justify;">
                        We are dedicated to supporting the school's mission
                        by securing financial resources through the Edugreen
                        Fund, Endowment, and Edugreen Scholarship, while
                        promoting Edugreen locally and internationally.
                        We count on your generous support. With your help,
                        we offer our best each and every day to our students,
                        now and into the future.
                    </p>

                    <p style="text-align:justify;">
                        Thank you again for your interest in Advancement at
                        Edugreen Schools. I look forward to working with you
                        in building a bright future for our entire community.
                    </p>
                </div>

                {{-- Director Contact Card --}}
                <aside class="advancement-director-card">
                    <div class="advancement-director-icon">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                    </div>

                    <h3>Mr. ANYANWU CHRISTOPHER J.</h3>

                    <p class="director-role">
                        Director of Advancement
                    </p>

                    <p style="font-size:14px; line-height:1.8; color:#66766b;">
                        I welcome the opportunity to discuss our work,
                        partnerships, and ways to support Edugreen Schools.
                    </p>

                    <div class="advancement-contact-link">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:chrisjessey301@gmail.com">
                            chrisjessey301@gmail.com
                        </a>
                    </div>

                    <div class="advancement-contact-link">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <a href="tel:+2347069616632">
                            +2347069616632
                        </a>
                    </div>
                </aside>

            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="advancement-section advancement-team-section">
        <div class="advancement-container">

            <div class="advancement-section-heading">
                <span>The People Behind Our Mission</span>
                <h2>Meet Our Team</h2>
                <p>
                    Our Advancement team works to strengthen relationships,
                    support educational opportunities, and build a lasting
                    future for Edugreen Schools.
                </p>
            </div>

            <div class="advancement-team-grid">

                <article class="advancement-team-card">
                    <div class="advancement-team-number">01</div>
                    <h3>Mr. ANYANWU CHRISTOPHER J.</h3>
                    <p>Director of Advancement</p>
                    <div class="advancement-team-divider"></div>
                </article>

                <article class="advancement-team-card">
                    <div class="advancement-team-number">02</div>
                    <h3>Miss. DAMILOLA AJIROBA</h3>
                    <p>Associate Director of Advancement</p>
                    <div class="advancement-team-divider"></div>
                </article>

                <article class="advancement-team-card">
                    <div class="advancement-team-number">03</div>
                    <h3>Mrs JENNIFER ADA BLACKBOURN</h3>
                    <p>Director of Edugreen Fund and Alumni Relations</p>
                    <div class="advancement-team-divider"></div>
                </article>

                <article class="advancement-team-card">
                    <div class="advancement-team-number">04</div>
                    <h3>Mr. TAMUNOKURO L. FUAYEFIKA</h3>
                    <p>Director of Edugreen Scholarship and Charity Management</p>
                    <div class="advancement-team-divider"></div>
                </article>

                <article class="advancement-team-card">
                    <div class="advancement-team-number">05</div>
                    <h3>Mrs. ADOLPHUS JESSICA GODGIFT</h3>
                    <p>Event Operations Manager</p>
                    <div class="advancement-team-divider"></div>
                </article>

                <article class="advancement-team-card">
                    <div class="advancement-team-number">06</div>
                    <h3>Miss. NWACHUKWU ESTHER CHIKA</h3>
                    <p>Advancement Assistant</p>
                    <div class="advancement-team-divider"></div>
                </article>

            </div>
        </div>
    </section>

    {{-- Contact / Call to Action --}}
    <section class="advancement-cta">
        <div class="advancement-cta-inner">
            <div>
                <h2>Help Us Build a Brighter Future</h2>
                <p>
                    Your support helps us strengthen educational
                    opportunities, improve our learning environment,
                    and invest in the future of our students.
                    Contact our Director of Advancement to learn more.
                </p>
            </div>

            <a href="mailto:chrisjessey301@gmail.com"
               class="advancement-cta-button">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                Contact Advancement
            </a>
        </div>
    </section>

</div>

@endsection
