<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from getnajmul.info/theme/edulight/08-university-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Sep 2026 17:06:38 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="EduLight - Multipurpose Education Template">
	<meta name="keywords" content="edulight, bootstrap, education template, template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EduGreen  School</title>

	<!-- Favicon -->
	{{-- <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon"> --}}

    @if($school?->favicon)
    <link rel="icon"
          type="image/png"
          href="{{ asset('frontend/assets/img/logo/' . $school->favicon) }}">
@endif
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/bootstrap.min.css') }}">
    <!-- Normalize CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/normalize.css') }}">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/font-awesome.min.css') }}">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/owl.carousel.min.css') }}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/magnific-popup.css') }}">
	<!-- Mean Menu -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/meanmenu.css') }}">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/animate.css') }}">
	<!-- Revolution Slider -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/revolution/layers.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/revolution/navigation.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/revolution/settings.css') }}">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500%7CRoboto+Slab:300,500,400,700" rel="stylesheet">
	<!-- Slick Carousel -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/slick.css') }}">

	
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/assets/responsive.css') }}">
	
	<!-- CSS FOR DEMO - NOT INCLUDED IN MAIN FILES -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/demo/demo.css') }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;600;700;800&display=swap" rel="stylesheet">
 
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>

/* =========================================================
   MODERN SCHOOL PRELOADER
========================================================= */

#school-preloader {
    position: fixed;
    inset: 0;
    z-index: 99999;

    width: 100%;
    height: 100vh;

    background: #ffffff;

    display: flex;
    align-items: center;
    justify-content: center;

    opacity: 1;
    visibility: visible;

    transition:
        opacity .6s ease,
        visibility .6s ease;
}


/* Hidden state */

#school-preloader.preloader-hidden {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}


/* Content */

.preloader-content {
    width: 90%;
    max-width: 420px;

    text-align: center;

    padding: 30px;
}


/* =========================================================
   LOGO
========================================================= */

.preloader-logo {
    width: 100px;
    height: 100px;

    margin: 0 auto 22px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #ffffff;

    border: 1px solid #e5e5e5;

    box-shadow:
        0 15px 40px rgba(38, 55, 70, .10);

    animation: preloaderLogo 2s ease-in-out infinite;
}

.preloader-logo img {
    width: 75px;
    height: 75px;

    object-fit: contain;
}



/* SCHOOL BRAND */
.school-brand {
    display: flex !important;
    align-items: center;
    gap: 10px;
    height: 70px;
}

.school-brand img {
    height: 50px;
    width: auto;
    display: block;
}

.school-name {
    font-size: 15px;
    font-weight: 700;
    color: #11b12c;
    white-space: nowrap;
    line-height: 1;
}

/* Mobile */
@media (max-width: 767px) {

    .school-brand {
        height: 60px;
        gap: 7px;
    }

    .school-brand img {
        height: 42px;
    }

    .school-name {
        font-size: 14px;
    }

}


/* Logo animation */

@keyframes preloaderLogo {

    0% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-7px);
    }

    100% {
        transform: translateY(0);
    }

}


/* =========================================================
   SCHOOL NAME
========================================================= */

.preloader-school-name {
    margin: 0;

    color: #263746;

    font-family: 'Roboto Slab', Georgia, serif;

    font-size: 25px;
    line-height: 1.3;

    font-weight: 700;

    letter-spacing: .5px;
}


/* Green highlight */

.preloader-school-name::first-letter {
    color: #263746;
}


/* =========================================================
   TAGLINE
========================================================= */

.preloader-tagline {
    margin: 8px 0 30px;

    color: #68757e;

    font-size: 13px;

    line-height: 1.6;
}


/* =========================================================
   LOADER
========================================================= */

.preloader-loader {
    width: 100%;
    max-width: 280px;

    margin: auto;
}


/* Loading line */

.preloader-line {
    width: 100%;
    height: 4px;

    background: #edf2e9;

    overflow: hidden;

    position: relative;
}


