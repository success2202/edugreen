 @extends('admin.layouts.app')

@section('content')
<style>
    .scholarship-admin {
        padding: 25px 0;
        color: #26372e;
    }

    .scholarship-admin .page-header-custom {
        background: linear-gradient(135deg, #145c3b, #278553);
        color: #fff;
        padding: 28px 30px;
        border-radius: 14px;
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
        box-shadow: 0 8px 25px rgba(23, 107, 69, .15);
    }

    .scholarship-admin .page-header-custom h2 {
        color: #fff;
        font-size: 25px;
        font-weight: 800;
        margin: 0 0 8px;
    }

    .scholarship-admin .page-header-custom p {
        margin: 0;
        color: rgba(255,255,255,.85);
        line-height: 1.7;
    }

    .scholarship-admin .header-icon {
        width: 60px;
        height: 60px;
        border-radius: 14px;
        background: rgba(255,255,255,.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        flex-shrink: 0;
    }

    .scholarship-admin .summary-card {
        background: #fff;
        border: 1px solid #e8eee9;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(30, 60, 40, .04);
        height: 100%;
    }

    .scholarship-admin .summary-label {
        color: #78867c;
        font-size: 13px;
        margin-bottom: 10px;
    }

    .scholarship-admin .summary-value {
        color: #1c3527;
        font-size: 28px;
        font-weight: 800;
        margin: 0;
    }

    .scholarship-admin .summary-icon {
        width: 43px;
        height: 43px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 19px;
    }

    .scholarship-admin .icon-total {
        color: #176b45;
        background: #e7f5ec;
    }

    .scholarship-admin .icon-pending {
        color: #a66b08;
        background: #fff3d9;
    }

    .scholarship-admin .icon-approved {
        color: #1976d2;
        background: #e7f2ff;
    }

    .scholarship-admin .icon-rejected {
        color: #c0392b;
        background: #fdebea;
    }

    .scholarship-admin .application-panel {
        background: #fff;
        border: 1px solid #e6ece7;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(30, 60, 40, .04);
    }

    .scholarship-admin .panel-heading-custom {
        padding: 22px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
        border-bottom: 1px solid #edf1ee;
    }

    .scholarship-admin .panel-heading-custom h3 {
        font-size: 18px;
        font-weight: 800;
        margin: 0 0 5px;
        color: #203b2b;
    }

    .scholarship-admin .panel-heading-custom p {
        font-size: 13px;
        color: #849087;
        margin: 0;
    }

    .scholarship-admin .search-box {
        position: relative;
        width: 280px;
        max-width: 100%;
    }

    .scholarship-admin .search-box i {
        position: absolute;
        left: 13px;
        top: 15px;
        color: #8b988f;
    }

    .scholarship-admin .search-box input {
        width: 100%;
        height: 43px;
        padding: 10px 12px 10px 36px;
        border: 1px solid #dfe7e1;
        border-radius: 8px;
        outline: none;
        box-shadow: none;
    }

    .scholarship-admin .search-box input:focus {
        border-color: #278553;
    }

    .scholarship-admin .table-responsive {
        border: 0;
        margin: 0;
    }

    .scholarship-admin .application-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .scholarship-admin .application-table thead th {
        background: #f7faf8;
        color: #738176;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .6px;
        padding: 15px 18px;
        border: 0;
        white-space: nowrap;
    }

    .scholarship-admin .application-table tbody td {
        padding: 17px 18px;
        vertical-align: middle;
        border-top: 1px solid #edf1ee;
        font-size: 13px;
    }

    .scholarship-admin .application-table tbody tr:hover {
        background: #fbfdfb;
    }

    .scholarship-admin .applicant-name {
        color: #253a2c;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .scholarship-admin .applicant-email {
        color: #89958d;
        font-size: 12px;
        overflow-wrap: anywhere;
    }

    .scholarship-admin .application-number {
        color: #176b45;
        font-weight: 700;
        font-size: 12px;
    }

    .scholarship-admin .programme-name {
        color: #526358;
        font-weight: 600;
        line-height: 1.6;
    }

    .scholarship-admin .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 30px;
        padding: 7px 11px;
        font-size: 11px;
        font-weight: 800;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .scholarship-admin .status-pending {
        background: #fff3d9;
        color: #946200;
    }

    .scholarship-admin .status-approved {
        background: #e5f5eb;
        color: #176b45;
    }

    .scholarship-admin .status-rejected {
        background: #fdebea;
        color: #b42318;
    }

    .scholarship-admin .status-other {
        background: #edf0f3;
        color: #58636e;
    }

    .scholarship-admin .view-button {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 13px;
        background: #e9f5ed;
        color: #176b45;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        white-space: nowrap;
        transition: .2s ease;
    }

    .scholarship-admin .view-button:hover {
        background: #176b45;
        color: #fff;
        text-decoration: none;
    }

    .scholarship-admin .empty-state {
        text-align: center;
        padding: 55px 20px;
    }

    .scholarship-admin .empty-state-icon {
        width: 75px;
        height: 75px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
        background: #e9f5ed;
        color: #176b45;
        font-size: 30px;
        border-radius: 50%;
    }

    .scholarship-admin .empty-state h4 {
        color: #263d2d;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .scholarship-admin .empty-state p {
        color: #849087;
        margin: 0;
    }

    .scholarship-admin .pagination {
        margin: 0;
    }

    .scholarship-admin .pagination-wrapper {
        padding: 20px 24px;
        border-top: 1px solid #edf1ee;
    }

    .scholarship-admin .results-count {
        color: #7c897f;
        font-size: 12px;
        margin-bottom: 12px;
    }

    @media (max-width: 767px) {
        .scholarship-admin {
            padding: 15px 0;
        }

        .scholarship-admin .page-header-custom {
            padding: 22px 18px;
        }

        .scholarship-admin .page-header-custom h2 {
            font-size: 21px;
        }

        .scholarship-admin .summary-card {
            padding: 16px;
        }

        .scholarship-admin .summary-value {
            font-size: 24px;
        }

        .scholarship-admin .panel-heading-custom {
            padding: 18px;
            align-items: stretch;
        }

        .scholarship-admin .search-box {
            width: 100%;
        }

        .scholarship-admin .application-table thead th,
        .scholarship-admin .application-table tbody td {
            padding: 13px;
        }

        .scholarship-admin .pagination-wrapper {
            padding: 18px;
            overflow-x: auto;
        }
    }


    /* Scholarship applications table horizontal scrolling */
.scholarship-applications-scroll {
    display: block;
    width: 100%;
    max-width: 100%;
    overflow-x: auto !important;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
}

.scholarship-applications-scroll .application-table {
    width: 100%;
    min-width: 1000px;
    border-collapse: collapse;
    margin-bottom: 0;
}

.scholarship-applications-scroll .application-table th,
.scholarship-applications-scroll .application-table td {
    white-space: nowrap;
    vertical-align: middle;
}

/* Allow applicant details to wrap */
.scholarship-applications-scroll .application-table td:first-child {
    white-space: normal;
    min-width: 220px;
}

/* Allow programme names to wrap */
.scholarship-applications-scroll .application-table td:nth-child(3) {
    white-space: normal;
    min-width: 160px;
}

/* Keep the View Details button visible */
.scholarship-applications-scroll .application-table td:last-child {
    min-width: 150px;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .scholarship-applications-scroll {
        width: 100%;
        max-width: 100%;
        overflow-x: auto !important;
    }

    .scholarship-applications-scroll .application-table {
        min-width: 1000px;
    }
}
</style>

<div class="container-fluid scholarship-admin">

    {{-- Page Header --}}
    <div class="page-header-custom">
        <div>
            <h2>
                <i class="fa fa-graduation-cap"></i>
                Scholarship Applications
            </h2>
            <p>Manage, review and track student scholarship applications.</p>
        </div>

        <div class="header-icon">
            <i class="fa fa-file-text-o"></i>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="summary-card">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="summary-label">Total Applications</div>
                        <h3 class="summary-value">{{ $totalApplications ?? $applications->total() }}</h3>
                    </div>
                    <div class="col-xs-4 text-right">
                        <span class="summary-icon icon-total pull-right">
                            <i class="fa fa-files-o"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="summary-card">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="summary-label">Pending Review</div>
                        <h3 class="summary-value">{{ $pendingApplications ?? '—' }}</h3>
                    </div>
                    <div class="col-xs-4 text-right">
                        <span class="summary-icon icon-pending pull-right">
                            <i class="fa fa-clock-o"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="summary-card">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="summary-label">Approved</div>
                        <h3 class="summary-value">{{ $approvedApplications ?? '—' }}</h3>
                    </div>
                    <div class="col-xs-4 text-right">
                        <span class="summary-icon icon-approved pull-right">
                            <i class="fa fa-check-circle"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="summary-card">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="summary-label">Rejected</div>
                        <h3 class="summary-value">{{ $rejectedApplications ?? '—' }}</h3>
                    </div>
                    <div class="col-xs-4 text-right">
                        <span class="summary-icon icon-rejected pull-right">
                            <i class="fa fa-times-circle"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Applications Table --}}
    <div class="application-panel">

        <div class="panel-heading-custom">
            <div>
                <h3>All Applications</h3>
                <p>Review applicant information and application status.</p>
            </div>

            <div class="search-box">
                <i class="fa fa-search"></i>
                <input type="text" id="applicationSearch"
                       placeholder="Search applicants..."
                       aria-label="Search scholarship applications">
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success" style="margin:20px;">
                <i class="fa fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive scholarship-applications-scroll">
            <table class="table application-table" id="applicationsTable">
                <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Application No.</th>
                        <th>Programme</th>
                        <th>Current Class</th>
                        <th>Date Submitted</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($applications as $application)
                        @php
                            $status = strtolower($application->status ?? 'pending');

                            $statusClass = in_array($status, ['pending', 'approved', 'rejected'])
                                ? 'status-' . $status
                                : 'status-other';
                        @endphp

                        <tr class="application-row">
                            <td>
                                <div class="applicant-name">
                                    {{ $application->first_name }}
                                    {{ $application->middle_name }}
                                    {{ $application->last_name }}
                                </div>

                                <div class="applicant-email">
                                    {{ $application->parent_guardian_email ?: 'No email provided' }}
                                </div>
                            </td>

                            <td>
                                <span class="application-number">
                                    {{ $application->application_number }}
                                </span>
                            </td>

                            <td>
                                <div class="programme-name">
                                    {{ $application->scholarship_programme }}
                                </div>
                            </td>

                            <td>{{ $application->current_class }}</td>

                            <td>
                                {{ $application->created_at
                                    ? $application->created_at->format('d M Y')
                                    : '—' }}
                            </td>

                            <td>
                                <span class="status-badge {{ $statusClass }}">
                                    <i class="fa
                                        {{ $status === 'approved' ? 'fa-check-circle' :
                                            ($status === 'rejected' ? 'fa-times-circle' : 'fa-clock-o') }}">
                                    </i>
                                    {{ ucfirst($status) }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('admin.scholarship-applications.show', $application->id) }}"
                                   class="view-button">
                                    <i class="fa fa-eye"></i>
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>

                                    <h4>No Scholarship Applications Yet</h4>

                                    <p>Applications submitted through the website will appear here.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($applications->count())
            <div class="pagination-wrapper">
                <div class="results-count">
                    Showing {{ $applications->firstItem() }}–{{ $applications->lastItem() }}
                    of {{ $applications->total() }} applications
                </div>

                {{ $applications->links() }}
            </div>
        @endif

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('applicationSearch');
    var rows = document.querySelectorAll('#applicationsTable tbody tr.application-row');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            var query = this.value.toLowerCase().trim();

            rows.forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().includes(query)
                    ? ''
                    : 'none';
            });
        });
    }
});
</script>
@endsection