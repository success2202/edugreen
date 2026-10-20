
@extends('layouts.app')

@section('title', 'Student Result')

@section('styles')
<style>
    .result-container {
        max-width: 1000px;
        margin: 50px auto;
        padding: 0 15px;
    }

    .result-header {
        background: #064e3b;
        color: #fff;
        padding: 25px;
        border-radius: 8px 8px 0 0;
        text-align: center;
    }

    .result-header h3 {
        margin: 0 0 8px;
        font-weight: 700;
        color: #fff;
    }

    .student-info {
        background: #f8fafc;
        padding: 25px;
        border: 1px solid #e5e7eb;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }

    .student-info p {
        margin: 0;
        color: #334155;
    }

    .result-table-wrapper {
        overflow-x: auto;
        margin-top: 25px;
    }

    .result-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
    }

    .result-table th,
    .result-table td {
        border: 1px solid #dee2e6;
        padding: 12px;
        text-align: center;
    }

    .result-table th {
        background: #064e3b;
        color: #fff;
        white-space: nowrap;
    }

    .result-table tbody tr:nth-child(even) {
        background: #f8fafc;
    }

    .result-table tbody tr:hover {
        background: #ecfdf5;
    }

    .total-row {
        background: #ecfdf5;
        font-weight: 700;
    }

    .result-actions {
        display: flex;
        gap: 10px;
        margin-top: 25px;
        flex-wrap: wrap;
    }

    .result-actions a,
    .result-actions button {
        padding: 11px 18px;
        border: none;
        text-decoration: none;
        cursor: pointer;
        border-radius: 4px;
        font-size: 14px;
    }

    .back-btn {
        background: #475569;
        color: #fff;
    }

    .print-btn {
        background: #059669;
        color: #fff;
    }

    @media (max-width: 600px) {
        .student-info {
            grid-template-columns: 1fr;
        }

        .result-header {
            padding: 20px 10px;
        }
    }

    @media print {
        nav, footer, .result-actions {
            display: none !important;
        }

        .result-container {
            margin: 0;
            max-width: 100%;
        }

        .result-header {
            background: #064e3b !important;
            color: #fff !important;
            print-color-adjust: exact;
            -webkit-print-color-adjust: exact;
        }
    }
</style>
@endsection

@section('content')
<div class="result-container">

    <div class="result-header">
        <h3>STUDENT ACADEMIC RESULT</h3>
        <p style="margin: 0; color: #dac9c9;">Academic Performance Report</p>
    </div>

    <div class="student-info">
        <p>
            <strong>Student Name:</strong>
            {{ $student->first_name }} {{ $student->last_name }} {{ $student->middle_name }}
        </p>

        <p>
            <strong>Admission Number:</strong>
            {{ $student->admission_number }}
        </p>

        <p>
            <strong>Academic Session:</strong>
            {{ $results->first()->session }}
        </p>

        <p>
            <strong>Term:</strong>
            {{ $results->first()->term }}
        </p>
    </div>

    <div class="result-table-wrapper">
        <table class="result-table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Subject</th>
                    <th>CA Score</th>
                    <th>Exam Score</th>
                    <th>Total Score</th>
                    <th>Grade</th>
                    <th>Remark</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $grandTotal = 0;
                @endphp

                @foreach($results as $result)
                    @php
                        $grandTotal += (float) $result->total_score;
                    @endphp

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="text-align: left;">
                            {{ $result->subject }}
                        </td>
                        <td>{{ $result->ca_score }}</td>
                        <td>{{ $result->exam_score }}</td>
                        <td>{{ $result->total_score }}</td>
                        <td>{{ $result->grade }}</td>
                        <td>{{ $result->remark }}</td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="total-row">
                    <td colspan="4">Grand Total</td>
                    <td colspan="3">{{ $grandTotal }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="result-actions">
        <a href="{{ route('result.check') }}" class="back-btn">
            Check Another Result
        </a>

        {{-- <button type="button" class="print-btn" onclick="window.print()">
            Print Result
        </button> --}}
    </div>

</div>
@endsection
