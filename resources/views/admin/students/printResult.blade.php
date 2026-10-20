<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        {{ $student->first_name }}
        {{ $student->last_name }}
        - Student Result
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #eeeeee;
            font-family: Arial, Helvetica, sans-serif;
            color: #263746;
        }

        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #6dcc2c;
            color: #fff;
            border: none;
            padding: 12px 22px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            z-index: 9999;
        }

        .print-button:hover {
            background: #59b91b;
        }

        .result-page {
            width: 210mm;
            min-height: 297mm;
            background: #fff;
            margin: 30px auto;
            padding: 15mm;
        }

        /* SCHOOL HEADER */

        .school-header {
            text-align: center;
            border-bottom: 3px solid #6dcc2c;
            padding-bottom: 15px;
        }

        .school-logo {
            margin-bottom: 8px;
        }

        .school-logo img {
            width: 90px;
            height: 90px;
            object-fit: contain;
        }

        .school-name {
            margin: 0;
            font-family: Georgia, serif;
            font-size: 27px;
            font-weight: 700;
            color: #263746;
            text-transform: uppercase;
        }

        .school-address {
            margin: 7px 0 0;
            font-size: 13px;
            color: #555;
            line-height: 1.5;
        }

        .school-contact {
            margin-top: 3px;
            font-size: 12px;
            color: #666;
        }

        .result-title {
            margin: 16px 0 0;
            font-size: 18px;
            font-weight: 700;
            color: #59b91b;
            letter-spacing: 1px;
        }

        /* STUDENT INFORMATION */

        .student-section {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            background: #fafafa;
        }

        .student-details {
            flex: 1;
        }

        .student-row {
            display: grid;
            grid-template-columns: 150px 1fr;
            margin-bottom: 8px;
            font-size: 13px;
        }

        .student-row strong {
            color: #263746;
        }

        .student-photo {
            width: 85px;
            height: 100px;
            border: 1px solid #ccc;
            overflow: hidden;
            flex-shrink: 0;
        }

        .student-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* SESSION */

        .session-box {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 18px 0;
            font-size: 14px;
        }

        .session-box strong {
            color: #263746;
        }

        /* RESULT TABLE */

        .result-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .result-table th {
            background: #263746;
            color: #fff;
            border: 1px solid #263746;
            padding: 9px 6px;
            font-size: 12px;
            text-align: center;
        }

        .result-table td {
            border: 1px solid #cfcfcf;
            padding: 8px 6px;
            font-size: 12px;
            text-align: center;
        }

        .result-table td.subject {
            text-align: left;
            font-weight: 500;
        }

        .result-table tbody tr:nth-child(even) {
            background: #f7f7f7;
        }

        /* SUMMARY */

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            margin-top: 20px;
            border: 1px solid #ccc;
        }

        .summary-item {
            text-align: center;
            padding: 12px;
            border-right: 1px solid #ccc;
        }

        .summary-item:last-child {
            border-right: none;
        }

        .summary-label {
            display: block;
            font-size: 11px;
            color: #666;
            margin-bottom: 5px;
        }

        .summary-value {
            font-size: 17px;
            font-weight: 700;
            color: #263746;
        }

        /* GRADING */

        .grading-title {
            margin-top: 25px;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
        }

        .grading-table {
            width: 100%;
            border-collapse: collapse;
        }

        .grading-table th,
        .grading-table td {
            border: 1px solid #ccc;
            padding: 7px;
            font-size: 11px;
            text-align: center;
        }

        .grading-table th {
            background: #f0f0f0;
        }

        /* REMARKS */

        .remarks {
            margin-top: 25px;
        }

        .remark {
            margin-bottom: 15px;
        }

        .remark-title {
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .remark-line {
            border-bottom: 1px solid #999;
            height: 25px;
        }

        /* SIGNATURE */

        .signatures {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            margin-top: 45px;
        }

        .signature {
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #263746;
            margin-bottom: 7px;
        }

        .signature span {
            font-size: 11px;
        }

        /* FOOTER */

        .result-footer {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 10px;
            color: #777;
        }

        /* PRINT */

        @media print {

            @page {
                size: A4;
                margin: 10mm;
            }

            html,
            body {
                width: 210mm;
                height: 297mm;
                background: #fff !important;
            }

            body {
                margin: 0;
            }

            .print-button {
                display: none !important;
            }

            .result-page {
                width: 100%;
                min-height: auto;
                margin: 0;
                padding: 0;
                box-shadow: none;
            }

            .result-table th {
                background: #263746 !important;
                color: #fff !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .school-header,
            .student-section,
            .result-table,
            .summary,
            .grading-table,
            .remarks,
            .signatures {
                page-break-inside: avoid;
            }
        }



        
.class-position {
    margin: 15px 0;
    padding: 10px 15px;
    border: 1px solid #198754;
    border-radius: 5px;
    background: #f0f9f3;
    color: #222;
    font-size: 14px;
}

.class-position strong {
    color: #198754;
    margin-right: 8px;
}

.class-position span {
    font-weight: bold;
}


    </style>
</head>

<body>

    <button class="print-button" onclick="window.print()">
        Print Result
    </button>


    <div class="result-page">

        {{-- SCHOOL HEADER --}}

        <div class="school-header">

            @if($school && $school->logo)

                <div class="school-logo">

                    <img
                        src="{{ asset('storage/' . $school->logo) }}"
                        alt="School Logo"
                    >

                </div>

            @endif


            <h1 class="school-name">
                {{ $school->school_name ?? 'YOUR SCHOOL NAME' }}
            </h1>


            @if($school && $school->school_address)

                <p class="school-address">
                    {{ $school->school_address }}
                </p>

            @endif


            @if($school && ($school->phone || $school->email))

                <div class="school-contact">

                    @if($school->phone)
                        Phone: {{ $school->phone }}
                    @endif

                    @if($school->phone && $school->email)
                        &nbsp; | &nbsp;
                    @endif

                    @if($school->email)
                        Email: {{ $school->email }}
                    @endif

                </div>

            @endif


            <div class="result-title">
                STUDENT ACADEMIC RESULT
            </div>

        </div>


        {{-- STUDENT INFORMATION --}}

        <div class="student-section">

            <div class="student-details">

                <div class="student-row">
                    <strong>Student Name:</strong>

                    <span>
                        {{ $student->first_name }}
                        {{ $student->middle_name }}
                        {{ $student->last_name }}
                    </span>
                </div>


                <div class="student-row">
                    <strong>Admission Number:</strong>

                    <span>
                        {{ $student->admission_number }}
                    </span>
                </div>


                <div class="student-row">
                    <strong>School Level:</strong>

                    <span>
                        {{ $student->level }}
                    </span>
                </div>


                <div class="student-row">
                    <strong>Class:</strong>

                    <span>
                        {{ $student->class }}
                    </span>
                </div>


                <div class="student-row">
                    <strong>Gender:</strong>

                    <span>
                        {{ $student->gender }}
                    </span>
                </div>

            </div>


            @if($student->image)

                <div class="student-photo">

                    <img
                        src="{{ asset('storage/' . $student->image) }}"
                        alt="Student Photo"
                    >

                </div>

            @endif

        </div>


        {{-- SESSION AND TERM --}}

        <div class="session-box">

            <div>
                <strong>Session:</strong>
                {{ request('session') }}
            </div>

            <div>
                <strong>Term:</strong>
                {{ request('term') }}
            </div>

        </div>


        {{-- RESULTS --}}

        <table class="result-table">

            <thead>

                <tr>
                    <th width="6%">S/N</th>
                    <th>SUBJECT</th>
                    <th width="12%">CA<br>40</th>
                    <th width="12%">EXAM<br>60</th>
                    <th width="12%">TOTAL<br>100</th>
                    <th width="10%">GRADE</th>
                    <th width="18%">REMARK</th>
                </tr>

            </thead>


            <tbody>

                @foreach($results as $index => $item)

                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>

                        <td class="subject">
                            {{ $item->subject }}
                        </td>

                        <td>
                            {{ number_format($item->ca_score, 2) }}
                        </td>

                        <td>
                            {{ number_format($item->exam_score, 2) }}
                        </td>

                        <td>
                            <strong>
                                {{ number_format($item->total_score, 2) }}
                            </strong>
                        </td>

                        <td>
                            <strong>
                                {{ $item->grade }}
                            </strong>
                        </td>

                        <td>
                            {{ $item->remark }}
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>


        {{-- SUMMARY --}}

        @php

            $totalScore = $results->sum('total_score');

            $subjectCount = $results->count();

            $average = $subjectCount > 0
                ? $totalScore / $subjectCount
                : 0;

        @endphp


        <div class="summary">

            <div class="summary-item">

                <span class="summary-label">
                    TOTAL SUBJECTS
                </span>

                <span class="summary-value">
                    {{ $subjectCount }}
                </span>

            </div>


            <div class="summary-item">

                <span class="summary-label">
                    TOTAL SCORE
                </span>

                <span class="summary-value">
                    {{ number_format($totalScore, 2) }}
                </span>

            </div>


            <div class="summary-item">

                <span class="summary-label">
                    AVERAGE
                </span>

                <span class="summary-value">
                    {{ number_format($average, 2) }}%
                </span>

            </div>

        </div>


        {{-- GRADING SCALE --}}

        <div class="grading-title">
            GRADING SCALE
        </div>


        <table class="grading-table">

            <thead>

                <tr>
                    <th>Score</th>
                    <th>Grade</th>
                    <th>Remark</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>70 - 100</td>
                    <td>A</td>
                    <td>Excellent</td>
                </tr>

                <tr>
                    <td>60 - 69</td>
                    <td>B</td>
                    <td>Very Good</td>
                </tr>

                <tr>
                    <td>50 - 59</td>
                    <td>C</td>
                    <td>Good</td>
                </tr>

                <tr>
                    <td>45 - 49</td>
                    <td>D</td>
                    <td>Fair</td>
                </tr>

                <tr>
                    <td>40 - 44</td>
                    <td>E</td>
                    <td>Pass</td>
                </tr>

                <tr>
                    <td>0 - 39</td>
                    <td>F</td>
                    <td>Fail</td>
                </tr>

            </tbody>

        </table>


        {{-- STUDENT CLASS POSITION --}}

<div class="class-position">
    <strong>CLASS POSITION:</strong>
    <span>{{ $studentPosition ?? 'N/A' }}</span>
</div>

        {{-- REMARKS --}}

        <div class="remarks">

            <div class="remark">

                <div class="remark-title">
                    CLASS TEACHER'S REMARK
                </div>

                <div class="remark-line"></div>

            </div>


            <div class="remark">

                <div class="remark-title">
                    PRINCIPAL'S REMARK
                </div>

                <div class="remark-line"></div>

            </div>

        </div>


        {{-- SIGNATURES --}}

        <div class="signatures">

            <div class="signature">

                <div class="signature-line"></div>

                <span>
                    Class Teacher's Signature
                </span>

            </div>


            <div class="signature">

                <div class="signature-line"></div>

                <span>
                    Principal's Signature
                </span>

            </div>

        </div>


        <div class="result-footer">

            This result is issued by
            {{ $school->school_name ?? 'the school' }}.

        </div>

    </div>

</body>
</html>