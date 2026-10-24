@extends('admin.layouts.app')

@section('title', 'School Settings')
@section('styles')
<style>

/* School Term Dropdown */
.settings-field select#current_term {
    display: block;
    width: 100%;
    min-height: 48px;
    padding: 12px 42px 12px 15px;

    font-family: inherit;
    font-size: 14px;
    font-weight: 500;
    color: #26352d;

    background-color: #ffffff;
    border: 1px solid #dce5df;
    border-radius: 10px;

    outline: none;
    cursor: pointer;
    appearance: none;
    -webkit-appearance: none;

    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='%232d6a4f' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 15px center;

    transition: border-color 0.25s ease,
                box-shadow 0.25s ease,
                background-color 0.25s ease;
}

/* Hover */
.settings-field select#current_term:hover {
    border-color: #74a88a;
    background-color: #fcfefc;
}

/* Focus */
.settings-field select#current_term:focus {
    border-color: #2d6a4f;
    box-shadow: 0 0 0 4px rgba(45, 106, 79, 0.12);
    background-color: #ffffff;
}

/* Dropdown options */
.settings-field select#current_term option {
    padding: 12px;
    font-size: 14px;
    color: #26352d;
    background-color: #ffffff;
}

/* Helper text */
.settings-field small {
    display: block;
    margin-top: 9px;
    color: #78877e;
    font-size: 12px;
    line-height: 1.6;
}

/* Mobile */
@media (max-width: 576px) {
    .settings-field select#current_term {
        min-height: 46px;
        font-size: 14px;
        border-radius: 8px;
    }
}



</style>
@endsection

@section('content')

<div class="admin-page-header">
    <div>
        <h1>School Settings</h1>
        <p>Manage your school's information, branding, social media and academic session.</p>
    </div>
</div>


@if(session('success'))
    <div class="admin-alert admin-alert-success">
        <i class="ti ti-circle-check"></i>
        {{ session('success') }}
    </div>
@endif


@if($errors->any())
    <div class="admin-alert admin-alert-danger">
        <i class="ti ti-alert-circle"></i>

        <div>
            <strong>Please fix the following errors:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif


<form action="{{ route('admin.settings.update') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')


    {{-- SCHOOL INFORMATION --}}

    <div class="settings-card">

        <div class="settings-card-header">

            <div class="settings-card-icon">
                <i class="ti ti-school"></i>
            </div>

            <div>
                <h2>School Information</h2>
                <p>Basic information about your school.</p>
            </div>

        </div>


        <div class="settings-card-body">

            <div class="settings-grid">


                {{-- SCHOOL NAME --}}

                <div class="settings-field settings-field-full">

                    <label for="school_name">
                        School Name
                        <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="school_name"
                        name="school_name"
                        value="{{ old('school_name', $school->school_name ?? '') }}"
                        placeholder="Enter school name"
                        required
                    >

                </div>


                {{-- ADDRESS --}}

                <div class="settings-field settings-field-full">

                    <label for="school_address">
                        School Address
                    </label>

                    <textarea
                        id="school_address"
                        name="school_address"
                        rows="3"
                        placeholder="Enter complete school address"
                    >{{ old('school_address', $school->school_address ?? '') }}</textarea>

                </div>


                {{-- PHONE --}}

                <div class="settings-field">

                    <label for="phone">
                        Phone Number
                    </label>

                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ old('phone', $school->phone ?? '') }}"
                        placeholder="e.g. 08012345678"
                    >

                </div>


                {{-- EMAIL --}}

                <div class="settings-field">

                    <label for="email">
                        School Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $school->email ?? '') }}"
                        placeholder="e.g. info@yourschool.com"
                    >

                </div>


                {{-- SCHOOL SESSION --}}

                <div class="settings-field">

                    <label for="session">
                        Current School Session
                        <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="session"
                        name="session"
                        value="{{ old('session', $school->session ?? '') }}"
                        placeholder="e.g. 2026/2027"
                        required
                    >

                    <small>
                        This will be used as the current academic session.
                    </small>

                </div>


            </div>

        </div>

    </div>
    