/* Animated green line */

.preloader-line span {
    position: absolute;

    top: 0;
    left: -40%;

    width: 40%;
    height: 100%;

    background: #6dcc2c;

    animation: preloaderLine 1.5s ease-in-out infinite;
}


@keyframes preloaderLine {

    0% {
        left: -40%;
    }

    50% {
        left: 50%;
    }

    100% {
        left: 100%;
    }

}


/* =========================================================
   LOADING TEXT
========================================================= */

.preloader-loading-text {
    margin-top: 12px;

    display: flex;

    align-items: center;
    justify-content: center;

    gap: 5px;

    color: #68757e;

    font-size: 12px;

    font-weight: 500;
}


/* =========================================================
   DOTS
========================================================= */

.preloader-dots {
    display: flex;
    gap: 3px;
}

.preloader-dots i {
    display: block;

    width: 4px;
    height: 4px;

    border-radius: 50%;

    background: #6dcc2c;

    animation: preloaderDots 1.2s infinite ease-in-out;
}

.preloader-dots i:nth-child(1) {
    animation-delay: 0s;
}

.preloader-dots i:nth-child(2) {
    animation-delay: .15s;
}

.preloader-dots i:nth-child(3) {
    animation-delay: .3s;
}


@keyframes preloaderDots {

    0%,
    60%,
    100% {
        transform: translateY(0);
        opacity: .4;
    }

    30% {
        transform: translateY(-4px);
        opacity: 1;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .preloader-content {
        padding: 20px;
    }

    .preloader-logo {
        width: 85px;
        height: 85px;

        margin-bottom: 18px;
    }

    .preloader-logo img {
        width: 63px;
        height: 63px;
    }

    .preloader-school-name {
        font-size: 21px;
    }

    .preloader-tagline {
        font-size: 12px;
        margin-bottom: 25px;
    }

    .preloader-loader {
        max-width: 230px;
    }

}


/* =========================================================
   SMALL PHONES
========================================================= */

@media (max-width: 400px) {

    .preloader-logo {
        width: 75px;
        height: 75px;
    }

    .preloader-logo img {
        width: 55px;
        height: 55px;
    }

    .preloader-school-name {
        font-size: 19px;
    }

}


       /* =========================================================
   SCHOOL FOOTER
========================================================= */

.school-footer {
    background: #263746;
    color: #ffffff;
}


/* =========================================================
   MAIN FOOTER
========================================================= */

.school-footer-main {
    padding: 75px 0 60px;
}

.footer-school {
    max-width: 390px;
}

.footer-logo {
    display: inline-block;
    margin-bottom: 22px;
}

.footer-logo img {
    max-width: 170px;
    max-height: 75px;
    object-fit: contain;
}

.footer-school > p {
    color: rgba(255, 255, 255, 0.72);
    font-size: 14px;
    line-height: 1.8;
    margin: 0;
}


/* =========================================================
   SOCIAL ICONS
========================================================= */

.footer-socials {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 25px;
}

.footer-socials a {
    width: 40px;
    height: 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(255, 255, 255, 0.08);
    color: #ffffff;

    text-decoration: none;

    transition: all .3s ease;
}

.footer-socials a i {
    font-size: 18px;
}

.footer-socials a:hover {
    background: #6dcc2c;
    color: #ffffff;
    transform: translateY(-3px);
}


/* =========================================================
   FOOTER COLUMNS
========================================================= */

.footer-column h3 {
    font-family: 'Roboto Slab', Georgia, serif;
    font-size: 18px;
    font-weight: 600;
    color: #ffffff;

    margin: 0 0 23px;
    position: relative;
    padding-bottom: 12px;
}

.footer-column h3::after {
    content: "";

    position: absolute;
    left: 0;
    bottom: 0;

    width: 35px;
    height: 3px;

    background: #6dcc2c;
}


/* =========================================================
   FOOTER LINKS
========================================================= */

.footer-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-column ul li {
    margin-bottom: 13px;
}

.footer-column ul li a {
    display: inline-flex;
    align-items: center;

    color: rgba(255, 255, 255, 0.68);

    text-decoration: none;

    font-size: 14px;

    transition: all .3s ease;
}

.footer-column ul li a::before {
    content: "›";

    color: #6dcc2c;

    font-size: 19px;

    margin-right: 8px;

    transition: .3s ease;
}

.footer-column ul li a:hover {
    color: #6dcc2c;
    padding-left: 4px;
}


/* =========================================================
   CONTACT
========================================================= */

.footer-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 13px;

    margin-bottom: 20px;
}

