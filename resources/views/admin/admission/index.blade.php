@extends('admin.layouts.app')

@section('styles')
<style>
/* Admissions table horizontal scrolling */
.admissions-table-scroll {
    display: block;
    width: 100%;
    max-width: 100%;
    overflow-x: auto !important;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
}

/* Keep every column accessible */
.admissions-table-scroll .admin-table {
    width: 100%;
    min-width: 1000px;
    border-collapse: collapse;
    margin-bottom: 0;
}

/* Keep table content readable */
.admissions-table-scroll .admin-table th,
.admissions-table-scroll .admin-table td {
    white-space: nowrap;
    vertical-align: middle;
}

/* Allow student information to wrap naturally */
.admissions-table-scroll .admin-table td:first-child,
.admissions-table-scroll .admin-table td:nth-child(5) {
    white-space: normal;
    min-width: 170px;
}

/* Mobile adjustments */
@media (max-width: 768px) {
    .admissions-table-scroll {
        width: 100%;
        overflow-x: auto !important;
    }

    .admissions-table-scroll .admin-table {
        min-width: 1000px;
    }
}
 </style>
@endsection

@section('content')

<div class="admin-page">

    <div class="admin-page-header">

        <div>
            <h1>Admissions</h1>
            <p>Manage admitted students and admission records.</p>
        </div>

        <a href="{{ route('admin.admissions.applications') }}"
           class="admin-btn">
            <i class="ti ti-file-text"></i>
            Applications
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


    {{-- Filters --}}

    <div class="admin-card">

        <form method="GET"
              action="{{ route('admin.admissions.index') }}"
              class="filter-form">

            <div class="filter-input">

                <i class="ti ti-search"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search name, admission no. or phone..."
                >

            </div>


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


            <input
                type="text"
                name="session"
                value="{{ request('session') }}"
                placeholder="Session e.g. 2026/2027"
            >


            <button type="submit" class="filter-btn">
                Filter
            </button>

            <a href="{{ route('admin.admissions.index') }}"
               class="reset-btn">
                Reset
            </a>

        </form>

    </div>


    {{-- Admissions table --}}

    <div class="admin-card">

        <div class="table-responsive  admissions-table-scroll">

            <table class="admin-table">

                <thead>

                    <tr>
                        <th>Student</th>
                        <th>Admission No.</th>
                        <th>Level</th>
                        <th>Class</th>
                        <th>Parent / Guardian</th>
                        <th>Session</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($admissions as $admission)

                        <tr>

                            <td>

                                <div class="student-info">

                                    @if($admission->student_photo)

                                        <img
                                            src="{{ asset('storage/'.$admission->student_photo) }}"
                                            alt="{{ $admission->first_name }}"
                                        >

                                    @else

                                        <div class="student-avatar">
                                            {{ strtoupper(substr($admission->first_name, 0, 1)) }}
                                        </div>

                                    @endif

                                    <div>

                                        <strong>
                                            {{ $admission->first_name }}
                                            {{ $admission->middle_name }}
                                            {{ $admission->last_name }}
                                        </strong>

                                        <small>
                                            {{ $admission->gender }}
                                        </small>

                                    </div>

                                </div>

                            </td>


                            <td>

                                <span class="admission-number">
                                    {{ $admission->admission_number }}
                                </span>

                            </td>


                            <td>
                                <span class="level-badge">
                                    {{ $admission->level }}
                                </span>
                            </td>


                            <td>
                                {{ $admission->class }}
                            </td>


                            <td>

                                <strong>
                                    {{ $admission->parent_name }}
                                </strong>

                                <small class="table-subtext">
                                    {{ $admission->parent_phone }}
                                </small>

                            </td>


                            <td>
                                {{ $admission->session }}
                            </td>


                            <td>
                                {{ $admission->created_at->format('d M Y') }}
                            </td>


                            <td>

                                {{-- <a href="{{ route('admin.students.show', $admission->id) }}"
                                   class="table-action">
                                    <i class="ti ti-eye"></i>
                                </a> --}}

                               @if(isset($students[$admission->admission_number]))

                                    <a href="{{ route(
                                        'admin.students.show',
                                        $students[$admission->admission_number]->id
                                    ) }}"
                                    class="table-action"
                                    title="View Student">

                                        <i class="ti ti-eye"></i>

                                    </a>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8"
                                class="empty-table">

                                <i class="ti ti-school"></i>

                                <h3>No admissions found</h3>

                                <p>
                                    Admitted students will appear here.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <div class="pagination-wrapper">
            {{ $admissions->links() }}
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
    margin: 5px 0 0;
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
    border-radius: 4px;
}

