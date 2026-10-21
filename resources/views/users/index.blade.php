@extends('layouts.app')
@section('styles')
    <style>
        /* Your custom styles here */

        /* =========================================
           ACADEMIC PROGRAMS
        ========================================= */

        .academic-section {
            padding: 90px 0;
            background: #ffffff;
        }

        .academic-section-heading {
            max-width: 720px;
            margin: 0 auto 50px;
            text-align: center;
        }

        .academic-small-title {
            display: inline-block;

            color: #6dcc2c;

            font-size: 12px;
            font-weight: 700;

            letter-spacing: 1.5px;

            margin-bottom: 12px;
        }

        .academic-section-heading h2 {
            margin: 0;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 40px;
            line-height: 1.25;

            font-weight: 700;
        }

        .academic-section-heading h2 span {
            color: #6dcc2c;
        }

        .academic-line {
            width: 65px;
            height: 2px;

            margin: 18px auto;

            background: #6dcc2c;
        }

        .academic-section-heading p {
            margin: 0;

            color: #6b7780;

            font-family: Arial, sans-serif;

            font-size: 14px;
            line-height: 1.8;
        }


        /* Cards */

        .academic-card {
            height: 100%;

            background: #ffffff;

            border: 1px solid #e7e7e7;

            transition: all 0.3s ease;
        }

        .academic-card:hover {
            transform: translateY(-5px);

            box-shadow: 0 15px 35px rgba(38, 55, 70, 0.12);
        }

        .academic-card-image {
            position: relative;

            height: 245px;

            overflow: hidden;
        }

        .academic-card-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: transform 0.5s ease;
        }

        .academic-card:hover .academic-card-image img {
            transform: scale(1.05);
        }

        .academic-card-number {
            position: absolute;

            top: 15px;
            right: 15px;

            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #6dcc2c;

            color: #ffffff;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 14px;
            font-weight: 700;
        }

        .academic-card-content {
            padding: 28px;
        }

        .academic-card-label {
            color: #6dcc2c;

            font-family: Arial, sans-serif;

            font-size: 10px;
            font-weight: 700;

            letter-spacing: 1px;
        }

        .academic-card-content h3 {
            margin: 8px 0 12px;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 22px;

            font-weight: 700;
        }

        .academic-card-content p {
            margin: 0 0 20px;

            color: #6b7780;

            font-family: Arial, sans-serif;

            font-size: 13px;

            line-height: 1.8;
        }

        .academic-card-content a {
            display: inline-flex;
            align-items: center;

            gap: 7px;

            color: #6dcc2c;

            text-decoration: none;

            font-family: Arial, sans-serif;

            font-size: 11px;
            font-weight: 700;

            letter-spacing: 0.5px;
        }

        .academic-card-content a i {
            transition: transform 0.3s ease;
        }

        .academic-card-content a:hover i {
            transform: translateX(4px);
        }


        /* Mobile */

        @media (max-width: 767px) {

            .academic-section {
                padding: 60px 0;
            }

            .academic-section-heading h2 {
                font-size: 30px;
            }

            .academic-card-image {
                height: 220px;
            }

            .academic-card-content {
                padding: 23px;
            }
        }



        /* =========================================
           WHY CHOOSE SCHOOL
        ========================================= */

        .why-school-section {
            padding: 90px 0;

            background: #f8f8f6;
        }

        .why-school-content {
            max-width: 520px;
        }

        .why-school-small-title {
            color: #6dcc2c;

            font-size: 12px;
            font-weight: 700;

            letter-spacing: 1.5px;
        }

        .why-school-content h2 {
            margin: 12px 0 0;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 40px;
            line-height: 1.25;

            font-weight: 700;
        }

        .why-school-content h2 span {
            color: #6dcc2c;
        }

        .why-school-line {
            width: 65px;
            height: 2px;

            margin: 20px 0;

            background: #6dcc2c;
        }

        .why-school-content p {
            color: #68757e;

            font-family: Arial, sans-serif;

            font-size: 14px;

            line-height: 1.8;

            margin-bottom: 14px;
        }

        .why-school-button {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            margin-top: 12px;

            padding: 13px 25px;

            background: #6dcc2c;

            color: #ffffff;

            text-decoration: none;

            font-size: 11px;
            font-weight: 700;

            transition: 0.3s ease;
        }

        .why-school-button:hover {
            background: #59b91b;

            color: #ffffff;
        }


        /* Cards */

        .why-school-card {
            height: 100%;

            padding: 28px;

            background: #ffffff;

            border: 1px solid #e8e8e8;

            transition: 0.3s ease;
        }

        .why-school-card:hover {
            border-color: #6dcc2c;

            transform: translateY(-4px);

            box-shadow: 0 12px 30px rgba(38, 55, 70, 0.08);
        }

        .why-school-icon {
            width: 50px;
            height: 50px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 18px;

            background: #f0f9e9;

            color: #6dcc2c;
        }

        .why-school-icon i {
            font-size: 23px;
        }

        .why-school-card h3 {
            margin: 0 0 10px;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 18px;
        }

        .why-school-card p {
            margin: 0;

            color: #71808a;

            font-family: Arial, sans-serif;

            font-size: 13px;

            line-height: 1.7;
        }

        @media (max-width: 767px) {

            .why-school-section {
                padding: 60px 0;
            }

            .why-school-content {
                max-width: 100%;
            }

            .why-school-content h2 {
                font-size: 30px;
            }
        }



        /* =========================================
           PRINCIPAL
        ========================================= */

        .principal-welcome-section {
            padding: 90px 0;

            background: #ffffff;
        }

        .principal-photo {
            position: relative;

            padding-right: 30px;
        }

        .principal-photo img {
            width: 100%;
            height: 480px;

            object-fit: cover;

            display: block;
        }

        .principal-photo-caption {
            position: absolute;

            right: 0;
            bottom: 25px;

            width: 210px;

            padding: 17px 20px;

            background: #ffffff;

            box-shadow: 0 10px 30px rgba(38, 55, 70, 0.15);
        }

        .principal-photo-caption strong {
            display: block;

            color: #6dcc2c;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 16px;
        }

        .principal-photo-caption span {
            display: block;

            margin-top: 4px;

            color: #71808a;

            font-family: Arial, sans-serif;

            font-size: 11px;
        }

        .principal-welcome-content>span {
            color: #6dcc2c;

            font-size: 12px;

            font-weight: 700;

            letter-spacing: 1.5px;
        }

        .principal-welcome-content h2 {
            margin: 12px 0 0;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 40px;

            font-weight: 700;
        }

        .principal-welcome-content h2 span {
            color: #6dcc2c;
        }

        .principal-line {
            width: 65px;
            height: 2px;

            background: #6dcc2c;

            margin: 20px 0;
        }

        .principal-welcome-content p {
            color: #68757e;

            font-family: Arial, sans-serif;

            font-size: 14px;

            line-height: 1.85;

            margin-bottom: 15px;
        }

        .principal-signature {
            border-top: 1px solid #e5e5e5;

            margin-top: 25px;

            padding-top: 18px;
        }

        .principal-signature strong {
            display: block;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 16px;
        }

        .principal-signature span {
            color: #6dcc2c;

            font-size: 11px;
        }

        @media (max-width: 767px) {

            .principal-welcome-section {
                padding: 60px 0;
            }

            .principal-photo {
                padding-right: 0;
            }

            .principal-photo img {
                height: 400px;
            }

            .principal-photo-caption {
                right: 15px;
            }

            .principal-welcome-content h2 {
                font-size: 30px;
            }
        }



        /* =========================================
           SCHOOL STATISTICS
        ========================================= */

        .school-counter-section {
            padding: 55px 0;

            background: #263746;
        }

        .school-counter {
            text-align: center;

            padding: 10px 20px;

            border-right: 1px solid rgba(255, 255, 255, 0.15);
        }

        .school-counter i {
            display: block;

            color: #6dcc2c;

            font-size: 27px;

            margin-bottom: 12px;
        }

        .school-counter strong {
            display: block;

            color: #ffffff;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 34px;

            line-height: 1;
        }

        .school-counter span {
            display: block;

            margin-top: 8px;

            color: rgba(255, 255, 255, 0.65);

            font-family: Arial, sans-serif;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 0.8px;
        }

        @media (max-width: 991px) {

            .school-counter:nth-child(2) {
                border-right: 0;
            }

            .school-counter {
                margin-bottom: 25px;
            }
        }

        @media (max-width: 575px) {

            .school-counter-section {
                padding: 45px 0;
            }

            .school-counter {
                border-right: 0;
            }

            .school-counter strong {
                font-size: 27px;
            }

            .school-counter span {
                font-size: 10px;
            }
        }


        /* =========================================
           FACILITIES
        ========================================= */

        .school-facilities-section {
            padding: 90px 0;

            background: #f8f8f6;
        }

        .facilities-heading {
            max-width: 700px;

            text-align: center;

            margin: 0 auto 50px;
        }

        .facilities-heading>span {
            color: #6dcc2c;

            font-size: 12px;

            font-weight: 700;

            letter-spacing: 1.5px;
        }

        .facilities-heading h2 {
            margin: 12px 0 0;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 38px;

            line-height: 1.3;

            font-weight: 700;
        }

        .facilities-heading h2 span {
            color: #6dcc2c;
        }

        .facilities-line {
            width: 65px;
            height: 2px;

            background: #6dcc2c;

            margin: 18px auto;
        }


        /* Facility */

        .facility-item {
            height: 100%;

            background: #ffffff;

            border: 1px solid #e5e5e5;

            transition: 0.3s ease;
        }

        .facility-item:hover {
            transform: translateY(-5px);

            box-shadow: 0 12px 30px rgba(38, 55, 70, 0.10);
        }

        .facility-image {
            height: 210px;

            overflow: hidden;
        }

        .facility-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: transform 0.5s ease;
        }

        .facility-item:hover .facility-image img {
            transform: scale(1.05);
        }

        .facility-content {
            position: relative;

            padding: 25px;
        }

        .facility-content>i {
            position: absolute;

            top: -25px;
            right: 20px;

            width: 50px;
            height: 50px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #6dcc2c;

            color: #ffffff;

            font-size: 22px;
        }

        .facility-content h3 {
            margin: 0 0 10px;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 19px;
        }

        .facility-content p {
            margin: 0;

            color: #71808a;

            font-family: Arial, sans-serif;

            font-size: 13px;

            line-height: 1.7;
        }

        @media (max-width: 767px) {

            .school-facilities-section {
                padding: 60px 0;
            }

            .facilities-heading h2 {
                font-size: 29px;
            }

            .facility-image {
                height: 220px;
            }
        }

        /* =========================================
           ADMISSION PROCESS
        ========================================= */

        .school-admission-section {
            padding: 90px 0;

            background: #ffffff;
        }

        .admission-heading {
            max-width: 700px;

            margin: 0 auto 50px;

            text-align: center;
        }

        .admission-heading>span {
            color: #6dcc2c;

            font-size: 12px;

            font-weight: 700;

            letter-spacing: 1.5px;
        }

        .admission-heading h2 {
            margin: 12px 0 0;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 38px;

            font-weight: 700;
        }

        .admission-heading h2 span {
            color: #6dcc2c;
        }

        .admission-line {
            width: 65px;
            height: 2px;

            margin: 18px auto;

            background: #6dcc2c;
        }

        .admission-heading p {
            margin: 0;

            color: #71808a;

            font-family: Arial, sans-serif;

            font-size: 14px;

            line-height: 1.8;
        }


        /* Cards */

        .admission-card {
            position: relative;

            height: 100%;

            padding: 35px 25px 28px;

            text-align: center;

            border: 1px solid #e5e5e5;

            background: #ffffff;

            transition: 0.3s ease;
        }

        .admission-card:hover {
            border-color: #6dcc2c;

            transform: translateY(-5px);

            box-shadow: 0 12px 30px rgba(38, 55, 70, 0.08);
        }

        .admission-number {
            position: absolute;

            top: 12px;
            right: 15px;

            color: #dfe6e9;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 25px;

            font-weight: 700;
        }

        .admission-card>i {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            width: 55px;
            height: 55px;

            margin-bottom: 18px;

            background: #f0f9e9;

            color: #6dcc2c;

            font-size: 25px;
        }

        .admission-card h3 {
            margin: 0 0 10px;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 18px;
        }

        .admission-card p {
            margin: 0;

            color: #71808a;

            font-family: Arial, sans-serif;

            font-size: 13px;

            line-height: 1.7;
        }

        .admission-action {
            text-align: center;

            margin-top: 45px;
        }

        .admission-action a {
            display: inline-flex;

            align-items: center;
            gap: 8px;

            padding: 14px 25px;

            background: #6dcc2c;

            color: #ffffff;

            text-decoration: none;

            font-family: Arial, sans-serif;

            font-size: 11px;

            font-weight: 700;

            transition: 0.3s ease;
        }

        .admission-action a:hover {
            background: #59b91b;

            color: #ffffff;
        }

        @media (max-width: 767px) {

            .school-admission-section {
                padding: 60px 0;
            }

            .admission-heading h2 {
                font-size: 29px;
            }
        }

        /* =========================================
           STUDENT LIFE
        ========================================= */

        .student-life-section {
            padding: 90px 0;

            background: #f8faf8;
        }

        .student-life-heading {
            max-width: 700px;

            margin: 0 auto 50px;

            text-align: center;
        }

        .student-life-heading>span {
            color: #6dcc2c;

            font-size: 12px;

            font-weight: 700;

            letter-spacing: 1.5px;
        }

        .student-life-heading h2 {
            margin: 12px 0 0;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 38px;

            font-weight: 700;
        }

        .student-life-heading h2 span {
            color: #6dcc2c;
        }

        .student-life-line {
            width: 65px;
            height: 2px;

            background: #6dcc2c;

            margin: 18px auto;
        }

        .student-life-heading p {
            color: #71808a;

            font-family: Arial, sans-serif;

            font-size: 14px;

            line-height: 1.8;

            margin: 0;
        }


        /* Cards */

        .student-card {
            height: 100%;

            padding: 32px 25px;

            background: #ffffff;

            border: 1px solid #e5e5e5;

            text-align: center;

            transition: 0.3s ease;
        }

        .student-card:hover {
            transform: translateY(-5px);

            border-color: #6dcc2c;

            box-shadow: 0 12px 30px rgba(38, 55, 70, 0.08);
        }

        .student-icon {
            width: 58px;
            height: 58px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 20px;

            background: #f0f9e9;

            color: #6dcc2c;
        }

        .student-icon i {
            font-size: 26px;
        }

        .student-card h3 {
            margin: 0 0 10px;

            color: #263746;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 18px;
        }

        .student-card p {
            margin: 0;

            color: #71808a;

            font-family: Arial, sans-serif;

            font-size: 13px;

            line-height: 1.7;
        }

        @media (max-width: 767px) {

            .student-life-section {
                padding: 60px 0;
            }

            .student-life-heading h2 {
                font-size: 29px;
            }
        }

        .about-school-section {
            padding: 90px 0;
            background: #f4f8f1;
        }

        .school-section-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #6dcc2c;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .school-section-title {
            font-family: 'Roboto Slab', Georgia, serif;
            color: #263746;
            font-size: 42px;
            line-height: 1.2;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .school-section-title span {
            color: #6dcc2c;
            display: block;
        }

        .section-line {
            width: 70px;
            height: 3px;
            background: #263746;
            margin-bottom: 25px;
        }

        .about-text {
            color: #68757e;
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .about-points {
            margin: 25px 0;
        }

        .about-point {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 13px;
            color: #263746;
            font-size: 14px;
            font-weight: 600;
        }

        .about-point i {
            color: #6dcc2c;
            font-size: 20px;
        }

        .school-green-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 25px;
            background: #6dcc2c;
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
            font-size: 13px;
            transition: .3s ease;
        }

        .school-green-btn:hover {
            background: #59b91b;
            color: #ffffff;
            transform: translateY(-2px);
        }

        .about-image-wrapper {
            position: relative;
            padding-left: 15px;
        }

        .about-school-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
        }

        .about-image-badge {
            position: absolute;
            bottom: 25px;
            left: 0;
            background: #6dcc2c;
            color: #ffffff;
            padding: 18px 25px;
            min-width: 150px;
        }

        .about-image-badge strong {
            display: block;
            font-family: 'Roboto Slab', Georgia, serif;
            font-size: 22px;
        }

        .about-image-badge span {
            font-size: 13px;
        }

        @media (max-width: 767px) {

            .about-school-section {
                padding: 60px 0;
            }

            .school-section-title {
                font-size: 30px;
            }

            .about-image-wrapper {
                padding-left: 0;
                margin-top: 20px;
            }

            .about-school-image {
                height: 330px;
            }
        }




        /*
        our teahers section */
        .teachers-section {
            padding: 90px 0;
            background: #f8f8f6;
        }

        .teachers-heading {
            max-width: 700px;
            margin: auto;
        }

        .teachers-heading p {
            color: #68757e;
            line-height: 1.8;
        }

        .teacher-card {
            background: #ffffff;
            border: 1px solid #e5e5e5;
            overflow: hidden;
            transition: .35s ease;
            height: 100%;
        }

        .teacher-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(38, 55, 70, .12);
        }

        .teacher-image {
            height: 300px;
            overflow: hidden;
        }

        .teacher-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .5s ease;
        }

        .teacher-card:hover .teacher-image img {
            transform: scale(1.05);
        }

        .teacher-content {
            padding: 22px;
            text-align: center;
        }

        .teacher-content h3 {
            font-family: 'Roboto Slab', Georgia, serif;
            color: #263746;
            font-size: 19px;
            margin-bottom: 6px;
        }

        .teacher-content span {
            color: #6dcc2c;
            font-size: 13px;
            font-weight: 600;
        }

        .teacher-socials {
            margin-top: 15px;
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .teacher-socials a {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f0;
            color: #263746;
            text-decoration: none;
            transition: .3s ease;
        }

        .teacher-socials a:hover {
            background: #6dcc2c;
            color: #ffffff;
        }

        @media (max-width: 767px) {

            .teachers-section {
                padding: 60px 0;
            }

            .teacher-image {
                height: 320px;
            }

        }

        /* =========================================================
           CONTACT SECTION
        ========================================================= */

        .school-contact-section {
            padding: 90px 0;
            background: #ffffff;
        }

        .contact-heading {
            max-width: 700px;
            margin: auto;
        }

        .contact-heading>p {
            color: #68757e;
            line-height: 1.8;
        }


        /* CONTACT INFORMATION */

        .contact-information {
            height: 100%;
            padding: 40px;
            background: #263746;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .contact-information::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(109, 204, 44, .08);
            right: -100px;
            bottom: -100px;
        }

        .contact-info-header {
            position: relative;
            z-index: 2;
            margin-bottom: 35px;
        }

        .contact-info-header>span {
            color: #6dcc2c;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .contact-info-header h3 {
            font-family: 'Roboto Slab', Georgia, serif;
            font-size: 28px;
            line-height: 1.3;
            margin: 10px 0;
        }

        .contact-info-header h3 strong {
            color: #6dcc2c;
        }

        .contact-info-header p {
            color: rgba(255, 255, 255, .68);
            font-size: 14px;
            line-height: 1.8;
        }


        /* CONTACT ITEMS */

        .contact-info-item {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: flex-start;
            gap: 15px;

            margin-bottom: 25px;
        }

        .contact-info-icon {
            width: 45px;
            height: 45px;
            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(109, 204, 44, .13);
            color: #6dcc2c;
        }

        .contact-info-icon i {
            font-size: 21px;
        }

        .contact-info-item small {
            color: #6dcc2c;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .contact-info-item h4 {
            margin: 3px 0;

            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
        }

        .contact-info-item p {
            margin: 0;

            color: rgba(255, 255, 255, .58);
            font-size: 12px;
        }


        /* CONTACT BUTTON */

        .contact-main-btn {
            position: relative;
            z-index: 2;

            display: inline-flex;
            align-items: center;
            gap: 10px;

            margin-top: 10px;

            padding: 13px 20px;

            background: #6dcc2c;
            color: #ffffff;

            text-decoration: none;

            font-size: 12px;
            font-weight: 700;

            transition: .3s ease;
        }

        .contact-main-btn:hover {
            background: #59b91b;
            color: #ffffff;
            transform: translateY(-2px);
        }


        /* FORM */

        .contact-form-card {
            height: 100%;
            background: #ffffff;
            padding: 40px;

            border: 1px solid #e3e8df;

            box-shadow: 0 15px 40px rgba(38, 55, 70, .06);
        }

        .contact-form-heading h3 {
            font-family: 'Roboto Slab', Georgia, serif;
            color: #263746;
            font-size: 25px;
            margin-bottom: 7px;
        }

        .contact-form-heading p {
            color: #68757e;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .contact-form-card label {
            display: block;
            color: #263746;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .contact-form-card .form-control {
            border: 1px solid #e0e5df;
            border-radius: 0;
            padding: 13px 15px;
            font-size: 13px;
            box-shadow: none;
        }

        .contact-form-card .form-control:focus {
            border-color: #6dcc2c;
            box-shadow: 0 0 0 3px rgba(109, 204, 44, .10);
        }

        .contact-submit-btn {
            border: 0;

            display: inline-flex;
            align-items: center;
            gap: 10px;

            padding: 14px 25px;

            background: #6dcc2c;
            color: #ffffff;

            font-size: 12px;
            font-weight: 700;

            transition: .3s ease;
        }

        .contact-submit-btn:hover {
            background: #59b91b;
            transform: translateY(-2px);
        }


        @media (max-width: 767px) {

            .school-contact-section {
                padding: 60px 0;
            }

            .contact-information,
            .contact-form-card {
                padding: 28px 22px;
            }

            .contact-info-header h3 {
                font-size: 24px;
            }

        }


        /* =========================================================
           NEWS SECTION
        ========================================================= */

        .school-news-section {
            padding: 90px 0;
            background: #ffffff;
        }

        .news-section-top {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 40px;
        }

        .view-news-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: #263746;

            border-bottom: 2px solid #6dcc2c;

            padding-bottom: 6px;

            text-decoration: none;

            font-size: 12px;
            font-weight: 700;

            transition: .3s ease;
        }

        .view-news-btn:hover {
            color: #6dcc2c;
        }


        /* NEWS CARD */

        .school-news-card {
            height: 100%;

            background: #ffffff;

            border: 1px solid #e5e9e4;

            overflow: hidden;

            transition: .35s ease;
        }

        .school-news-card:hover {
            transform: translateY(-7px);

            box-shadow: 0 20px 40px rgba(38, 55, 70, .10);
        }


        /* IMAGE */

        .news-image {
            height: 240px;
            position: relative;
            overflow: hidden;
        }

        .news-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: .5s ease;
        }

        .school-news-card:hover .news-image img {
            transform: scale(1.06);
        }

        .news-category {
            position: absolute;

            left: 18px;
            bottom: 18px;

            padding: 7px 11px;

            background: #6dcc2c;
            color: #ffffff;

            font-size: 10px;
            font-weight: 700;
            letter-spacing: .7px;
        }


        /* CONTENT */

        .news-card-content {
            padding: 25px;
        }

        .news-date {
            display: flex;
            align-items: center;
            gap: 6px;

            color: #6dcc2c;

            font-size: 11px;
            font-weight: 600;

            margin-bottom: 10px;
        }

        .news-card-content h3 {
            font-family: 'Roboto Slab', Georgia, serif;

            color: #263746;

            font-size: 19px;
            line-height: 1.45;

            margin-bottom: 12px;
        }

        .news-card-content p {
            color: #68757e;

            font-size: 13px;
            line-height: 1.8;

            margin-bottom: 18px;
        }

        .news-read-more {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: #263746;

            text-decoration: none;

            font-size: 11px;
            font-weight: 700;

            transition: .3s ease;
        }

        .news-read-more:hover {
            color: #6dcc2c;
        }


        @media (max-width: 767px) {

            .school-news-section {
                padding: 60px 0;
            }

            .news-section-top {
                display: block;
            }

            .view-news-btn {
                margin-top: 5px;
            }

            .news-image {
                height: 220px;
            }

        }






        /* =========================================
           EDUGREEN STATISTICS
        ========================================= */

        .edugreen-statistics {
            position: relative;

            padding: 90px 0;

            background: #f7faf8;

            overflow: hidden;
        }


        /* HEADER */

        .edugreen-statistics-header {
            max-width: 700px;

            margin: 0 auto 55px;

            text-align: center;
        }


        .statistics-label {
            display: inline-block;

            margin-bottom: 12px;

            color: #2f9e44;

            font-size: 12px;

            font-weight: 800;

            letter-spacing: 2px;
        }


        .edugreen-statistics-header h2 {
            margin: 0 0 15px;

            color: #173d2b;

            font-size: 38px;

            font-weight: 800;

            line-height: 1.2;
        }


        .edugreen-statistics-header h2 span {
            color: #2f9e44;
        }


        .edugreen-statistics-header p {
            max-width: 600px;

            margin: auto;

            color: #68756e;

            font-size: 16px;

            line-height: 1.8;
        }


        /* STAT CARD */

        .edugreen-stat-card {

            position: relative;

            height: 100%;

            min-height: 270px;

            margin-bottom: 30px;

            padding: 35px 25px;

            text-align: center;

            background: #ffffff;

            border: 1px solid #e5eee8;

            border-radius: 12px;

            box-shadow: 0 8px 30px rgba(25, 70, 45, 0.06);

            overflow: hidden;

            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease,
                border-color 0.35s ease;
        }


        /* TOP GREEN LINE */

        .edugreen-stat-card::before {

            content: "";

            position: absolute;

            top: 0;
            left: 0;

            width: 100%;

            height: 4px;

            background: #2f9e44;

            transform: scaleX(0);

            transform-origin: left;

            transition: transform 0.35s ease;
        }


        .edugreen-stat-card:hover {

            transform: translateY(-8px);

            border-color: #cde5d4;

            box-shadow:
                0 18px 45px rgba(25, 70, 45, 0.12);
        }


        .edugreen-stat-card:hover::before {

            transform: scaleX(1);

        }


        /* ICON */

        .stat-icon {

            width: 65px;

            height: 65px;

            margin: 0 auto 20px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #eaf7ed;

            color: #2f9e44;

            font-size: 29px;

            transition: all 0.35s ease;
        }


        .edugreen-stat-card:hover .stat-icon {

            background: #2f9e44;

            color: #ffffff;

            transform: scale(1.08);
        }


        /* NUMBER */

        .stat-number {

            margin-bottom: 7px;

            color: #173d2b;

            font-size: 42px;

            line-height: 1;

            font-weight: 800;

            letter-spacing: -1px;
        }


        .stat-plus {

            color: #2f9e44;

            font-size: 28px;

            font-weight: 800;
        }


        /* TITLE */

        .edugreen-stat-card h3 {

            margin: 12px 0 10px;

            color: #263b30;

            font-size: 17px;

            font-weight: 700;
        }


        /* DESCRIPTION */

        .edugreen-stat-card p {

            max-width: 210px;

            margin: auto;

            color: #7b8780;

            font-size: 13px;

            line-height: 1.7;
        }


        /* =========================================
           TABLET
        ========================================= */

        @media (max-width: 991px) {

            .edugreen-statistics {

                padding: 70px 0;

            }


            .edugreen-statistics-header h2 {

                font-size: 34px;

            }


            .edugreen-stat-card {

                min-height: 250px;

            }

        }


        /* =========================================
           MOBILE
        ========================================= */

        @media (max-width: 767px) {

            .edugreen-statistics {

                padding: 60px 15px;

            }


            .edugreen-statistics-header {

                margin-bottom: 35px;

            }


            .edugreen-statistics-header h2 {

                font-size: 29px;

            }


            .edugreen-statistics-header p {

                font-size: 14px;

            }


            .edugreen-stat-card {

                min-height: 235px;

                padding: 28px 18px;

                margin-bottom: 20px;

                border-radius: 10px;

            }
        }

        /* .academic-card-wrapper {
            display: flex;
            justify-content: center;
        } */


        /* ========================================= EDU GREEN MARQUEE ========================================= */
        .edu-marquee-section {
            width: 100%;
            overflow: hidden;
            background: #198754;
            border-top: 1px solid rgba(255, 255, 255, .15);
            border-bottom: 1px solid rgba(255, 255, 255, .15);
        }

        .edu-marquee-wrapper {
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        /* MOVING TRACK */
        .edu-marquee-track {
            display: flex;
            align-items: center;
            width: max-content;
            animation: eduMarqueeLeftToRight 28s linear infinite;
            will-change: transform;
        }

        /* The track starts further to the left and moves toward the right. */
        @keyframes eduMarqueeLeftToRight {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0);
            }
        }

        /* MARQUEE ITEM */
        .edu-marquee-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 28px;
            color: #ffffff;
            white-space: nowrap;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: .2px;
        }

        .edu-marquee-item i {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            color: #198754;
            background: #ffffff;
            border-radius: 50%;
            font-size: 16px;
        }

        /* SEPARATOR */
        .edu-marquee-dot {
            width: 6px;
            height: 6px;
            flex: 0 0 6px;
            background: #b9f2cf;
            border-radius: 50%;
        }

        /* PAUSE WHEN MOUSE IS OVER IT */
        .edu-marquee-section:hover .edu-marquee-track {
            animation-play-state: paused;
        }

        /* ========================================= RESPONSIVE ========================================= */
        @media (max-width: 767px) {
            .edu-marquee-track {
                animation-duration: 23s;
            }

            .edu-marquee-item {
                padding: 13px 20px;
                font-size: 13px;
            }

            .edu-marquee-item i {
                width: 27px;
                height: 27px;
                font-size: 14px;
            }

            .edu-marquee-dot {
                width: 5px;
                height: 5px;
                flex-basis: 5px;
            }
        }

        @media (max-width: 480px) {
            .edu-marquee-track {
                animation-duration: 20s;
            }

            .edu-marquee-item {
                padding: 12px 16px;
                font-size: 12px;
            }

            .edu-marquee-item i {
                width: 25px;
                height: 25px;
                font-size: 13px;
            }
        }



       
