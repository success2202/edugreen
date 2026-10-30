@extends('admin.layouts.app')

@section('content')

<div class="admin-page">

    {{-- Page Header --}}
    <div class="admin-page-header">

        <div>
            <h1>Add Student Result</h1>
            <p>Enter academic result for this student.</p>
        </div>

        <div class="admin-page-actions">

            <a href="{{ route('admin.students.result', $student->id) }}"
               class="admin-secondary-btn">
                <i class="ti ti-arrow-left"></i>
                Back to Results
            </a>

        </div>

    </div>


    {{-- Student Information --}}
    <div class="result-student-card">

        <div class="result-student-photo">

            @if($student->image)

                <img src="{{ asset('frontend/assets/students/' . $student->image) }}"
                     alt="{{ $student->first_name }} {{ $student->last_name }}">

            @else

                <div class="result-photo-placeholder">
                    <i class="ti ti-user"></i>
                </div>

            @endif

        </div>

        <div class="result-student-info">

            <h2>
                {{ $student->first_name }}
                {{ $student->middle_name }}
                {{ $student->last_name }}
            </h2>

            <div class="result-student-details">

                <span>
                    <i class="ti ti-id"></i>
                    {{ $student->admission_number }}
                </span>

                <span>
                    <i class="ti ti-school"></i>
                    {{ $student->level }}
                </span>

                <span>
                    <i class="ti ti-book"></i>
                    {{ $student->class }}
                </span>

            </div>

        </div>

    </div>


    {{-- Add Result Form --}}
    <div class="admin-form-panel">

        <div class="form-section-title">

            <i class="ti ti-report"></i>

            <div>
                <h3>Academic Result</h3>
                <p>Enter the student's score for a subject.</p>
            </div>

        </div>


        {{-- Validation Errors --}}
        @if ($errors->any())

            <div class="admin-alert admin-alert-danger">

                <strong>Please correct the following errors:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <form action="{{ route('admin.students.storeResult', $student->id) }}"
              method="POST">

            @csrf


            {{-- Session & Term --}}
            <div class="result-form-grid">

                <div class="admin-form-group">

                    <label for="session">
                        Academic Session <span>*</span>
                    </label>

                    <select name="session"
                            id="session"
                            required>

                        <option value="">
                            Select Session
                        </option>

                        {{-- <option value="2025/2026"
                            {{ old('session') == '2025/2026' ? 'selected' : '' }}>
                            2025/2026
                        </option> --}}

                        <option value="2026/2027"
                            {{ old('session') == '2026/2027' ? 'selected' : '' }}>
                            2026/2027
                        </option>

                        {{-- <option value="2027/2028"
                            {{ old('session') == '2027/2028' ? 'selected' : '' }}>
                            2027/2028
                        </option> --}}

                    </select>

                </div>


                <div class="admin-form-group">

                    <label for="term">
                        Term <span>*</span>
                    </label>

                    <select name="term"
                            id="term"
                            required>

                        <option value="">
                            Select Term
                        </option>

                        <option value="First Term"
                            {{ old('term') == 'First Term' ? 'selected' : '' }}>
                            First Term
                        </option>

                        <option value="Second Term"
                            {{ old('term') == 'Second Term' ? 'selected' : '' }}>
                            Second Term
                        </option>

                        <option value="Third Term"
                            {{ old('term') == 'Third Term' ? 'selected' : '' }}>
                            Third Term
                        </option>

                    </select>

                </div>

            </div>


            {{-- Subject --}}
            <div class="admin-form-group">

                <label for="subject">
                    Subject <span>*</span>
                </label>

                <input type="text"
                       name="subject"
                       id="subject"
                       value="{{ old('subject') }}"
                       placeholder="e.g. Mathematics"
                       required>

            </div>


            {{-- Scores --}}
            <div class="result-score-section">

                <h4>
                    <i class="ti ti-chart-bar"></i>
                    Student Scores
                </h4>

                <div class="result-form-grid">

                    <div class="admin-form-group">

                        <label for="ca_score">
                            CA Score <span>*</span>
                        </label>

                        <input type="number"
                               name="ca_score"
                               id="ca_score"
                               value="{{ old('ca_score') }}"
                               min="0"
                               max="40"
                               step="0.01"
                               placeholder="0 - 40"
                               required>

                        <small>
                            Continuous Assessment (maximum 40)
                        </small>

                    </div>


                    <div class="admin-form-group">

                        <label for="exam_score">
                            Exam Score <span>*</span>
                        </label>

                        <input type="number"
                               name="exam_score"
                               id="exam_score"
                               value="{{ old('exam_score') }}"
                               min="0"
                               max="60"
                               step="0.01"
                               placeholder="0 - 60"
                               required>

                        <small>
                            Examination Score (maximum 60)
                        </small>

                    </div>


                    <div class="admin-form-group">

                        <label>
                            Total Score
                        </label>

                        <input type="text"
                               id="total_score"
                               value="0"
                               readonly>

                        <small>
                            Automatically calculated
                        </small>

                    </div>

                </div>

            </div>


            {{-- Grade --}}
            {{-- <div class="result-grade-section">

                <h4>
                    <i class="ti ti-award"></i>
                    Grade & Remark
                </h4>

                <div class="result-form-grid">

                    <div class="admin-form-group">

                        <label for="grade">
                            Grade
                        </label>

                        <select name="grade"
                                id="grade">

                            <option value="">
                                Select Grade
                            </option>

                            <option value="A"
                                {{ old('grade') == 'A' ? 'selected' : '' }}>
                                A
                            </option>

                            <option value="B"
                                {{ old('grade') == 'B' ? 'selected' : '' }}>
                                B
                            </option>

                            <option value="C"
                                {{ old('grade') == 'C' ? 'selected' : '' }}>
                                C
                            </option>

                            <option value="D"
                                {{ old('grade') == 'D' ? 'selected' : '' }}>
                                D
                            </option>

                            <option value="E"
                                {{ old('grade') == 'E' ? 'selected' : '' }}>
                                E
                            </option>

                            <option value="F"
                                {{ old('grade') == 'F' ? 'selected' : '' }}>
                                F
                            </option>

                        </select>

                    </div>


                    <div class="admin-form-group">

                        <label for="remark">
                            Remark
                        </label>

                        <select name="remark"
                                id="remark">

                            <option value="">
                                Select Remark
                            </option>

                            <option value="Excellent"
                                {{ old('remark') == 'Excellent' ? 'selected' : '' }}>
                                Excellent
                            </option>

                            <option value="Very Good"
                                {{ old('remark') == 'Very Good' ? 'selected' : '' }}>
                                Very Good
                            </option>

                            <option value="Good"
                                {{ old('remark') == 'Good' ? 'selected' : '' }}>
                                Good
                            </option>

                            <option value="Credit"
                                {{ old('remark') == 'Credit' ? 'selected' : '' }}>
                                Credit
                            </option>

                            <option value="Pass"
                                {{ old('remark') == 'Pass' ? 'selected' : '' }}>
                                Pass
                            </option>

                            <option value="Fail"
                                {{ old('remark') == 'Fail' ? 'selected' : '' }}>
                                Fail
                            </option>

                        </select>

                    </div>

                </div>

            </div> --}}

            {{-- Automatic Grade & Remark --}}