.admin-btn:hover {
    background: #59b91b;
    color: #fff;
}

.admin-card {
    background: #fff;
    border: 1px solid #e5e9e3;
    margin-bottom: 20px;
    padding: 20px;
}

.filter-form {
    display: grid;
    grid-template-columns: 2fr 1fr 1.2fr auto auto;
    gap: 10px;
}

.filter-form input,
.filter-form select {
    height: 43px;
    border: 1px solid #dfe4df;
    padding: 0 12px;
    outline: none;
    background: #fff;
}

.filter-input {
    position: relative;
}

.filter-input i {
    position: absolute;
    left: 12px;
    top: 13px;
    color: #8a969d;
}

.filter-input input {
    width: 100%;
    padding-left: 38px;
}

.filter-btn,
.reset-btn {
    height: 43px;
    padding: 0 18px;
    border: none;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
}

.filter-btn {
    background: #263746;
    color: #fff;
}

.reset-btn {
    background: #eef1ee;
    color: #263746;
}

.admin-table {
    width: 100%;
    border-collapse: collapse;
}

.admin-table th {
    background: #f6f8f5;
    color: #52616b;
    font-size: 12px;
    text-transform: uppercase;
    padding: 14px;
    text-align: left;
}

.admin-table td {
    padding: 14px;
    border-top: 1px solid #edf0ed;
    color: #52616b;
    font-size: 14px;
}

.student-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.student-info img,
.student-avatar {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    object-fit: cover;
}

.student-avatar {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #eef9e8;
    color: #6dcc2c;
    font-weight: 700;
}

.student-info strong {
    display: block;
    color: #263746;
}

.student-info small,
.table-subtext {
    display: block;
    color: #89949b;
    font-size: 12px;
    margin-top: 3px;
}

.admission-number {
    color: #263746;
    font-weight: 700;
    background: #f2f8ee;
    padding: 6px 9px;
}

.level-badge {
    background: #eef9e8;
    color: #59a91c;
    padding: 5px 9px;
    font-size: 12px;
    font-weight: 600;
}

.table-action {
    width: 34px;
    height: 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #f1f4f1;
    color: #263746;
    text-decoration: none;
}

.table-action:hover {
    background: #6dcc2c;
    color: #fff;
}

.alert-success,
.alert-danger {
    padding: 13px 16px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.alert-success {
    background: #eef9e8;
    color: #4c9917;
}

.alert-danger {
    background: #fff0f0;
    color: #c0392b;
}

.empty-table {
    text-align: center;
    padding: 60px !important;
}

.empty-table i {
    font-size: 40px;
    color: #6dcc2c;
}

.empty-table h3 {
    color: #263746;
    margin: 10px 0 5px;
}

.empty-table p {
    color: #89949b;
}

@media(max-width: 900px) {

    .filter-form {
        grid-template-columns: 1fr 1fr;
    }

}

@media(max-width: 600px) {

    .admin-page {
        padding: 15px;
    }

    .admin-page-header {
        display: block;
    }

    .admin-page-header .admin-btn {
        margin-top: 15px;
    }

    .filter-form {
        grid-template-columns: 1fr;
    }

}

</style>

@endsection