{{-- SCHOOL TERM SETTINGS --}}

<div class="settings-card">

    <div class="settings-card-header">

        <div class="settings-card-icon">
            <i class="ti ti-calendar"></i>
        </div>

        <div>
            <h2>School Term</h2>
            <p>Select the current academic term for your school.</p>
        </div>

    </div>

    <div class="settings-card-body">

        <div class="settings-grid">

            <div class="settings-field">

                <label for="current_term">
                    Current Academic Term
                </label>

                <select
                    name="current_term"
                    id="current_term"
                    class="form-control"
                    required
                >
                    <option value="first_term"
                        {{ old('current_term', $school->current_term ?? 'first_term') == 'first_term' ? 'selected' : '' }}>
                        First Term
                    </option>

                    <option value="second_term"
                        {{ old('current_term', $school->current_term ?? 'first_term') == 'second_term' ? 'selected' : '' }}>
                        Second Term
                    </option>

                    <option value="third_term"
                        {{ old('current_term', $school->current_term ?? 'first_term') == 'third_term' ? 'selected' : '' }}>
                        Third Term
                    </option>

                </select>

                <small>
                    This term will be used to determine the current term
                    for student school-fee payment records.
                </small>

            </div>

        </div>

    </div>

</div>




    {{-- SCHOOL BRANDING --}}

    <div class="settings-card">

        <div class="settings-card-header">

            <div class="settings-card-icon">
                <i class="ti ti-photo"></i>
            </div>

            <div>
                <h2>School Branding</h2>
                <p>Upload your school logo and website favicon.</p>
            </div>

        </div>


        <div class="settings-card-body">

            <div class="settings-grid">


                {{-- SCHOOL LOGO --}}

                <div class="settings-field">

                    <label for="logo">
                        School Logo
                    </label>

                    <div class="upload-box">

                        <div class="current-image">

                            @if(!empty($school->logo))

                                <img
                                    src="{{ asset('frontend/assets/img/logo/' . $school->logo) }}"
                                    id="logoPreview"
                                    alt="School Logo"
                                >

                            @else

                                <div class="image-placeholder" id="logoPlaceholder">
                                    <i class="ti ti-school"></i>
                                </div>

                            @endif

                        </div>


                        <div class="upload-content">

                            <input
                                type="file"
                                id="logo"
                                name="logo"
                                accept="image/png,image/jpeg,image/jpg,image/webp"
                                onchange="previewLogo(this)"
                            >

                            <label for="logo" class="upload-button">
                                <i class="ti ti-upload"></i>
                                Choose Logo
                            </label>

                            <small>
                                Recommended: PNG with transparent background.
                                Maximum size: 2MB.
                            </small>

                        </div>

                    </div>

                </div>



                {{-- FAVICON --}}

                <div class="settings-field">

                    <label for="favicon">
                        Website Favicon
                    </label>

                    <div class="upload-box">

                        <div class="current-image favicon-preview">

                            @if(!empty($school->favicon))

                                <img
                                    src="{{ asset('frontend/assets/img/logo/' . $school->favicon) }}"
                                    id="faviconPreview"
                                    alt="Favicon"
                                >

                            @else

                                <div class="image-placeholder" id="faviconPlaceholder">
                                    <i class="ti ti-world"></i>
                                </div>

                            @endif

                        </div>


                        <div class="upload-content">

                            <input
                                type="file"
                                id="favicon"
                                name="favicon"
                                accept="image/png,image/jpeg,image/x-icon,.ico"
                                onchange="previewFavicon(this)"
                            >

                            <label for="favicon" class="upload-button">
                                <i class="ti ti-upload"></i>
                                Choose Favicon
                            </label>

                            <small>
                                Recommended: 32×32 or 64×64 PNG/ICO.
                                Maximum size: 1MB.
                            </small>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>




    {{-- SOCIAL MEDIA --}}

    <div class="settings-card">

        <div class="settings-card-header">

            <div class="settings-card-icon">
                <i class="ti ti-brand-facebook"></i>
            </div>

            <div>
                <h2>Social Media</h2>
                <p>Add your school's social media profile links.</p>
            </div>

        </div>


        <div class="settings-card-body">

            <div class="settings-grid">


                {{-- FACEBOOK --}}

                <div class="settings-field">

                    <label for="facebook">
                        <i class="ti ti-brand-facebook social-icon"></i>
                        Facebook
                    </label>

                    <input
                        type="url"
                        id="facebook"
                        name="facebook"
                        value="{{ old('facebook', $school->facebook ?? '') }}"
                        placeholder="https://facebook.com/your-school"
                    >

                </div>


                {{-- INSTAGRAM --}}

                <div class="settings-field">

                    <label for="instagram">
                        <i class="ti ti-brand-instagram social-icon"></i>
                        Instagram
                    </label>

                    <input
                        type="url"
                        id="instagram"
                        name="instagram"
                        value="{{ old('instagram', $school->instagram ?? '') }}"
                        placeholder="https://instagram.com/your-school"
                    >

                </div>


                {{-- TWITTER --}}

                <div class="settings-field">

                    <label for="twitter">
                        <i class="ti ti-brand-x social-icon"></i>
                        Twitter / X
                    </label>

                    <input
                        type="url"
                        id="twitter"
                        name="twitter"
                        value="{{ old('twitter', $school->twitter ?? '') }}"
                        placeholder="https://x.com/your-school"
                    >

                </div>


                {{-- LINKEDIN --}}

                <div class="settings-field">

                    <label for="linkedin">
                        <i class="ti ti-brand-linkedin social-icon"></i>
                        LinkedIn
                    </label>

                    <input
                        type="url"
                        id="linkedin"
                        name="linkedin"
                        value="{{ old('linkedin', $school->linkedin ?? '') }}"
                        placeholder="https://linkedin.com/company/your-school"
                    >

                </div>


            </div>

        </div>

    </div>



    {{-- SAVE BUTTON --}}

    <div class="settings-actions">

        <button type="submit" class="settings-save-btn">

            <i class="ti ti-device-floppy"></i>

            Save School Settings

        </button>

    </div>


