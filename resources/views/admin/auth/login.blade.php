<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | {{ config('app.name') }}</title>

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

        .admin-login-wrapper {
            width: 100%;
            max-width: 1050px;
            background: #fff;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(38, 55, 70, 0.12);
        }

        .admin-login-info {
            background: #263746;
            color: #fff;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .admin-login-info::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(109, 204, 44, 0.08);
            right: -120px;
            bottom: -120px;
        }

        .school-logo {
            width: 80px;
            height: 80px;
            background: #fff;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }

        .school-logo img {
            max-width: 65px;
            max-height: 65px;
        }

        .admin-login-info h1 {
            font-family: "Roboto Slab", Georgia, serif;
            font-size: 38px;
            line-height: 1.25;
            margin-bottom: 18px;
        }

        .admin-login-info h1 span {
            color: #6dcc2c;
        }

        .admin-login-info p {
            color: #cbd5da;
            line-height: 1.8;
            font-size: 15px;
            max-width: 420px;
        }

        .admin-login-form {
            padding: 60px;
        }

        .admin-login-form h2 {
            font-family: "Roboto Slab", Georgia, serif;
            color: #263746;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .admin-login-form .subtitle {
            color: #68757e;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
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
            height: 52px;
            border: 1px solid #e1e7df;
            border-radius: 8px;
            padding: 0 15px 0 45px;
            outline: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .input-wrapper input:focus {
            border-color: #6dcc2c;
            box-shadow: 0 0 0 3px rgba(109, 204, 44, 0.10);
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 25px;
            color: #68757e;
            font-size: 13px;
        }

        .login-btn {
            width: 100%;
            height: 52px;
            border: 0;
            border-radius: 8px;
            background: #6dcc2c;
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #59b91b;
            transform: translateY(-1px);
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

        @media (max-width: 767px) {

            .admin-login-wrapper {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .admin-login-info {
                padding: 35px 30px;
            }

            .admin-login-info h1 {
                font-size: 28px;
            }

            .admin-login-form {
                padding: 35px 30px;
            }
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
    </style>
</head>

<body>

<div class="admin-login-wrapper">

    <div class="admin-login-info">

        <div class="school-logo">
            <img src="{{ asset('frontend/assets/img/logo.jpeg') }}"
                 alt="School Logo">
        </div>

        <h1>
            Welcome to
            <span>Admin Portal</span>
        </h1>

        <p>
            Manage your school's students, teachers, admissions,
            events, news and academic activities from one secure dashboard.
        </p>

    </div>


    <div class="admin-login-form">

        <h2>Admin Login</h2>

        <p class="subtitle">
            Sign in to access your school management dashboard.
        </p>

        @if ($errors->any())
            <div class="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">

            @csrf

            <div class="form-group">

                <label>Email Address</label>

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


            <div class="form-group">

                <label>Password</label>

                <div class="input-wrapper">
                    <i class="ti ti-lock"></i>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >
                </div>

            </div>


            <label class="remember">
                <input type="checkbox" name="remember">
                Remember me
            </label>


            <button type="submit" class="login-btn">
                <i class="ti ti-login"></i>
                Sign In
            </button>

        </form>
  <div class="login-link">

            Don't have an account?

            <a href="{{ route('admin.register') }}">
                Create an account
            </a>

        </div>
    </div>

</div>

</body>
</html>