.footer-contact-icon {
    width: 40px;
    height: 40px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(109, 204, 44, 0.12);
    color: #6dcc2c;
}

.footer-contact-icon i {
    font-size: 19px;
}

.footer-contact-item span {
    display: block;

    color: #ffffff;

    font-size: 13px;
    font-weight: 600;

    margin-bottom: 4px;
}

.footer-contact-item p {
    margin: 0;

    color: rgba(255, 255, 255, 0.65);

    font-size: 13px;
    line-height: 1.6;
}

.footer-contact-item p a {
    color: rgba(255, 255, 255, 0.65);
    text-decoration: none;

    transition: .3s ease;
}

.footer-contact-item p a:hover {
    color: #6dcc2c;
}


/* =========================================================
   FOOTER BOTTOM
========================================================= */

.school-footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.10);
    padding: 20px 0;
}

.footer-bottom-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.footer-bottom-content p {
    margin: 0;

    color: rgba(255, 255, 255, 0.55);

    font-size: 13px;
}

.footer-bottom-links {
    display: flex;
    align-items: center;
    gap: 25px;
}

.footer-bottom-links a {
    color: rgba(255, 255, 255, 0.55);

    text-decoration: none;

    font-size: 13px;

    transition: .3s ease;
}

.footer-bottom-links a:hover {
    color: #6dcc2c;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .school-footer-main {
        padding: 60px 0 45px;
    }

    .footer-school {
        max-width: 100%;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .school-footer-main {
        padding: 50px 0 35px;
    }

    .footer-column {
        margin-top: 10px;
    }

    .footer-school {
        margin-bottom: 10px;
    }

    .footer-logo img {
        max-width: 150px;
    }

    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
        gap: 12px;
    }

    .footer-bottom-links {
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
    }

}


/* =========================================================
   SMALL PHONES
========================================================= */

@media (max-width: 480px) {

    .school-footer-main {
        padding: 45px 0 30px;
    }

    .footer-column h3 {
        font-size: 17px;
    }

    .footer-socials a {
        width: 38px;
        height: 38px;
    }

    .footer-bottom-links {
        flex-direction: column;
        gap: 8px;
    }

}


/* =========================================================
   SCHOOL MODERN BREADCRUMB
========================================================= */


.school-breadcrumb {
    position: relative;

    padding: 65px 0;

    background: #f4f8f1;

    overflow: hidden;

    border-bottom: 1px solid #e3e9df;
}


/* =========================================================
   DECORATIVE SHAPES
========================================================= */

.school-breadcrumb-shape {
    position: absolute;

    border-radius: 50%;

    pointer-events: none;
}

.shape-one {
    width: 380px;
    height: 380px;

    top: -230px;
    right: -100px;

    background: rgba(109, 204, 44, .08);
}

.shape-two {
    width: 220px;
    height: 220px;

    bottom: -150px;
    left: -70px;

    background: rgba(109, 204, 44, .06);
}


/* =========================================================
   MAIN WRAPPER
========================================================= */

.school-breadcrumb-wrapper {
    position: relative;

    z-index: 2;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 40px;
}


/* =========================================================
   CONTENT
========================================================= */

.school-breadcrumb-content {
    max-width: 720px;
}


/* LABEL */

