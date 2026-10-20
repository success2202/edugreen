
@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')

<style>
    .student-login-section {
        min-height: 80vh;
        padding: 60px 15px;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #f0f9f2, #ffffff, #e8f5e9);
    }

    .student-login-card {
        max-width: 460px;
        width: 100%;
        margin: auto;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 15px 45px rgba(20, 83, 45, 0.12);
        border: 1px solid #e5eee7;
    }

    .student-login-header {
        background: linear-gradient(135deg, #146c43, #198754);
        padding: 35px 25px;
        text-align: center;
        color: #fff;
    }

    .student-login-logo {
        width: 75px;
        height: 75px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.16);
        border: 2px solid rgba(255, 255, 255, 0.45);
    }

    .student-login-logo i {
        font-size: 35px;
    }

    .student-login-header h3 {
        font-size: 25px;
        font-weight: 700;
        margin: 0 0 8px;
    }

    .student-login-header p {
        margin: 0;
        font-size: 14px;
        opacity: 0.9;
        color: #f1f1f1;
    }

    .student-login-body {
        padding: 32px;
    }

    .student-login-welcome {
        text-align: center;
        margin-bottom: 28px;
    }

    .student-login-welcome h4 {
        color: #183b2b;
        font-size: 21px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .student-login-welcome p {
        color: #777;
        font-size: 14px;
        margin: 0;
    }

    .student-login-body .form-group {
        margin-bottom: 20px;
    }

    .student-login-body label {
        display: block;
        color: #26382d;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .student-input-group {
        position: relative;
    }

    .student-input-group .input-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #198754;
        z-index: 2;
    }

    .student-login-body .form-control {
        height: 49px;
        border: 1px solid #dce7df;
        border-radius: 9px;
        padding: 10px 42px;
        font-size: 14px;
        box-shadow: none;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .student-login-body .form-control:focus {
        border-color: #198754;
        box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.1);
    }

    .student-password-toggle {
        position: absolute;
        top: 50%;
        right: 13px;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #6c757d;
        cursor: pointer;
        padding: 5px;
        z-index: 3;
    }

    .student-password-toggle:hover {
        color: #198754;
    }

    .student-login-button {
        width: 100%;
        height: 50px;
        border: none;
        border-radius: 9px;
        background: #198754;
        color: #fff;
        font-size: 15px;
        font-weight: 700;
        transition: all 0.25s ease;
        margin-top: 5px;
    }

    .student-login-button:hover {
        background: #146c43;
        box-shadow: 0 7px 18px rgba(25, 135, 84, 0.2);
        transform: translateY(-1px);
    }

    .student-login-footer {
        text-align: center;
        padding: 17px 20px;
        background: #f8fbf8;
        border-top: 1px solid #edf2ee;
        color: #777;
        font-size: 12px;
    }

    .student-login-footer i {
        color: #198754;
        margin-right: 5px;
    }

    .student-login-body .alert {
        border-radius: 8px;
        font-size: 13px;
    }

    @media (max-width: 576px) {
        .student-login-section {
            min-height: auto;
            padding: 35px 15px;
        }

        .student-login-header {
            padding: 28px 20px;
        }

        .student-login-body {
            padding: 25px 20px;
        }

        .student-login-header h3 {
            font-size: 22px;
        }
    }
</style>



<div class="student-login-section">
    <div class="student-login-card">
        <div class="student-login-header">
            <div class="student-login-logo">
                <i class="fa fa-unlock-alt"></i>
            </div>
            <h3 style="color: #e8f5e9">Reset Your Password</h3>
            <p>Edu Green School Student Portal</p>
        </div>

        <div class="student-login-body">
            <div class="student-login-welcome">
                <h4>Forgot Password?</h4>
                <p>Enter your admission number and registered email.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('student.password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="admission_number">Admission Number</label>
                    <input
                        type="text"
                        name="admission_number"
                        id="admission_number"
                        class="form-control"
                        value="{{ old('admission_number') }}"
                        placeholder="Enter your admission number"
                        required>
                </div>

                <div class="form-group">
                    <label for="email">Registered Email Address</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="Enter registered email"
                        required>
                </div>

                <button type="submit" class="student-login-button">
                    <i class="fa fa-envelope"></i> Send Reset Link
                </button>
            </form>

            <div class="text-center" style="margin-top: 20px;">
                <a href="{{ route('student.login') }}" style="color: #198754;">
                    <i class="fa fa-arrow-left"></i> Back to Login
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
