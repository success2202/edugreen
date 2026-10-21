@extends('layouts.app')

@section('styles')
    
    <style>
        /* =========================================
EDU-GREEN TEACHER DETAILS
========================================= */

.teacher-details-page {
background: #f7faf8;
padding-bottom: 80px;
}

/* =========================================
BREADCRUMB
========================================= */

.teacher-breadcrumb {
background: #123c2a;
padding: 23px 0;
margin-bottom: 60px;
}

.teacher-breadcrumb-content {
display: flex;
align-items: center;
flex-wrap: wrap;
gap: 10px;
font-size: 14px;
}

.teacher-breadcrumb-content a {
display: flex;
align-items: center;
gap: 6px;
color: #ffffff;
text-decoration: none;
transition: 0.3s ease;
}

.teacher-breadcrumb-content a:hover {
color: #7ed957;
}

.teacher-breadcrumb-content > i {
color: #7ed957;
font-size: 15px;
}

.teacher-breadcrumb-content span {
color: #7ed957;
font-weight: 600;
}

/* =========================================
PROFILE CARD
========================================= */

.teacher-profile {
max-width: 1050px;
margin: 0 auto;
background: #ffffff;
border-radius: 20px;
padding: 45px;
display: grid;
grid-template-columns: 390px 1fr;
gap: 55px;
align-items: center;
box-shadow: 0 15px 45px rgba(18, 60, 42, 0.09);
}

/* =========================================
IMAGE
========================================= */

.teacher-profile-image {
width: 100%;
}

.teacher-image-frame {
width: 100%;
height: 470px;
border-radius: 18px;
overflow: hidden;
background: #edf4ef;
position: relative;
}

.teacher-image-frame::after {
content: "";
position: absolute;
inset: 0;
border: 5px solid rgba(126, 217, 87, 0.15);
border-radius: 18px;
pointer-events: none;
}

.teacher-image-frame img {
width: 100%;
height: 100%;
object-fit: cover;
display: block;
}

/* =========================================
PROFILE CONTENT
========================================= */

.teacher-profile-content {
padding: 10px 0;
}

.teacher-profile-label {
display: inline-flex;
align-items: center;
gap: 7px;
color: #4c9b2e;
font-size: 12px;
font-weight: 800;
letter-spacing: 1px;
margin-bottom: 15px;
}

.teacher-profile-label i {
font-size: 17px;
}

.teacher-profile-content h1 {
color: #123c2a;
font-size: 43px;
line-height: 1.15;
font-weight: 800;
margin: 0 0 10px;
}

.teacher-position {
color: #4c9b2e;
font-size: 18px;
font-weight: 600;
}

.teacher-profile-line {
width: 65px;
height: 4px;
background: #7ed957;
border-radius: 10px;
margin: 22px 0 25px;
}

.teacher-profile-intro {
color: #5d6862;
font-size: 16px;
line-height: 1.8;
margin-bottom: 30px;
}

/* =========================================
INFORMATION
========================================= */

.teacher-info-list {
display: grid;
grid-template-columns: 1fr 1fr;
gap: 15px;
margin-bottom: 30px;
}

.teacher-info-item {
display: flex;
align-items: center;
gap: 12px;
padding: 15px;
background: #f6faf7;
border: 1px solid #e5eee8;
border-radius: 10px;
}

.teacher-info-icon {
width: 42px;
height: 42px;
min-width: 42px;
display: flex;
align-items: center;
justify-content: center;
border-radius: 10px;
background: #e5f5df;
color: #3f8d27;
font-size: 19px;
}

.teacher-info-item small {
display: block;
color: #7b857f;
font-size: 11px;
margin-bottom: 3px;
}

.teacher-info-item strong {
display: block;
color: #123c2a;
font-size: 14px;
}

/* =========================================
SOCIAL MEDIA
========================================= */

.teacher-profile-social {
display: flex;
align-items: center;
gap: 18px;
margin-bottom: 30px;
}

.teacher-profile-social > span {
color: #6c766f;
font-size: 13px;
font-weight: 600;
}