.school-breadcrumb-label {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    color: #6dcc2c;

    font-size: 12px;

    font-weight: 700;

    letter-spacing: 1.2px;

    margin-bottom: 15px;
}

.school-breadcrumb-label i {
    font-size: 17px;
}


/* TITLE */

.school-breadcrumb-content h1 {
    margin: 0 0 13px;

    color: #ffffff;

    font-family: 'Roboto Slab', Georgia, serif;

    font-size: 42px;

    line-height: 1.2;

    font-weight: 700;
}

.school-breadcrumb-content h1 span {
    color: #6dcc2c;
}


/* LINE */
 
.school-breadcrumb-line {
    width: 65px;

    height: 3px;

    background: #263746;

    margin-bottom: 18px;
}


/* DESCRIPTION */

.school-breadcrumb-content > p {
    margin: 0 0 20px;

    max-width: 650px;

    color: #ffffff;

    font-size: 14px;

    line-height: 1.8;
}


/* =========================================================
   BREADCRUMB NAVIGATION
========================================================= */

.school-breadcrumb-list {
    display: flex;

    align-items: center;

    flex-wrap: wrap;

    gap: 9px;

    list-style: none;

    padding: 0;

    margin: 0;
}

.school-breadcrumb-list li {
    font-size: 13px;
}


/* HOME */

.school-breadcrumb-list li a {
    display: inline-flex;

    align-items: center;

    gap: 6px;

    color: #fafcfd;

    text-decoration: none;

    transition: .3s ease;
}

.school-breadcrumb-list li a:hover {
    color: #6dcc2c;
}

.school-breadcrumb-list li a i {
    font-size: 16px;
}


/* ARROW */

.school-breadcrumb-list .breadcrumb-arrow {
    display: flex;

    align-items: center;

    color: #a5aea6;
}

.school-breadcrumb-list .breadcrumb-arrow i {
    font-size: 15px;
}


/* ACTIVE */

.school-breadcrumb-list .active {
    color: #6dcc2c;

    font-weight: 700;
}


/* =========================================================
   RIGHT VISUAL
========================================================= */

.school-breadcrumb-visual {
    position: relative;

    flex-shrink: 0;

    width: 145px;

    height: 145px;
}


/* MAIN ICON */

.breadcrumb-icon-box {
    width: 120px;
    height: 120px;

    position: absolute;

    top: 10px;
    left: 10px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #ffffff;

    border: 1px solid #e1e8de;

    box-shadow: 0 15px 35px rgba(38,55,70,.08);

    transform: rotate(5deg);

    transition: .3s ease;
}

.breadcrumb-icon-box i {
    color: #6dcc2c;

    font-size: 52px;

    transform: rotate(-5deg);
}

.school-breadcrumb-visual:hover .breadcrumb-icon-box {
    transform: rotate(0deg) translateY(-4px);
}


/* SMALL ICON */

.breadcrumb-small-icon {
    position: absolute;

    right: 0;
    bottom: 0;

    width: 48px;
    height: 48px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #6dcc2c;

    color: #ffffff;

    box-shadow: 0 8px 20px rgba(109,204,44,.25);
}