</form>



<style>

    .admin-page-header {
        margin-bottom: 25px;
    }

    .admin-page-header h1 {
        margin: 0 0 6px;
        color: #263746;
        font-size: 25px;
        font-weight: 700;
    }

    .admin-page-header p {
        margin: 0;
        color: #68757e;
        font-size: 14px;
    }


    /* ALERT */

    .admin-alert {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 14px 16px;
        margin-bottom: 20px;
        border: 1px solid;
        font-size: 14px;
    }

    .admin-alert-success {
        background: #f1faeb;
        border-color: #cdebbd;
        color: #3d7d20;
    }

    .admin-alert-danger {
        background: #fff3f3;
        border-color: #f2cccc;
        color: #a33a3a;
    }

    .admin-alert ul {
        margin: 5px 0 0;
        padding-left: 18px;
    }


    /* CARD */

    .settings-card {
        background: #fff;
        border: 1px solid #e5e9e3;
        margin-bottom: 25px;
    }

    .settings-card-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 20px;
        border-bottom: 1px solid #e5e9e3;
        background: #fafcf9;
    }

    .settings-card-icon {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf7e2;
        color: #59b91b;
        font-size: 21px;
        flex-shrink: 0;
    }

    .settings-card-header h2 {
        margin: 0 0 4px;
        font-size: 17px;
        color: #263746;
    }

    .settings-card-header p {
        margin: 0;
        font-size: 13px;
        color: #68757e;
    }

    .settings-card-body {
        padding: 25px;
    }


    /* GRID */

    .settings-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
    }

    .settings-field-full {
        grid-column: 1 / -1;
    }


    /* FORM */

    .settings-field label {
        display: block;
        margin-bottom: 8px;
        color: #263746;
        font-size: 13px;
        font-weight: 600;
    }

    .settings-field label span {
        color: #e53935;
    }

    .settings-field input,
    .settings-field textarea {
        width: 100%;
        border: 1px solid #dfe5dc;
        background: #fff;
        color: #263746;
        padding: 12px 13px;
        font-size: 14px;
        outline: none;
        border-radius: 3px;
        transition: border-color .2s, box-shadow .2s;
    }

    .settings-field textarea {
        resize: vertical;
        min-height: 95px;
    }

    .settings-field input:focus,
    .settings-field textarea:focus {
        border-color: #6dcc2c;
        box-shadow: 0 0 0 3px rgba(109, 204, 44, .10);
    }

    .settings-field small {
        display: block;
        margin-top: 7px;
        color: #8a969d;
        font-size: 11px;
        line-height: 1.5;
    }


    /* UPLOAD */

    .upload-box {
        display: flex;
        align-items: center;
        gap: 18px;
        min-height: 125px;
        padding: 15px;
        border: 1px dashed #d5ddd1;
        background: #fafcf9;
    }

    .current-image {
        width: 90px;
        height: 90px;
        border: 1px solid #e0e5de;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
    }

    .current-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .favicon-preview {
        width: 70px;
        height: 70px;
    }

    .image-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        color: #aab5ac;
        font-size: 32px;
    }

    .upload-content {
        flex: 1;
    }

    .upload-content input[type="file"] {
        display: none;
    }

    .upload-button {
        display: inline-flex !important;
        align-items: center;
        gap: 7px;
        padding: 9px 14px;
        background: #6dcc2c;
        color: #fff !important;
        cursor: pointer;
        margin: 0 !important;
        font-size: 12px !important;
    }

    .upload-button:hover {
        background: #59b91b;
    }


    /* SOCIAL ICON */

    .social-icon {
        margin-right: 5px;
        color: #6dcc2c;
    }


    /* SAVE */

    .settings-actions {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 30px;
    }

    .settings-save-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 0;
        background: #6dcc2c;
        color: #fff;
        padding: 12px 22px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        border-radius: 3px;
    }

    .settings-save-btn:hover {
        background: #59b91b;
    }


    /* MOBILE */

    @media(max-width: 768px) {

        .settings-grid {
            grid-template-columns: 1fr;
        }

        .settings-field-full {
            grid-column: auto;
        }

        .settings-card-body {
            padding: 18px;
        }

        .upload-box {
            align-items: flex-start;
        }

        .settings-actions {
            justify-content: stretch;
        }

        .settings-save-btn {
            width: 100%;
            justify-content: center;
        }

    }

</style>



<script>

    function previewLogo(input)
    {
        if (input.files && input.files[0]) {

            const reader = new FileReader();

            reader.onload = function(e) {

                let preview = document.getElementById('logoPreview');
                let placeholder = document.getElementById('logoPlaceholder');

                if (!preview) {

                    preview = document.createElement('img');

                    preview.id = 'logoPreview';

                    preview.alt = 'School Logo';

                    document
                        .querySelector('.current-image')
                        .prepend(preview);

                }

                preview.src = e.target.result;

                if (placeholder) {
                    placeholder.style.display = 'none';
                }

            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    function previewFavicon(input)
    {
        if (input.files && input.files[0]) {

            const reader = new FileReader();

            reader.onload = function(e) {

                let preview = document.getElementById('faviconPreview');
                let placeholder = document.getElementById('faviconPlaceholder');

                if (!preview) {

                    preview = document.createElement('img');

                    preview.id = 'faviconPreview';

                    preview.alt = 'Favicon';

                    document
                        .querySelector('.favicon-preview')
                        .prepend(preview);

                }

                preview.src = e.target.result;

                if (placeholder) {
                    placeholder.style.display = 'none';
                }

            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

@endsection