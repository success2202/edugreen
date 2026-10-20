@extends('admin.layouts.app')

@section('title', 'Edit Student')

@section('page-title', 'Edit Student')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Edit Student</h1>
        <p>Update student information and academic details.</p>
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

    <form action="{{ route('admin.students.update', $student->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="form-section-title">

            <i class="ti ti-user"></i>
            Student Details

        </div>


        <div class="admin-form-grid">


            <div class="admin-form-group">

                <label>First Name *</label>

                <input type="text"
                       name="first_name"
                       value="{{ old('first_name', $student->first_name) }}"
                       required>

            </div>


            <div class="admin-form-group">

                <label>Middle Name</label>

                <input type="text"
                       name="middle_name"
                       value="{{ old('middle_name', $student->middle_name) }}">

            </div>


            <div class="admin-form-group">

                <label>Last Name *</label>

                <input type="text"
                       name="last_name"
                       value="{{ old('last_name', $student->last_name) }}"
                       required>

            </div>


            <div class="admin-form-group">

                <label>Admission Number *</label>

                <input type="text"
                       name="admission_number"
                       value="{{ old('admission_number', $student->admission_number) }}"
                       required>

            </div>


            <div class="admin-form-group">

                <label>Date of Birth</label>

                <input type="date"
                       name="date_of_birth"
                       value="{{ old('date_of_birth', optional($student->date_of_birth)->format('Y-m-d')) }}">

            </div>


            <div class="admin-form-group">

                <label>Gender *</label>

                <select name="gender" required>

                    <option value="Male"
                        {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                </select>

            </div>


            <div class="admin-form-group full">

                <label>Student Photo</label>

                @if($student->image)

                    <div class="mb-3">

                        <img src="{{ asset('storage/' . $student->image) }}"
                             style="width:90px;height:90px;object-fit:cover;"
                             alt="Student">

                    </div>

                @endif

                <input type="file"
                       name="image"
                       accept="image/*">

                <small>
                    Leave empty to keep the current photo.
                </small>

            </div>

        </div>


        <div class="form-section-title mt-4">

            <i class="ti ti-school"></i>
            Academic Details

        </div>


        <div class="admin-form-grid">


            <div class="admin-form-group">

                <label>School Level *</label>

                <select name="level" required>

                    <option value="Nursery"
                        {{ old('level', $student->level) == 'Nursery' ? 'selected' : '' }}>
                        Nursery
                    </option>

                    <option value="Primary"
                        {{ old('level', $student->level) == 'Primary' ? 'selected' : '' }}>
                        Primary
                    </option>

                    <option value="Secondary"
                        {{ old('level', $student->level) == 'Secondary' ? 'selected' : '' }}>
                        Secondary
                    </option>

                </select>

            </div>


            <div class="admin-form-group">

                <label>Class *</label>

                <input type="text"
                       name="class"
                       value="{{ old('class', $student->class) }}"
                       placeholder="e.g. JSS 2"
                       required>

            </div>


            <div class="admin-form-group">

                <label>Admission Date</label>

                <input type="date"
                       name="admission_date"
                       value="{{ old('admission_date', optional($student->admission_date)->format('Y-m-d')) }}">

            </div>


            <div class="admin-form-group">

                <label>Status</label>

                <select name="status">

                    <option value="1"
                        {{ old('status', $student->status) == 1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ old('status', $student->status) == 0 ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

            </div>

        </div>


        <div class="form-section-title mt-4">

            <i class="ti ti-users"></i>
            Parent / Guardian Details

        </div>


        <div class="admin-form-grid">


            <div class="admin-form-group">

                <label>Parent / Guardian Name *</label>

                <input type="text"
                       name="parent_name"
                       value="{{ old('parent_name', $student->parent_name) }}"
                       required>

            </div>


            <div class="admin-form-group">

                <label>Phone Number *</label>

                <input type="text"
                       name="parent_phone"
                       value="{{ old('parent_phone', $student->parent_phone) }}"
                       required>

            </div>


            <div class="admin-form-group">

                <label>Email</label>

                <input type="email"
                       name="parent_email"
                       value="{{ old('parent_email', $student->parent_email) }}">

            </div>


            <div class="admin-form-group full">

                <label>Address</label>

                <textarea name="parent_address"
                          rows="4">{{ old('parent_address', $student->parent_address) }}</textarea>

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
                Update Student

            </button>

        </div>

    </form>

</div>

@endsection