.breadcrumb-small-icon i {
    font-size: 21px;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .school-breadcrumb {
        padding: 55px 0;
    }

    .school-breadcrumb-content h1 {
        font-size: 36px;
    }

    .school-breadcrumb-visual {
        width: 120px;
        height: 120px;
    }

    .breadcrumb-icon-box {
        width: 100px;
        height: 100px;
    }

    .breadcrumb-icon-box i {
        font-size: 42px;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .school-breadcrumb {
        padding: 42px 0;
    }

    .school-breadcrumb-wrapper {
        display: block;
    }

    .school-breadcrumb-content {
        max-width: 100%;
    }

    .school-breadcrumb-content h1 {
        font-size: 30px;
    }

    .school-breadcrumb-content > p {
        font-size: 13px;

        line-height: 1.7;

        margin-bottom: 17px;
    }

    .school-breadcrumb-label {
        font-size: 11px;
    }

    .school-breadcrumb-list {
        gap: 6px;
    }

    .school-breadcrumb-list li {
        font-size: 12px;
    }

    /* Hide icon on mobile */

    .school-breadcrumb-visual {
        display: none;
    }

}


/* =========================================================
   SMALL PHONES
========================================================= */

@media (max-width: 400px) {

    .school-breadcrumb {
        padding: 35px 0;
    }

    .school-breadcrumb-content h1 {
        font-size: 27px;
    }

    .school-breadcrumb-content > p {
        font-size: 12px;
    }

}

/* =========================
   SMALL UPCOMING EVENT POPUP
========================= */

.event-popup {
    position: fixed;
    right: 20px;
    bottom: 20px;

    width: 320px;
    max-width: calc(100% - 30px);

    z-index: 99999;

    opacity: 0;
    visibility: hidden;

    transform: translateY(120px);

    transition:
        opacity 0.4s ease,
        transform 0.4s ease,
        visibility 0.4s ease;
}

.event-popup.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.event-popup-content {
    position: relative;

    background: #fff;

    padding: 20px 20px 18px;

    border-left: 4px solid #6dcc2c;

    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.18);

    border-radius: 4px;
}

/* Close button */
.event-popup-close {
    position: absolute;
    top: 8px;
    right: 8px;

    width: 25px;
    height: 25px;

    border: none;
    border-radius: 50%;

    background: #f2f2f2;
    color: #263746;

    font-size: 18px;
    line-height: 20px;

    cursor: pointer;
}

.event-popup-close:hover {
    background: #6dcc2c;
    color: #fff;
}

/* Icon */
.event-popup-icon {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #eef9e8;
    color: #6dcc2c;

    border-radius: 50%;

    font-size: 21px;

    margin-bottom: 10px;
}

/* Label */
.event-popup-label {
    display: block;

    margin-bottom: 4px;

    color: #6dcc2c;

    font-size: 10px;
    font-weight: 700;

    letter-spacing: 1px;
}

/* Title */
.event-popup-content h3 {
    margin: 0 25px 7px 0;

    color: #263746;

    font-family: "Roboto Slab", serif;

    font-size: 18px;
    font-weight: 700;
}

/* Date */
.event-popup-date {
    margin: 0 0 8px;

    color: #6dcc2c;

    font-size: 12px;
    font-weight: 600;
}

/* Description */
.event-popup-description {
    margin: 0 0 13px;

    color: #68757e;

    font-size: 12px;
    line-height: 1.5;
}

/* Button */
.event-popup-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    padding: 7px 13px;

    background: #6dcc2c;
    color: #fff;

    font-size: 11px;
    font-weight: 600;

    text-decoration: none;

    border-radius: 2px;

    transition: 0.3s ease;
}

.event-popup-btn:hover {
    background: #59b91b;
    color: #fff;
}

/* Mobile */
@media (max-width: 576px) {

    .event-popup {
        right: 12px;
        bottom: 12px;

        width: 285px;
    }

    .event-popup-content {
        padding: 16px;
    }

    .event-popup-content h3 {
        font-size: 16px;
    }

    .event-popup-description {
        font-size: 11px;
    }
}





.user-dropdown {
    position: relative;
}

.user-dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    min-width: 190px;
    padding: 8px 0;
    margin: 0;
    list-style: none;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    z-index: 99999;
}

/* Desktop */
.user-dropdown:hover .user-dropdown-menu,
.user-dropdown:focus-within .user-dropdown-menu {
    display: block;
}

.user-dropdown-menu li {
    display: block;
    width: 100%;
}

