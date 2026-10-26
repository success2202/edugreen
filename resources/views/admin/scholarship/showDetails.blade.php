
@extends('admin.layouts.app')

@section('content')
<div class="scholarship-details-page">

    {{-- Page Header --}}
    <div class="page-header-custom">
        <div>
            <h2>
                <i class="fa fa-graduation-cap"></i>
                Scholarship Application Details
            </h2>
            <p>Review the student's information and manage the application.</p>
        </div>

        <a href="{{ route('admin.scholarship-applications.index') }}"
           class="btn btn-back">
            <i class="fa fa-arrow-left"></i> Back to Applications
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fa fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please correct the following errors:</strong>
            <ul style="margin: 8px 0 0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Application Summary --}}
    <div class="summary-card">
        <div class="summary-icon">
            <i class="fa fa-file-text-o"></i>
        </div>

        <div class="summary-info">
            <span class="summary-label">Application Number</span>
            <h3>{{ $application->application_number }}</h3>
            <p>
                Submitted:
                {{ $application->created_at
                    ? $application->created_at->format('d M Y, h:i A')
                    : 'N/A' }}
            </p>
        </div>

        <div class="summary-status">
            @php
                $status = strtolower($application->status ?? 'pending');
            @endphp

            <span class="status-badge status-{{ $status }}">
                {{ ucfirst($status) }}
            </span>
        </div>
    </div>

    <div class="details-grid">

        {{-- Student Information --}}
        <div class="details-card">
            <div class="card-heading">
                <i class="fa fa-user"></i>
                <h4>Student Information</h4>
            </div>

            <div class="details-content">
                <div class="detail-row">
                    <span>Full Name</span>
                    <strong>
                        {{ $application->first_name }}
                        {{ $application->middle_name }}
                        {{ $application->last_name }}
                    </strong>
                </div>

                <div class="detail-row">
                    <span>Date of Birth</span>
                    <strong>
                        {{ $application->date_of_birth
                            ? \Carbon\Carbon::parse($application->date_of_birth)->format('d M Y')
                            : 'N/A' }}
                    </strong>
                </div>

                <div class="detail-row">
                    <span>Gender</span>
                    <strong>{{ $application->gender ?: 'N/A' }}</strong>
                </div>

                <div class="detail-row">
                    <span>Current School</span>
                    <strong>{{ $application->current_school ?: 'N/A' }}</strong>
                </div>

                <div class="detail-row">
                    <span>Current Class</span>
                    <strong>{{ $application->current_class ?: 'N/A' }}</strong>
                </div>

                <div class="detail-row">
                    <span>Scholarship Programme</span>
                    <strong>{{ $application->scholarship_programme }}</strong>
                </div>
            </div>
        </div>

        {{-- Parent/Guardian Information --}}
        <div class="details-card">
            <div class="card-heading">
                <i class="fa fa-users"></i>
                <h4>Parent / Guardian Information</h4>
            </div>

            <div class="details-content">
                <div class="detail-row">
                    <span>Full Name</span>
                    <strong>{{ $application->parent_guardian_name }}</strong>
                </div>

                <div class="detail-row">
                    <span>Relationship</span>
                    <strong>{{ $application->relationship ?: 'N/A' }}</strong>
                </div>

                <div class="detail-row">
                    <span>Phone Number</span>
                    <strong>
                        @if($application->parent_guardian_phone)
                            <a href="tel:{{ $application->parent_guardian_phone }}">
                                {{ $application->parent_guardian_phone }}
                            </a>
                        @else
                            N/A
                        @endif
                    </strong>
                </div>

                <div class="detail-row">
                    <span>Email Address</span>
                    <strong>
                        @if($application->parent_guardian_email)
                            <a href="mailto:{{ $application->parent_guardian_email }}">
                                {{ $application->parent_guardian_email }}
                            </a>
                        @else
                            N/A
                        @endif
                    </strong>
                </div>

                <div class="detail-row detail-row-block">
                    <span>Residential Address</span>
                    <strong>{{ $application->parent_guardian_address }}</strong>
                </div>
            </div>
        </div>

        {{-- Reason for Applying --}}
        <div class="details-card full-width">
            <div class="card-heading">
                <i class="fa fa-commenting-o"></i>
                <h4>Reason for Applying</h4>
            </div>

            <div class="details-content">
                <p class="application-reason">
                    {{ $application->reason_for_applying ?: 'No reason provided.' }}
                </p>
            </div>
        </div>

        {{-- Uploaded Documents --}}
        <div class="details-card full-width">
            <div class="card-heading">
                <i class="fa fa-folder-open-o"></i>
                <h4>Supporting Documents</h4>
            </div>

            <div class="documents-grid">

                <div class="document-item">
                    <div class="document-icon">
                        <i class="fa fa-file-pdf-o"></i>
                    </div>

                    <div class="document-info">
                        <strong>Academic Result</strong>
                        <p>Student's academic record</p>
                    </div>

                    @if($application->academic_result)
                        <a href="{{ asset($application->academic_result) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-document">
                            <i class="fa fa-eye"></i> View
                        </a>
                    @else
                        <span class="document-missing">Not uploaded</span>
                    @endif
                </div>

                <div class="document-item">
                    <div class="document-icon">
                        <i class="fa fa-id-card-o"></i>
                    </div>

                    <div class="document-info">
                        <strong>Birth Certificate</strong>
                        <p>Proof of date of birth</p>
                    </div>

                    @if($application->birth_certificate)
                        <a href="{{ asset($application->birth_certificate) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-document">
                            <i class="fa fa-eye"></i> View
                        </a>
                    @else
                        <span class="document-missing">Not uploaded</span>
                    @endif
                </div>

            </div>
        </div>

        {{-- Admin Review --}}
        <div class="details-card full-width review-card">
            <div class="card-heading">
                <i class="fa fa-clipboard"></i>
                <h4>Review Application</h4>
            </div>

            <div class="details-content">
                <p class="review-description">
                    Review the submitted information, select the application status,
                    and add any internal notes.
                </p>

                <form action="{{ route('admin.scholarship-applications.update-status', $application->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="status">Application Status <span>*</span></label>

                        <select name="status" id="status" class="form-control" required>
                            <option value="pending"
                                {{ old('status', $application->status) == 'pending' ? 'selected' : '' }}>
                                Pending Review
                            </option>

                            <option value="approved"
                                {{ old('status', $application->status) == 'approved' ? 'selected' : '' }}>
                                Approved
                            </option>

                            <option value="rejected"
                                {{ old('status', $application->status) == 'rejected' ? 'selected' : '' }}>
                                Rejected
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="admin_notes">Admin Notes</label>

                        <textarea name="admin_notes"
                                  id="admin_notes"
                                  rows="5"
                                  class="form-control"
                                  placeholder="Enter review comments or reasons for your decision...">{{ old('admin_notes', $application->admin_notes) }}</textarea>

                        <small>These notes should be treated as internal administrative comments.</small>
                    </div>

                    <div class="review-actions">
                        <a href="{{ route('admin.scholarship-applications.index') }}"
                           class="btn btn-cancel">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-save">
                            <i class="fa fa-save"></i> Save Review
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<style>
.scholarship-details-page {
    padding: 20px;
    color: #26352d;
}

