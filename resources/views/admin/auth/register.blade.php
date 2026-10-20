<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Registration | {{ config('app.name') }}</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f8f1;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 20px;
        }

        .admin-register-wrapper {
            width: 100%;
            max-width: 1050px;

            background: #ffffff;

            display: grid;
            grid-template-columns: 1fr 1fr;

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 20px 60px rgba(38, 55, 70, 0.12);
        }

        /* LEFT SIDE */

        .admin-register-info {
            background: #263746;
            color: #ffffff;

            padding: 60px;

            display: flex;
            flex-direction: column;
            justify-content: center;

            position: relative;
            overflow: hidden;
        }

        .admin-register-info::before {
            content: "";

            position: absolute;

            width: 350px;
            height: 350px;

            border-radius: 50%;

            background: rgba(109, 204, 44, 0.08);

            top: -150px;
            right: -150px;
        }

        .admin-register-info::after {
            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            border-radius: 50%;

            background: rgba(109, 204, 44, 0.06);

            bottom: -120px;
            left: -100px;
        }

        .school-logo {
            width: 80px;
            height: 80px;

            background: #ffffff;

            border-radius: 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 30px;

            position: relative;
            z-index: 2;
        }

        .school-logo img {
            max-width: 65px;
            max-height: 65px;
        }

        .admin-register-info h1 {
            font-family: "Roboto Slab", Georgia, serif;

            font-size: 38px;
            line-height: 1.25;

            margin-bottom: 18px;

            position: relative;
            z-index: 2;
        }

        .admin-register-info h1 span {
            color: #6dcc2c;
        }

        .admin-register-info p {
            color: #cbd5da;

            line-height: 1.8;

            font-size: 15px;

            max-width: 420px;

            position: relative;
            z-index: 2;
        }


        /* FORM */

        .admin-register-form {
            padding: 60px;
        }

        .admin-register-form h2 {
            font-family: "Roboto Slab", Georgia, serif;

            color: #263746;

            font-size: 30px;

            margin-bottom: 8px;
        }

        .subtitle {
            color: #68757e;

            font-size: 14px;

            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;

            color: #263746;

            font-size: 14px;

            font-weight: 600;

            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;

            left: 15px;
            top: 50%;

            transform: translateY(-50%);

            color: #6dcc2c;

            font-size: 19px;
        }

        .input-wrapper input {
            width: 100%;

            height: 50px;

            border: 1px solid #e1e7df;

            border-radius: 8px;

            padding: 0 15px 0 45px;

            outline: none;

            font-size: 14px;

            transition: 0.3s;
        }

        .input-wrapper input:focus {
            border-color: #6dcc2c;

            box-shadow:
                0 0 0 3px rgba(109, 204, 44, 0.10);
        }

        .register-btn {
            width: 100%;

            height: 52px;

            border: 0;

            border-radius: 8px;

            background: #6dcc2c;

            color: #ffffff;

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.3s;

            margin-top: 5px;
        }

        .register-btn:hover {
            background: #59b91b;

            transform: translateY(-1px);
        }

        .login-link {
            text-align: center;

            margin-top: 20px;

            color: #68757e;

            font-size: 13px;
        }

        .login-link a {
            color: #6dcc2c;

            font-weight: 700;

            text-decoration: none;
        }

        .login-link a:hover {
            color: #59b91b;
        }

        .alert {
            background: #fff1f1;

            color: #c0392b;

            border: 1px solid #ffd4d4;

            padding: 12px 15px;

            border-radius: 7px;

            font-size: 13px;

            margin-bottom: 20px;
        }

        .alert ul {
            padding-left: 18px;
            margin: 0;
        }


        /* MOBILE */

        @media (max-width: 767px) {

            .admin-register-wrapper {
                grid-template-columns: 1fr;

                max-width: 500px;
            }

            .admin-register-info {
                padding: 35px 30px;
            }

            .admin-register-info h1 {
                font-size: 28px;
            }

            .admin-register-form {
                padding: 35px 30px;
            }

        }

        @media (max-width: 400px) {

            body {
                padding: 12px;
            }

            .admin-register-info {
                padding: 30px 22px;
            }

            .admin-register-form {
                padding: 30px 22px;
            }

            .admin-register-info h1 {
                font-size: 25px;
            }

            .admin-register-form h2 {
                font-size: 25px;
            }

        }

    </style>

</head>

<body>


<div class="admin-register-wrapper">


    <!-- LEFT SIDE -->

    <div class="admin-register-info">

        <div class="school-logo">

            <img src="{{ asset('frontend/assets/img/logo.png') }}"
                 alt="School Logo">

        </div>

        <h1>
            Create Your
            <span>Admin Account</span>
        </h1>

        <p>
            Set up your administrator account to manage your
            school's students, teachers, admissions, events,
            gallery, news and other school activities.
        </p>

    </div>


    <!-- RIGHT SIDE -->

    <div class="admin-register-form">

        <h2>Admin Registration</h2>

        <p class="subtitle">
            Create an account to access the school administration portal.
        </p>


        @if ($errors->any())

            <div class="alert">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form action="{{ route('admin.register.submit') }}"
              method="POST">

            @csrf


            <!-- NAME -->

            <div class="form-group">

                <label>
                    Full Name
                </label>

                <div class="input-wrapper">

                    <i class="ti ti-user"></i>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        required
                    >

                </div>

            </div>


            <!-- EMAIL -->

            <div class="form-group">

                <label>
                    Email Address
                </label>

                <div class="input-wrapper">

                    <i class="ti ti-mail"></i>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                    >

                </div>

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label>
                    Password
                </label>

                <div class="input-wrapper">

                    <i class="ti ti-lock"></i>

                    <input
                        type="password"
                        name="password"
                        placeholder="Create a password"
                        required
                    >

                </div>

            </div>


            <!-- CONFIRM PASSWORD -->

            <div class="form-group">

                <label>
                    Confirm Password
                </label>

                <div class="input-wrapper">

                    <i class="ti ti-lock-check"></i>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        required
                    >

                </div>

            </div>


            <button type="submit" class="register-btn">

                <i class="ti ti-user-plus"></i>

                Create Admin Account

            </button>


        </form>


        <div class="login-link">

            Already have an account?

            <a href="{{ route('admin-login') }}">
                Login here
            </a>

        </div>


    </div>

</div>


</body>

</html>