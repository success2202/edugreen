@extends('admin.layouts.app')

@section('content')

<div class="admin-page">

    {{-- Page Header --}}
    <div class="admin-page-header">

        <div>
            <h1>Student Result</h1>
            <p>View academic performance and examination results.</p>
        </div>

        <div class="admin-page-actions">

            <a href="{{ route('admin.students.show', $student->id) }}"
               class="admin-secondary-btn">
                <i class="ti ti-arrow-left"></i>
                Back to Student
            </a>

        </div>

    </div>


    {{-- Student Information --}}
    <div class="result-student-card">

        <div class="result-student-photo">

            @if($student->image)

                <img src="{{ asset('storage/' . $student->image) }}"
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

                <span>
                    <i class="ti ti-user"></i>
                    {{ $student->gender }}
                </span>

            </div>

        </div>

    </div>


    {{-- Result Filter --}}
    <div class="admin-panel result-filter-panel">

        <form action="{{ route('admin.students.result', $student->id) }}"
              method="GET"
              class="result-filter-form">

            <div class="result-filter-group">

                <label>Academic Session</label>

                {{-- <select name="session">

                    <option value="">
                        Select Session
                    </option>

                    <option value="2025/2026"
                        {{ request('session') == '2025/2026' ? 'selected' : '' }}>
                        2025/2026
                    </option>

                    <option value="2026/2027"
                        {{ request('session') == '2026/2027' ? 'selected' : '' }}>
                        2026/2027
                    </option>

                    <option value="2027/2028"
                        {{ request('session') == '2027/2028' ? 'selected' : '' }}>
                        2027/2028
                    </option>

                </select> --}}
                <select name="session">

    <option value="">Select Session</option>

    <option value="2025/2026"
        {{ $session == '2025/2026' ? 'selected' : '' }}>
        2025/2026
    </option>

    <option value="2026/2027"
        {{ $session == '2026/2027' ? 'selected' : '' }}>
        2026/2027
    </option>

    <option value="2027/2028"
        {{ $session == '2027/2028' ? 'selected' : '' }}>
        2027/2028
    </option>

</select>

            </div>


            <div class="result-filter-group">

                <label>Term</label>

                {{-- <select name="term">

                    <option value="">
                        Select Term
                    </option>

                    <option value="First Term"
                        {{ request('term') == 'First Term' ? 'selected' : '' }}>
                        First Term
                    </option>

                    <option value="Second Term"
                        {{ request('term') == 'Second Term' ? 'selected' : '' }}>
                        Second Term
                    </option>

                    <option value="Third Term"
                        {{ request('term') == 'Third Term' ? 'selected' : '' }}>
                        Third Term
                    </option>

                </select> --}}
                <select name="term">

    <option value="">Select Term</option>

    <option value="First Term"
        {{ $term == 'First Term' ? 'selected' : '' }}>
        First Term
    </option>

    <option value="Second Term"
        {{ $term == 'Second Term' ? 'selected' : '' }}>
        Second Term
    </option>

    <option value="Third Term"
        {{ $term == 'Third Term' ? 'selected' : '' }}>
        Third Term
    </option>

</select>

            </div>


            <button type="submit"
                    class="admin-primary-btn result-filter-btn">

                <i class="ti ti-search"></i>
                View Result

            </button>

        </form>

    </div>


    {{-- Result Table --}}
    <div class="admin-panel result-table-panel">

        <div class="result-table-header">

            <div>

                <h3>
                    Academic Result
                </h3>

                {{-- @if(request('session') && request('term'))

                    <p>
                        {{ request('session') }}
                        &nbsp; • &nbsp;
                        {{ request('term') }}
                    </p>

                @else

                    <p>
                        Select a session and term to view results.
                    </p>

                @endif --}}
@if($session && $term)

    <p>
        {{ $session }}
        &nbsp; • &nbsp;
        {{ $term }}
    </p>

@else

    <p>
        No academic result has been recorded yet.
    </p>

@endif

            </div> 
  
        </div>

        

        @if(isset($results) && $results->count())

            <div class="table-responsive">

                <table class="admin-table result-table">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Subject</th>

                            <th>CA</th>

                            <th>Exam</th>

                            <th>Total</th>

                            <th>Grade</th>

                            <th>Remark</th>
                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($results as $index => $result)

                            <tr>

                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    <strong class="result-subject">
                                        {{ $result->subject }}
                                    </strong>
                                </td>

                                <td>
                                    {{ number_format($result->ca_score, 2) }}
                                </td>

                                <td>
                                    {{ number_format($result->exam_score, 2) }}
                                </td>

                                <td>
                                    <strong>
                                        {{ number_format($result->total_score, 2) }}
                                    </strong>
                                </td>

                                <td>

                                    <span class="result-grade">
                                        {{ $result->grade }}
                                    </span>

                                </td>

                                <td>
                                    {{ $result->remark ?: 'N/A' }}
                                </td>

                                <td>

    <div class="result-actions">

        {{-- Edit --}}
        <a href="{{ route('admin.students.result.edit', [$student->id, $result->id]) }}"
           class="action-btn"
           title="Edit Result">

            <i class="ti ti-edit"></i>

        </a>


        {{-- Delete --}}
        <form action="{{ route('admin.students.result.destroy', [$student->id, $result->id]) }}"
              method="POST"
              onsubmit="return confirm('Are you sure you want to delete this result?');">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="action-btn text-danger"
                    title="Delete Result">

                <i class="ti ti-trash"></i>

            </button>

        </form>

    </div>

