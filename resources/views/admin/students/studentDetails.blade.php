@extends('admin.layouts.app')

@section('title', 'Student Details')

@section('page-title', 'Student Details')

@section('styles')


@endsection

@section('content')


<div class="admin-page-header">

    <div>
        <h1>Student Details</h1>
        <p>View student information and academic results.</p>
    </div>

    <a href="{{ route('admin.students.index') }}"
       class="admin-secondary-btn">

        <i class="ti ti-arrow-left"></i>
        Back to Students

    </a>

</div>


<div class="admin-panel">

    <div class="student-profile">

        <div class="student-profile-image">

            @if($student->image)

                <img src="{{ asset('storage/' . $student->image) }}"
                     alt="{{ $student->first_name }}">

            @else

                <div class="student-default-image">

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
                Admission No:
                <strong>{{ $student->admission_number }}</strong>
            </p>

            <span class="status-badge active">
                {{ $student->status ? 'Active' : 'Inactive' }}
            </span>

        </div>

    </div>

    


    <div class="form-section-title mt-4">

        <i class="ti ti-school"></i>
        Academic Information

    </div>


    <div class="admin-form-grid">

        <div class="admin-form-group">

            <label>School Level</label>

            <strong>{{ $student->level }}</strong>

        </div>


        <div class="admin-form-group">

            <label>Class</label>

            <strong>{{ $student->class }}</strong>

        </div>


        <div class="admin-form-group">

            <label>Gender</label>

            <strong>{{ $student->gender }}</strong>

        </div>


        <div class="admin-form-group">

            <label>Admission Date</label>

            <strong>
                {{ optional($student->admission_date)->format('d M Y') }}
            </strong>

        </div>

    </div>


    <div class="form-section-title mt-4">

        <i class="ti ti-users"></i>
        Parent / Guardian

    </div>


    <div class="admin-form-grid">

        <div class="admin-form-group">

            <label>Name</label>

            <strong>
                {{ $student->parent_name }}
            </strong>

        </div>


        <div class="admin-form-group">

            <label>Phone</label>

            <strong>
                {{ $student->parent_phone }}
            </strong>

        </div>


        <div class="admin-form-group">

            <label>Email</label>

            <strong>
                {{ $student->parent_email ?? 'N/A' }}
            </strong>

        </div>


        <div class="admin-form-group full">

            <label>Address</label>

            <strong>
                {{ $student->parent_address ?? 'N/A' }}
            </strong>

        </div>

    </div>


    <div class="admin-form-footer">

        <a href="{{ route('admin.students.edit', $student->id) }}"
           class="admin-secondary-btn">

            <i class="ti ti-edit"></i>
            Edit Student

        </a>


        <a href="{{ route('admin.students.result', $student->id) }}"
           class="admin-primary-btn">

            <i class="ti ti-report-analytics"></i>
            View Result

        </a>

    </div>

</div>

@endsection