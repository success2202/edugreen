
@extends('layouts.app')

@section('title', 'Check Student Result')

@section('styles')
<style>
    .result-check-section {
        padding: 80px 0;
        background: #f7faf8;
        min-height: 65vh;
    }

    .result-check-card {
        max-width: 550px;
        margin: 0 auto;
        padding: 40px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 12px 40px rgba(18, 60, 42, 0.08);
    }

    .result-check-card h3 {
        color: #123c2a;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .result-check-card p {
        color: #64756b;
        margin-bottom: 25px;
    }

    .result-check-card label {
        display: block;
        margin-bottom: 8px;
        color: #123c2a;
        font-weight: 600;
    }

    .result-check-card input {
        width: 100%;
        padding: 14px 16px;
        border: 1px solid #dce6df;
        border-radius: 8px;
        margin-bottom: 20px;
        outline: none;
    }

    .result-check-card input:focus {
        border-color: #3ba647;
        box-shadow: 0 0 0 3px rgba(59, 166, 71, 0.1);
    }

    .result-check-button {
        width: 100%;
        padding: 14px;
        background: #3ba647;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: .3s;
    }

    .result-check-button:hover {
        background: #123c2a;
    }

    @media (max-width: 576px) {
        .result-check-section {
            padding: 45px 15px;
        }

        .result-check-card {
            padding: 25px 20px;
        }
    }
</style>
@endsection

@section('content')

<section class="result-check-section">
    <div class="container">

        <div class="result-check-card">

            <center>
                <h3>Check Your Result</h3>
            </center>

            <p>
                Enter your admission number below to check your academic result.
            </p>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first('admission_number') }}
                </div>
            @endif

            
<form action="{{ route('result.lookup') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="admission_number">Admission Number</label>
        <input
            type="text"
            name="admission_number"
            id="admission_number"
            class="form-control"
            value="{{ old('admission_number') }}"
            placeholder="Enter your admission number"
            required
        >
    </div>

    <div class="mb-3">
        <label for="session">Academic Session</label>
        <select name="session" id="session" class="form-control" required>
            <option value="">Select session</option>
            <option value="2025/2026" {{ old('session') == '2025/2026' ? 'selected' : '' }}>2025/2026</option>
            <option value="2026/2027" {{ old('session') == '2026/2027' ? 'selected' : '' }}>2026/2027</option>
        </select>
    </div>
<br>
    <div class="mb-3">
        <label for="term">Term</label>
        <select name="term" id="term" class="form-control" required>
            <option value="">Select term</option>
            <option value="First Term" {{ old('term') == 'First Term' ? 'selected' : '' }}>First Term</option>
            <option value="Second Term" {{ old('term') == 'Second Term' ? 'selected' : '' }}>Second Term</option>
            <option value="Third Term" {{ old('term') == 'Third Term' ? 'selected' : '' }}>Third Term</option>
        </select>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
<br>
    <button type="submit" class="btn btn-success">
        Check Result
    </button>
</form>


        </div>

    </div>
</section>

@endsection