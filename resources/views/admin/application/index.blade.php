@extends('admin.layouts.app')

@section('content')

<div class="admin-page">

    <div class="admin-page-header">

        <div>
            <h1>Admission Applications</h1>
            <p>Review and process student applications.</p>
        </div>

        <a href="{{ route('admin.admissions.applications') }}"
           class="admin-btn">
            <i class="ti ti-school"></i>
            Admissions
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


    <div class="admin-card">

        <form method="GET"
              action="{{ route('admin.admissions.applications') }}"
              class="filter-form">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search applicant name or phone..."
            >

            <select name="level">

                <option value="">All Levels</option>

                <option value="Nursery"
                    {{ request('level') == 'Nursery' ? 'selected' : '' }}>
                    Nursery
                </option>

                <option value="Primary"
                    {{ request('level') == 'Primary' ? 'selected' : '' }}>
                    Primary
                </option>

                <option value="Secondary"
                    {{ request('level') == 'Secondary' ? 'selected' : '' }}>
                    Secondary
                </option>

            </select>


            <select name="status">

                <option value="">All Status</option>

                <option value="Pending"
                    {{ request('status') == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Reviewed"
                    {{ request('status') == 'Reviewed' ? 'selected' : '' }}>
                    Reviewed
                </option>

                <option value="Accepted"
                    {{ request('status') == 'Accepted' ? 'selected' : '' }}>
                    Accepted
                </option>

                <option value="Rejected"
                    {{ request('status') == 'Rejected' ? 'selected' : '' }}>
                    Rejected
                </option>

            </select>


            <button type="submit" class="filter-btn">
                Filter
            </button>

        </form>

    </div>


    <div class="admin-card">

        <div class="table-responsive">

            <table class="admin-table">

                <thead>

                    <tr>
                        <th>Applicant</th>
                        <th>Level</th>
                        <th>Class</th>
                        <th>Parent / Guardian</th>
                        <th>Session</th>
                        <th>Status</th>
                        <th>Applied</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($applications as $application)

                        <tr>

                            <td>

                                <div class="student-info">

                                    @if($application->student_photo)

                                        <img
                                            src="{{ asset('storage/'.$application->student_photo) }}"
                                            alt="{{ $application->first_name }}"
                                        >

                                    @else

                                        <div class="student-avatar">
                                            {{ strtoupper(substr($application->first_name, 0, 1)) }}
                                        </div>

                                    @endif

                                    <div>

                                        <strong>
                                            {{ $application->first_name }}
                                            {{ $application->middle_name }}
                                            {{ $application->last_name }}
                                        </strong>

                                        <small>
                                            {{ $application->parent_phone }}
                                        </small>

                                    </div>

                                </div>

                            </td>


                            <td>{{ $application->level }}</td>

                            <td>{{ $application->class }}</td>

                            <td>{{ $application->parent_name }}</td>

                            <td>{{ $application->session }}</td>


                            <td>

                                @if($application->status === 'Pending')

                                    <span class="status pending">
                                        Pending
                                    </span>

                                @elseif($application->status === 'Reviewed')

                                    <span class="status reviewed">
                                        Reviewed
                                    </span>

                                @elseif($application->status === 'Accepted')

                                    <span class="status accepted">
                                        Accepted
                                    </span>

                                @else

                                    <span class="status rejected">
                                        Rejected
                                    </span>

                                @endif

                            </td>


                            <td>
                                {{ $application->created_at->format('d M Y') }}
                            </td>


                            <td>

                                <a href="{{ route('admin.admissions.applications.show', $application->id) }}"
                                   class="table-action">
                                    <i class="ti ti-eye"></i>
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8"
                                class="empty-table">

                                <i class="ti ti-file-text"></i>

                                <h3>No applications found</h3>

                                <p>
                                    New applications will appear here.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <div class="pagination-wrapper">
            {{ $applications->links() }}
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
    margin: 0;
    color: #263746;
    font-family: "Roboto Slab", serif;
}

.admin-page-header p {
    color: #68757e;
}

.admin-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #6dcc2c;
    color: #fff;
    padding: 11px 18px;
    text-decoration: none;
    font-weight: 600;
}

.admin-card {
    background: #fff;
    border: 1px solid #e5e9e3;
    padding: 20px;
    margin-bottom: 20px;
}

.filter-form {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr auto;
    gap: 10px;
}

.filter-form input,
.filter-form select {
    height: 43px;
    border: 1px solid #dfe4df;
    padding: 0 12px;
}

.filter-btn {
    border: 0;
    background: #263746;
    color: #fff;
    padding: 0 20px;
}

.admin-table {
    width: 100%;
    border-collapse: collapse;
}

.admin-table th {
    background: #f6f8f5;
    padding: 14px;
    font-size: 12px;
    text-align: left;
    color: #52616b;
}

.admin-table td {
    padding: 14px;
    border-top: 1px solid #edf0ed;
}

.student-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.student-info img,
.student-avatar {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    object-fit: cover;
}

.student-avatar {
    background: #eef9e8;
    color: #6dcc2c;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.student-info strong {
    display: block;
    color: #263746;
}

.student-info small {
    color: #89949b;
}

.status {
    display: inline-block;
    padding: 5px 9px;
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

.table-action {
    display: inline-flex;
    width: 34px;
    height: 34px;
    align-items: center;
    justify-content: center;
    background: #f1f4f1;
    color: #263746;
    text-decoration: none;
}

.empty-table {
    text-align: center;
    padding: 60px !important;
}

.empty-table i {
    font-size: 40px;
    color: #6dcc2c;
}

@media(max-width: 800px) {

    .filter-form {
        grid-template-columns: 1fr;
    }

    .admin-page {
        padding: 15px;
    }

    .admin-page-header {
        display: block;
    }

    .admin-btn {
        margin-top: 15px;
    }

}

</style>

@endsection