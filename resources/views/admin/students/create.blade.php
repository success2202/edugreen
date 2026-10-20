@extends('admin.layouts.app')

@section('title', 'Add Student')

@section('page-title', 'Add Student')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Add Student</h1>
        <p>Add a new student to the school.</p>
    </div>

    <a href="{{ route('admin.students.index') }}"
       class="admin-secondary-btn">

        <i class="ti ti-arrow-left"></i>
        Back to Students

    </a>

</div>


@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Please correct the following errors:</strong>

        <ul class="mb-0 mt-2">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<div class="admin-form-panel">

    <form action="{{ route('admin.students.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf


        {{-- STUDENT DETAILS --}}

        <div class="form-section-title">

            <i class="ti ti-user"></i>

            Student Details

        </div>


        <div class="admin-form-grid">


            <div class="admin-form-group">

                <label>First Name *</label>

                <input type="text"
                       name="first_name"
                       value="{{ old('first_name') }}"
                       placeholder="First name"
                       required>

            </div>


            <div class="admin-form-group">

                <label>Middle Name</label>

                <input type="text"
                       name="middle_name"
                       value="{{ old('middle_name') }}"
                       placeholder="Middle name">

            </div>


            <div class="admin-form-group">

                <label>Last Name *</label>

                <input type="text"
                       name="last_name"
                       value="{{ old('last_name') }}"
                       placeholder="Last name"
                       required>

            </div>


            {{-- <div class="admin-form-group">

                <label>Admission Number *</label>

                <input type="text"
                       name="admission_number"
                       value="{{ old('admission_number') }}"
                       placeholder="e.g. ADM/2026/001"
                       required>

            </div> --}}


            <div class="admin-form-group">

                <label>Date of Birth</label>

                <input type="date"
                       name="date_of_birth"
                       value="{{ old('date_of_birth') }}">

            </div>


            <div class="admin-form-group">

                <label>Gender *</label>

                <select name="gender" required>

                    <option value="">Select Gender</option>

                    <option value="Male"
                        {{ old('gender') == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ old('gender') == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                </select>

            </div>


            <div class="admin-form-group full">

                <label>Student Photo</label>

                <input type="file"
                       name="image"
                       accept="image/*">

                <small>
                    JPG, PNG or WEBP. Maximum 2MB.
                </small>

            </div>

        </div>


        {{-- ACADEMIC DETAILS --}}

        <div class="form-section-title mt-4">

            <i class="ti ti-school"></i>

            Academic Details

        </div>


        <div class="admin-form-grid">


            <div class="admin-form-group">

                <label>School Level *</label>

                <select name="level" required>

                    <option value="">Select Level</option>

                    <option value="Nursery"
                        {{ old('level') == 'Nursery' ? 'selected' : '' }}>
                        Nursery
                    </option>

                    <option value="Primary"
                        {{ old('level') == 'Primary' ? 'selected' : '' }}>
                        Primary
                    </option>

                    <option value="Secondary"
                        {{ old('level') == 'Secondary' ? 'selected' : '' }}>
                        Secondary
                    </option>

                </select>

            </div>


            <div class="admin-form-group">

                <label>Class *</label>

                <select name="class" required>

                    <option value="">Select Class</option>

                    <option value="Nursery 1">Nursery 1</option>
                    <option value="Nursery 2">Nursery 2</option>

                    <option value="Primary 1">Primary 1</option>
                    <option value="Primary 2">Primary 2</option>
                    <option value="Primary 3">Primary 3</option>
                    <option value="Primary 4">Primary 4</option>
                    <option value="Primary 5">Primary 5</option>
                    <option value="Primary 6">Primary 6</option>

                    <option value="JSS 1">JSS 1</option>
                    <option value="JSS 2">JSS 2</option>
                    <option value="JSS 3">JSS 3</option>

                    <option value="SS 1">SS 1</option>
                    <option value="SS 2">SS 2</option>
                    <option value="SS 3">SS 3</option>

                </select>

            </div>


            <div class="admin-form-group">

                <label>Admission Date</label>

                <input type="date"
                       name="admission_date"
                       value="{{ old('admission_date') }}">

            </div>


            <div class="admin-form-group">

                <label>Status</label>

                <select name="status">

                    <option value="1"
                        {{ old('status', '1') == '1' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ old('status') == '0' ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

            </div>

        </div>


        {{-- PARENT DETAILS --}}

        <div class="form-section-title mt-4">

            <i class="ti ti-users"></i>

            Parent / Guardian Details

        </div>


        <div class="admin-form-grid">


            <div class="admin-form-group">

                <label>Parent / Guardian Name *</label>

                <input type="text"
                       name="parent_name"
                       value="{{ old('parent_name') }}"
                       placeholder="Full name"
                       required>

            </div>


            <div class="admin-form-group">

                <label>Phone Number *</label>

                <input type="text"
                       name="parent_phone"
                       value="{{ old('parent_phone') }}"
                       placeholder="08012345678"
                       required>

            </div>


            <div class="admin-form-group">

                <label>Email</label>

                <input type="email"
                       name="parent_email"
                       value="{{ old('parent_email') }}"
                       placeholder="parent@example.com">

            </div>


            <div class="admin-form-group full">

                <label>Address</label>

                <textarea name="parent_address"
                          rows="4"
                          placeholder="Parent / guardian address...">{{ old('parent_address') }}</textarea>

            </div>

        </div>


        <div class="admin-form-footer">

            <a href="{{ route('admin.students.index') }}"
               class="admin-secondary-btn">

                Cancel

            </a>


            <button type="submit"
                    class="admin-primary-btn">

                <i class="ti ti-device-floppy"></i>

                Save Student

            </button>

        </div>


    </form>

</div>

@endsection