<div class="result-auto-section">

    <h4>
        <i class="ti ti-award"></i>
        Automatic Result
    </h4>

    <div class="result-auto-grid">

        <div class="result-auto-item">

            <span>Total Score</span>

            <strong id="total_preview">
                0
            </strong>

        </div>

        <div class="result-auto-item">

            <span>Grade</span>

            <strong id="grade_preview">
                -
            </strong>

        </div>

        <div class="result-auto-item">

            <span>Remark</span>

            <strong id="remark_preview">
                -
            </strong>

        </div>

    </div>

</div>


            {{-- Form Buttons --}}
            <div class="admin-form-footer">

                <a href="{{ route('admin.students.result', $student->id) }}"
                   class="admin-secondary-btn">
                    Cancel
                </a>

                <button type="submit"
                        class="admin-primary-btn">

                    <i class="ti ti-device-floppy"></i>
                    Save Result

                </button>

            </div>

        </form>

    </div>

</div>


<style>

/* =========================================
   STUDENT RESULT CARD
========================================= */

.result-student-card {
    display: flex;
    align-items: center;
    gap: 20px;
    background: #fff;
    border: 1px solid #e5e9e3;
    padding: 25px;
    margin-top: 25px;
}

.result-student-photo {
    width: 90px;
    height: 90px;
    flex-shrink: 0;
}

.result-student-photo img,
.result-photo-placeholder {
    width: 90px;
    height: 90px;
    object-fit: cover;
}

.result-photo-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0f8eb;
    color: #6dcc2c;
    font-size: 35px;
}

.result-student-info h2 {
    margin: 0 0 12px;
    color: #263746;
    font-family: 'Roboto Slab', Georgia, serif;
    font-size: 22px;
    font-weight: 700;
}

.result-student-details {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.result-student-details span {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 10px;
    background: #f8faf7;
    color: #68757e;
    border: 1px solid #e7ece5;
    font-size: 12px;
}

.result-student-details i {
    color: #6dcc2c;
}


/* =========================================
   RESULT FORM
========================================= */

.admin-form-panel {
    margin-top: 20px;
    background: #fff;
    border: 1px solid #e5e9e3;
    padding: 30px;
}

.form-section-title {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e5e9e3;
}

.form-section-title > i {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0f8eb;
    color: #6dcc2c;
    font-size: 22px;
}

.form-section-title h3 {
    margin: 0 0 4px;
    color: #263746;
    font-size: 18px;
}

.form-section-title p {
    margin: 0;
    color: #8a9499;
    font-size: 12px;
}


/* Form Grid */

.result-form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.admin-form-group {
    margin-bottom: 22px;
}

.admin-form-group label {
    display: block;
    margin-bottom: 8px;
    color: #263746;
    font-size: 12px;
    font-weight: 600;
}

.admin-form-group label span {
    color: #dc3545;
}

.admin-form-group input,
.admin-form-group select {
    width: 100%;
    height: 46px;
    padding: 0 13px;
    border: 1px solid #e1e6df;
    background: #fff;
    color: #263746;
    font-size: 13px;
    outline: none;
}

.admin-form-group input:focus,
.admin-form-group select:focus {
    border-color: #6dcc2c;
    box-shadow: 0 0 0 3px rgba(109, 204, 44, .08);
}

.admin-form-group input[readonly] {
    background: #f5f7f4;
    font-weight: 700;
}

.admin-form-group small {
    display: block;
    margin-top: 6px;
    color: #8a9499;
    font-size: 11px;
}


/* Subject */

#subject {
    width: 100%;
}


