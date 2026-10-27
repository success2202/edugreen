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



/* ================= SECTION ================= */

.eg-testimonials {
    --eg-green: #187447;
    --eg-dark: #123d2b;
    --eg-light: #f4f8f4;
    --eg-gold: #f5b82e;

    padding: 85px 0;
    background: linear-gradient(180deg, #f5f9f5 0%, #ffffff 100%);
    overflow: hidden;
}

.eg-testimonials .container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
}

.eg-testimonials-heading {
    max-width: 720px;
    margin: 0 auto 45px;
    text-align: center;
}

.eg-section-tag {
    display: inline-block;
    margin-bottom: 14px;
    color: var(--eg-green);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 2px;
}

.eg-testimonials-heading h2 {
    margin: 0 0 16px;
    color: var(--eg-dark);
    font-size: clamp(28px, 4vw, 42px);
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -1px;
}

.eg-testimonials-heading p {
    max-width: 590px;
    margin: 0 auto;
    color: #68756d;
    font-size: 16px;
    line-height: 1.8;
}

/* ================= CAROUSEL ================= */

.eg-testimonial-viewport {
    overflow: hidden;
    touch-action: pan-y;
    cursor: grab;
}

.eg-testimonial-viewport.eg-dragging {
    cursor: grabbing;
    user-select: none;
}

.eg-testimonial-track {
    display: flex;
    gap: 24px;
    align-items: stretch;
    transition: transform 0.55s cubic-bezier(.22, .61, .36, 1);
    will-change: transform;
}

.eg-testimonial-card {
    flex: 0 0 calc((100% - 48px) / 3);
    min-width: 0;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    padding: 30px 26px;
    background: #ffffff;
    border: 1px solid #e7eee8;
    border-radius: 16px;
    box-shadow: 0 8px 28px rgba(20, 65, 40, 0.055);
    transition: box-shadow 0.3s ease, border-color 0.3s ease;
}

.eg-testimonial-card:hover {
    border-color: #c7dfce;
    box-shadow: 0 14px 34px rgba(20, 65, 40, 0.10);
}

.eg-testimonial-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.eg-quote-icon {
    color: var(--eg-green);
    font-family: Georgia, serif;
    font-size: 58px;
    font-weight: bold;
    line-height: 0.8;
}

.eg-stars {
    color: var(--eg-gold);
    font-size: 15px;
    letter-spacing: 2px;
    white-space: nowrap;
}

.eg-testimonial-text {
    flex: 1;
    margin: 0 0 28px;
    color: #58665d;
    font-size: 14px;
    line-height: 1.9;
}

.eg-testimonial-author {
    display: flex;
    align-items: center;
    gap: 13px;
    padding-top: 20px;
    border-top: 1px solid #edf1ed;
}

.eg-author-avatar {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: #dcefe2;
    color: #17663e;
    font-size: 14px;
    font-weight: 800;
}

.eg-avatar-gold {
    background: #fff0ce;
    color: #936a10;
}

.eg-avatar-blue {
    background: #dceafa;
    color: #285b91;
}

.eg-avatar-purple {
    background: #ece2fb;
    color: #7047a0;
}

.eg-avatar-pink {
    background: #fbe2e9;
    color: #a13b5b;
}

.eg-testimonial-author h3 {
    margin: 0 0 5px;
    color: #203d2c;
    font-size: 14px;
    font-weight: 800;
}

.eg-testimonial-author div:nth-child(2) span {
    color: #89948c;
    font-size: 12px;
}

.eg-verified {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 19px;
    height: 19px;
    margin-left: auto;
    border-radius: 50%;
    background: var(--eg-green);
    color: white;
    font-size: 12px;
    font-weight: 800;
}

/* ================= CONTROLS ================= */

.eg-testimonial-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 22px;
    margin-top: 36px;
}

