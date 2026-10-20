@extends('admin.layouts.app')

@section('styles')
<style>


/* ========================================
   STUDENT DETAILS - SCHOOL FEES CARD
======================================== */


/* =====================================
   SCHOOL FEES PAYMENT CARD
===================================== */

.card.shadow-sm.mb-4 {
    border: 1px solid #e2ebe5;
    border-radius: 14px;
    overflow: hidden;
    background: #ffffff;
    box-shadow: 0 5px 20px rgba(24, 55, 38, 0.07) !important;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
}

/* Card Header */
.card.shadow-sm.mb-4 .card-header.bg-success {
    display: flex;
    align-items: center;
    padding: 18px 22px;
    background: linear-gradient(135deg, #176b45, #258653) !important;
    border: none;
}

.card.shadow-sm.mb-4 .card-header h5 {
    margin: 0;
    color: #ffffff;
    font-size: 17px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.card.shadow-sm.mb-4 .card-header i {
    font-size: 21px;
}

/* Card Body */
.card.shadow-sm.mb-4 .card-body {
    padding: 24px;
}

.card.shadow-sm.mb-4 .card-body p {
    margin-bottom: 15px;
    padding: 13px 15px;
    background: #f6faf7;
    border: 1px solid #e7f0e9;
    border-radius: 8px;
    color: #526359;
    font-size: 14px;
    line-height: 1.6;
}

.card.shadow-sm.mb-4 .card-body p strong {
    display: inline-block;
    min-width: 125px;
    color: #243b2e;
    font-weight: 600;
}

/* View / Record Fees Button */
.card.shadow-sm.mb-4 .btn.btn-success {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 12px 20px;
    margin-top: 4px;
    background: #197347;
    border: 1px solid #197347;
    border-radius: 8px;
    color: #ffffff;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.25s ease;
}

.card.shadow-sm.mb-4 .btn.btn-success:hover {
    background: #125b37;
    border-color: #125b37;
    box-shadow: 0 5px 12px rgba(25, 115, 71, 0.2);
    transform: translateY(-2px);
}

.card.shadow-sm.mb-4 .btn.btn-success i {
    font-size: 16px;
}

/* Mobile Responsive */
@media (max-width: 576px) {
   .card.shadow-sm.mb-4 .card-header {
        padding: 15px 16px;
    }

 .card.shadow-sm.mb-4 .card-header h5 {
        font-size: 15px;
    }

   .card.shadow-sm.mb-4 .card-body {
        padding: 16px;
    }

    .card.shadow-sm.mb-4 .card-body p {
        padding: 11px 12px;
        font-size: 13px;
    }

    .card.shadow-sm.mb-4 .card-body p strong {
        min-width: auto;
        margin-right: 5px;
    }

    .card.shadow-sm.mb-4 .btn.btn-success {
        width: 100%;
        padding: 12px 14px;
    }
}


</style>

@endsection

@section('content')


    {{-- Page Header --}}
    <div class="admin-page-header">
        <div>
            <h1>Student Details</h1>
            <p>View complete information about this student.</p>
        </div>

        <div class="admin-page-actions">
            <a href="{{ route('admin.students.index') }}"
               class="admin-secondary-btn">
                <i class="ti ti-arrow-left"></i>
                Back to Students
            </a>

            <a href="{{ route('admin.students.edit', $student->id) }}"
               class="admin-primary-btn">
                <i class="ti ti-edit"></i>
                Edit Student
            </a>
        </div>
    </div>


    {{-- Student Profile --}}
    <div class="student-profile-panel">

        {{-- Profile Header --}}
        <div class="student-profile-header">

            <div class="student-profile-photo">

                @if($student->image)
                    <img src="{{ asset('storage/' . $student->image) }}"
                         alt="{{ $student->first_name }} {{ $student->last_name }}">
                @else
                    <div class="student-profile-placeholder">
                        <i class="ti ti-user"></i>
                    </div>
                @endif

            </div>

            <div class="student-profile-info">

                <h2>
                    {{ $student->first_name }}
                    {{ $student->middle_name }}
                    {{ $student->last_name }}
                </h2>

                <p>
                    <i class="ti ti-id"></i>
                    Admission No: <strong>{{ $student->admission_number }}</strong>
                </p>

                <div class="student-profile-meta">

                    <span>
                        <i class="ti ti-school"></i>
                        {{ $student->level }}
                    </span>

                    <span>
                        <i class="ti ti-book"></i>
                        {{ $student->class }}
                    </span>

                    @if($student->status)
                        <span class="status-badge status-active">
                            Active
                        </span>
                    @else
                        <span class="status-badge status-inactive">
                            Inactive
                        </span>
                    @endif

                </div>

            </div>

        </div>



        {{-- Personal Information --}}
        <div class="student-detail-section">

            <div class="student-detail-title">
                <i class="ti ti-user"></i>
                <h3>Personal Information</h3>
            </div>

            <div class="student-detail-grid">

                <div class="student-detail-item">
                    <span>First Name</span>
                    <strong>{{ $student->first_name }}</strong>
                </div>

                <div class="student-detail-item">
                    <span>Middle Name</span>
                    <strong>{{ $student->middle_name ?: 'N/A' }}</strong>
                </div>

                <div class="student-detail-item">
                    <span>Last Name</span>
                    <strong>{{ $student->last_name }}</strong>
                </div>

                <div class="student-detail-item">
                    <span>Gender</span>
                    <strong>{{ $student->gender }}</strong>
                </div>

                <div class="student-detail-item">
                    <span>Date of Birth</span>
                    <strong>
                        {{ $student->date_of_birth ? $student->date_of_birth->format('d M, Y') : 'N/A' }}
                    </strong>
                </div>

                <div class="student-detail-item">
                    <span>Admission Date</span>
                    <strong>
                        {{ $student->admission_date ? $student->admission_date->format('d M, Y') : 'N/A' }}
                    </strong>
                </div>

            </div>

        </div>


        {{-- Academic Information --}}
        <div class="student-detail-section">

            <div class="student-detail-title">
                <i class="ti ti-school"></i>
                <h3>Academic Information</h3>
            </div>

            <div class="student-detail-grid">

                <div class="student-detail-item">
                    <span>Admission Number</span>
                    <strong>{{ $student->admission_number }}</strong>
                </div>

                <div class="student-detail-item">
                    <span>School Level</span>
                    <strong>{{ $student->level }}</strong>
                </div>

                <div class="student-detail-item">
                    <span>Class</span>
                    <strong>{{ $student->class }}</strong>
                </div>

                <div class="student-detail-item">
                    <span>Student Status</span>

                    @if($student->status)
                        <strong class="student-status-active">
                            Active
                        </strong>
                    @else
                        <strong class="student-status-inactive">
                            Inactive
                        </strong>
                    @endif

                </div>

            </div>

        </div>


        {{-- Parent / Guardian Information --}}
        <div class="student-detail-section">

            <div class="student-detail-title">
                <i class="ti ti-users"></i>
                <h3>Parent / Guardian Information</h3>
            </div>

            <div class="student-detail-grid">

                <div class="student-detail-item">
                    <span>Parent / Guardian Name</span>
                    <strong>{{ $student->parent_name }}</strong>
                </div>

                <div class="student-detail-item">
                    <span>Phone Number</span>
                    <strong>{{ $student->parent_phone }}</strong>
                </div>

                <div class="student-detail-item">
                    <span>Email Address</span>
                    <strong>
                        {{ $student->parent_email ?: 'N/A' }}
                    </strong>
                </div>

                <div class="student-detail-item student-detail-full">
                    <span>Address</span>
                    <strong>
                        {{ $student->parent_address ?: 'N/A' }}
                    </strong>
                </div>

            </div>

        </div>


{{-- SCHOOL FEES PAYMENT --}}
<div class="card shadow-sm mb-4">


    <div class="card-body">
        

        <a href="{{ route('admin.students.fees.index', $student->id) }}"
           class="btn btn-success">
            <i class="fa fa-credit-card"></i> View / Record School Fees
        </a>
    </div>

<div class="admin-page">



        {{-- Actions --}}
        <div class="student-profile-actions">

            <a href="{{ route('admin.students.index') }}"
               class="admin-secondary-btn">
                <i class="ti ti-arrow-left"></i>
                Back
            </a>

            <a href="{{ route('admin.students.result', $student->id) }}"
               class="admin-primary-btn">
                <i class="ti ti-report"></i>
                View Result
            </a> 

             <a href="{{ route('admin.students.createResult', $student->id) }}"
               class="admin-primary-btn">
                <i class="ti ti-report"></i>
                Create Result
            </a>

        </div>

    </div>

</div>


{{-- Page CSS --}}
<style>

.student-profile-panel {
    background: #fff;
    border: 1px solid #e5e9e3;
    margin-top: 25px;
}

/* Profile Header */

.student-profile-header {
    display: flex;
    align-items: center;
    gap: 25px;
    padding: 30px;
    background: #f8faf7;
    border-bottom: 1px solid #e5e9e3;
}

.student-profile-photo {
    width: 120px;
    height: 120px;
    flex-shrink: 0;
}

.student-profile-photo img,
.student-profile-placeholder {
    width: 120px;
    height: 120px;
    object-fit: cover;
}

.student-profile-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0f8eb;
    color: #6dcc2c;
    font-size: 45px;
}

.student-profile-info h2 {
    margin: 0 0 8px;
    color: #263746;
    font-family: 'Roboto Slab', Georgia, serif;
    font-size: 25px;
    font-weight: 700;
}

.student-profile-info p {
    margin: 0 0 15px;
    color: #68757e;
    font-size: 13px;
}

.student-profile-info p i {
    color: #6dcc2c;
    margin-right: 5px;
}

.student-profile-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.student-profile-meta span:not(.status-badge) {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 7px 12px;
    background: #fff;
    border: 1px solid #e2e8df;
    color: #68757e;
    font-size: 12px;
}

.student-profile-meta span i {
    color: #6dcc2c;
}


/* Detail Sections */

.student-detail-section {
    padding: 30px;
    border-bottom: 1px solid #e5e9e3;
}

.student-detail-title {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 22px;
}

.student-detail-title i {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0f8eb;
    color: #6dcc2c;
    font-size: 20px;
}

.student-detail-title h3 {
    margin: 0;
    color: #263746;
    font-size: 17px;
    font-weight: 700;
}

.student-detail-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.student-detail-item {
    padding: 15px;
    background: #fafbfa;
    border: 1px solid #edf0eb;
}

.student-detail-item span {
    display: block;
    margin-bottom: 7px;
    color: #8a9499;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.student-detail-item strong {
    display: block;
    color: #263746;
    font-size: 13px;
    font-weight: 600;
    word-break: break-word;
}

.student-detail-full {
    grid-column: 1 / -1;
}


/* Status */

.student-status-active {
    color: #59b91b !important;
}

.student-status-inactive {
    color: #dc3545 !important;
}


/* Bottom Actions */

.student-profile-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 25px 30px;
}


/* Mobile */

@media (max-width: 767px) {

    .student-profile-header {
        flex-direction: column;
        text-align: center;
        padding: 25px 20px;
    }

    .student-profile-info h2 {
        font-size: 21px;
    }

    .student-profile-meta {
        justify-content: center;
    }

    .student-detail-section {
        padding: 20px;
    }

    .student-detail-grid {
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .student-detail-full {
        grid-column: auto;
    }

    .student-profile-actions {
        padding: 20px;
        gap: 10px;
    }

    .student-profile-actions a {
        flex: 1;
        justify-content: center;
    }

}

</style>

@endsection