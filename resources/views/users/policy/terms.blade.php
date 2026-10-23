
@extends('layouts.app')

@section('title', 'Terms and Conditions | Edugreen Schools')

@section('content')

<style>
    .edu-terms-page {
        background: #f7faf8;
        color: #34483b;
        padding-bottom: 65px;
        font-family: inherit;
    }

    .edu-terms-hero {
        background:
            linear-gradient(110deg, rgba(9, 69, 46, .98),
            rgba(23, 107, 69, .90)),
            url('{{ asset('frontend/assets/img/nursery.jpeg') }}')
            center/cover no-repeat;
        padding: 75px 20px;
        text-align: center;
        color: #fff;
    }

    .edu-terms-hero .eyebrow {
        display: inline-block;
        color: #f1d17c;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 13px;
    }

    .edu-terms-hero h1 {
        color: #fff;
        font-size: 42px;
        font-weight: 800;
        margin: 0 0 15px;
    }

    .edu-terms-hero p {
        max-width: 720px;
        margin: 0 auto;
        color: rgba(255, 255, 255, .9);
        font-size: 15px;
        line-height: 1.9;
    }

    .edu-terms-breadcrumb {
        background: #fff;
        border-bottom: 1px solid #e5ece6;
        padding: 15px 0;
    }

    .edu-terms-breadcrumb a {
        color: #176b45;
        text-decoration: none;
    }

    .edu-terms-breadcrumb span {
        font-size: 13px;
        color: #718078;
    }

    .edu-terms-container {
        max-width: 1140px;
        padding: 0 20px;
        margin: 40px auto 0;
    }

    .edu-terms-layout {
        display: grid;
        grid-template-columns: 265px minmax(0, 1fr);
        gap: 28px;
        align-items: start;
    }

    .edu-terms-sidebar {
        background: #fff;
        border: 1px solid #e3ebe4;
        border-radius: 12px;
        padding: 25px 18px;
        position: sticky;
        top: 25px;
        box-shadow: 0 8px 25px rgba(16, 59, 43, .04);
    }

    .edu-terms-sidebar h3 {
        color: #103b2b;
        font-size: 17px;
        font-weight: 800;
        margin: 0 0 17px;
    }

    .edu-terms-sidebar a {
        display: block;
        color: #536359;
        text-decoration: none;
        font-size: 13px;
        line-height: 1.6;
        padding: 9px 10px;
        margin-bottom: 3px;
        border-radius: 6px;
        transition: all .2s ease;
    }

    .edu-terms-sidebar a:hover {
        color: #176b45;
        background: #edf6ef;
    }

    .edu-terms-content {
        background: #fff;
        border: 1px solid #e3ebe4;
        border-radius: 12px;
        padding: 38px;
        min-width: 0;
        box-shadow: 0 8px 25px rgba(16, 59, 43, .04);
    }

    .edu-terms-intro {
        background: #eef7f0;
        border-left: 4px solid #278553;
        border-radius: 0 8px 8px 0;
        padding: 20px;
        margin-bottom: 30px;
    }

    .edu-terms-intro p {
        color: #405b49;
        font-size: 14px;
        line-height: 1.9;
        margin: 0;
    }

    .edu-terms-section {
        padding-bottom: 25px;
        margin-bottom: 25px;
        border-bottom: 1px solid #edf1ee;
        scroll-margin-top: 25px;
    }

    .edu-terms-section:last-of-type {
        border-bottom: none;
    }

    .edu-terms-section h2 {
        color: #176b45;
        font-size: 21px;
        font-weight: 800;
        line-height: 1.45;
        margin: 0 0 14px;
    }

    .edu-terms-section h3 {
        color: #183e2d;
        font-size: 16px;
        font-weight: 700;
        margin: 20px 0 10px;
    }

    .edu-terms-section p {
        color: #536359;
        font-size: 14px;
        line-height: 1.9;
        text-align: left;
        margin: 0 0 13px;
        overflow-wrap: anywhere;
    }

    .edu-terms-section ul {
        padding-left: 22px;
        margin: 12px 0 16px;
    }

    .edu-terms-section li {
        color: #536359;
        font-size: 14px;
        line-height: 1.85;
        margin-bottom: 8px;
        padding-left: 3px;
    }

    .edu-terms-section li::marker {
        color: #278553;
    }

    .edu-terms-contact {
        background: linear-gradient(120deg, #103b2b, #176b45);
        color: #fff;
        border-radius: 12px;
        padding: 30px;
        margin-top: 10px;
    }

    .edu-terms-contact h2 {
        color: #fff;
        font-size: 23px;
        font-weight: 800;
        margin: 0 0 12px;
    }

    .edu-terms-contact p {
        color: rgba(255, 255, 255, .9);
        font-size: 14px;
        line-height: 1.9;
        margin: 0 0 10px;
    }

    .edu-terms-contact a {
        color: #f1d17c;
        text-decoration: none;
        overflow-wrap: anywhere;
    }

    .edu-terms-note {
        background: #fff8e8;
        border: 1px solid #f0e0b5;
        border-radius: 8px;
        padding: 16px;
        color: #705a28;
        font-size: 12px;
        line-height: 1.8;
        margin-top: 25px;
    }

    .edu-terms-updated {
        color: #7a887f;
        font-size: 12px;
        line-height: 1.8;
        margin-top: 22px;
    }

    @media (max-width: 991px) {
        .edu-terms-layout {
            grid-template-columns: 1fr;
        }

        .edu-terms-sidebar {
            position: static;
        }

        .edu-terms-sidebar nav {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 4px 10px;
        }

        .edu-terms-content {
            padding: 28px;
        }
    }

    @media (max-width: 575px) {
        .edu-terms-hero {
            padding: 52px 18px;
        }

        .edu-terms-hero h1 {
            font-size: 31px;
        }

        .edu-terms-hero p {
            font-size: 14px;
        }

        .edu-terms-container {
            padding: 0 14px;
            margin-top: 25px;
        }

        .edu-terms-sidebar,
        .edu-terms-content {
            padding: 20px 16px;
        }

        .edu-terms-sidebar nav {
            grid-template-columns: 1fr;
        }

        .edu-terms-section h2 {
            font-size: 19px;
        }

        .edu-terms-contact {
            padding: 23px 19px;
        }
    }
</style>

<div class="edu-terms-page">

    {{-- Hero Section --}}
    <section class="edu-terms-hero">
        <div class="container">
            <span class="eyebrow">Edugreen Schools</span>

            <h1>Terms and Conditions</h1>

            <p>
                Our terms help create a safe, respectful, inclusive,
                and supportive learning environment for every learner
                and member of the Edugreen community.
            </p>
        </div>
    </section>

    {{-- Breadcrumb --}}
    <div class="edu-terms-breadcrumb">
        <div class="container">
            <span>
                <a href="{{ url('/') }}">Home</a>
                &nbsp; / &nbsp; Terms and Conditions
            </span>
        </div>
    </div>

    <div class="edu-terms-container">
        <div class="edu-terms-layout">

            {{-- Sidebar --}}
            <aside class="edu-terms-sidebar">
                <h3>On This Page</h3>

                <nav>
                    <a href="#introduction">1. Introduction</a>
                    <a href="#admission">2. Admissions and Registration</a>
                    <a href="#fees">3. School Fees and Payments</a>
                    <a href="#attendance">4. Attendance and Punctuality</a>
                    <a href="#conduct">5. Student Conduct</a>
                    <a href="#safeguarding">6. Child Safety</a>
                    <a href="#curriculum">7. Curriculum and Assessment</a>
                    <a href="#uniform">8. Uniform and Appearance</a>
                    <a href="#health">9. Health and Medical Care</a>
                    <a href="#property">10. School Property</a>
                    <a href="#communication">11. Parent Communication</a>
                    <a href="#technology">12. Technology Use</a>
                    <a href="#privacy">13. Privacy and Photographs</a>
                    <a href="#activities">14. School Activities</a>
                    <a href="#withdrawal">15. Withdrawal and Transfers</a>
                    <a href="#liability">16. Responsibility and Liability</a>
                    <a href="#changes">17. Changes to These Terms</a>
                    <a href="#contact">18. Contact Edugreen</a>
                </nav>
            </aside>

            {{-- Main Content --}}
            <main class="edu-terms-content">

                <div class="edu-terms-intro">
                    <p>
                        Welcome to Edugreen Schools. These Terms and Conditions
                        describe the general expectations, responsibilities,
                        and guidelines applicable to our educational community.
                        They are intended to support effective learning,
                        student welfare, responsible conduct, and cooperation
                        between the school and families.
                    </p>
                </div>

                {{-- 1 --}}
                <section class="edu-terms-section" id="introduction">
                    <h2>1. Introduction</h2>

                    <p>
                        Edugreen Infant and Junior School (EIJS) is committed
                        to providing quality education in a nurturing and
                        inclusive environment where every child is encouraged
                        to learn, grow, and develop their fullest potential.
                    </p>

                    <p>
                        These terms apply to parents, guardians, students,
                        and other individuals using the school's educational
                        services and facilities, as relevant.
                    </p>

                    <p>
                        By applying for admission or accepting an offered
                        place, parents or guardians agree to comply with the
                        school's applicable policies, procedures, and
                        reasonable instructions communicated to them.
                    </p>

                    <p>
                        These terms should be read alongside the school's
                        admissions requirements, safeguarding procedures,
                        behaviour policy, fee schedule, and other applicable
                        school policies.
                    </p>
                </section>

                {{-- 2 --}}
                <section class="edu-terms-section" id="admission">
                    <h2>2. Admissions and Registration</h2>

                    <p>
                        Admission to Edugreen Schools is subject to the
                        school's admissions process, available spaces,
                        applicable age requirements, and relevant
                        registration procedures.
                    </p>

                    <ul>
                        <li>Parents and guardians must provide accurate and complete information during registration.</li>
                        <li>Required documents should be submitted within the timelines communicated by the school.</li>
                        <li>Any relevant medical, learning-support, or safeguarding information should be disclosed confidentially to authorised school personnel.</li>
                        <li>Parents and guardians should promptly inform the school of changes to contact details, home address, emergency contacts, or authorised collection arrangements.</li>
                    </ul>

                    <p>
                        The school may request clarification or additional
                        documentation where reasonably necessary for
                        admission, student welfare, or record keeping.
                        Any admission decision will be handled in accordance
                        with the school's policies and applicable law.
                    </p>
                </section>

                {{-- 3 --}}
                <section class="edu-terms-section" id="fees">
                    <h2>3. School Fees and Payments</h2>

                    <p>
                        Parents and guardians are responsible for paying
                        applicable tuition fees and other authorised charges
                        in accordance with the school's published fee
                        schedule and communicated payment deadlines.
                    </p>

                    <ul>
                        <li>Applicable fees and payment deadlines will be communicated by the school.</li>
                        <li>Parents and guardians should retain payment receipts or other payment confirmations.</li>
                        <li>Any discrepancy in a fee statement should be reported to the school administration for review.</li>
                        <li>Parents who anticipate difficulty meeting a payment deadline should contact the school administration promptly.</li>
                        <li>Refunds, credits, discounts, and other fee adjustments will be handled according to the school's communicated fee policy and applicable law.</li>
                    </ul>

                    <p>
                        Any consequences of overdue payments must be
                        communicated clearly and applied consistently with
                        the school's fee policy and applicable legal
                        requirements. Student welfare and access to
                        legally protected rights will be respected.
                    </p>
                </section>

                {{-- 4 --}}
                <section class="edu-terms-section" id="attendance">
                    <h2>4. Attendance and Punctuality</h2>

                    <p>
                        Regular attendance and punctuality help students
                        benefit fully from classroom learning and school
                        activities.
                    </p>

                    <ul>
                        <li>Students are expected to attend school according to the published school calendar and timetable.</li>
                        <li>Parents or guardians should notify the school when a student is absent or will arrive late.</li>
                        <li>Where appropriate, the school may request an explanation or supporting information for extended absences.</li>
                        <li>Parents should ensure that students are collected at the designated time and only by authorised persons.</li>
                        <li>Arrangements for early collection should be communicated to and approved by the appropriate school staff.</li>
                    </ul>

                    <p>
                        The school will communicate important changes to
                        the academic calendar, school hours, or attendance
                        arrangements through its recognised communication
                        channels.
                    </p>
                </section>

                {{-- 5 --}}
                <section class="edu-terms-section" id="conduct">
                    <h2>5. Student Conduct and Discipline</h2>

                    <p>
                        Edugreen Schools expects students to demonstrate
                        respect, honesty, kindness, responsibility, and
                        consideration for others.
                    </p>

                    <p>Students are expected to:</p>

                    <ul>
                        <li>Respect teachers, staff, fellow students, and visitors.</li>
                        <li>Follow reasonable classroom instructions and school rules.</li>
                        <li>Care for school property and respect the belongings of others.</li>
                        <li>Avoid bullying, harassment, intimidation, discrimination, fighting, and other harmful behaviour.</li>
                        <li>Use respectful language and resolve disagreements peacefully with appropriate adult support.</li>
                        <li>Act responsibly during lessons, break periods, excursions, and extracurricular activities.</li>
                    </ul>

                    <p>
                        The school will address misconduct fairly,
                        proportionately, and in an age-appropriate manner,
                        with due consideration for student safety, dignity,
                        individual circumstances, and applicable law.
                    </p>

                    <p>
                        Parents and guardians are expected to cooperate
                        constructively with the school when behavioural
                        concerns arise.
                    </p>
                </section>

                {{-- 6 --}}
                <section class="edu-terms-section" id="safeguarding">
                    <h2>6. Child Safety and Safeguarding</h2>

                    <p>
                        The safety, dignity, and welfare of every child
                        are central to Edugreen Schools' educational
                        responsibilities.
                    </p>

                    <ul>
                        <li>Students must follow reasonable safety instructions from authorised staff.</li>
                        <li>Parents and guardians must provide accurate emergency contact and collection information.</li>
                        <li>Visitors must follow the school's visitor registration and access procedures.</li>
                        <li>Concerns about bullying, abuse, neglect, harassment, or unsafe conduct should be reported promptly to the appropriate school authority.</li>
                        <li>Student information will be shared for safeguarding purposes only as lawfully necessary.</li>
                    </ul>

                    <p>
                        The school will take safeguarding concerns seriously
                        and respond in accordance with its procedures and
                        applicable child-protection requirements.
                    </p>
                </section>

                {{-- 7 --}}
                <section class="edu-terms-section" id="curriculum">
                    <h2>7. Curriculum, Learning and Assessment</h2>

                    <p>
                        Edugreen Infant and Junior School operates a hybrid
                        curriculum comprising the British curriculum and
                        the Nigerian curriculum, designed to provide learners
                        with a balanced educational foundation.
                    </p>

                    <p>
                        Students are expected to participate in lessons,
                        assignments, assessments, and other learning
                        activities appropriate to their classes.
                    </p>

                    <ul>
                        <li>Students should complete assigned work honestly and to the best of their ability.</li>
                        <li>Parents and guardians should support learning at home and review school communications about academic progress.</li>
                        <li>Academic reports and assessment information will be communicated through the school's approved channels.</li>
                        <li>Requests concerning academic performance or learning support should be directed to the appropriate teacher or school administrator.</li>
                    </ul>

                    <p>
                        The school may review teaching approaches and
                        learning activities to support educational quality
                        and student development.
                    </p>
                </section>

                {{-- 8 --}}
                <section class="edu-terms-section" id="uniform">
                    <h2>8. School Uniform and Personal Appearance</h2>

                    <p>
                        Where school uniforms or specified dress
                        requirements apply, students are expected to
                        follow the arrangements communicated by the school.
                    </p>

                    <ul>
                        <li>Students should attend school in the required uniform or approved attire.</li>
                        <li>Clothing and footwear should be suitable for the school day and relevant activities.</li>
                        <li>Parents should label personal belongings where appropriate.</li>
                        <li>Any reasonable adjustments relating to disability, medical needs, religion, or other protected circumstances will be considered in accordance with applicable law and school policy.</li>
                    </ul>
                </section>

                {{-- 9 --}}
                <section class="edu-terms-section" id="health">
                    <h2>9. Health, Medical Information and Emergencies</h2>

                    <p>
                        Parents and guardians should inform the school
                        of relevant health conditions, allergies,
                        medication requirements, or other information
                        necessary to support a student's safety and care.
                    </p>

                    <ul>
                        <li>Students who are unwell should be kept at home where appropriate to protect their health and the wellbeing of others.</li>
                        <li>Parents should provide current emergency contact information.</li>
                        <li>Medication should be disclosed and supplied in accordance with the school's applicable procedures.</li>
                        <li>In an emergency, the school may contact parents, guardians, healthcare providers, or emergency services as reasonably necessary and lawful.</li>
                    </ul>

                    <p>
                        Parents and guardians should communicate any
                        changes in relevant health information promptly
                        and through appropriate confidential channels.
                    </p>
                </section>

                {{-- 10 --}}
                <section class="edu-terms-section" id="property">
                    <h2>10. School Property and Personal Belongings</h2>

                    <p>
                        Students are expected to treat school buildings,
                        furniture, learning materials, equipment, and
                        other property with care.
                    </p>

                    <ul>
                        <li>Damage or loss involving school property should be reported promptly.</li>
                        <li>Students should not bring prohibited, dangerous, or inappropriate items onto school premises.</li>
                        <li>Personal belongings should be kept safely and labelled where practical.</li>
                        <li>Any arrangements for addressing damage or loss will be handled fairly and in accordance with applicable policy and law.</li>
                    </ul>

                    <p>
                        Parents and guardians should contact the school
                        if a personal item is lost or an incident involving
                        property needs to be investigated.
                    </p>
                </section>

                {{-- 11 --}}
                <section class="edu-terms-section" id="communication">
                    <h2>11. Communication with Parents and Guardians</h2>

                    <p>
                        Edugreen Schools values respectful cooperation
                        between families and school personnel.
                    </p>

                    <ul>
                        <li>Parents and guardians should use the school's recognised communication channels for enquiries and concerns.</li>
                        <li>Contact details should be kept accurate and up to date.</li>
                        <li>Meetings with teachers or school administrators should be arranged through the appropriate school procedures.</li>
                        <li>Concerns and complaints should be raised respectfully and directed to the relevant staff member or school management.</li>
                        <li>The school will make reasonable efforts to communicate important announcements, academic information, and relevant policy changes.</li>
                    </ul>
                </section>

                {{-- 12 --}}
                <section class="edu-terms-section" id="technology">
                    <h2>12. Technology and Responsible Internet Use</h2>

                    <p>
                        Where digital devices, online learning platforms,
                        or internet resources are used, students must
                        follow the school's instructions for safe and
                        responsible use.
                    </p>

                    <ul>
                        <li>Technology should be used for authorised educational activities.</li>
                        <li>Students must not use digital platforms to bully, harass, threaten, or impersonate others.</li>
                        <li>Unauthorised access to school accounts, systems, or information is prohibited.</li>
                        <li>Students should not share personal information, passwords, or photographs inappropriately.</li>
                        <li>Parents and guardians should support age-appropriate and responsible technology use.</li>
                    </ul>
                </section>

                {{-- 13 --}}
                <section class="edu-terms-section" id="privacy">
                    <h2>13. Privacy, Records and Photographs</h2>

                    <p>
                        Edugreen Schools handles student, parent, and
                        guardian information in accordance with its
                        Privacy Policy and applicable data-protection
                        requirements.
                    </p>

                    <p>
                        The school may maintain academic records,
                        attendance information, admission details,
                        and other records required for educational
                        administration and student welfare.
                    </p>

                    <p>
                        Where required, appropriate consent will be
                        obtained before identifiable student photographs
                        or videos are used for optional promotional
                        purposes, such as public website content,
                        brochures, or social media.
                    </p>

                    <p>
                        Please consult the school's Privacy Policy for
                        further information about information collection,
                        use, storage, disclosure, and applicable privacy
                        rights.
                    </p>
                </section>

                {{-- 14 --}}
                <section class="edu-terms-section" id="activities">
                    <h2>14. Extracurricular Activities and Excursions</h2>

                    <p>
                        Edugreen Schools may organise sports, cultural
                        programmes, competitions, educational excursions,
                        events, and skill acquisition activities to
                        support students' development.
                    </p>

                    <ul>
                        <li>Students are expected to follow the instructions of authorised supervisors.</li>
                        <li>Parents and guardians will be informed of relevant activity arrangements.</li>
                        <li>Where required, parental permission will be obtained before a child participates in an excursion or activity.</li>
                        <li>Any relevant medical, accessibility, or safety needs should be communicated to the school in advance.</li>
                        <li>Participation may be subject to reasonable safety requirements and activity-specific arrangements.</li>
                    </ul>
                </section>

                {{-- 15 --}}
                <section class="edu-terms-section" id="withdrawal">
                    <h2>15. Withdrawal, Transfers and Leaving School</h2>

                    <p>
                        Parents or guardians who wish to withdraw a
                        student or transfer the student to another
                        school should notify the school administration
                        through the prescribed process.
                    </p>

                    <p>
                        The school may communicate applicable notice
                        requirements, outstanding administrative matters,
                        fee arrangements, and procedures for requesting
                        academic records or transfer documentation.
                    </p>

                    <p>
                        Any fees, refunds, records, or other matters
                        arising from withdrawal will be handled in
                        accordance with the school's communicated
                        policies and applicable law.
                    </p>
                </section>

                {{-- 16 --}}
                <section class="edu-terms-section" id="liability">
                    <h2>16. Responsibility and Liability</h2>

                    <p>
                        Edugreen Schools takes reasonable steps to provide
                        a safe learning environment, maintain appropriate
                        supervision, and protect students and school
                        property.
                    </p>

                    <p>
                        Parents and guardians are expected to provide
                        accurate information, follow school procedures,
                        and cooperate with reasonable measures intended
                        to support student welfare and safety.
                    </p>

                    <p>
                        Nothing in these terms excludes or limits any
                        responsibility or legal right that cannot lawfully
                        be excluded or limited. Any question concerning
                        responsibility or liability will be determined
                        in accordance with applicable law and the
                        circumstances involved.
                    </p>
                </section>

                {{-- 17 --}}
                <section class="edu-terms-section" id="changes">
                    <h2>17. Changes to These Terms and Conditions</h2>

                    <p>
                        Edugreen Schools may review and update these
                        terms to reflect changes in school operations,
                        educational programmes, safeguarding practices,
                        administrative procedures, or legal requirements.
                    </p>

                    <p>
                        Updated terms will be published on this page
                        with a revised last-updated date. Where appropriate,
                        the school will communicate significant changes
                        to parents and guardians.
                    </p>

                    <p>
                        Updated terms will be applied in accordance
                        with applicable law and any required notice
                        or consent procedures.
                    </p>
                </section>

                {{-- 18 --}}
                <section class="edu-terms-section" id="contact">
                    <h2>18. Contact Edugreen Schools</h2>

                    <p>
                        For enquiries concerning these Terms and Conditions,
                        please contact the school administration through
                        the school's official communication channels.
                    </p>
                </section>

                {{-- Contact Card --}}
                <div class="edu-terms-contact">
                    <h2>We Are Here to Help</h2>

                    <p>
                        <strong>Edugreen Infant and Junior School (EIJS)</strong>
                    </p>

                    <p>
                        <i class="fa fa-map-marker"></i>
                        &nbsp; 300 Ikwerre Road, Rumueme, Mile 4,
                        Port Harcourt, Rivers State, Nigeria.
                    </p>

                    <p>
                        <i class="fa fa-envelope"></i>
                        &nbsp; <a href="mailto:{{ config('mail.from.address') }}">
                            {{ config('mail.from.address') ?: 'Insert official school email' }}
                        </a>
                    </p>

                    <p>
                        <i class="fa fa-phone"></i>
                        &nbsp; Please insert the official school telephone number.
                    </p>
                </div>

                <div class="edu-terms-note">
                    <strong>Important notice:</strong>
                    This page provides general school terms for adaptation.
                    Before publishing, Edugreen Schools should confirm that
                    these terms accurately reflect its actual policies,
                    admissions arrangements, fee rules, safeguarding
                    procedures, and applicable legal obligations.
                </div>

                <div class="edu-terms-updated">
                    Effective date: 30/10/2026.<br>
                    Last updated: 30/10/2026.
                </div>

            </main>
        </div>
    </div>

</div>

@endsection
