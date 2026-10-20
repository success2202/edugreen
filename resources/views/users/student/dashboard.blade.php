
@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('styles')
<style>
    .student-dashboard {
        padding: 40px 0;
        background: #f8fafc;
        min-height: 70vh;
    }

    .dashboard-heading {
        background: #064e3b;
        color: #fff;
        padding: 25px;
        border-radius: 6px;
        margin-bottom: 25px;
    }

    .dashboard-card {
        background: #fff;
        padding: 25px;
        margin-bottom: 25px;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
    }

    .dashboard-card h4 {
        color: #064e3b;
        margin-bottom: 20px;
    }

    .student-details p {
        margin-bottom: 12px;
    }

    .student-result-table {
        width: 100%;
        border-collapse: collapse;
    }

    .student-result-table th,
    .student-result-table td {
        padding: 12px;
        border: 1px solid #dee2e6;
        text-align: center;
    }

    .student-result-table th {
        background: #064e3b;
        color: #fff;
    }

    @media print {
        nav, footer, .no-print {
            display: none !important;
        }

        .student-dashboard {
            background: #fff;
        }
    }
</style>
@endsection

@section('content')
<div class="student-dashboard">
    <div class="container">

        <div class="dashboard-heading d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h2 style="color: antiquewhite;">Welcome, {{ $student->first_name }}!</h2>
                <p class="mb-0" style="color: #fff">Welcome to your student dashboard.</p>
            </div>

            <form action="{{ route('student.logout') }}" method="POST" class="no-print">
                @csrf
                <button type="submit" class="btn btn-primary mt-3">
                    <i style="color: bisque;" class="fa fa-sign-out"></i> Logout
                </button>
            </form>
        </div>

        <div class="dashboard-card">
            <h4><i class="fa fa-user"></i> Student Information</h4>

            <div class="row student-details">
                <div class="col-md-6">
                    <p>
                        <strong>Full Name:</strong>
                        {{ $student->first_name }}
                        {{ $student->middle_name }}
                        {{ $student->last_name }}
                    </p>

                    <p>
                        <strong>Admission Number:</strong>
                        {{ $student->admission_number }}
                    </p>
                </div>

                <div class="col-md-6">
                    <p>
                        <strong>Class:</strong>
                        {{ $student->class }}
                    </p>

                    <p>
                        <strong>Level:</strong>
                        {{ $student->level }}
                    </p>
                </div>
            </div>
        </div>

        <div class="dashboard-card no-print">
            <h4><i class="fa fa-graduation-cap"></i> Check My Result</h4>

            @if(session('error'))
                <div class="alert alert-warning">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('student.results.check') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="session">Academic Session</label>

                        <select name="session" id="session" class="form-control" required>
                            <option value="">Select session</option>

                            @foreach($sessions as $academicSession)
                                <option
                                    value="{{ $academicSession }}"
                                    {{ old('session', $selectedSession ?? '') == $academicSession ? 'selected' : '' }}
                                >
                                    {{ $academicSession }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="term">Term</label>

                        <select name="term" id="term" class="form-control" required>
                            <option value="">Select term</option>

                            <option value="First Term"
                                {{ old('term', $selectedTerm ?? '') == 'First Term' ? 'selected' : '' }}>
                                First Term
                            </option>

                            <option value="Second Term"
                                {{ old('term', $selectedTerm ?? '') == 'Second Term' ? 'selected' : '' }}>
                                Second Term
                            </option>

                            <option value="Third Term"
                                {{ old('term', $selectedTerm ?? '') == 'Third Term' ? 'selected' : '' }}>
                                Third Term
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">
                            Check
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @isset($results)
            <div class="dashboard-card">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                    <div>
                        <h4 class="mb-2">Academic Result</h4>
                        <p class="mb-1">
                            <strong>Session:</strong> {{ $selectedSession ?? '' }}
                        </p>
                        <p>
                            <strong>Term:</strong> {{ $selectedTerm ?? '' }}
                        </p>
                    </div>

                    <button onclick="window.print()" class="btn btn-outline-success no-print">
                        <i class="fa fa-print"></i> Print Result
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="student-result-table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Subject</th>
                                <th>CA Score</th>
                                <th>Exam Score</th>
                                <th>Total</th>
                                <th>Grade</th>
                                <th>Remark</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $grandTotal = 0; @endphp

                            @foreach($results as $result)
                                @php
                                    $grandTotal += (float) $result->total_score;
                                @endphp

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $result->subject }}</td>
                                    <td>{{ $result->ca_score }}</td>
                                    <td>{{ $result->exam_score }}</td>
                                    <td>{{ $result->total_score }}</td>
                                    <td>{{ $result->grade }}</td>
                                    <td>{{ $result->remark }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="4">Grand Total</th>
                                <th>{{ $grandTotal }}</th>
                                <th colspan="2"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @endisset

    </div>
</div>
@endsection
