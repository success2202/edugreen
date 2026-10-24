@extends('admin.layouts.app')

@section('title', 'Students')

@section('page-title', 'Students')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Students</h1>
        <p>Manage students, classes and academic information.</p>
    </div>

    <a href="{{ route('admin.students.create') }}"
       class="admin-primary-btn">

        <i class="ti ti-user-plus"></i>
        Add Student

    </a>

</div>


{{-- Success Message --}}

@if(session('success'))

    <div class="alert alert-success">
        <i class="ti ti-check"></i>
        {{ session('success') }}
    </div>

@endif


{{-- Search & Filters --}}

<div class="admin-panel">

    <div class="admin-table-header">

        <div>
            <h3>Student List</h3>
            <p>Search and filter students.</p>
        </div>

    </div>


    <form action="{{ route('admin.students.index') }}"
          method="GET"
           class="student-search-form">

        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Search student name or admission number...">


        <select name="level">

            <option value="">
                All School Levels
            </option>

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


        <select name="class">

            <option value="">
                All Classes
            </option>

            <option value="Nursery 1"
                {{ request('class') == 'Nursery 1' ? 'selected' : '' }}>
                Nursery 1
            </option>

            <option value="Nursery 2"
                {{ request('class') == 'Nursery 2' ? 'selected' : '' }}>
                Nursery 2
            </option>

            <option value="Primary 1"
                {{ request('class') == 'Primary 1' ? 'selected' : '' }}>
                Primary 1
            </option>

            <option value="Primary 2"
                {{ request('class') == 'Primary 2' ? 'selected' : '' }}>
                Primary 2
            </option>

            <option value="Primary 3"
                {{ request('class') == 'Primary 3' ? 'selected' : '' }}>
                Primary 3
            </option>

            <option value="Primary 4"
                {{ request('class') == 'Primary 4' ? 'selected' : '' }}>
                Primary 4
            </option>

            <option value="Primary 5"
                {{ request('class') == 'Primary 5' ? 'selected' : '' }}>
                Primary 5
            </option>

            <option value="Primary 6"
                {{ request('class') == 'Primary 6' ? 'selected' : '' }}>
                Primary 6
            </option>

            <option value="JSS 1"
                {{ request('class') == 'JSS 1' ? 'selected' : '' }}>
                JSS 1
            </option>

            <option value="JSS 2"
                {{ request('class') == 'JSS 2' ? 'selected' : '' }}>
                JSS 2
            </option>

            <option value="JSS 3"
                {{ request('class') == 'JSS 3' ? 'selected' : '' }}>
                JSS 3
            </option>

            <option value="SS 1"
                {{ request('class') == 'SS 1' ? 'selected' : '' }}>
                SS 1
            </option>

            <option value="SS 2"
                {{ request('class') == 'SS 2' ? 'selected' : '' }}>
                SS 2
            </option>

            <option value="SS 3"
                {{ request('class') == 'SS 3' ? 'selected' : '' }}>
                SS 3
            </option>

        </select>


        <select name="status">

            <option value="">
                All Status
            </option>

            <option value="1"
                {{ request('status') === '1' ? 'selected' : '' }}>
                Active
            </option>

            <option value="0"
                {{ request('status') === '0' ? 'selected' : '' }}>
                Inactive
            </option>

        </select>


      <button type="submit"
        class="student-search-btn">

    <i class="ti ti-search"></i>
    Search

</button>


        <a href="{{ route('admin.students.index') }}"
   class="student-reset-btn admin-secondary-btn">

    Reset

</a>

    </form>
{{-- 
<p class="text-muted">
    School Fees Status:
    {{ $currentSession ?? 'Session not configured' }}
    &mdash;
    {{ $currentTerm ?? 'Term not configured' }}
</p> --}}
    {{-- Student Table --}}

    <div class="table-responsive">

        <table class="admin-table">

            <thead>

                <tr>

                    <th>Student</th>

                    <th>Admission No.</th>

                    <th>School Level</th>

                    <th>Class</th>

                    <th>Gender</th>

                    <th>Parent / Guardian</th>

                    <th>School Fees (Current Term)</th>

                    <th>Status</th>

                    <th>Actions</th>

                </tr>

            </thead>


            <tbody>

                @forelse($students as $student)

                    <tr>

                        <td>

                            <div class="table-user">

                                @if($student->image)

                                    <img src="{{ asset('frontend/assets/students/' . $student->image) }}"
                                         class="table-avatar"
                                         alt="{{ $student->first_name }}">

                                @else

                                    <div class="table-avatar">
                                        <i class="ti ti-user"></i>
                                    </div>

                                @endif


                                <div>

                                    <strong>
                                        {{ $student->first_name }}
                                        {{ $student->middle_name }}
                                        {{ $student->last_name }}
                                    </strong>

                                    <small>
                                        {{ $student->email ?? 'No email' }}
                                    </small>

                                </div>

                            </div>

                        </td>


                        <td>
                            {{ $student->admission_number }}
                        </td>


                        <td>
                            {{ $student->level }}
                        </td>


                        <td>
                            {{ $student->class }}
                        </td>


                        <td>
                            {{ $student->gender }}
                        </td>


                        <td>

                            {{ $student->parent_name }}

                            <small class="d-block">
                                {{ $student->parent_phone }}
                            </small>

                        </td>

                    <td>
                        @if($currentSession && $currentTerm && $student->school_fee_status === 'paid')
                            <span class="badge bg-success">Paid</span>
                        @else
                            <span class="badge bg-danger">Unpaid</span>
                        @endif
                    </td>
                        <td>

                            @if($student->status)

                                <span class="status-badge active">
                                    Active
                                </span>

                            @else

                                <span class="status-badge inactive">
                                    Inactive
                                </span>

                            @endif

                        </td>


                        <td>

                            <div class="table-actions">

                                <a href="{{ route('admin.students.show', $student->id) }}"
                                   class="action-btn"
                                   title="View">

                                    <i class="ti ti-eye"></i>

                                </a>


                                <a href="{{ route('admin.students.edit', $student->id) }}"
                                   class="action-btn"
                                   title="Edit">

                                    <i class="ti ti-edit"></i>

                                </a>


                                <form action="{{ route('admin.students.destroy', $student->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this student?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="action-btn text-danger"
                                            title="Delete">

                                        <i class="ti ti-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8">

                            <div class="empty-table">

                                <i class="ti ti-users"></i>

                                <h4>No Students Found</h4>

                                <p>
                                    No students have been added yet.
                                </p>

                                <a href="{{ route('admin.students.create') }}"
                                   class="admin-primary-btn">

                                    <i class="ti ti-user-plus"></i>
                                    Add Student

                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}

    @if(method_exists($students, 'links'))

        <div class="mt-4">

            {{ $students->withQueryString()->links() }}

        </div>

    @endif

</div>

@endsection