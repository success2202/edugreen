@extends('layouts.app')

@section('content')

<style>
    :root {
        --school-green: #6dcc2c;
        --school-green-dark: #59b91b;
        --school-dark: #263746;
        --school-text: #68757e;
        --school-light: #f7f9f6;
        --school-border: #e2e7e0;
        --white: #ffffff;
    }

    .application-page {
        background: #f5f7f4;
        padding: 60px 0 80px;
    }

    /* Header */
    .application-header {
        text-align: center;
        max-width: 720px;
        margin: 0 auto 40px;
    }

    .application-header .label {
        display: inline-block;
        color: var(--school-green);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1.5px;
        margin-bottom: 10px;
    }

    .application-header h1 {
        color: var(--school-dark);
        font-family: "Roboto Slab", serif;
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .application-header h1 span {
        color: var(--school-green);
    }

    .application-header p {
        color: var(--school-text);
        font-size: 15px;
        line-height: 1.7;
        margin: 0;
    }

    /* Main card */
    .application-wrapper {
        max-width: 1050px;
        margin: auto;
        background: var(--white);
        box-shadow: 0 10px 40px rgba(38, 55, 70, 0.08);
        border: 1px solid var(--school-border);
    }

    /* Top progress */
    .application-progress {
        display: flex;
        align-items: center;
        padding: 22px 30px;
        background: var(--school-dark);
        gap: 15px;
    }

    .progress-step {
        display: flex;
        align-items: center;
        gap: 9px;
        color: rgba(255,255,255,.6);
        font-size: 13px;
        font-weight: 600;
    }

    .progress-step.active {
        color: #fff;
    }

    .progress-number {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: rgba(255,255,255,.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }

    .progress-step.active .progress-number {
        background: var(--school-green);
        color: #fff;
    }

    .progress-line {
        height: 1px;
        flex: 1;
        background: rgba(255,255,255,.15);
    }

    /* Form */
    .application-form {
        padding: 40px;
    }

    .form-section {
        margin-bottom: 38px;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .section-heading {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 25px;
        padding-bottom: 14px;
        border-bottom: 1px solid var(--school-border);
    }

    .section-icon {
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef9e8;
        color: var(--school-green);
        font-size: 20px;
        border-radius: 50%;
    }

    .section-heading h3 {
        color: var(--school-dark);
        font-family: "Roboto Slab", serif;
        font-size: 19px;
        margin: 0;
    }

    .section-heading p {
        color: var(--school-text);
        font-size: 12px;
        margin: 3px 0 0;
    }

    .form-label {
        display: block;
        color: var(--school-dark);
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .required {
        color: #e53935;
    }

    .form-control,
    .form-select {
        width: 100%;
        height: 48px;
        border: 1px solid var(--school-border);
        border-radius: 3px;
        padding: 0 14px;
        color: var(--school-dark);
        font-size: 13px;
        background: #fff;
        transition: .2s ease;
    }

    textarea.form-control {
        height: 110px;
        padding: 13px 14px;
        resize: vertical;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--school-green);
        box-shadow: 0 0 0 3px rgba(109, 204, 44, .10);
        outline: none;
    }

    .form-group {
        margin-bottom: 20px;
    }

    /* Upload */
    .photo-upload {
        border: 1px dashed #cfd8cb;
        background: #fafcf9;
        padding: 22px;
        text-align: center;
    }

    .photo-upload i {
        color: var(--school-green);
        font-size: 30px;
        margin-bottom: 8px;
    }

    .photo-upload p {
        color: var(--school-text);
        font-size: 12px;
        margin: 5px 0 12px;
    }

    .photo-upload input {
        font-size: 12px;
        max-width: 100%;
    }

    /* Notice */
    .application-notice {
        display: flex;
        gap: 12px;
        padding: 15px 17px;
        background: #f0f8eb;
        border-left: 3px solid var(--school-green);
        margin-bottom: 30px;
    }

    .application-notice i {
        color: var(--school-green);
        font-size: 20px;
        flex-shrink: 0;
    }

    .application-notice p {
        color: var(--school-text);
        font-size: 12px;
        line-height: 1.6;
        margin: 0;
    }

    /* Declaration */
    .declaration {
        padding: 18px;
        background: #f8f9f7;
        border: 1px solid var(--school-border);
        margin-bottom: 25px;
    }

    .declaration label {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: var(--school-text);
        font-size: 12px;
        line-height: 1.6;
        cursor: pointer;
    }

    .declaration input {
        margin-top: 3px;
        accent-color: var(--school-green);
    }

    /* Submit */
    .application-submit {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding-top: 25px;
        border-top: 1px solid var(--school-border);
    }

    .submit-note {
        color: var(--school-text);
        font-size: 11px;
    }

    .submit-btn {
        border: none;
        background: var(--school-green);
        color: #fff;
        padding: 13px 27px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: .3s ease;
    }

    .submit-btn:hover {
        background: var(--school-green-dark);
        transform: translateY(-1px);
    }

    /* Error */
    .text-danger {
        color: #dc3545;
        font-size: 11px;
        margin-top: 5px;
        display: block;
    }

    /* Mobile */
    @media (max-width: 768px) {

        .application-page {
            padding: 40px 15px 60px;
        }

        .application-header h1 {
            font-size: 28px;
        }

        .application-progress {
            padding: 18px 15px;
            overflow-x: auto;
        }

        .progress-step {
            white-space: nowrap;
        }

        .progress-line {
            min-width: 25px;
        }

        .application-form {
            padding: 25px 18px;
        }

        .application-submit {
            flex-direction: column;
            align-items: stretch;
        }

        .submit-btn {
            justify-content: center;
            width: 100%;
        }
    }

    @media (max-width: 480px) {

        .application-header h1 {
            font-size: 25px;
        }

        .section-heading h3 {
            font-size: 17px;
        }

        .application-form {
            padding: 22px 14px;
        }

        .progress-step span:last-child {
            display: none;
        }
    }



    .application-success {
    max-width: 1050px;
    margin: 0 auto 25px;
    padding: 15px 18px;
    background: #eef9e8;
    border-left: 4px solid #6dcc2c;
    display: flex;
    gap: 12px;
    align-items: flex-start;
}

.application-success i {
    color: #6dcc2c;
    font-size: 22px;
}

.application-success strong {
    color: #263746;
    font-size: 14px;
}

.application-success p {
    color: #68757e;
    font-size: 12px;
    margin: 3px 0 0;
}
</style>

@if(session('success'))
    <div class="application-success">
        <i class="ti ti-circle-check"></i>
        <div>
            <strong>Application Submitted</strong>
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif


<section class="application-page">

    <!-- Header -->
    <div class="application-header">

        <span class="label">ADMISSIONS 2026/2027</span>

        <h1>
            School <span>Application</span>
        </h1>

        <p>
            Begin your child's journey with us. Please complete the application
            form below with accurate information.
        </p>

    </div>


    <div class="application-wrapper">

        <!-- Progress -->
        <div class="application-progress">

            <div class="progress-step active">
                <span class="progress-number">1</span>
                <span>Student Information</span>
            </div>

            <div class="progress-line"></div>

            <div class="progress-step active">
                <span class="progress-number">2</span>
                <span>Parent / Guardian</span>
            </div>

            <div class="progress-line"></div>

            <div class="progress-step active">
                <span class="progress-number">3</span>
                <span>Application</span>
            </div>

        </div>


        <form action="{{ route('user.store.application') }}"
              method="POST"
              enctype="multipart/form-data"
              class="application-form">

            @csrf


            <!-- Notice -->
            <div class="application-notice">

                <i class="ti ti-info-circle"></i>

                <p>
                    Please ensure that all information provided is correct.
                    Fields marked with <strong>*</strong> are required.
                </p>

            </div>


            <!-- Student Information -->
            <div class="form-section">

                <div class="section-heading">

                    <div class="section-icon">
                        <i class="ti ti-school"></i>
                    </div>

                    <div>
                        <h3>Student Information</h3>
                        <p>Tell us about the student applying for admission.</p>
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">

                            <label class="form-label">
                                First Name <span class="required">*</span>
                            </label>

                            <input type="text"
                                   name="first_name"
                                   class="form-control"
                                   value="{{ old('first_name') }}"
                                   placeholder="Enter first name"
                                   required>

                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">

                            <label class="form-label">
                                Middle Name
                            </label>

                            <input type="text"
                                   name="middle_name"
                                   class="form-control"
                                   value="{{ old('middle_name') }}"
                                   placeholder="Enter middle name">

                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">

                            <label class="form-label">
                                Last Name <span class="required">*</span>
                            </label>

                            <input type="text"
                                   name="last_name"
                                   class="form-control"
                                   value="{{ old('last_name') }}"
                                   placeholder="Enter last name"
                                   required>

                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">

                            <label class="form-label">
                                Date of Birth <span class="required">*</span>
                            </label>

                            <input type="date"
                                   name="date_of_birth"
                                   class="form-control"
                                   value="{{ old('date_of_birth') }}"
                                   required>

                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">

                            <label class="form-label">
                                Gender <span class="required">*</span>
                            </label>

                            <select name="gender"
                                    class="form-select"
                                    required>

                                <option value="">Select gender</option>

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
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">

                            <label class="form-label">
                                Applying For <span class="required">*</span>
                            </label>

                            <select name="level"
                                    class="form-select"
                                    required>

                                <option value="">Select level</option>

                                <option value="Nursery">Nursery</option>
                                <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>

                            </select>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="form-label">
                                Class Applying For <span class="required">*</span>
                            </label>

                            <select name="class"
                                    class="form-select"
                                    required>

                                <option value="">Select class</option>

                                <option value="Nursery 1">Nursery 1</option>
                                <option value="Nursery 2">Nursery 2</option>
                                <option value="Nursery 3">Nursery 3</option>

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
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="form-label">
                                Previous School
                            </label>

                            <input type="text"
                                   name="previous_school"
                                   class="form-control"
                                   value="{{ old('previous_school') }}"
                                   placeholder="Name of previous school">

                        </div>
                    </div>


                    <div class="col-md-12">

                        <div class="photo-upload">

                            <i class="ti ti-camera"></i>

                            <h6>Student Passport Photograph</h6>

                            <p>
                                Upload a recent passport photograph.
                                JPG, PNG or WEBP. Maximum 2MB.
                            </p>

                            <input type="file"
                                   name="student_photo"
                                   accept="image/png,image/jpeg,image/webp">

                        </div>

                    </div>

                </div>

            </div>


            <!-- Parent Information -->
            <div class="form-section">

                <div class="section-heading">

                    <div class="section-icon">
                        <i class="ti ti-user"></i>
                    </div>

                    <div>
                        <h3>Parent / Guardian Information</h3>
                        <p>Provide the details of the student's parent or guardian.</p>
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label class="form-label">
                                Parent / Guardian Name <span class="required">*</span>
                            </label>

                            <input type="text"
                                   name="parent_name"
                                   class="form-control"
                                   value="{{ old('parent_name') }}"
                                   placeholder="Full name"
                                   required>

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="form-group">

                            <label class="form-label">
                                Phone Number <span class="required">*</span>
                            </label>

                            <input type="tel"
                                   name="parent_phone"
                                   class="form-control"
                                   value="{{ old('parent_phone') }}"
                                   placeholder="080XXXXXXXX"
                                   required>

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="form-group">

                            <label class="form-label">
                                Email Address
                            </label>

                            <input type="email"
                                   name="parent_email"
                                   class="form-control"
                                   value="{{ old('parent_email') }}"
                                   placeholder="parent@example.com">

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="form-group">

                            <label class="form-label">
                                Relationship to Student <span class="required">*</span>
                            </label>

                            <select name="relationship"
                                    class="form-select"
                                    required>

                                <option value="">Select relationship</option>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Guardian">Guardian</option>
                                <option value="Other">Other</option>

                            </select>

                        </div>

                    </div>


                    <div class="col-md-12">

                        <div class="form-group">

                            <label class="form-label">
                                Residential Address <span class="required">*</span>
                            </label>

                            <textarea name="parent_address"
                                      class="form-control"
                                      placeholder="Enter residential address"
                                      required>{{ old('parent_address') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Application Details -->
            <div class="form-section">

                <div class="section-heading">

                    <div class="section-icon">
                        <i class="ti ti-file-text"></i>
                    </div>

                    <div>
                        <h3>Application Details</h3>
                        <p>Additional information about this application.</p>
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label class="form-label">
                                Academic Session <span class="required">*</span>
                            </label>

                            <select name="session"
                                    class="form-select"
                                    required>

                                <option value="">Select session</option>

                                <option value="2026/2027">
                                    2026/2027
                                </option>

                                <option value="2027/2028">
                                    2027/2028
                                </option>

                            </select>

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="form-group">

                            <label class="form-label">
                                How did you hear about us?
                            </label>

                            <select name="referral_source"
                                    class="form-select">

                                <option value="">Select option</option>
                                <option value="Website">School Website</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Friend">Friend / Family</option>
                                <option value="School Sign">School Sign</option>
                                <option value="Other">Other</option>

                            </select>

                        </div>

                    </div>


                    <div class="col-md-12">

                        <div class="form-group">

                            <label class="form-label">
                                Additional Information
                            </label>

                            <textarea name="message"
                                      class="form-control"
                                      placeholder="Any additional information you would like the school to know...">{{ old('message') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Declaration -->
            <div class="declaration">

                <label>

                    <input type="checkbox"
                           name="declaration"
                           value="1"
                           required>

                    <span>
                        I confirm that the information provided in this application
                        is accurate and complete to the best of my knowledge.
                        I understand that the school may contact me regarding
                        this application.
                    </span>

                </label>

            </div>


            <!-- Submit -->
            <div class="application-submit">

                <div class="submit-note">
                    <i class="ti ti-lock"></i>
                    Your information will be handled securely.
                </div>

                <button type="submit" class="submit-btn">

                    Submit Application

                    <i class="ti ti-arrow-right"></i>

                </button>

            </div>

        </form>

    </div>

</section>

@endsection