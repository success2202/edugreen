
@extends('layouts.app')

@section('title', 'Privacy Policy | Edugreen Schools')

@section('content')

<style>
    .privacy-page {
        font-family: inherit;
        color: #34443b;
        background: #f7faf8;
        padding-bottom: 70px;
    }

    .privacy-hero {
         background:
            linear-gradient(110deg, rgba(10, 70, 47, .98),
            rgba(23, 107, 69, .88)),
            url('{{ asset('frontend/assets/img/nursery.jpeg') }}')
            center/cover no-repeat;
        color: #fff;
        padding: 75px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .privacy-hero:before {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border: 45px solid rgba(255,255,255,.06);
        border-radius: 50%;
        top: -110px;
        right: -60px;
    }

    .privacy-hero .privacy-label {
        display: inline-block;
        color: #f0d58c;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .privacy-hero h1 {
        color: #fff;
        font-size: 42px;
        font-weight: 800;
        margin: 0 0 15px;
    }

    .privacy-hero p {
        color: rgba(255,255,255,.9);
        max-width: 680px;
        margin: 0 auto;
        font-size: 16px;
        line-height: 1.8;
    }

    .privacy-breadcrumb {
        background: #fff;
        padding: 15px 0;
        border-bottom: 1px solid #e8eee9;
    }

    .privacy-breadcrumb a {
        color: #176b45;
        text-decoration: none;
    }

    .privacy-breadcrumb span {
        color: #7a887f;
        font-size: 13px;
    }

    .privacy-container {
        max-width: 1140px;
        margin: 45px auto 0;
        padding: 0 20px;
    }

    .privacy-layout {
        display: grid;
        grid-template-columns: 270px minmax(0, 1fr);
        gap: 30px;
        align-items: start;
    }

    .privacy-sidebar {
        background: #fff;
        border: 1px solid #e4ece6;
        border-radius: 12px;
        padding: 25px 20px;
        position: sticky;
        top: 25px;
        box-shadow: 0 8px 25px rgba(16,59,43,.04);
    }

    .privacy-sidebar h3 {
        color: #103b2b;
        font-size: 17px;
        font-weight: 700;
        margin: 0 0 18px;
    }

    .privacy-sidebar a {
        display: block;
        color: #536359;
        text-decoration: none;
        font-size: 13px;
        line-height: 1.5;
        padding: 9px 11px;
        border-radius: 6px;
        margin-bottom: 4px;
        transition: all .2s ease;
    }

    .privacy-sidebar a:hover {
        background: #edf6ef;
        color: #176b45;
    }

    .privacy-content {
        background: #fff;
        border: 1px solid #e4ece6;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 8px 25px rgba(16,59,43,.04);
        min-width: 0;
    }

    .privacy-intro {
        background: #f0f7f1;
        border-left: 4px solid #278553;
        padding: 20px 22px;
        border-radius: 0 8px 8px 0;
        margin-bottom: 32px;
    }

    .privacy-intro p {
        margin: 0;
    }

    .privacy-section {
        padding: 0 0 25px;
        margin-bottom: 27px;
        border-bottom: 1px solid #edf1ee;
        scroll-margin-top: 25px;
    }

    .privacy-section:last-of-type {
        border-bottom: none;
    }

    .privacy-section h2 {
        color: #176b45;
        font-size: 22px;
        font-weight: 750;
        line-height: 1.4;
        margin: 0 0 15px;
    }

    .privacy-section h3 {
        color: #183e2d;
        font-size: 16px;
        font-weight: 700;
        margin: 20px 0 10px;
    }

    .privacy-section p {
        color: #536359;
        font-size: 14px;
        line-height: 1.9;
        margin-bottom: 13px;
        text-align: left;
        overflow-wrap: anywhere;
    }

    .privacy-section ul {
        padding-left: 22px;
        margin: 12px 0 18px;
    }

    .privacy-section li {
        color: #536359;
        font-size: 14px;
        line-height: 1.85;
        padding-left: 4px;
        margin-bottom: 7px;
    }

    .privacy-section li::marker {
        color: #278553;
    }

    .privacy-contact {
        background: linear-gradient(135deg, #103b2b, #176b45);
        border-radius: 12px;
        padding: 30px;
        color: #fff;
        margin-top: 15px;
    }

    .privacy-contact h2 {
        color: #fff;
        font-size: 23px;
        font-weight: 700;
        margin: 0 0 12px;
    }

    .privacy-contact p {
        color: rgba(255,255,255,.88);
        font-size: 14px;
        line-height: 1.8;
        margin-bottom: 12px;
    }

    .privacy-contact a {
        color: #f0d58c;
        text-decoration: none;
        overflow-wrap: anywhere;
    }

    .privacy-updated {
        color: #7b8980;
        font-size: 12px;
        line-height: 1.8;
        margin-top: 25px;
    }

    .privacy-note {
        background: #fff8e8;
        border: 1px solid #f1e2b8;
        border-radius: 8px;
        padding: 16px 18px;
        color: #705a28;
        font-size: 12px;
        line-height: 1.8;
        margin-top: 25px;
    }

    @media (max-width: 991px) {
        .privacy-layout {
            grid-template-columns: 1fr;
        }

        .privacy-sidebar {
            position: static;
        }

        .privacy-sidebar nav {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 4px 10px;
        }

        .privacy-content {
            padding: 30px;
        }
    }

    @media (max-width: 575px) {
        .privacy-hero {
            padding: 55px 18px;
        }

        .privacy-hero h1 {
            font-size: 31px;
        }

        .privacy-hero p {
            font-size: 14px;
        }

        .privacy-container {
            padding: 0 14px;
            margin-top: 25px;
        }

        .privacy-sidebar,
        .privacy-content {
            padding: 22px 18px;
        }

        .privacy-sidebar nav {
            grid-template-columns: 1fr;
        }

        .privacy-section h2 {
            font-size: 19px;
        }

        .privacy-contact {
            padding: 23px 20px;
        }
    }
</style>

<div class="privacy-page">

    {{-- Hero Section --}}
    <section class="privacy-hero">
        <div class="container">
            <span class="privacy-label">Edugreen Schools</span>
            <h1>Privacy Policy</h1>
            <p>
                Your privacy matters to us. Learn how Edugreen Schools
                collects, uses, protects, and manages personal information
                while providing a safe and supportive learning environment.
            </p>
        </div>
    </section>

    {{-- Breadcrumb --}}
    <div class="privacy-breadcrumb">
        <div class="container">
            <span>
                <a href="{{ url('/') }}">Home</a>
                &nbsp; / &nbsp; Privacy Policy
            </span>
        </div>
    </div>

    <div class="privacy-container">
        <div class="privacy-layout">

            {{-- Sidebar Navigation --}}
            <aside class="privacy-sidebar">
                <h3>On This Page</h3>

                <nav>
                    <a href="#introduction">1. Introduction</a>
                    <a href="#information">2. Information We Collect</a>
                    <a href="#usage">3. How We Use Information</a>
                    <a href="#legal-basis">4. Legal Basis</a>
                    <a href="#children">5. Children's Privacy</a>
                    <a href="#photographs">6. Photographs and Videos</a>
                    <a href="#sharing">7. Information Sharing</a>
                    <a href="#security">8. Data Security</a>
                    <a href="#retention">9. Data Retention</a>
                    <a href="#cookies">10. Cookies</a>
                    <a href="#rights">11. Privacy Rights</a>
                    <a href="#third-party">12. Third-Party Websites</a>
                    <a href="#breaches">13. Security Incidents</a>
                    <a href="#changes">14. Policy Updates</a>
                    <a href="#contact">15. Contact Us</a>
                </nav>
            </aside>

            {{-- Main Policy Content --}}
            <main class="privacy-content">

                <div class="privacy-intro">
                    <p>
                        Edugreen Schools is committed to protecting the privacy,
                        dignity, and safety of our students, parents, guardians,
                        staff, and website visitors. This policy explains how we
                        handle personal information in connection with our
                        educational services and website.
                    </p>
                </div>

                <section class="privacy-section" id="introduction">
                    <h2>1. Introduction</h2>

                    <p>
                        Edugreen Schools is a private international school
                        committed to providing an inclusive educational
                        community where learners feel loved, respected,
                        supported, and encouraged to develop their fullest
                        potential without discrimination based on race,
                        religion, ethnic origin, age, ability, or gender identity.
                    </p>

                    <p>
                        Our school is located at 300 Ikwerre Road, Rumueme,
                        Mile 4, Port Harcourt, Rivers State, Nigeria.
                        We provide educational services for children in Creche,
                        Pre-school, Kindergarten, and Grade School.
                    </p>

                    <p>
                        We are recognised for our experienced faculty, rich
                        curriculum, nurturing community, beautiful environment,
                        and extracurricular activities, including skill
                        acquisition programmes.
                    </p>

                    <p>
                        This Privacy Policy explains how we collect, use,
                        store, protect, and disclose personal information.
                        By interacting with our school or website, you
                        acknowledge this policy, subject to any consent
                        requirements imposed by applicable law.
                    </p>
                </section>

                <section class="privacy-section" id="information">
                    <h2>2. Information We Collect</h2>

                    <p>
                        The information we collect depends on your relationship
                        with the school and the services you use.
                    </p>

                    <h3>A. Student Information</h3>
                    <ul>
                        <li>Student names, dates of birth, photographs, and relevant identification details.</li>
                        <li>Admission records, class placement, attendance, academic results, and progress reports.</li>
                        <li>Participation in school activities, competitions, excursions, and skill acquisition programmes.</li>
                        <li>Relevant medical, dietary, emergency-contact, or accessibility information needed to support student welfare and safety.</li>
                    </ul>

                    <h3>B. Parent and Guardian Information</h3>
                    <ul>
                        <li>Names, telephone numbers, email addresses, and residential addresses.</li>
                        <li>Relationship to the student and emergency-contact details.</li>
                        <li>Information supplied during admissions, registration, fee administration, and school communications.</li>
                    </ul>

                    <h3>C. Website and Communication Information</h3>
                    <ul>
                        <li>Information submitted through enquiry forms, application forms, or other communication channels.</li>
                        <li>Technical information such as browser type, device information, and website usage data, where collected.</li>
                        <li>Information necessary to respond to enquiries, process requests, and maintain website security.</li>
                    </ul>

                    <p>
                        We aim to collect only information reasonably
                        necessary for legitimate educational, administrative,
                        safeguarding, and operational purposes.
                    </p>
                </section>

                <section class="privacy-section" id="usage">
                    <h2>3. How We Use Personal Information</h2>

                    <p>Edugreen Schools may use personal information to:</p>

                    <ul>
                        <li>Process admissions, registrations, and enrolment.</li>
                        <li>Deliver educational programmes and monitor student progress.</li>
                        <li>Communicate with parents and guardians about academic performance, school events, announcements, and important updates.</li>
                        <li>Maintain attendance records, academic reports, and school administration records.</li>
                        <li>Support student welfare, safeguarding, medical needs, and emergency response.</li>
                        <li>Administer school fees and other authorised school transactions.</li>
                        <li>Organise extracurricular activities, competitions, excursions, and skill acquisition programmes.</li>
                        <li>Respond to enquiries, complaints, and requests.</li>
                        <li>Maintain website functionality, prevent misuse, and improve our services.</li>
                        <li>Meet applicable legal, regulatory, and record-keeping obligations.</li>
                    </ul>
                </section>

                <section class="privacy-section" id="legal-basis">
                    <h2>4. Legal Basis for Processing</h2>

                    <p>
                        Where applicable, Edugreen Schools processes personal
                        information on an appropriate legal basis. This may
                        include consent, the provision of educational services,
                        compliance with legal obligations, protection of vital
                        interests, or another lawful basis recognised by
                        applicable data-protection legislation.
                    </p>

                    <p>
                        Where consent is required, particularly for optional
                        uses of children's photographs or promotional materials,
                        we will seek consent from the appropriate parent,
                        guardian, or individual before proceeding.
                    </p>
                </section>

                <section class="privacy-section" id="children">
                    <h2>5. Children's Privacy and Safeguarding</h2>

                    <p>
                        Because Edugreen Schools serves young learners,
                        protecting children's personal information is a priority.
                    </p>

                    <p>
                        We take reasonable steps to ensure student information
                        is handled carefully and accessed only by authorised
                        individuals who need it for their responsibilities.
                    </p>

                    <p>
                        We may process children's information for admission,
                        education, academic assessment, health and safety,
                        safeguarding, and school administration where
                        lawfully permitted.
                    </p>

                    <p>
                        Parents and legal guardians should provide accurate
                        information and inform the school of relevant changes
                        that may affect a child's safety, care, or education.
                    </p>

                    <p>
                        We do not knowingly use children's personal information
                        for unrelated purposes without an appropriate lawful
                        basis. Where required, parental or guardian consent
                        will be obtained before processing information for
                        optional activities or publicity.
                    </p>
                </section>

                <section class="privacy-section" id="photographs">
                    <h2>6. Photographs, Videos, and Publicity</h2>

                    <p>
                        Edugreen Schools may take photographs or videos during
                        school activities, celebrations, competitions, and
                        events for educational records, internal communication,
                        and school documentation.
                    </p>

                    <p>
                        Where required, we will obtain appropriate consent
                        before using identifiable student photographs or videos
                        for promotional purposes, including the school website,
                        social media pages, brochures, advertisements, or
                        other public materials.
                    </p>

                    <p>
                        Parents or guardians may contact the school with
                        questions about publicity consent or request that
                        optional publicity permissions be withdrawn, subject
                        to applicable law and practical or legal limitations.
                    </p>
                </section>

                <section class="privacy-section" id="sharing">
                    <h2>7. Sharing of Personal Information</h2>

                    <p>
                        Edugreen Schools does not intend to sell students'
                        or parents' personal information. We may share
                        relevant information where reasonably necessary
                        and lawful, including with:
                    </p>

                    <ul>
                        <li>Authorised school administrators, teachers, and relevant staff.</li>
                        <li>Parents or legal guardians who are entitled to receive the information.</li>
                        <li>Service providers supporting school operations, website hosting, communication, or information technology, subject to appropriate safeguards.</li>
                        <li>Healthcare providers or emergency services where necessary to protect a student's health or safety.</li>
                        <li>Government authorities, regulators, or law-enforcement agencies where disclosure is legally required or otherwise lawful.</li>
                    </ul>

                    <p>
                        We take reasonable steps to ensure that third parties
                        handling personal information on our behalf protect
                        it appropriately.
                    </p>
                </section>

                <section class="privacy-section" id="security">
                    <h2>8. Data Security</h2>

                    <p>
                        Edugreen Schools takes reasonable technical and
                        organisational measures to protect personal
                        information against unauthorised access, loss,
                        alteration, disclosure, or misuse.
                    </p>

                    <p>
                        Measures may include access restrictions, secure
                        record handling, staff confidentiality practices,
                        and appropriate technical safeguards.
                    </p>

                    <p>
                        However, no website, electronic system, or method
                        of transmitting information can be guaranteed to
                        be completely secure. We encourage parents and
                        guardians to share sensitive information only
                        through appropriate communication channels.
                    </p>
                </section>

                <section class="privacy-section" id="retention">
                    <h2>9. Data Retention</h2>

                    <p>
                        We retain personal information only for as long as
                        reasonably necessary for the purpose for which it
                        was collected, including educational administration,
                        safeguarding, legal compliance, and legitimate
                        record-keeping requirements.
                    </p>

                    <p>
                        Retention periods may differ depending on the type
                        of information and applicable legal obligations.
                        When information is no longer required, we will
                        take appropriate steps to securely delete, destroy,
                        or anonymise it where practicable and lawful.
                    </p>
                </section>

                <section class="privacy-section" id="cookies">
                    <h2>10. Cookies and Website Technologies</h2>

                    <p>
                        Our website may use cookies or similar technologies
                        to support essential functionality, improve user
                        experience, understand website usage, or maintain
                        security.
                    </p>

                    <p>
                        Where required, we will provide appropriate
                        information and obtain consent for non-essential
                        cookies or similar technologies.
                    </p>

                    <p>
                        Users may be able to manage cookies through their
                        browser settings. Disabling certain cookies may
                        affect some website features.
                    </p>
                </section>

                <section class="privacy-section" id="rights">
                    <h2>11. Your Privacy Rights</h2>

                    <p>
                        Subject to applicable law, individuals may have
                        the right to:
                    </p>

                    <ul>
                        <li>Request access to their personal information.</li>
                        <li>Ask for inaccurate or incomplete information to be corrected.</li>
                        <li>Request deletion of personal information where legally applicable.</li>
                        <li>Object to or request restrictions on certain processing activities.</li>
                        <li>Withdraw consent where processing relies on consent.</li>
                        <li>Request information about how their personal information is used.</li>
                        <li>Lodge a complaint with the relevant data-protection authority.</li>
                    </ul>

                    <p>
                        Parents and legal guardians may exercise applicable
                        rights on behalf of their children, subject to
                        verification of their identity and legal authority.
                    </p>

                    <p>
                        Some requests may be limited by legal, safeguarding,
                        educational record-keeping, or other lawful
                        requirements.
                    </p>
                </section>

                <section class="privacy-section" id="third-party">
                    <h2>12. Third-Party Websites and Services</h2>

                    <p>
                        Our website may contain links to third-party
                        websites, platforms, or services. These third
                        parties may have their own privacy policies and
                        data-handling practices.
                    </p>

                    <p>
                        Edugreen Schools is not responsible for the privacy
                        practices of independent third-party websites.
                        We encourage users to review those websites'
                        privacy policies before submitting personal
                        information.
                    </p>
                </section>

                <section class="privacy-section" id="breaches">
                    <h2>13. Data Breaches and Security Incidents</h2>

                    <p>
                        If a personal-data breach occurs, Edugreen Schools
                        will assess the incident and take appropriate steps
                        in accordance with applicable legal requirements.
                        Where notification is required, we will notify the
                        relevant authority and affected individuals within
                        the timeframes prescribed by law.
                    </p>
                </section>

                <section class="privacy-section" id="changes">
                    <h2>14. Changes to This Privacy Policy</h2>

                    <p>
                        Edugreen Schools may update this Privacy Policy to
                        reflect changes in educational services, website
                        functionality, operational practices, or legal
                        requirements.
                    </p>

                    <p>
                        Updates will be published on this page with a
                        revised last-updated date. We encourage parents,
                        guardians, and website visitors to review this
                        page periodically.
                    </p>
                </section>

                <section class="privacy-section" id="contact">
                    <h2>15. Contact Us</h2>

                    <p>
                        If you have questions about this Privacy Policy,
                        wish to exercise your privacy rights, or need
                        clarification about how personal information is
                        handled, please contact Edugreen Schools.
                    </p>
                </section>

                {{-- Contact Card --}}
                <div class="privacy-contact">
                    <h2>Contact Edugreen Schools</h2>

                    <p>
                        <strong>Address:</strong><br>
                        300 Ikwerre Road, Rumueme, Mile 4,
                        Port Harcourt, Rivers State, Nigeria.
                    </p>

                    <p>
                        <strong>Email:</strong><br>
                        <a href="mailto:{{ config('mail.from.address') }}">
                            {{ config('mail.from.address') ?: 'Please insert the official school email' }}
                        </a>
                    </p>

                    <p>
                        <strong>Telephone:</strong><br>
                        Please insert the official school telephone number.
                    </p>
                </div>

                <div class="privacy-note">
                    <strong>Important:</strong> This policy should be reviewed
                    and adapted to reflect Edugreen Schools' actual data
                    collection, storage, sharing, and consent practices
                    before publication.
                </div>

                <div class="privacy-updated">
                    Effective date: 30/10/2026.<br>
                    Last updated: 30/10/2026.
                </div>

            </main>
        </div>
    </div>

</div>

@endsection