.page-header-custom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 25px;
}

.page-header-custom h2 {
    margin: 0 0 8px;
    color: #176b45;
    font-size: 25px;
    font-weight: 700;
}

.page-header-custom p {
    margin: 0;
    color: #778078;
    font-size: 14px;
}

.btn-back {
    background: #176b45;
    color: #fff;
    padding: 11px 17px;
    border-radius: 7px;
    text-decoration: none;
}

.btn-back:hover,
.btn-save:hover {
    background: #105537;
    color: #fff;
}

.summary-card {
    display: flex;
    align-items: center;
    gap: 18px;
    background: #fff;
    border: 1px solid #e5eee8;
    border-radius: 12px;
    padding: 22px;
    margin-bottom: 24px;
    box-shadow: 0 3px 12px rgba(0, 0, 0, .035);
}

.summary-icon {
    width: 55px;
    height: 55px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #e7f5ec;
    color: #176b45;
    border-radius: 12px;
    font-size: 23px;
}

.summary-info {
    flex: 1;
    min-width: 0;
}

.summary-label {
    color: #78837c;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: .6px;
}

.summary-info h3 {
    margin: 5px 0;
    font-size: 21px;
    font-weight: 700;
    overflow-wrap: anywhere;
}

.summary-info p {
    margin: 0;
    color: #78837c;
    font-size: 13px;
}