.user-dropdown-menu li a,
.user-dropdown-menu li form button {
    display: block;
    box-sizing: border-box;
    width: 100%;
    padding: 12px 16px;
    color: #4c834a;
    text-align: left;
    text-decoration: none;
    background: #fff;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.user-dropdown-menu li a:hover,
.user-dropdown-menu li form button:hover {
    background: #f3f5f4;
    color: #198754;
}

.user-dropdown-menu i {
    margin-right: 8px;
}

/* Mobile screens */
@media (max-width: 991px) {
    .user-dropdown {
        position: relative;
    }

    .user-dropdown-menu {
        position: static;
        width: 100%;
        min-width: 0;
        box-shadow: none;
        border-radius: 0;
        background: #f8f9fa;
    }

    .user-dropdown-menu li a,
    .user-dropdown-menu li form button {
        padding: 12px 20px;
        color: #222;
        background: #f8f9fa;
    }

    .user-dropdown-menu li form {
        display: block;
        width: 100%;
        margin: 0;
    }
}



        </style>


    @yield('styles')
</head>
<body>
	{{-- <div id="preloader">
        <div id="status">&nbsp;</div>
    </div> --}}

    {{-- SCHOOL PRELOADER --}}
<div id="school-preloader">

    <div class="preloader-content">

        {{-- Logo --}}
        <div class="preloader-logo">
            <img
                src="{{ asset('frontend/assets/img/logo/' . $school->logo) }}" 
                alt="School Logo"
            >
        </div>

        {{-- School Name --}}
        <h2 class="preloader-school-name">
            Edu-Green Schools
        </h2>

        <p class="preloader-tagline">
            ...Where kids are No.1
        </p>

        {{-- Loading Animation --}}
        <div class="preloader-loader">

            <div class="preloader-line">
                <span></span>
            </div>

            <div class="preloader-loading-text">
                <span>Loading</span>
                <div class="preloader-dots">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>
            </div>

        </div>

    </div>

</div>
	

{{-- EVENT POPUP --}}

<!-- Upcoming Event Popup -->
<div id="eventPopup" class="event-popup">
    <div class="event-popup-content">

        <button type="button" class="event-popup-close" onclick="closeEventPopup()">
            &times;
        </button>

        <div class="event-popup-icon">
            <i class="ti ti-calendar-event"></i>
        </div>

        <span class="event-popup-label">UPCOMING EVENT</span>

        <h3>School Open Day</h3>

        <p class="event-popup-date">
            <i class="ti ti-calendar"></i>
            Saturday, October 10, 2026
        </p>

        <p class="event-popup-description">
            Join us for our School Open Day and discover our learning
            environment, facilities and academic programmes.
        </p>

        <a href="{{ url('/events') }}" class="event-popup-btn">
            View Event
            <i class="ti ti-arrow-right"></i>
        </a>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const popup = document.getElementById('eventPopup');

    // Show popup after 1 second
    setTimeout(function () {
        popup.classList.add('show');
    }, 1000);

    // Automatically disappear after 4 seconds
    setTimeout(function () {
        closeEventPopup();
    }, 5000);

});

