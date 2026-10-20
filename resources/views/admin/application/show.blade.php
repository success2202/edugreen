@extends('admin.layouts.app')

@section('content')

<div class="admin-page">

    <div class="admin-page-header">

        <div>
            <h1>Application Details</h1>
            <p>Review applicant information and process admission.</p>
        </div>

        <a href="{{ route('admin.admissions.applications') }}"
           class="admin-btn secondary">
            <i class="ti ti-arrow-left"></i>
            Back to Applications
        </a>

    </div>


    @if(session('success'))

        <div class="alert-success">
            <i class="ti ti-circle-check"></i>
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="alert-danger">
            <i class="ti ti-alert-circle"></i>
            {{ session('error') }}
        </div>

    @endif


    <div class="application-grid">


        {{-- Student --}}

        <div class="admin-card">

            <div class="card-title">
                <i class="ti ti-user"></i>
                Student Information
            </div>


            <div class="profile-center">

                @if($application->student_photo)

                    <img
                        src="{{ asset('storage/'.$application->student_photo) }}"
                        class="profile-photo"
                    >

                @else

                    <div class="profile-placeholder">
                        <i class="ti ti-user"></i>
                    </div>

                @endif

                <h2>
                    {{ $application->first_name }}
                    {{ $application->middle_name }}
                    {{ $application->last_name }}
                </h2>

                <span class="status {{ strtolower($application->status) }}">
                    {{ $application->status }}
                </span>

            </div>


            <div class="info-grid">

                <div>
                    <label>Date of Birth</label>
                    <strong>
                        {{ $application->date_of_birth->format('d M Y') }}
                    </strong>
                </div>

                <div>
                    <label>Gender</label>
                    <strong>{{ $application->gender }}</strong>
                </div>

                <div>
                    <label>School Level</label>
                    <strong>{{ $application->level }}</strong>
                </div>

                <div>
                    <label>Class</label>
                    <strong>{{ $application->class }}</strong>
                </div>

                <div>
                    <label>Previous School</label>
                    <strong>
                        {{ $application->previous_school ?: 'Not provided' }}
                    </strong>
                </div>

                <div>
                    <label>Session</label>
                    <strong>{{ $application->session }}</strong>
                </div>

            </div>

        </div>


        {{-- Parent --}}

        <div class="admin-card">

            <div class="card-title">
                <i class="ti ti-users"></i>
                Parent / Guardian
            </div>

            <div class="info-list">

                <div>
                    <label>Name</label>
                    <strong>{{ $application->parent_name }}</strong>
                </div>

                <div>
                    <label>Relationship</label>
                    <strong>{{ $application->relationship }}</strong>
                </div>

                <div>
                    <label>Phone</label>
                    <strong>{{ $application->parent_phone }}</strong>
                </div>

                <div>
                    <label>Email</label>
                    <strong>
                        {{ $application->parent_email ?: 'Not provided' }}
                    </strong>
                </div>

                <div>
                    <label>Address</label>
                    <strong>{{ $application->parent_address }}</strong>
                </div>

            </div>

        </div>


        {{-- Application --}}

        <div class="admin-card">

            <div class="card-title">
                <i class="ti ti-file-text"></i>
                Application Information
            </div>

            <div class="info-list">

                <div>
                    <label>Referral Source</label>
                    <strong>
                        {{ $application->referral_source ?: 'Not provided' }}
                    </strong>
                </div>

                <div>
                    <label>Date Applied</label>
                    <strong>
                        {{ $application->created_at->format('d M Y h:i A') }}
                    </strong>
                </div>

                <div>
                    <label>Message</label>
                    <strong>
                        {{ $application->message ?: 'No additional message.' }}
                    </strong>
                </div>

            </div>

        </div>


        {{-- Actions --}}

        <div class="admin-card">

            <div class="card-title">
                <i class="ti ti-settings"></i>
                Application Actions
            </div>


            <form
                action="{{ route('admin.admissions.applications.updateStatus', $application->id) }}"
                method="POST"
                class="status-form"
            >

                @csrf
                @method('PUT')

                <label>Application Status</label>

                <select name="status">

                    <option value="Pending"
                        {{ $application->status == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Reviewed"
                        {{ $application->status == 'Reviewed' ? 'selected' : '' }}>
                        Reviewed
                    </option>

                    <option value="Accepted"
                        {{ $application->status == 'Accepted' ? 'selected' : '' }}>
                        Accepted
                    </option>

                    <option value="Rejected"
                        {{ $application->status == 'Rejected' ? 'selected' : '' }}>
                        Rejected
                    </option>

                </select>

                <button type="submit" class="update-btn">
                    Update Status
                </button>

            </form>


            @if(!$application->admission_number)

                <div class="admit-box">

                    <div>

                        <strong>Ready for Admission?</strong>

                        <p>
                            Admit this applicant and automatically generate
                            an admission number.
                        </p>

                    </div>


                    <form
                        action="{{ route('admin.admissions.applications.admitApplicant', $application->id) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to admit this student?');"
                    >

                        @csrf

                        <button type="submit" class="admit-btn">

                            <i class="ti ti-school"></i>

                            Admit Student

                        </button>

                    </form>

                </div>

            @else

                <div class="admitted-box">

                    <i class="ti ti-circle-check"></i>

                    <div>

                        <strong>Student Admitted</strong>

                        <p>
                            Admission Number:
                            <b>{{ $application->admission_number }}</b>
                        </p>

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>


<style>

.admin-page {
    padding: 30px;
}

.admin-page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.admin-page-header h1 {
    color: #263746;
    font-family: "Roboto Slab", serif;
    margin: 0;
}

.admin-page-header p {
    color: #68757e;
}

.admin-btn {
    background: #6dcc2c;
    color: #fff;
    padding: 11px 18px;
    text-decoration: none;
}

.admin-btn.secondary {
    background: #263746;
}

.application-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.admin-card {
    background: #fff;
    border: 1px solid #e5e9e3;
    padding: 25px;
}

.card-title {
    color: #263746;
    font-weight: 700;
    border-bottom: 1px solid #edf0ed;
    padding-bottom: 15px;
    margin-bottom: 20px;
    display: flex;
    gap: 8px;
}

.card-title i {
    color: #6dcc2c;
}

.profile-center {
    text-align: center;
    margin-bottom: 25px;
}

.profile-photo,
.profile-placeholder {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 10px;
}

.profile-placeholder {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #eef9e8;
    color: #6dcc2c;
    font-size: 40px;
}

.profile-center h2 {
    color: #263746;
    margin: 5px 0 10px;
    font-family: "Roboto Slab", serif;
}

.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.info-grid label,
.info-list label {
    display: block;
    font-size: 11px;
    color: #89949b;
    text-transform: uppercase;
    margin-bottom: 4px;
}

.info-grid strong,
.info-list strong {
    color: #263746;
    font-size: 14px;
}

.info-list {
    display: grid;
    gap: 18px;
}

.status {
    display: inline-block;
    padding: 5px 10px;
    font-size: 11px;
    font-weight: 700;
}

.status.pending {
    background: #fff7df;
    color: #b78300;
}

.status.reviewed {
    background: #edf5ff;
    color: #3575b9;
}

.status.accepted {
    background: #eef9e8;
    color: #4c9d18;
}

.status.rejected {
    background: #fff0f0;
    color: #c0392b;
}

.status-form label {
    display: block;
    margin-bottom: 7px;
    color: #52616b;
    font-size: 13px;
    font-weight: 600;
}

.status-form select {
    width: 100%;
    height: 43px;
    border: 1px solid #dfe4df;
    padding: 0 12px;
    margin-bottom: 10px;
}

.update-btn {
    border: none;
    background: #263746;
    color: #fff;
    padding: 10px 18px;
}

.admit-box {
    margin-top: 25px;
    padding: 18px;
    background: #f6faf3;
    border: 1px solid #dcebd3;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.admit-box strong {
    color: #263746;
}

.admit-box p {
    color: #68757e;
    font-size: 13px;
    margin: 5px 0 0;
}

.admit-btn {
    border: none;
    background: #6dcc2c;
    color: #fff;
    padding: 11px 17px;
    font-weight: 700;
    white-space: nowrap;
}

.admitted-box {
    margin-top: 25px;
    padding: 18px;
    background: #eef9e8;
    display: flex;
    align-items: center;
    gap: 12px;
}

.admitted-box > i {
    color: #6dcc2c;
    font-size: 30px;
}

.admitted-box strong {
    color: #263746;
}

.admitted-box p {
    margin: 4px 0 0;
    color: #68757e;
}

.alert-success,
.alert-danger {
    padding: 13px 16px;
    margin-bottom: 20px;
}

.alert-success {
    background: #eef9e8;
    color: #4c9917;
}

.alert-danger {
    background: #fff0f0;
    color: #c0392b;
}

@media(max-width: 800px) {

    .admin-page {
        padding: 15px;
    }

    .admin-page-header {
        display: block;
    }

    .admin-btn {
        display: inline-block;
        margin-top: 15px;
    }

    .application-grid {
        grid-template-columns: 1fr;
    }

}

@media(max-width: 500px) {

    .info-grid {
        grid-template-columns: 1fr;
    }

    .admit-box {
        display: block;
    }

    .admit-btn {
        margin-top: 15px;
        width: 100%;
    }

}

</style>

@endsection