.status-badge {
    display: inline-block;
    padding: 7px 13px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 700;
    text-transform: capitalize;
}

.status-pending {
    background: #fff3d5;
    color: #946200;
}

.status-approved {
    background: #dcf5e5;
    color: #176b45;
}

.status-rejected {
    background: #fde5e5;
    color: #b42318;
}

.details-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 22px;
}

.details-card {
    background: #fff;
    border: 1px solid #e5eee8;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(0, 0, 0, .025);
    min-width: 0;
}

.full-width {
    grid-column: 1 / -1;
}

.card-heading {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 17px 20px;
    background: #f5faf6;
    border-bottom: 1px solid #e5eee8;
}

.card-heading i {
    color: #176b45;
    font-size: 18px;
}

.card-heading h4 {
    margin: 0;
    color: #176b45;
    font-size: 16px;
    font-weight: 700;
}

.details-content {
    padding: 20px;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    padding: 13px 0;
    border-bottom: 1px solid #f0f3f1;
}

.detail-row:first-child {
    padding-top: 0;
}

.detail-row:last-child {
    border-bottom: 0;
    padding-bottom: 0;
}

.detail-row span {
    color: #778078;
    font-size: 13px;
    flex-shrink: 0;
}

.detail-row strong {
    text-align: right;
    color: #26352d;
    font-size: 13px;
    overflow-wrap: anywhere;
}

.detail-row strong a {
    color: #176b45;
    text-decoration: none;
}

.detail-row-block {
    flex-direction: column;
    gap: 8px;
}

.detail-row-block strong {
    text-align: left;
}

.application-reason {
    margin: 0;
    white-space: pre-line;
    line-height: 1.8;
    color: #46544b;
    overflow-wrap: anywhere;
}

.documents-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 15px;
    padding: 20px;
}

.document-item {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 16px;
    border: 1px solid #e5eee8;
    border-radius: 9px;
    min-width: 0;
}

.document-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 43px;
    height: 43px;
    flex-shrink: 0;
    border-radius: 8px;
    background: #e7f5ec;
    color: #176b45;
    font-size: 20px;
}

.document-info {
    flex: 1;
    min-width: 0;
}

.document-info strong {
    font-size: 13px;
    display: block;
}

.document-info p {
    margin: 4px 0 0;
    font-size: 12px;
    color: #778078;
}

.btn-document {
    background: #176b45;
    color: #fff;
    padding: 8px 11px;
    border-radius: 6px;
    font-size: 12px;
    white-space: nowrap;
}

.btn-document:hover {
    background: #105537;
    color: #fff;
}

.document-missing {
    font-size: 11px;
    color: #929b94;
    white-space: nowrap;
}

.review-description {
    color: #778078;
    font-size: 13px;
    margin-bottom: 22px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-size: 13px;
    font-weight: 600;
    color: #34443a;
}

.form-group label span {
    color: #d93025;
}

.form-group .form-control {
    width: 100%;
    min-height: 43px;
    border: 1px solid #dce6df;
    border-radius: 7px;
    padding: 10px 12px;
    box-shadow: none;
}

.form-group .form-control:focus {
    border-color: #278553;
    outline: none;
    box-shadow: 0 0 0 3px rgba(39, 133, 83, .1);
}

.form-group small {
    display: block;
    margin-top: 7px;
    color: #849087;
}

.review-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    flex-wrap: wrap;
    padding-top: 10px;
}

.btn-cancel,
.btn-save {
    padding: 11px 20px;
    border-radius: 7px;
    font-weight: 600;
}

.btn-cancel {
    background: #f1f4f2;
    color: #46544b;
}

.btn-save {
    background: #176b45;
    color: #fff;
    border: none;
}

@media (max-width: 767px) {
    .scholarship-details-page {
        padding: 12px;
    }

    .page-header-custom h2 {
        font-size: 21px;
    }

    .summary-card {
        align-items: flex-start;
        flex-wrap: wrap;
        padding: 16px;
    }

    .summary-status {
        width: 100%;
        padding-left: 73px;
    }

    .details-grid,
    .documents-grid {
        grid-template-columns: 1fr;
    }

    .full-width {
        grid-column: auto;
    }

    .details-content {
        padding: 16px;
    }

    .document-item {
        flex-wrap: wrap;
    }

    .document-info {
        min-width: 130px;
    }
}
</style>
@endsection