function closeEventPopup() {

    const popup = document.getElementById('eventPopup');

    if (popup) {
        popup.classList.remove('show');
    }
}
</script>
	<!--==================
		Header
	===================-->
	@include('layouts.header')



    @yield('content')
	<!--==================
		Slider
	===================-->
	
	
	<!--==================
		Footer
	===================-->
	@include('layouts.footer')
	<!-- Footer Bottom -->
	{{-- <div class="footer-bottom">
		<div class="container">
			<div class="footer-bottom-inner">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<p>&copy; Copyright 2017 EcologyTheme | All rights reserved</p>
					</div>
					<div class="col-md-6 col-sm-12">
						<ul class="list-unstyled footer-menu">
							<li><a href="#">Testimonials</a></li>
							<li><a href="#">Service</a></li>
							<li><a href="#">Policy</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
						<p id="back-top"><a href="#top"><i class="fa fa-angle-up"></i></a></p>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	

    
	<!--==================
		JS Files
	===================-->
    <!-- jQuery -->
	<script src="../../../code.jquery.com/jquery-1.12.0.min.js"></script>
	<script>window.jQuery || document.write('<script src="{{ asset('frontend/assets/js/assets/vendor/jquery-1.12.0.min.js') }}"> <\/script>')</script>
	<!-- Bootstrap -->
	<script src="{{ asset('frontend/assets/js/assets/bootstrap.min.js') }}"></script>
	<!-- Owl Carousel -->
	<script src="{{ asset('frontend/assets/js/assets/owl.carousel.min.js') }}"></script>
	<!-- Revolution Slider -->
	<script src="{{ asset('frontend/assets/js/assets/revolution/jquery.themepunch.revolution.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/assets/revolution/jquery.themepunch.tools.min.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ asset('frontend/assets/js/assets/jquery.magnific-popup.min.js') }}"></script>
	<!-- Countdown JS -->
	<script src="{{ asset('frontend/assets/js/assets/jquery.syotimer.min.js') }}"></script>
	<!-- Sticky JS -->
	<script src="{{ asset('frontend/assets/js/assets/jquery.sticky.js') }}"></script>
	<!-- Slick Carousel -->
	<script src="{{ asset('frontend/assets/js/assets/slick.min.js') }}"></script>
	<!-- Mean Menu -->
	<script src="{{ asset('frontend/assets/js/assets/jquery.meanmenu.min.js') }}"></script>
	<!-- Mail JS -->
	<script src="{{ asset('frontend/assets/js/assets/mail.js') }}"></script>
	<!-- Revolution Extensions -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/assets/revolution/extensions/revolution.extension.actions.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/assets/revolution/extensions/revolution.extension.carousel.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/assets/revolution/extensions/revolution.extension.kenburn.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/assets/revolution/extensions/revolution.extension.layeranimation.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/assets/revolution/extensions/revolution.extension.migration.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/assets/revolution/extensions/revolution.extension.navigation.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/assets/revolution/extensions/revolution.extension.parallax.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/assets/revolution/extensions/revolution.extension.slideanims.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/assets/revolution/extensions/revolution.extension.video.min.js') }}"></script>
	
	
	<!-- Custom JS -->
	<script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
	
	<!-- =========================================================
		 STYLE SWITCHER | ONLY FOR DEMO NOT INCLUDED IN MAIN FILES
	============================================================== -->
	
	<script>
    window.addEventListener('load', function () {

        const preloader = document.getElementById('school-preloader');

        if (preloader) {

            setTimeout(function () {
                preloader.classList.add('preloader-hidden');
            }, 500);

        }

    });
</script>



<script>

document.addEventListener("DOMContentLoaded", function () {

    const counters = document.querySelectorAll(".counter");

    let started = false;


    function startCounters() {

        if (started) {
            return;
        }

        started = true;


        counters.forEach(function (counter) {

            const target = parseInt(
                counter.getAttribute("data-target")
            );

            let current = 0;

            const duration = 1800;

            const increment =
                target / (duration / 20);


            const updateCounter = setInterval(function () {

                current += increment;


                if (current >= target) {

                    counter.textContent =
                        target.toLocaleString();

                    clearInterval(updateCounter);

                } else {

                    counter.textContent =
                        Math.floor(current).toLocaleString();

                }

            }, 20);

        });

    }


    const statisticsSection =
        document.querySelector(".edugreen-statistics");


    if (!statisticsSection) {
        return;
    }


    const observer =
        new IntersectionObserver(function (entries) {

            entries.forEach(function (entry) {

                if (entry.isIntersecting) {

                    startCounters();

                    observer.unobserve(
                        statisticsSection
                    );

                }

            });

        }, {
            threshold: 0.25
        });


    observer.observe(statisticsSection);

});

</script>

    @yield('scripts')
</body>

<!-- Mirrored from getnajmul.info/theme/edulight/08-university-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Sep 2026 17:07:52 GMT -->
</html>