.teacher-social-links {
display: flex;
gap: 8px;
}

.teacher-social-links a {
width: 40px;
height: 40px;
display: flex;
align-items: center;
justify-content: center;
border-radius: 50%;
background: #123c2a;
color: #ffffff;
text-decoration: none;
font-size: 17px;
transition: 0.3s ease;
}

.teacher-social-links a:hover {
background: #7ed957;
color: #123c2a;
transform: translateY(-3px);
}

/* =========================================
BACK BUTTON
========================================= */

.teacher-back-btn {
display: inline-flex;
align-items: center;
gap: 9px;
padding: 13px 20px;
background: #123c2a;
color: #ffffff;
border-radius: 8px;
text-decoration: none;
font-size: 12px;
font-weight: 700;
transition: 0.3s ease;
}

.teacher-back-btn i {
font-size: 17px;
}

.teacher-back-btn:hover {
background: #7ed957;
color: #123c2a;
transform: translateX(-3px);
}

/* =========================================
TABLET
========================================= */

@media (max-width: 991px) {

```
.teacher-breadcrumb {
    margin-bottom: 40px;
}

.teacher-profile {
    grid-template-columns: 320px 1fr;
    gap: 35px;
    padding: 35px;
}

.teacher-image-frame {
    height: 400px;
}

.teacher-profile-content h1 {
    font-size: 35px;
}


}

/* =========================================
MOBILE
========================================= */

@media (max-width: 767px) {

```
.teacher-details-page {
    padding-bottom: 50px;
}

.teacher-breadcrumb {
    padding: 17px 0;
    margin-bottom: 30px;
}

.teacher-breadcrumb-content {
    font-size: 12px;
    gap: 7px;
}

.teacher-breadcrumb-content span {
    max-width: 170px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.teacher-profile {
    display: block;
    padding: 20px;
    border-radius: 14px;
}

.teacher-image-frame {
    height: 350px;
    border-radius: 13px;
    margin-bottom: 30px;
}

.teacher-profile-content {
    padding: 0;
}

.teacher-profile-content h1 {
    font-size: 30px;
}

.teacher-position {
    font-size: 16px;
}

.teacher-profile-intro {
    font-size: 15px;
    line-height: 1.75;
}

.teacher-info-list {
    grid-template-columns: 1fr;
}

.teacher-profile-social {
    align-items: flex-start;
    flex-direction: column;
    gap: 10px;
}


}

/* =========================================
SMALL MOBILE
========================================= */

@media (max-width: 480px) {


.teacher-profile {
    padding: 15px;
}

.teacher-image-frame {
    height: 300px;
}

.teacher-profile-content h1 {
    font-size: 26px;
}

.teacher-profile-label {
    font-size: 10px;
}

.teacher-profile-intro {
    font-size: 14px;
}

.teacher-back-btn {
    width: 100%;
    justify-content: center;
}


}


/* =========================================
TEACHER BIO
========================================= */

.teacher-bio {
margin-bottom: 30px;
}

.teacher-bio h3 {
color: #123c2a;
font-size: 20px;
font-weight: 700;
margin: 0 0 10px;
}

.teacher-bio p {
color: #5d6862;
font-size: 15px;
line-height: 1.8;
margin: 0;
}

/* =========================================
TEACHER INFORMATION
========================================= */

.teacher-info-item a {
display: block;
color: #123c2a;
font-size: 14px;
font-weight: 600;
text-decoration: none;
word-break: break-word;
}

.teacher-info-item a:hover {
color: #4c9b2e;
}

/* =========================================
RESPONSIVE INFORMATION
========================================= */

@media (max-width: 767px) {


.teacher-bio {
    margin-bottom: 25px;
}

.teacher-bio h3 {
    font-size: 18px;
}

.teacher-bio p {
    font-size: 14px;
}

.teacher-info-item a {
    font-size: 13px;
}


}



    </style>


@endsection
@section('content') 


<section class="teacher-details-page">


<!-- Breadcrumb -->
<div class="teacher-breadcrumb">
    <div class="container">

        <div class="teacher-breadcrumb-content">

            <a href="{{ route('user.home') }}">
                <i class="ti ti-home"></i>
                Home
            </a>

            <i class="ti ti-chevron-right"></i>

            <a href="{{ url('/teachers') }}">
                Teachers
            </a>

            <i class="ti ti-chevron-right"></i>

            <span>
                {{ $teacher->name }}
            </span>

        </div>

    </div>
</div>


<!-- Teacher Profile -->
<div class="container">

    <div class="teacher-profile">

        <!-- Teacher Image -->
        <div class="teacher-profile-image">

            <div class="teacher-image-frame">

                <img
                    src="{{ asset('frontend/assets/teacher/' . $teacher->image) }}"
                    alt="{{ $teacher->name }}"
                >

            </div>

        </div>


        <!-- Teacher Information -->
        <div class="teacher-profile-content">

            <span class="teacher-profile-label">
                <i class="ti ti-school"></i>
                EDU-GREEN SCHOOLS
            </span>

            <h1>
                {{ $teacher->name }}
            </h1>

            <div class="teacher-position">
                {{ $teacher->position }}
            </div>

            <div class="teacher-profile-line"></div>


            <!-- Teacher Bio -->
            <div class="teacher-bio">

                <h3>
                    About {{ $teacher->name }}
                </h3>

                <p>
                    {{ $teacher->bio }}
                </p>

            </div>


            <!-- Teacher Details -->
            <div class="teacher-info-list">

                <div class="teacher-info-item">

                    <div class="teacher-info-icon">
                        <i class="ti ti-user"></i>
                    </div>

                    <div>
                        <small>Teacher</small>
                        <strong>{{ $teacher->name }}</strong>
                    </div>

                </div>


                <div class="teacher-info-item">

                    <div class="teacher-info-icon">
                        <i class="ti ti-school"></i>
                    </div>

                    <div>
                        <small>Academic Level</small>
                        <strong>{{ $teacher->academic_level }}</strong>
                    </div>

                </div>


                <div class="teacher-info-item">

                    <div class="teacher-info-icon">
                        <i class="ti ti-certificate"></i>
                    </div>

                    <div>
                        <small>Qualification</small>
                        <strong>{{ $teacher->qualification }}</strong>
                    </div>

                </div>


                <div class="teacher-info-item">

                    <div class="teacher-info-icon">
                        <i class="ti ti-mail"></i>
                    </div>

                    <div>
                        <small>Email</small>
                        <a href="mailto:{{ $teacher->email }}">
                            {{ $teacher->email }}
                        </a>
                    </div>

                </div>


                <div class="teacher-info-item">

                    <div class="teacher-info-icon">
                        <i class="ti ti-phone"></i>
                    </div>

                    <div>
                        <small>Phone</small>
                        <a href="tel:{{ $teacher->phone }}">
                            {{ $teacher->phone }}
                        </a>
                    </div>

                </div>


                <div class="teacher-info-item">

                    <div class="teacher-info-icon">
                        <i class="ti ti-book"></i>
                    </div>

                    <div>
                        <small>Position</small>
                        <strong>{{ $teacher->position }}</strong>
                    </div>

                </div>

            </div>


            <!-- Social Media -->
            <div class="teacher-profile-social">

                <span>Connect With Teacher</span>

                <div class="teacher-social-links">

                    @if($teacher->facebook)

                        <a
                            href="{{ $teacher->facebook }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook"
                        >
                            <i class="ti ti-brand-facebook"></i>
                        </a>

                    @endif


                    @if($teacher->linkedin)

                        <a
                            href="{{ $teacher->linkedin }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="LinkedIn"
                        >
                            <i class="ti ti-brand-linkedin"></i>
                        </a>

                    @endif

                </div>

            </div>


            <!-- Back Button -->
            <a href="{{ url('/teachers') }}" class="teacher-back-btn">
                <i class="ti ti-arrow-left"></i>
                BACK TO TEACHERS
            </a>

        </div>

    </div>

</div>


</section>


@endsection