</td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- Result Summary --}}
            <div class="result-summary">

                <div class="result-summary-item">

                    <span>Total Subjects</span>

                    <strong>
                        {{ $results->count() }}
                    </strong>

                </div>


                <div class="result-summary-item">

                    <span>Total Score</span>

                    <strong>
                        {{ number_format($results->sum('total_score'), 2) }}
                    </strong>

                </div>


                <div class="result-summary-item">

                    <span>Average Score</span>

                    <strong>
                        {{ number_format($results->avg('total_score'), 2) }}
                    </strong>

                </div>

            </div>

        @else

            <div class="empty-result">

                <div class="empty-result-icon">
                    <i class="ti ti-report"></i>
                </div>

                <h3>No Result Found</h3>

                <p>
                    No result is available for the selected session and term.
                </p>

            </div>

        @endif

    </div>
<br>
  @if($results->count() > 0 && $session && $term)

    <a href="{{ route('admin.students.result.print', [
        'student' => $student->id,
        'session' => $session,
        'term' => $term
    ]) }}"
       class="admin-primary-btn"
       target="_blank">

        <i class="ti ti-printer"></i>
        Print Result

    </a>

@endif

  <a style="align-content: flex-right" href="{{ route('admin.students.createResult',  $student->id) }}"
       class="admin-primary-btn">

        <i class="ti ti-plus"></i>
        Add Subject

    </a>

</div>


<style>

/* =========================================
   RESULT STUDENT CARD
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
   RESULT FILTER
========================================= */

.result-filter-panel {
    margin-top: 20px;
    padding: 20px;
}

.result-filter-form {
    display: grid;
    grid-template-columns: 1fr 1fr auto;
    gap: 15px;
    align-items: end;
}

.result-filter-group label {
    display: block;
    margin-bottom: 7px;
    color: #263746;
    font-size: 12px;
    font-weight: 600;
}

.result-filter-group select {
    width: 100%;
    height: 44px;
    padding: 0 12px;
    border: 1px solid #e1e6df;
    background: #fff;
    color: #263746;
    font-size: 13px;
    outline: none;
}

.result-filter-group select:focus {
    border-color: #6dcc2c;
    box-shadow: 0 0 0 3px rgba(109, 204, 44, .08);
}

.result-filter-btn {
    height: 44px;
    white-space: nowrap;
}


/* =========================================
   RESULT TABLE
========================================= */

.result-table-panel {
    margin-top: 20px;
    overflow: hidden;
}

.result-table-header {
    padding: 20px;
    border-bottom: 1px solid #e5e9e3;
}

.result-table-header h3 {
    margin: 0 0 5px;
    color: #263746;
    font-size: 17px;
    font-weight: 700;
}

.result-table-header p {
    margin: 0;
    color: #8a9499;
    font-size: 12px;
}

.result-table {
    margin: 0;
}

.result-table th {
    background: #f7f9f6;
    color: #263746;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .4px;
}

.result-table td {
    color: #68757e;
    font-size: 13px;
    vertical-align: middle;
}

.result-subject {
    color: #263746;
}

.result-grade {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 35px;
    height: 30px;
    padding: 0 8px;
    background: #f0f8eb;
    color: #59b91b;
    font-weight: 700;
    font-size: 12px;
}


/* =========================================
   RESULT SUMMARY
========================================= */

.result-summary {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    border-top: 1px solid #e5e9e3;
}

.result-summary-item {
    padding: 20px;
    border-right: 1px solid #e5e9e3;
}

.result-summary-item:last-child {
    border-right: none;
}

.result-summary-item span {
    display: block;
    margin-bottom: 6px;
    color: #8a9499;
    font-size: 11px;
    text-transform: uppercase;
}

.result-summary-item strong {
    color: #263746;
    font-size: 18px;
}


/* =========================================
   EMPTY RESULT
========================================= */

.empty-result {
    padding: 60px 20px;
    text-align: center;
}

.empty-result-icon {
    width: 65px;
    height: 65px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    background: #f0f8eb;
    color: #6dcc2c;
    font-size: 30px;
}

.empty-result h3 {
    margin: 0 0 7px;
    color: #263746;
    font-size: 17px;
}

.empty-result p {
    margin: 0;
    color: #8a9499;
    font-size: 13px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 767px) {

    .result-student-card {
        flex-direction: column;
        text-align: center;
    }

    .result-student-details {
        justify-content: center;
    }

    .result-student-info h2 {
        font-size: 19px;
    }

    .result-filter-form {
        grid-template-columns: 1fr;
    }

    .result-filter-btn {
        width: 100%;
        justify-content: center;
    }

    .result-summary {
        grid-template-columns: 1fr;
    }

    .result-summary-item {
        border-right: none;
        border-bottom: 1px solid #e5e9e3;
    }

    .result-summary-item:last-child {
        border-bottom: none;
    }

}



.result-actions {
    display: flex;
    align-items: center;
    gap: 7px;
}

.result-actions form {
    margin: 0;
}

.result-actions .action-btn {
    width: 34px;
    height: 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e5e9e3;
    background: #fff;
    color: #68757e;
    text-decoration: none;
    cursor: pointer;
    transition: .2s ease;
}

.result-actions .action-btn:hover {
    border-color: #6dcc2c;
    color: #6dcc2c;
}

.result-actions .text-danger:hover {
    border-color: #dc3545;
    color: #dc3545;
}
</style>

@endsection