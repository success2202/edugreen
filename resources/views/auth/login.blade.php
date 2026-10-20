
@extends('layouts.app')

@section('title', 'Login')

@section('styles')
<style>
.auth-page {
    min-height: 75vh;
    padding: 45px 15px;
    background: #f1f5f9;
    display: flex;
    align-items: center;
}
.auth-card {
    max-width: 950px;
    width: 100%;
    margin: auto;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 12px 35px rgba(15,23,42,.10);
}
.auth-intro {
    height: 100%;
    padding: 40px 30px;
    color: #fff;
    background: linear-gradient(145deg,#064e3b,#047857);
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.auth-intro h2 { color: #fff; font-weight: 700; }
.auth-intro p { line-height: 1.8; color: #ecfdf5; }
.auth-form { padding: 40px 35px; }
.auth-form h3 { font-weight: 700; color: #0f172a; }
.auth-muted { color: #64748b; margin-bottom: 25px; }
.auth-form label { display: block; font-weight: 600; margin-bottom: 7px; }
.auth-form .form-control {
    width: 100%;
    height: 47px;
    border: 1px solid #cbd5e1;
    border-radius: 7px;
    box-shadow: none;
    padding: 10px 13px;
}
.auth-form .form-control:focus {
    border-color: #059669;
    box-shadow: 0 0 0 3px rgba(5,150,105,.12);
}
.auth-field { margin-bottom: 20px; }
.auth-submit {
    width: 100%;
    border: 0;
    border-radius: 7px;
    padding: 13px;
    color: #fff;
    background: #047857;
    font-weight: 700;
}
.auth-submit:hover { background: #065f46; }
.auth-footer { text-align: center; margin-top: 22px; color: #64748b; }
.auth-footer a { color: #047857; font-weight: 700; }
@media(max-width:767px) {
    .auth-page { padding: 25px 12px; }
    .auth-intro { padding: 28px 24px; }
    .auth-form { padding: 28px 22px; }
}
</style>
@endsection

@section('content')
<div class="auth-page">
    <div class="auth-card">
        <div class="row no-gutters">
            <div class="col-md-5">
                <div class="auth-intro">
                    <i class="fa fa-graduation-cap fa-3x mb-4"></i>
                    <h2>Welcome Back!</h2>
                    <p>Sign in to your account to continue exploring Edu-Green Schools.</p>
                    <p><i class="fa fa-check-circle"></i> Access your account securely</p>
                    <p><i class="fa fa-check-circle"></i> Stay connected with our school</p>
                </div>
            </div>

            <div class="col-md-7">
                <div class="auth-form">
                    <h3>Login to Your Account</h3>
                    <p class="auth-muted">Enter your email address and password.</p>

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf

                        <div class="auth-field">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email"
                                   class="form-control" value="{{ old('email') }}"
                                   placeholder="you@example.com"
                                   autocomplete="email" required>
                        </div>

                        <div class="auth-field">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"
                                   class="form-control" placeholder="Enter your password"
                                   autocomplete="current-password" required>
                        </div>

                        <div class="auth-field">
                            <label style="font-weight:400;">
                                <input type="checkbox" name="remember" value="1">
                                Remember me
                            </label>
                        </div>

                        <button type="submit" class="auth-submit">
                            <i class="fa fa-sign-in"></i> Login
                        </button>
                    </form>

                    <div class="auth-footer">
                        Don't have an account?
                        <a href="{{ route('register') }}">Register here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