/* Score Section */

.result-score-section,
.result-grade-section {
    margin-top: 10px;
    margin-bottom: 10px;
    padding: 22px;
    background: #fafbfa;
    border: 1px solid #edf0eb;
}

.result-score-section h4,
.result-grade-section h4 {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0 0 20px;
    color: #263746;
    font-size: 14px;
}

.result-score-section h4 i,
.result-grade-section h4 i {
    color: #6dcc2c;
}


/* Alert */

.admin-alert {
    padding: 15px;
    margin-bottom: 25px;
    font-size: 13px;
}

.admin-alert-danger {
    background: #fff5f5;
    border: 1px solid #f1cccc;
    color: #842029;
}

.admin-alert ul {
    margin: 8px 0 0;
    padding-left: 20px;
}


/* Footer */

.admin-form-footer {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid #e5e9e3;
}


/* Mobile */

@media (max-width: 767px) {

    .result-student-card {
        flex-direction: column;
        text-align: center;
    }

    .result-student-info h2 {
        font-size: 19px;
    }

    .result-student-details {
        justify-content: center;
    }

    .admin-form-panel {
        padding: 20px;
    }

    .result-form-grid {
        grid-template-columns: 1fr;
        gap: 0;
    }

    .result-score-section,
    .result-grade-section {
        padding: 15px;
    }

    .admin-form-footer {
        justify-content: stretch;
    }

    .admin-form-footer a,
    .admin-form-footer button {
        flex: 1;
        justify-content: center;
    }

}

.result-auto-section {
    margin-top: 20px;
    padding: 22px;
    background: #f8faf7;
    border: 1px solid #e5e9e3;
}

.result-auto-section h4 {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0 0 20px;
    color: #263746;
    font-size: 14px;
}

.result-auto-section h4 i {
    color: #6dcc2c;
}

.result-auto-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}

.result-auto-item {
    padding: 18px;
    background: #fff;
    border: 1px solid #e5e9e3;
    text-align: center;
}

.result-auto-item span {
    display: block;
    margin-bottom: 8px;
    color: #8a9499;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.result-auto-item strong {
    color: #263746;
    font-size: 20px;
    font-weight: 700;
}

@media (max-width: 767px) {

    .result-auto-grid {
        grid-template-columns: 1fr;
    }

}

</style>


{{-- Calculate Total --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const caInput = document.getElementById('ca_score');
    const examInput = document.getElementById('exam_score');
    const totalInput = document.getElementById('total_score');

    function calculateTotal() {

        const ca = parseFloat(caInput.value) || 0;
        const exam = parseFloat(examInput.value) || 0;

        const total = ca + exam;

        totalInput.value = total.toFixed(2);

    }

    caInput.addEventListener('input', calculateTotal);
    examInput.addEventListener('input', calculateTotal);

});


document.addEventListener('DOMContentLoaded', function () {

    const caInput = document.getElementById('ca_score');
    const examInput = document.getElementById('exam_score');

    const totalPreview = document.getElementById('total_preview');
    const gradePreview = document.getElementById('grade_preview');
    const remarkPreview = document.getElementById('remark_preview');


    function calculateResult() {

        const ca = parseFloat(caInput.value) || 0;
        const exam = parseFloat(examInput.value) || 0;

        const total = ca + exam;

        let grade = '-';
        let remark = '-';


        if (total >= 70) {

            grade = 'A';
            remark = 'Excellent';

        } else if (total >= 60) {

            grade = 'B';
            remark = 'Very Good';

        } else if (total >= 50) {

            grade = 'C';
            remark = 'Good';

        } else if (total >= 45) {

            grade = 'D';
            remark = 'Fair';

        } else if (total >= 40) {

            grade = 'E';
            remark = 'Pass';

        } else if (caInput.value !== '' || examInput.value !== '') {

            grade = 'F';
            remark = 'Fail';
        }


        totalPreview.textContent = total.toFixed(2);
        gradePreview.textContent = grade;
        remarkPreview.textContent = remark;

    }


    caInput.addEventListener('input', calculateResult);

    examInput.addEventListener('input', calculateResult);

});



</script>

@endsection