.eg-slider-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    padding: 0;
    border: 1px solid #dce8de;
    border-radius: 50%;
    background: #ffffff;
    color: var(--eg-green);
    font-size: 21px;
    cursor: pointer;
    transition: background 0.25s ease, color 0.25s ease,
                border-color 0.25s ease;
}

.eg-slider-btn:hover:not(:disabled) {
    background: var(--eg-green);
    border-color: var(--eg-green);
    color: #ffffff;
}

.eg-slider-btn:disabled {
    opacity: 0.35;
    cursor: not-allowed;
}

.eg-slider-dots {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.eg-slider-dot {
    width: 9px;
    height: 9px;
    padding: 0;
    border: 0;
    border-radius: 50px;
    background: #cbd8cd;
    cursor: pointer;
    transition: width 0.3s ease, background 0.3s ease;
}

.eg-slider-dot.is-active {
    width: 26px;
    background: var(--eg-green);
}

.eg-slider-status {
    margin-top: 12px;
    color: #7b887e;
    font-size: 12px;
    text-align: center;
}

/* ================= RESPONSIVE ================= */

@media (max-width: 991px) {
    .eg-testimonials {
        padding: 70px 0;
    }

    .eg-testimonial-card {
        flex-basis: calc((100% - 24px) / 2);
    }
}

@media (max-width: 575px) {
    .eg-testimonials {
        padding: 55px 0;
    }

    .eg-testimonials-heading {
        margin-bottom: 32px;
    }

    .eg-testimonials-heading p {
        font-size: 14px;
    }

    .eg-testimonial-track {
        gap: 16px;
    }

    .eg-testimonial-card {
        flex-basis: 100%;
        padding: 25px 22px;
    }

    .eg-testimonial-controls {
        gap: 17px;
        margin-top: 28px;
    }

    .eg-slider-btn {
        width: 40px;
        height: 40px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .eg-testimonial-track,
    .eg-testimonial-card,
    .eg-slider-btn,
    .eg-slider-dot {
        transition: none !important;
    }
}





.edu-services-home {
            padding: 75px 0;
            background: #fafafa;
        }

        .edu-services-home .services-heading {
            text-align: center;
            max-width: 750px;
            margin: 0 auto 45px;
            padding: 0 15px;
        }

        .edu-services-home .services-heading .subtitle {
            display: inline-block;
            color: #278553;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .edu-services-home .services-heading h2 {
            color: #103b2b;
            font-size: 35px;
            font-weight: 800;
            margin: 0 0 15px;
        }

        .edu-services-home .services-heading p {
            color: #627267;
            font-size: 15px;
            line-height: 1.9;
            margin: 0;
        }

        .edu-services-home .services-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 22px;
        }

        .edu-services-home .service-card {
            background: #fff;
            border: 1px solid #e5eee6;
            border-radius: 14px;
            padding: 30px 22px;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: all .3s ease;
        }

        .edu-services-home .service-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 35px rgba(16, 59, 43, .09);
            border-color: #b9d9c2;
        }

        .edu-services-home .service-icon {
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #eaf5ec;
            color: #176b45;
            font-size: 28px;
            margin-bottom: 22px;
        }

        .edu-services-home .service-card h3 {
            color: #176b45;
            font-size: 20px;
            font-weight: 800;
            margin: 0 0 13px;
        }

        .edu-services-home .service-card p {
            color: #657368;
            font-size: 13px;
            line-height: 1.9;
            margin-bottom: 22px;
            text-align: left;
            flex-grow: 1;
        }

        .edu-services-home .service-link {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: #176b45;
            font-size: 13px;
            font-weight: 800;
            text-decoration: none;
        }

        .edu-services-home .service-link:hover {
            color: #103b2b;
        }

        .edu-services-home .services-bottom {
            text-align: center;
            margin-top: 38px;
        }

        .edu-services-home .services-btn {
            display: inline-block;
            padding: 14px 28px;
            background: #176b45;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: background .2s ease;
        }

        .edu-services-home .services-btn:hover {
            background: #103b2b;
            color: #fff;
        }

        @media (max-width: 991px) {
            .edu-services-home .services-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 575px) {
            .edu-services-home {
                padding: 50px 0;
            }

            .edu-services-home .services-heading h2 {
                font-size: 28px;
            }

            .edu-services-home .services-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .edu-services-home .service-card {
                padding: 25px 22px;
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
                        <span>Edugreen Infant & Junior School</span>
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

                        {{-- <div class="about-image-badge">
                            <strong>Quality</strong>
                            <span>Education</span>
                        </div> --}}

                    </div>
                </div>

            </div>
        </div>
    </section>




{{-- ================= OUR SERVICES SECTION ================= --}}
<section class="edu-services-home">

    <div class="container">

        <div class="services-heading">
            <span class="subtitle">What We Offer</span>

            <h2>Our Educational Services</h2>

            <p>
                From nurturing early beginnings to building strong
                academic foundations, Edugreen Schools provides a
                supportive learning environment where every child
                is encouraged to learn, grow, and excel.
            </p>
        </div>

        <div class="services-grid">

            {{-- Creche --}}
            <div class="service-card">
                <div class="service-icon">
                    <i class="fa fa-heart"></i>
                </div>

                <h3>Creche</h3>

                <p>
                    A caring, motherly environment for babies from
                    around six months of age, including younger babies
                    where individually agreed and appropriate, while
                    their parents are away. Our stated weekday hours
                    are 7:00 AM to 5:30 PM.
                </p>

                {{-- <a href="{{ route('user.services') }}#creche"
                   class="service-link">
                    Learn More <i class="fa fa-arrow-right"></i>
                </a> --}}
            </div>

            {{-- Preschool --}}
            <div class="service-card">
                <div class="service-icon">
                    <i class="fa fa-child"></i>
                </div>

                <h3>Preschool</h3>

                <p>
                    Premium care for toddlers aged one to two years,
                    with sensory activities that encourage curiosity,
                    exploration, and readiness for formal schooling.
                </p>

                {{-- <a href="{{ route('user.services') }}#preschool"
                   class="service-link">
                    Learn More <i class="fa fa-arrow-right"></i>
                </a> --}}
            </div>

            {{-- Kindergarten --}}
            <div class="service-card">
                <div class="service-icon">
                    <i class="fa fa-book"></i>
                </div>

                <h3>Kindergarten</h3>

                <p>
                    A learning journey from Kindergarten 1 to 3 for
                    children aged three to five, introducing basic
                    mathematics, reading, cursive writing, and other
                    important early-learning concepts.
                </p>

                {{-- <a href="{{ route('user.services') }}#kindergarten"
                   class="service-link">
                    Learn More <i class="fa fa-arrow-right"></i>
                </a> --}}
            </div>

            {{-- Grade School --}}
            <div class="service-card">
                <div class="service-icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>

                <h3>Grade School</h3>

                <p>
                    A strong academic foundation for pupils aged
                    six to ten, covering Grade 1 through Grade 5
                    and supporting their continuing educational growth.
                </p>

                {{-- <a href="{{ route('user.services') }}#grade-school"
                   class="service-link">
                    Learn More <i class="fa fa-arrow-right"></i>
                </a> --}}
            </div>

        </div>

        <div class="services-bottom">
            <a href="{{ route('user.services') }}" class="services-btn">
                Explore All Our Services
                <i class="fa fa-arrow-right"></i>
            </a>
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
                        Edugreen Schools is committed to providing quality education
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
                                    src="{{ asset('frontend/assets/img/kid.jpeg') }}"
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
                                    src="{{ asset('frontend/assets/img/teacher.jpeg') }}"
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
                                    src="{{ asset('frontend/assets/img/env.jpeg') }}"
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
                            PROPRIETRESS WELCOME
                        </span>

                        <h2>
                            FOUNDER/
                            <span>PROPRIETRESS NOTE</span>
                        </h2>

                        <div class="principal-line"></div>

                        <p>
                            We believe that a truly excellent and godly education integrates opportunities to explore
                             a variety of interests while developing a strong academic base where learners can feel 
                             loved and respected. It is this combination of passion and purpose that gave birth to 
                             our core values that create children who are curious, motivated, and excited to learn.
                              Excellent teaching distinguishes the Edugreen experience, where scholars in their 
                              disciplines foster the capacity to think critically, communicate persuasively, reason 
                              compassionately, and analyze wisely.
                        </p>

                        <p>
                            Thoughtful partnerships with our stakeholders result in children thoroughly prepared 
                            for what’s ahead with the competence and confidence to fully engage in their higher 
                            education journey and lives beyond. Our research-driven education is timeless, providing 
                            the intellectual and moral foundation for a life of fulfilling contribution
                        </p>

                        <P>An Edugreen education transforms, opening a world of possibilities for each child! 
                            You are welcome to learn more about the magic that is Edugreen Schools.</P>

                        <div class="principal-signature">

                            <strong>
                                [Mrs Christopher Bolanle]
                            </strong>

                            <span>
                                Founder/Proprietress
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
                <div class="edu-marquee-item"> <i class="ti ti-school"></i> <span>Welcome to Edugreen Infant & junior
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

                            <img src="{{ asset('frontend/assets/img/library.jpeg') }}"
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

                            <img src="{{ asset('frontend/assets/img/computerlab.jpeg') }}"
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

                            <img src="{{ asset('frontend/assets/img/lab.jpeg') }}"
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

                            <img src="{{ asset('frontend/assets/img/sport.jpeg') }}"
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

                            <img src="{{ asset('frontend/assets/img/classroom.jpeg') }}" alt="Modern Classroom">

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

                            <img src="{{ asset('frontend/assets/img/playground.jpeg') }}" alt="School Playground">

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
    {{-- <section class="school-admission-section">

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

    </section> --}}



    
<!-- ================= EDU GREEN TESTIMONIALS SECTION ================= -->
<section class="eg-testimonials" id="testimonials">
    <div class="container">

        <div class="eg-testimonials-heading">
            <span class="eg-section-tag">WHAT OUR COMMUNITY SAYS</span>
            <h2>Trusted by Parents, Loved by Students</h2>
            <p>
                Discover what parents and students say about their experience
                at EduGreen Schools.
            </p>
        </div>

        <div class="eg-testimonial-carousel">

            <div class="eg-testimonial-viewport">
                <div class="eg-testimonial-track">

                    <!-- Testimonial 1 -->
                    <article class="eg-testimonial-card">
                        <div class="eg-testimonial-top">
                            <span class="eg-quote-icon">&ldquo;</span>
                            <div class="eg-stars" aria-label="5 out of 5 stars">
                                ★★★★★
                            </div>
                        </div>

                        <p class="eg-testimonial-text">
                            EduGreen Schools has made a remarkable difference
                            in my child's learning. The teachers are patient,
                            supportive, and committed to helping every child
                            reach their potential.
                        </p>

                        <div class="eg-testimonial-author">
                            <div class="eg-author-avatar">AO</div>
                            <div>
                                <h3>Amaka Okafor</h3>
                                <span>Parent</span>
                            </div>
                            <span class="eg-verified" title="School community">
                                ✓
                            </span>
                        </div>
                    </article>

                    <!-- Testimonial 2 -->
                    <article class="eg-testimonial-card">
                        <div class="eg-testimonial-top">
                            <span class="eg-quote-icon">&ldquo;</span>
                            <div class="eg-stars" aria-label="5 out of 5 stars">
                                ★★★★★
                            </div>
                        </div>

                        <p class="eg-testimonial-text">
                            I enjoy learning at EduGreen because lessons are
                            interesting and interactive. My teachers encourage
                            me to ask questions, explore ideas, and believe
                            in myself.
                        </p>

                        <div class="eg-testimonial-author">
                            <div class="eg-author-avatar eg-avatar-gold">CE</div>
                            <div>
                                <h3>Chinedu Eze</h3>
                                <span>Student</span>
                            </div>
                            <span class="eg-verified" title="School community">
                                ✓
                            </span>
                        </div>
                    </article>

                    <!-- Testimonial 3 -->
                    <article class="eg-testimonial-card">
                        <div class="eg-testimonial-top">
                            <span class="eg-quote-icon">&ldquo;</span>
                            <div class="eg-stars" aria-label="5 out of 5 stars">
                                ★★★★★
                            </div>
                        </div>

                        <p class="eg-testimonial-text">
                            What I appreciate most is the communication between
                            the school and parents. I feel informed, involved,
                            and confident that my child's education and
                            well-being matter.
                        </p>

                        <div class="eg-testimonial-author">
                            <div class="eg-author-avatar eg-avatar-blue">GO</div>
                            <div>
                                <h3>Grace Obi</h3>
                                <span>Parent</span>
                            </div>
                            <span class="eg-verified" title="School community">
                                ✓
                            </span>
                        </div>
                    </article>

                    <!-- Testimonial 4 -->
                    <article class="eg-testimonial-card">
                        <div class="eg-testimonial-top">
                            <span class="eg-quote-icon">&ldquo;</span>
                            <div class="eg-stars" aria-label="5 out of 5 stars">
                                ★★★★★
                            </div>
                        </div>

                        <p class="eg-testimonial-text">
                            The school encourages discipline, creativity, and
                            confidence. I have seen positive changes in my
                            child's attitude towards learning and personal
                            development.
                        </p>

                        <div class="eg-testimonial-author">
                            <div class="eg-author-avatar eg-avatar-purple">EO</div>
                            <div>
                                <h3>Emeka Okoro</h3>
                                <span>Parent</span>
                            </div>
                            <span class="eg-verified" title="School community">
                                ✓
                            </span>
                        </div>
                    </article>

                    <!-- Testimonial 5 -->
                    <article class="eg-testimonial-card">
                        <div class="eg-testimonial-top">
                            <span class="eg-quote-icon">&ldquo;</span>
                            <div class="eg-stars" aria-label="5 out of 5 stars">
                                ★★★★★
                            </div>
                        </div>

                        <p class="eg-testimonial-text">
                            EduGreen has helped me become more confident in
                            class and more willing to try new things. I am
                            grateful for the encouragement and support I
                            receive from my teachers.
                        </p>

                        <div class="eg-testimonial-author">
                            <div class="eg-author-avatar eg-avatar-pink">TA</div>
                            <div>
                                <h3>Temi Adewale</h3>
                                <span>Student</span>
                            </div>
                            <span class="eg-verified" title="School community">
                                ✓
                            </span>
                        </div>
                    </article>

                </div>
            </div>

            <!-- Carousel controls -->
            <div class="eg-testimonial-controls">
                <button type="button"
                        class="eg-slider-btn eg-prev"
                        aria-label="Previous testimonials">
                    &#8592;
                </button>

                <div class="eg-slider-dots"
                     aria-label="Choose testimonial slide"></div>

                <button type="button"
                        class="eg-slider-btn eg-next"
                        aria-label="Next testimonials">
                    &#8594;
                </button>
            </div>

            <div class="eg-slider-status" aria-live="polite"></div>

        </div>
    </div>
</section>




<!-- ================= END EDU GREEN TESTIMONIALS ================= -->




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

                                <img src="{{ asset('frontend/assets/blog/' . $item->image) }}" alt="{{ $item->title }}">

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

@section('scripts')
<script>
(function () {
    function initEduGreenTestimonials() {
        const sections = document.querySelectorAll(
            '.eg-testimonials:not([data-eg-initialized])'
        );

        sections.forEach(function (section) {
            section.dataset.egInitialized = 'true';

            const viewport = section.querySelector(
                '.eg-testimonial-viewport'
            );
            const track = section.querySelector('.eg-testimonial-track');
            const cards = Array.from(
                section.querySelectorAll('.eg-testimonial-card')
            );
            const prev = section.querySelector('.eg-prev');
            const next = section.querySelector('.eg-next');
            const dotsContainer = section.querySelector('.eg-slider-dots');
            const status = section.querySelector('.eg-slider-status');

            if (!viewport || !track || cards.length === 0) return;

            let index = 0;
            let visible = 3;
            let maxIndex = 0;
            let startX = 0;
            let startY = 0;
            let dragging = false;

            function getVisibleCount() {
                if (window.innerWidth <= 575) return 1;
                if (window.innerWidth <= 991) return 2;
                return 3;
            }

            function buildDots() {
                dotsContainer.innerHTML = '';

                for (let i = 0; i <= maxIndex; i++) {
                    const dot = document.createElement('button');

                    dot.type = 'button';
                    dot.className = 'eg-slider-dot';
                    dot.setAttribute('aria-label', 'Go to testimonial slide ' + (i + 1));

                    dot.addEventListener('click', function () {
                        index = i;
                        updateSlider();
                    });

                    dotsContainer.appendChild(dot);
                }
            }

            function updateSlider() {
                visible = getVisibleCount();
                maxIndex = Math.max(0, cards.length - visible);
                index = Math.min(Math.max(index, 0), maxIndex);

                const cardWidth = cards[0].getBoundingClientRect().width;
                const gap = parseFloat(getComputedStyle(track).gap) || 0;
                const offset = index * (cardWidth + gap);

                track.style.transform = 'translateX(-' + offset + 'px)';

                const dots = dotsContainer.querySelectorAll('.eg-slider-dot');

                dots.forEach(function (dot, i) {
                    dot.classList.toggle('is-active', i === index);

                    if (i === index) {
                        dot.setAttribute('aria-current', 'true');
                    } else {
                        dot.removeAttribute('aria-current');
                    }
                });

                prev.disabled = index === 0;
                next.disabled = index === maxIndex;

                status.textContent =
                    'Showing ' + (index + 1) + '–' +
                    Math.min(index + visible, cards.length) +
                    ' of ' + cards.length + ' testimonials';
            }

            function goTo(newIndex) {
                index = Math.min(Math.max(newIndex, 0), maxIndex);
                updateSlider();
            }

            prev.addEventListener('click', function () {
                goTo(index - 1);
            });

            next.addEventListener('click', function () {
                goTo(index + 1);
            });

            // Support touch swipes and mouse dragging.
            viewport.addEventListener('pointerdown', function (event) {
                if (event.pointerType === 'mouse' && event.button !== 0) return;

                startX = event.clientX;
                startY = event.clientY;
                dragging = true;
            });

            viewport.addEventListener('pointerup', function (event) {
                if (!dragging) return;
                dragging = false;

                const deltaX = event.clientX - startX;
                const deltaY = event.clientY - startY;

                // Ignore vertical scrolling gestures.
                if (Math.abs(deltaX) < 45 ||
                    Math.abs(deltaX) < Math.abs(deltaY)) {
                    return;
                }

                goTo(index + (deltaX < 0 ? 1 : -1));
            });

            viewport.addEventListener('pointercancel', function () {
                dragging = false;
            });

            buildDots();
            updateSlider();

            window.addEventListener('resize', function () {
                const oldVisible = visible;
                visible = getVisibleCount();

                if (visible !== oldVisible) {
                    buildDots();
                }

                updateSlider();
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            initEduGreenTestimonials
        );
    } else {
        initEduGreenTestimonials();
    }
})();
</script>
    
@endsection