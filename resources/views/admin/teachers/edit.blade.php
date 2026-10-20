@extends('admin.layouts.app')

@section('title', 'Add Teacher')

@section('page-title', 'Add Teacher')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Add Teacher</h1>
        <p>Add a new teacher to your school.</p>
    </div>

    <a href="{{ route('admin.teachers.index') }}"
       class="admin-secondary-btn">

        <i class="ti ti-arrow-left"></i>
        Back to Teachers

    </a>

</div>


<div class="admin-form-panel">

    <form action="{{ route('admin.teachers.update', $teacher->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
 @method('PUT')

        <div class="form-section-title">
            <i class="ti ti-user"></i>
            Personal Information
        </div>


        <div class="admin-form-grid">

            <div class="admin-form-group">

                <label>
                    Full Name
                </label>

                <input type="text"
                       name="name"
                       placeholder="Enter teacher's full name"
                       value="{{ old('name',$teacher->name) }}"
                       required>

            </div>


            <div class="admin-form-group">

                <label>
                    Email Address
                </label>

                <input type="email"
                       name="email"
                       placeholder="teacher@example.com"
                       value="{{ old('email', $teacher->email) }}">

            </div>


            <div class="admin-form-group">

                <label>
                    Phone Number
                </label>

                <input type="text"
                       name="phone"
                       placeholder="+234 800 000 0000"
                       value="{{ old('phone', $teacher->phone) }}">

            </div>


            <div class="admin-form-group">

                <label>
                    Gender
                </label>

                <select name="gender">

                    <option value="">
                        Select Gender
                    </option>

                    <option value="Male">
                        Male
                    </option>

                    <option value="Female">
                        Female
                    </option>

                </select>

            </div>

        </div>


        <div class="form-section-title">

            <i class="ti ti-book"></i>

            Professional Information

        </div>


        <div class="admin-form-grid">

            <div class="admin-form-group">

                <label>
                    Subject
                </label>

                <input type="text"
                       name="subject"
                       placeholder="e.g. Mathematics"
                       value="{{ old('subject', $teacher->subject) }}"
                       required>

            </div>


            <div class="admin-form-group">

                <label>
                    Academic Level
                </label>

                <select name="academic_level">

                    <option value="">
                        Select Level
                    </option>

                    <option value="Nursery">
                        Nursery
                    </option>

                    <option value="Primary">
                        Primary
                    </option>

                    <option value="Secondary">
                        Secondary
                    </option>

                </select>
              

            </div>


            <div class="admin-form-group full">

                <label>
                    Qualification
                </label>

                <input type="text"
                       name="qualification"
                       placeholder="e.g. B.Ed Mathematics"
                       value="{{ old('qualification', $teacher->qualification) }}">

            </div>


            <div class="admin-form-group full">

                <label>
                    Biography
                </label>

                {{-- <textarea name="bio"
                          rows="5"
                          placeholder="Write a short biography...">{{ old('bio') }}</textarea> --}}
                          <textarea name="content"
          class="form-control"
          rows="12"
          required>{{ old('bio', $teacher->bio) }}</textarea>

            </div>

        </div>


        <div class="form-section-title">

            <i class="ti ti-photo"></i>

            Teacher Photo

        </div>


        <div class="admin-form-grid">

            <div class="admin-form-group">

                <label>
                    Profile Photo
                </label>

                <input type="file"
                       name="image"
                       accept="image/*">

                <small>
                    JPG, PNG or WEBP. Maximum 2MB.
                </small>

                @if($teacher->image)

    <div style="margin-bottom:15px;">
        <img src="{{ asset('storage/' . $teacher->image) }}"
             alt="{{ $teacher->title }}"
             style="width:180px;height:110px;object-fit:cover;">
    </div>

@endif

            </div>


            <div class="admin-form-group">

                <label>
                    Status
                </label>

                <select name="status">

                    <option value="1">
                        Active
                    </option>

                    <option value="0">
                        Inactive
                    </option>

                </select>

            </div>

        </div>


        <div class="admin-form-footer">

            <a href="{{ route('admin.teachers.index') }}"
               class="admin-secondary-btn">
                Cancel
            </a>

            <button type="submit"
                    class="admin-primary-btn">

                <i class="ti ti-device-floppy"></i>

                Save Teacher

            </button>

        </div>

    </form>

</div>

@endsection