/* =========================================
   WHY CHOOSE US - EDU GREEN SCHOOLS
========================================= */

.why-school-section {
    position: relative;
    padding: 90px 0;
    background: linear-gradient(135deg, #f5faf6 0%, #ffffff 100%);
    overflow: hidden;
}

.why-school-content {
    padding-right: 20px;
}

.why-school-small-title {
    display: inline-block;
    margin-bottom: 18px;
    color: #319b3c;
    font-size: 15px;
    font-weight: 800;
    letter-spacing: 1.2px;
}

.why-school-content h2 {
    margin: 0;
    color: #123c2a;
    font-size: clamp(30px, 3.2vw, 46px);
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -1px;
}

.why-school-content h2 span {
    display: block;
    color: #3ba647;
}

.why-school-line {
    width: 75px;
    height: 5px;
    margin: 25px 0 30px;
    background: #3ba647;
    border-radius: 10px;
}

.why-school-content p {
    margin-bottom: 20px;
    color: #60756b;
    font-size: 16px;
    line-height: 1.9;
}

.why-school-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-top: 12px;
    padding: 15px 30px;
    background: #3ba647;
    color: #ffffff;
    border-radius: 35px;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 0.5px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.why-school-button:hover {
    background: #123c2a;
    color: #ffffff;
    transform: translateY(-3px);
}

/* =========================================
   CARDS
========================================= */

.why-school-card {
    height: 100%;
    padding: 18px;
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid rgba(18, 60, 42, 0.05);
    border-radius: 15px;
    box-shadow: 0 10px 35px rgba(18, 60, 42, 0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.why-school-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 40px rgba(18, 60, 42, 0.12);
}

/* =========================================
   CARD IMAGES
========================================= */

.why-school-image {
    width: 100%;
    height: 190px;
    margin-bottom: 22px;
    overflow: hidden;
    background: #e8f0e9;
    border-radius: 10px;
}

.why-school-image img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.5s ease;
}

.why-school-card:hover .why-school-image img {
    transform: scale(1.04);
}

/* =========================================
   CARD TEXT
========================================= */

.why-school-card h3 {
    margin: 0 0 12px;
    color: #123c2a;
    font-size: 21px;
    font-weight: 800;
    line-height: 1.4;
}

.why-school-card p {
    margin: 0;
    color: #60756b;
    font-size: 15px;
    line-height: 1.8;
}

/* =========================================
   TABLET
========================================= */

@media (max-width: 991px) {

    .why-school-section {
        padding: 65px 0;
    }

    .why-school-content {
        padding-right: 0;
        margin-bottom: 15px;
    }

    .why-school-content h2 {
        font-size: 36px;
    }

    .why-school-image {
        height: 180px;
    }

}

/* =========================================
   MOBILE
========================================= */

@media (max-width: 767px) {

    .why-school-section {
        padding: 50px 0;
    }

    .why-school-content h2 {
        font-size: 32px;
        letter-spacing: -0.5px;
    }

    .why-school-content p {
        font-size: 15px;
        line-height: 1.8;
    }

    .why-school-card {
        padding: 14px;
        border-radius: 12px;
    }

    .why-school-image {
        height: 170px;
        margin-bottom: 16px;
    }

    .why-school-card h3 {
        font-size: 18px;
    }

    .why-school-card p {
        font-size: 14px;
        line-height: 1.7;
    }

}

/* =========================================
   SMALL MOBILE
========================================= */

@media (max-width: 480px) {

    .why-school-section {
        padding: 40px 0;
    }

    .why-school-content h2 {
        font-size: 29px;
    }

    .why-school-image {
        height: 190px;
    }

    .why-school-card {
        padding: 12px;
    }

}

    </style>
@endsection

@section('content')
    {{-- PAGE HERO SLIDER --}}
    <section class="slider">
        <div class="rev_slider_wrapper">
            <div id="rev_slider_4" class="rev_slider" style="display:none">

                <!-- BEGIN SLIDES LIST -->
                <ul>
                    <li data-transition="random" data-title="Slide Title" data-param1="Additional Text"
                        data-thumb="images/slide04-thumb.jpg">
                        <div class="su-overlay"></div>
                        <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                        <img src="{{ asset('frontend/assets/img/slider1.jpeg') }}" alt="Sky" class="rev-slidebg">
                        <!-- BEGIN BASIC TEXT LAYER -->
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4" data-x="left"
                            data-hoffset="0" data-y="center" data-voffset="-70"
                            data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 6; font-size:60px; color:#fff; text-transform:capitalize; font-family:'Roboto Slab', serif; white-space: nowrap; font-weight:600;">
                            Take The First Step
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4" data-x="left"
                            data-hoffset="0" data-y="center" data-voffset="10"
                            data-frames='[{"delay":1000,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 6; font-size:60px; color:#fff; text-transform:capitalize; font-family:'Roboto Slab', serif; white-space: nowrap; font-weight:600;">
                            To Knowledge With Us
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption font-lora sfb tp-resizeme letter-space-5" data-x="left" data-hoffset="0"
                            data-y="center" data-voffset="-160"
                            data-frames='[{"delay":0,"speed":2000,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; font-size:20px; color:#fff; font-family:'Roboto Slab', serif; max-width: auto; max-height: auto; white-space: nowrap; font-weight:500;">
                            The Goal Of Education Is The Advancement of Knowledge
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption lfb tp-resizeme" data-x="left" data-hoffset="0" data-y="center"
                            data-voffset="120"
                            data-frames='[{"delay":0,"speed":2000,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 8;"><a href="{{ route('user.contact') }}"
                                class="el-btn-regular slider-btn-left">Contact Us</a> <a
                                href="{{ route('user.application') }}" class="el-btn-regular">Apply Now</a>
                        </div>
                    </li>
                    <li data-transition="random" data-title="Slide Title" data-param1="Additional Text"
                        data-thumb="images/slide04-thumb.jpg">
                        <div class="su-overlay"></div>
                        <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                        <img src="{{ asset('frontend/assets/img/slider2.jpeg') }}" alt="Sky" class="rev-slidebg">
                        <!-- BEGIN BASIC TEXT LAYER -->
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4" data-x="left"
                            data-hoffset="0" data-y="center" data-voffset="-70"
                            data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 6; font-size:60px; color:#fff; text-transform:capitalize; font-family:'Roboto Slab', serif; white-space: nowrap; font-weight:600;">
                            Take The First Step
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4" data-x="left"
                            data-hoffset="0" data-y="center" data-voffset="10"
                            data-frames='[{"delay":1000,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 6; font-size:60px; color:#fff; text-transform:capitalize; font-family:'Roboto Slab', serif; white-space: nowrap; font-weight:600;">
                            To Knowledge With Us
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption font-lora sfb tp-resizeme letter-space-5" data-x="left" data-hoffset="0"
                            data-y="center" data-voffset="-160"
                            data-frames='[{"delay":0,"speed":2000,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; font-size:20px; color:#fff; font-family:'Roboto Slab', serif; max-width: auto; max-height: auto; white-space: nowrap; font-weight:500;">
                            The Goal Of Education Is The Advancement of Knowledge
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption lfb tp-resizeme" data-x="left" data-hoffset="0" data-y="center"
                            data-voffset="120"
                            data-frames='[{"delay":0,"speed":2000,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 8;"><a href="{{ route('user.contact') }}"
                                class="el-btn-regular slider-btn-left">Contact Us</a> <a
                                href="{{ route('user.application') }}" class="el-btn-regular">Apply Now</a>
                        </div>
                    </li>




                    <li data-transition="random" data-title="Slide Title" data-param1="Additional Text"
                        data-thumb="images/slide04-thumb.jpg">
                        <div class="su-overlay"></div>
                        <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                        <img src="{{ asset('frontend/assets/img/slider4.jpeg') }}" alt="Sky" class="rev-slidebg">
                        <!-- BEGIN BASIC TEXT LAYER -->
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4" data-x="left"
                            data-hoffset="0" data-y="center" data-voffset="-70"
                            data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 6; font-size:60px; color:#fff; text-transform:capitalize; font-family:'Roboto Slab', serif; white-space: nowrap; font-weight:600;">
                            Take The First Step
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4" data-x="left"
                            data-hoffset="0" data-y="center" data-voffset="10"
                            data-frames='[{"delay":1000,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 6; font-size:60px; color:#fff; text-transform:capitalize; font-family:'Roboto Slab', serif; white-space: nowrap; font-weight:600;">
                            To Knowledge With Us
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption font-lora sfb tp-resizeme letter-space-5" data-x="left" data-hoffset="0"
                            data-y="center" data-voffset="-160"
                            data-frames='[{"delay":0,"speed":2000,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; font-size:20px; color:#fff; font-family:'Roboto Slab', serif; max-width: auto; max-height: auto; white-space: nowrap; font-weight:500;">
                            The Goal Of Education Is The Advancement of Knowledge
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption lfb tp-resizeme" data-x="left" data-hoffset="0" data-y="center"
                            data-voffset="120"
                            data-frames='[{"delay":0,"speed":2000,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 8;"><a href="{{ route('user.contact') }}"
                                class="el-btn-regular slider-btn-left">Contact Us</a> <a
                                href="{{ route('user.application') }}" class="el-btn-regular">Apply Now</a>
                        </div>
                    </li>



                </ul><!-- END SLIDES LIST -->

            </div><!-- END SLIDER CONTAINER -->
        </div><!-- END SLIDER CONTAINER WRAPPER -->

        <div class="slider-bottom-btn">
            <a href="#"><img src="{{ asset('frontend/assets/images/mouse-icon.png') }}" alt=""></a>
        </div>
    </section>
    <!--==================
          About
         ===================-->


    <section class="about-school-section">
        <div class="container">
            <div class="row align-items-center g-5">

                {{-- LEFT: CONTENT --}}
                <div class="col-lg-6">
                    <span class="school-section-label">
                        <i class="ti ti-school"></i>
                        ABOUT OUR SCHOOL
                    </span>

                    <h2 class="school-section-title">
                        Welcome to
                        <span>Edugreen Infant & Primary School</span>
                    </h2>

                    <div class="section-line"></div>

                    {{-- <p class="about-text">
                        We are committed to providing a safe, inspiring and
                        supportive learning environment where every child can
                        discover their potential and develop the skills needed
                        for a successful future. --}}
                    </p>

                    <p class="about-text">
                        {{ $about->content}}
                    </p>

                    <div class="about-points">

                        <div class="about-point">
                            <i class="ti ti-circle-check"></i>
                            <span>Qualified and dedicated teachers</span>
                        </div>

                        <div class="about-point">
                            <i class="ti ti-circle-check"></i>
                            <span>Modern learning environment</span>
                        </div>

                        <div class="about-point">
                            <i class="ti ti-circle-check"></i>
                            <span>Strong academic foundation</span>
                        </div>

                    </div>

                    <a href="{{ url('/about-Us') }}" class="school-green-btn">
                        READ MORE
                        <i class="ti ti-arrow-right"></i>
                    </a>
                </div>

                {{-- RIGHT: IMAGE --}}
                <div class="col-lg-6">
                    <div class="about-image-wrapper">

                        <img src="{{ asset('frontend/assets/img/about.jpeg') }}" alt="Our student"
                            class="about-school-image">

                        <div class="about-image-badge">
                            <strong>Quality</strong>
                            <span>Education</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- =========================================
             ACADEMIC PROGRAMS
        ========================================= -->
    <section class="academic-section">

        <div class="container">


            <div class="academic-section-heading">

                <span class="academic-small-title">
                    OUR ACADEMIC PROGRAMS
                </span>

                <h2>
                    Quality Education for
                    <span>Every Stage</span>
                </h2>

                <div class="academic-line"></div>

                <p>
                    We provide a strong educational foundation from early childhood
                    through secondary school, helping every child learn, grow and succeed.
                </p>

            </div>


            <div class="row g-4">

                <!-- Nursery -->
                <div class="col-lg-4 col-md-6">

                    <div class="academic-card">

                        <div class="academic-card-image">

                            <img src="{{ asset('frontend/assets/img/nursery.jpeg') }}" alt="Nursery School">

                            <div class="academic-card-number">
                                01
                            </div>

                        </div>

                        <div class="academic-card-content">

                            <span class="academic-card-label">
                                EARLY YEARS
                            </span>

                            <h3>Nursery School</h3>

                            <p>
                                We provide a warm and stimulating environment where
                                young children learn through play, creativity and discovery.
                            </p>

                            {{-- <a href="{{ url('/academics/nursery') }}">
                            READ MORE
                            <i class="ti ti-arrow-right"></i>
                        </a>   --}}

                        </div>

                    </div>

                </div>


                <!-- Primary -->
                <div class="col-lg-4 col-md-6">

                    <div class="academic-card">

                        <div class="academic-card-image">

                            <img src="{{ asset('frontend/assets/img/primary.jpeg') }}" alt="Primary School">

                            <div class="academic-card-number">
                                02
                            </div>

                        </div>

                        <div class="academic-card-content">

                            <span class="academic-card-label">
                                PRIMARY EDUCATION
                            </span>

                            <h3>Primary School</h3>

                            <p>
                                Our primary programme develops strong academic foundations,
                                confidence, discipline and a love for learning.
                            </p>

                            {{-- <a href="{{ url('/academics/primary') }}">
                            READ MORE
                            <i class="ti ti-arrow-right"></i>
                        </a>   --}}

                        </div>

                    </div>

                </div>




            </div>

        </div>

        </div>

    </section>






    <!-- =========================================
             WHY CHOOSE US
        ========================================= -->
    {{-- <section class="why-school-section">

        <div class="container">

            <div class="row align-items-center g-5">

                <!-- Left -->
                <div class="col-lg-5">

                    <div class="why-school-content">

                        <span class="why-school-small-title">
                            WHY CHOOSE US
                        </span>

                        <h2>
                            Building a Strong
                            <span>Foundation for Life</span>
                        </h2>

                        <div class="why-school-line"></div>

                        <p>
                            Edu Green Schools school is committed to providing quality education
                            in a caring, disciplined and stimulating environment.
                        </p>

                        <p>
                            We focus not only on academic achievement, but also on
                            character, confidence, creativity and leadership.
                        </p>

                        <a href="{{ url('/about') }}" class="why-school-button">
                            READ MORE
                        </a>

                    </div>

                </div>


                <!-- Right -->
                <div class="col-lg-7">

                    <div class="row g-3">

                        <div class="col-md-6">

                            <div class="why-school-card">

                                <div class="why-school-icon">
                                    <i class="ti ti-school"></i>
                                </div>

                                <h3>Quality Education</h3>

                                <p>
                                    A strong curriculum designed to help every
                                    student reach their potential.
                                </p>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="why-school-card">

                                <div class="why-school-icon">
                                    <i class="ti ti-users"></i>
                                </div>

                                <h3>Qualified Teachers</h3>

                                <p>
                                    Dedicated and experienced teachers who care
                                    about every child's development.
                                </p>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="why-school-card">

                                <div class="why-school-icon">
                                    <i class="ti ti-heart"></i>
                                </div>

                                <h3>Child Focused</h3>

                                <p>
                                    We create an environment where children feel
                                    supported, valued and encouraged.
                                </p>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="why-school-card">

                                <div class="why-school-icon">
                                    <i class="ti ti-shield-check"></i>
                                </div>

                                <h3>Safe Environment</h3>

                                <p>
                                    A secure and welcoming environment where
                                    students can learn confidently.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section> --}}


    
<section class="why-school-section">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- Left Content -->
            <div class="col-lg-5">

                <div class="why-school-content">

                    <span class="why-school-small-title">
                        WHY CHOOSE US
                    </span>

                    <h2>
                        Building a Strong
                        <span>Foundation for Life</span>
                    </h2>

                    <div class="why-school-line"></div>

                    <p>
                        Edugreen Schools school is committed to providing quality education
                        in a caring, disciplined and stimulating environment.
                    </p>

                    <p>
                        We focus not only on academic achievement, but also on
                        character, confidence, creativity and leadership.
                    </p>

                    {{-- <a href="{{ url('/about') }}" class="why-school-button">
                        READ MORE
                    </a> --}}

                </div>

            </div>


            <!-- Right Cards -->
            <div class="col-lg-7">

                <div class="row g-3">

                    <!-- Quality Education -->
                    <div class="col-md-6">

                        <div class="why-school-card">

                            <div class="why-school-image">
                                <img
                                    src="{{ asset('frontend/assets/img/g11.jpeg') }}"
                                    alt="Quality Education"
                                    loading="lazy"
                                >
                            </div>

                            <h3>Quality Education</h3>

                            <p>
                                A strong curriculum designed to help every
                                student reach their potential.
                            </p>

                        </div>

                    </div>


                    <!-- Qualified Teachers -->
                    <div class="col-md-6">

                        <div class="why-school-card">

                            <div class="why-school-image">
                                <img
                                    src="{{ asset('frontend/assets/img/g22.jpeg') }}"
                                    alt="Qualified Teachers"
                                    loading="lazy"
                                >
                            </div>

                            <h3>Qualified Teachers</h3>

                            <p>
                                Dedicated and experienced teachers who care
                                about every child's development.
                            </p>

                        </div>

                    </div>


                    <!-- Child Focused -->
                    <div class="col-md-6">

                        <div class="why-school-card">

                            <div class="why-school-image">
                                <img
                                    src="{{ asset('frontend/assets/img/g33.jpeg') }}"
                                    alt="Child Focused Learning"
                                    loading="lazy"
                                >
                            </div>

                            <h3>Child Focused</h3>

                            <p>
                                We create an environment where children feel
                                supported, valued and encouraged.
                            </p>

                        </div>

                    </div>


                    <!-- Safe Environment -->
                    <div class="col-md-6">

                        <div class="why-school-card">

                            <div class="why-school-image">
                                <img
                                    src="{{ asset('frontend/assets/img/g44.jpeg') }}"
                                    alt="Safe School Environment"
                                    loading="lazy"
                                >
                            </div>

                            <h3>Safe Environment</h3>

                            <p>
                                A secure and welcoming environment where
                                students can learn confidently.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>




    <!-- =========================================
             PRINCIPAL'S WELCOME
        ========================================= -->
    <section class="principal-welcome-section">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-5">

                    <div class="principal-photo">

                        <img src="{{ asset('frontend/assets/img/proprietress.jpeg') }}" alt="School Proprietress">

                        <div class="principal-photo-caption">
                            <strong>Proprietress</strong>
                            {{-- <span> ...Where Kids are No.1 </span> --}}
                            <span>Leading with vision and purpose</span>
                        </div>

                    </div>

                </div>


                <div class="col-lg-7">

                    <div class="principal-welcome-content">

                        <span>
                            PRINCIPAL'S WELCOME
                        </span>

                        <h2>
                            Welcome to
                            <span>Edugreen Infant & Junior School</span>
                        </h2>

                        <div class="principal-line"></div>

                        <p>
                            It is my pleasure to welcome you to Edu Green Infant and Junior School. We are
                            committed to providing every child with a strong academic
                            foundation and the opportunity to develop their unique talents.
                        </p>

                        <p>
                            Our teachers, parents and school community work together
                            to create an environment where students can learn,
                            discover and grow into responsible and confident individuals.
                        </p>

                        <div class="principal-signature">

                            <strong>
                                [Mrs Christopher Bolanle]
                            </strong>

                            <span>
                                Proprietress / Head of School
                            </span>
<br>
                            <a href="{{ route('user.proprietress') }}">
                      <strong style="color: #d4c21c">  VIEW PROFILE </strong>
                        </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>




    <!-- =========================================
             SCHOOL STATISTICS
        ========================================= -->


    <section class="edugreen-statistics">

        <div class="container">




            <div class="row">


                <!-- STUDENTS -->
                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="edugreen-stat-card">

                        <div class="stat-icon">

                            <i class="ti ti-users"></i>

                        </div>

                        <div class="stat-number">

                            <span class="counter" data-target="500">
                                0
                            </span>

                            <span class="stat-plus">+</span>

                        </div>

                        <h3>Happy Students</h3>

                        <p>
                            Young minds learning, growing and achieving.
                        </p>

                    </div>

                </div>


                <!-- TEACHERS -->
                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="edugreen-stat-card">

                        <div class="stat-icon">

                            <i class="ti ti-chalkboard"></i>

                        </div>

                        <div class="stat-number">

                            <span class="counter" data-target="15">
                                0
                            </span>

                            <span class="stat-plus">+</span>

                        </div>

                        <h3>Expert Teachers</h3>

                        <p>
                            Dedicated educators inspiring excellence.
                        </p>

                    </div>

                </div>


                <!-- ACHIEVEMENTS -->
                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="edugreen-stat-card">

                        <div class="stat-icon">

                            <i class="ti ti-trophy"></i>

                        </div>

                        <div class="stat-number">

                            <span class="counter" data-target="100">
                                0
                            </span>

                            <span class="stat-plus">+</span>

                        </div>

                        <h3>Achievements</h3>

                        <p>
                            Milestones that make our community proud.
                        </p>

                    </div>

                </div>


                <!-- YEARS -->
                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="edugreen-stat-card">

                        <div class="stat-icon">

                            <i class="ti ti-school"></i>

                        </div>

                        <div class="stat-number">

                            <span class="counter" data-target="5">
                                0
                            </span>

                            <span class="stat-plus">+</span>

                        </div>

                        <h3>Years of Excellence</h3>

                        <p>
                            Building a strong foundation for the future.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ========================= EDU GREEN MARQUEE ========================= --}}
    <section class="edu-marquee-section">
        <div class="edu-marquee-wrapper">
            <div class="edu-marquee-track">
                {{-- FIRST SET --}}
                <div class="edu-marquee-item"> <i class="ti ti-school"></i> <span>Welcome to Edu Green Infant & Primary
                        School</span>
                </div>
                <div class="edu-marquee-dot"></div>
                <div class="edu-marquee-item"> <i class="ti ti-book-2"></i> <span>Building Bright Minds for a Brighter
                        Future</span> </div>
                <div class="edu-marquee-dot"></div>
                <div class="edu-marquee-item"> <i class="ti ti-heart-handshake"></i> <span>Learning • Character •
                        Excellence</span> </div>
                <div class="edu-marquee-dot"></div>
                <div class="edu-marquee-item"> <i class="ti ti-bulb"></i> <span>Inspiring Children to Learn, Grow and
                        Succeed</span> </div>
                <div class="edu-marquee-dot"></div> {{-- SECOND SET - DUPLICATE FOR SEAMLESS LOOP --}} <div class="edu-marquee-item"> <i
                        class="ti ti-school"></i> <span>Welcome to Edu Green Infant & Primary School</span> </div>
                <div class="edu-marquee-dot"></div>
                <div class="edu-marquee-item"> <i class="ti ti-book-2"></i> <span>Building Bright Minds for a Brighter
                        Future</span> </div>
                <div class="edu-marquee-dot"></div>
                <div class="edu-marquee-item"> <i class="ti ti-heart-handshake"></i> <span>Learning • Character •
                        Excellence</span> </div>
                <div class="edu-marquee-dot"></div>
                <div class="edu-marquee-item"> <i class="ti ti-bulb"></i> <span>Inspiring Children to Learn, Grow and
                        Succeed</span> </div>
                <div class="edu-marquee-dot"></div>
            </div>
        </div>
    </section>

    <!-- ==========================
          Counters & Call To Action
         ============================ -->

    <!-- =========================================
             SCHOOL FACILITIES
        ========================================= -->
    <section class="school-facilities-section">

        <div class="container">

            <div class="facilities-heading">

                <span>
                    OUR FACILITIES
                </span>

                <h2>
                    Everything Students Need
                    <span>to Learn & Grow</span>
                </h2>

                <div class="facilities-line"></div>

            </div>


            <div class="row g-4">

                <!-- Library -->
                <div class="col-lg-4 col-md-6">

                    <div class="facility-item">

                        <div class="facility-image">

                            <img src="https://images.openai.com/static-rsc-4/XEkbLR6eJxvS9LiDRuiqtrLC7R9ejgDYCNhH_BkICNH6jRww8TFYJXr0W7hqDWWKMNE0qcPTPVS_g9p7oFmGP0hkIFdhBSeB_M5CbYxksPWcbIdkyz1AKRvlGBjpiXdEzmBGhMGc6HT1lgMNUEFaLw2qdjRFFd05sfHtiRPude4?purpose=inline"
                                alt="School Library">

                        </div>

                        <div class="facility-content">

                            <i class="ti ti-books"></i>

                            <h3>School Library</h3>

                            <p>
                                A welcoming environment where students can read,
                                research and develop a love for books.
                            </p>

                        </div>

                    </div>

                </div>


                <!-- Computer Lab -->
                <div class="col-lg-4 col-md-6">

                    <div class="facility-item">

                        <div class="facility-image">

                            <img src="https://www.readinggirlsschool.co.uk/_site/data/files/images/D945FA396512C16D477078A2756C1CB3.jpg"
                                alt="Computer Laboratory">

                        </div>

                        <div class="facility-content">

                            <i class="ti ti-device-laptop"></i>

                            <h3>Computer Laboratory</h3>

                            <p>
                                Helping students develop digital skills and
                                confidently engage with technology.
                            </p>

                        </div>

                    </div>

                </div>


                <!-- Science Lab -->
                <div class="col-lg-4 col-md-6">

                    <div class="facility-item">

                        <div class="facility-image">

                            <img src="https://parenting.etonhouse.edu.sg/hubfs/Copy%20of%20IMG_9390-3.jpg"
                                alt="Science Laboratory">

                        </div>

                        <div class="facility-content">

                            <i class="ti ti-microscope"></i>

                            <h3>Science Laboratory</h3>

                            <p>
                                Encouraging practical learning, experimentation
                                and scientific discovery.
                            </p>

                        </div>

                    </div>

                </div>


                <!-- Sports -->
                <div class="col-lg-4 col-md-6">

                    <div class="facility-item">

                        <div class="facility-image">

                            <img src="https://assets-global.website-files.com/6374a86e6d81a837a7564a87/6374a86e6d81a859a3564f57__SJP1469.jpg"
                                alt="Sports Facilities">

                        </div>

                        <div class="facility-content">

                            <i class="ti ti-ball-football"></i>

                            <h3>Sports Facilities</h3>

                            <p>
                                Promoting teamwork, discipline, fitness and
                                healthy competition.
                            </p>

                        </div>

                    </div>

                </div>


                <!-- Classrooms -->
                <div class="col-lg-4 col-md-6">

                    <div class="facility-item">

                        <div class="facility-image">

                            <img src="https://www.putai.org/TC2/upload/Admin/images/17.jpg" alt="Modern Classroom">

                        </div>

                        <div class="facility-content">

                            <i class="ti ti-chalkboard"></i>

                            <h3>Modern Classrooms</h3>

                            <p>
                                Comfortable and engaging spaces designed to
                                support effective learning.
                            </p>

                        </div>

                    </div>

                </div>


                <!-- Playground -->
                <div class="col-lg-4 col-md-6">

                    <div class="facility-item">

                        <div class="facility-image">

                            <img src="https://hormisdallenschools.com/images/play-time.jpg" alt="School Playground">

                        </div>

                        <div class="facility-content">

                            <i class="ti ti-run"></i>

                            <h3>Playground</h3>

                            <p>
                                Safe recreational spaces where children can
                                play, exercise and socialize.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================
             ADMISSION PROCESS
        ========================================= -->
    <section class="school-admission-section">

        <div class="container">

            <div class="admission-heading">

                <span>
                    ADMISSIONS
                </span>

                <h2>
                    Start Your Child's
                    <span>Journey With Us</span>
                </h2>

                <div class="admission-line"></div>

                <p>
                    Joining our school is simple. Follow these steps to begin
                    your child's educational journey with us.
                </p>

            </div>


            <div class="row g-4">

                <!-- 01 -->
                <div class="col-lg-3 col-md-6">

                    <div class="admission-card">

                        <div class="admission-number">
                            01
                        </div>

                        <i class="ti ti-file-description"></i>

                        <h3>Apply</h3>

                        <p>
                            Complete and submit the admission application form.
                        </p>

                    </div>

                </div>


                <!-- 02 -->
                <div class="col-lg-3 col-md-6">

                    <div class="admission-card">

                        <div class="admission-number">
                            02
                        </div>

                        <i class="ti ti-clipboard-check"></i>

                        <h3>Assessment</h3>

                        <p>
                            Your child participates in the appropriate assessment.
                        </p>

                    </div>

                </div>


                <!-- 03 -->
                <div class="col-lg-3 col-md-6">

                    <div class="admission-card">

                        <div class="admission-number">
                            03
                        </div>

                        <i class="ti ti-users"></i>

                        <h3>Interview</h3>

                        <p>
                            Parents and students may meet with our academic team.
                        </p>

                    </div>

                </div>


                <!-- 04 -->
                <div class="col-lg-3 col-md-6">

                    <div class="admission-card">

                        <div class="admission-number">
                            04
                        </div>

                        <i class="ti ti-school"></i>

                        <h3>Enrollment</h3>

                        <p>
                            Successful applicants complete the enrollment process.
                        </p>

                    </div>

                </div>

            </div>


            <div class="admission-action">

                <a href="{{ url('/application') }}">
                    APPLY FOR ADMISSION
                    <i class="ti ti-arrow-right"></i>
                </a>

            </div>

        </div>

    </section>



    <!-- =========================================
             STUDENT LIFE
        ========================================= -->
    <section class="student-life-section">

        <div class="container">

            <div class="student-life-heading">

                <span>
                    SCHOOL LIFE
                </span>

                <h2>
                    Learning Beyond
                    <span>the Classroom</span>
                </h2>

                <div class="student-life-line"></div>

                <p>
                    We encourage students to discover their talents, develop
                    confidence and build meaningful relationships through activities
                    beyond their regular classroom lessons.
                </p>

            </div>


            <div class="row g-4">

                <div class="col-lg-3 col-md-6">

                    <div class="student-card">

                        <div class="student-icon">
                            <i class="ti ti-ball-football"></i>
                        </div>

                        <h3>Sports</h3>

                        <p>
                            Developing teamwork, discipline, fitness and confidence.
                        </p>

                    </div>

                </div>


                <div class="col-lg-3 col-md-6">

                    <div class="student-card">

                        <div class="student-icon">
                            <i class="ti ti-music"></i>
                        </div>

                        <h3>Music & Arts</h3>

                        <p>
                            Helping students express themselves through creativity.
                        </p>

                    </div>

                </div>


                <div class="col-lg-3 col-md-6">

                    <div class="student-card">

                        <div class="student-icon">
                            <i class="ti ti-microphone"></i>
                        </div>

                        <h3>Clubs & Debate</h3>

                        <p>
                            Building communication, leadership and critical thinking.
                        </p>

                    </div>

                </div>


                <div class="col-lg-3 col-md-6">

                    <div class="student-card">

                        <div class="student-icon">
                            <i class="ti ti-bus"></i>
                        </div>

                        <h3>Excursions</h3>

                        <p>
                            Giving students opportunities to learn through experience.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ======================
          Teachers
         ======================== -->

    <section class="teachers-section">

        <div class="container">

            <div class="text-center teachers-heading">

                <span class="school-section-label">
                    <i class="ti ti-users"></i>
                    OUR TEACHERS
                </span>

                <h2 class="school-section-title">
                    Meet Our
                    <span>Dedicated Teachers</span>
                </h2>

                <div class="section-line mx-auto"></div>

                <p>
                    Our teachers are passionate educators committed to helping
                    every student learn, grow and achieve their full potential.
                </p>

            </div>


            <div class="row g-4 mt-4">

                @foreach ($teachers as $teacher)
                    <div class="col-lg-3 col-md-6">

                        <div class="teacher-card">

                            <div class="teacher-image">

                                <a href="{{ route('user.teacher.details', $teacher->id) }}"> <img
                                        src="{{ asset('frontend/assets/teacher/' . $teacher->image) }}" alt="{{ $teacher->name }}"></a>

                            </div>

                            <div class="teacher-content">
                                <a href="{{ route('user.teacher.details', $teacher->id) }}">
                                    <h3>
                                        {{ $teacher->name }}
                                    </h3>
                                </a>

                                <span>
                                    {{ $teacher->academic_level }}
                                </span>

                                <div class="teacher-socials">

                                    <a href="{{ $teacher->facebook ?? '#' }}">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>

                                    <a href="{{ $teacher->linkedin ?? '#' }}">
                                        <i class="ti ti-brand-linkedin"></i>
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>



    <!--==================
          Latest News
         ===================-->






    <section class="school-news-section">

        <div class="container">

            <div class="news-section-top">

                <div>

                    <span class="school-section-label">
                        <i class="ti ti-news"></i>
                        SCHOOL NEWS
                    </span>

                    <h2 class="school-section-title">
                        Latest From
                        <span>Our School</span>
                    </h2>

                    <div class="section-line"></div>

                </div>

                <a href="{{ url('/blogs') }}" class="view-news-btn">
                    VIEW ALL NEWS
                    <i class="ti ti-arrow-right"></i>
                </a>

            </div>

         
            <div class="row g-4">

                {{-- NEWS 1 --}}
                @foreach ($news as $item)
                    <div class="col-lg-4 col-md-6">

                        <article class="school-news-card">

                            <div class="news-image">

                                <img src="{{ asset('frontend/assets/about/' . $item->image) }}" alt="{{ $item->title }}">

                                <span class="news-category">
                                    {{ $item->category }}
                                </span>

                            </div>

                            <div class="news-card-content">

                                <div class="news-date">
                                    <i class="ti ti-calendar"></i>
                                    {{ $item->created_at->format('F d, Y') }}
                                </div>

                                <h3>
                                    {{ $item->title }}
                                </h3>

                                <p>
                                    {{ Str::limit(strip_tags($item->description), 150) }}
                                </p>

                                <a href="{{ route('user.blog.details', $item->id) }}" class="news-read-more">
                                    READ MORE
                                    <i class="ti ti-arrow-right"></i>
                                </a>
                            </div>

                        </article>

                    </div>
                @endforeach

            </div>

        </div>


    </section>

    <!-- ends: .blog -->
@endsection
