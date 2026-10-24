 @extends('layouts.app')

@section('content')
<style>
    .scholarship-application-page {
        background: #f5f8f6;
        padding: 60px 0;
        color: #26372e;
    }

    .scholarship-application-page .application-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .scholarship-application-page .application-header h1 {
        color: #176b45;
        font-size: 34px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .scholarship-application-page .application-header p {
        color: #68776e;
        font-size: 15px;
        line-height: 1.8;
    }

    .scholarship-application-page .application-card {
        background: #fff;
        border-radius: 16px;
        padding: 35px;
        box-shadow: 0 8px 35px rgba(20, 70, 45, .08);
        border: 1px solid #e7eee9;
    }

    .scholarship-application-page .section-heading {
        color: #176b45;
        font-size: 19px;
        font-weight: 700;
        border-bottom: 1px solid #e5eee8;
        padding-bottom: 12px;
        margin: 10px 0 22px;
    }

    .scholarship-application-page .form-group {
        margin-bottom: 20px;
    }

    .scholarship-application-page label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #34483b;
    }

    .scholarship-application-page .form-control {
        height: 46px;
        border: 1px solid #dce6df;
        border-radius: 7px;
        box-shadow: none;
        width: 100%;
        padding: 10px 13px;
    }

    .scholarship-application-page textarea.form-control {
        height: auto;
        min-height: 125px;
        resize: vertical;
    }

    .scholarship-application-page .form-control:focus {
        border-color: #278553;
        box-shadow: 0 0 0 3px rgba(39, 133, 83, .09);
    }

    .scholarship-application-page .help-text {
        display: block;
        color: #77847b;
        font-size: 12px;
        margin-top: 6px;
    }

    .scholarship-application-page .submit-button {
        background: linear-gradient(135deg, #176b45, #278553);
        color: #fff;
        border: 0;
        border-radius: 7px;
        padding: 15px 28px;
        font-weight: 700;
        font-size: 15px;
        cursor: pointer;
        width: 100%;
        transition: .25s ease;
    }

    .scholarship-application-page .submit-button:hover {
        background: #105436;
        transform: translateY(-1px);
    }

    .scholarship-application-page .required-mark {
        color: #c0392b;
    }

    .scholarship-application-page .alert {
        border-radius: 8px;
        padding: 14px 18px;
        margin-bottom: 22px;
    }

    @media (max-width: 767px) {
        .scholarship-application-page {
            padding: 35px 0;
        }

        .scholarship-application-page .application-card {
            padding: 22px 17px;
        }

        .scholarship-application-page .application-header h1 {
            font-size: 27px;
        }
    }
</style>

<div class="scholarship-application-page">
    <div class="container">

        <div class="application-header">
            <h1>Scholarship Application</h1>
            <p>
                Apply for an Edugreen Schools scholarship.
                Please provide accurate information and attach your
                supporting documents where available.
            </p>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="application-card">

                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fa fa-check-circle"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Please correct the following errors:</strong>
                            <ul style="margin: 10px 0 0;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        action="{{ route('user.scholarship.application.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        <h3 class="section-heading">
                            <i class="fa fa-graduation-cap"></i>
                            Scholarship Programme
                        </h3>

                        <div class="form-group">
                            <label for="scholarship_programme">
                                Select Scholarship Programme
                                <span class="required-mark">*</span>
                            </label>

                            <select name="scholarship_programme"
                                    id="scholarship_programme"
                                    class="form-control" required>
                                <option value="">Choose a programme</option>
                                <option value="Cradle-to-Career"
                                    {{ old('scholarship_programme') == 'Cradle-to-Career' ? 'selected' : '' }}>
                                    Cradle-to-Career
                                </option>
                                <option value="Edugreen Special Awards"
                                    {{ old('scholarship_programme') == 'Edugreen Special Awards' ? 'selected' : '' }}>
                                    Edugreen Special Awards
                                </option>
                                <option value="Collegiate Dream"
                                    {{ old('scholarship_programme') == 'Collegiate Dream' ? 'selected' : '' }}>
                                    Collegiate Dream
                                </option>
                            </select>
                        </div>

                        <h3 class="section-heading">
                            <i class="fa fa-user"></i>
                            Student Information
                        </h3>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">First Name <span class="required-mark">*</span></label>
                                    <input type="text" name="first_name" id="first_name"
                                           class="form-control" value="{{ old('first_name') }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="middle_name">Middle Name</label>
                                    <input type="text" name="middle_name" id="middle_name"
                                           class="form-control" value="{{ old('middle_name') }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">Last Name <span class="required-mark">*</span></label>
                                    <input type="text" name="last_name" id="last_name"
                                           class="form-control" value="{{ old('last_name') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth <span class="required-mark">*</span></label>
                                    <input type="date" name="date_of_birth" id="date_of_birth"
                                           class="form-control" value="{{ old('date_of_birth') }}"
                                           max="{{ date('Y-m-d', strtotime('-1 day')) }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender <span class="required-mark">*</span></label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="">Select gender</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="current_school">Current School <span class="required-mark">*</span></label>
                                    <input type="text" name="current_school" id="current_school"
                                           class="form-control" value="{{ old('current_school') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="current_class">Current Class <span class="required-mark">*</span></label>
                                    <input type="text" name="current_class" id="current_class"
                                           class="form-control" value="{{ old('current_class') }}"
                                           placeholder="e.g. Primary 4" required>
                                </div>
                            </div>
                        </div>

                        <h3 class="section-heading">
                            <i class="fa fa-users"></i>
                            Parent or Guardian Information
                        </h3>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="parent_guardian_name">Parent/Guardian Full Name <span class="required-mark">*</span></label>
                                    <input type="text" name="parent_guardian_name" id="parent_guardian_name"
                                           class="form-control" value="{{ old('parent_guardian_name') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="relationship">Relationship to Student <span class="required-mark">*</span></label>
                                    <select name="relationship" id="relationship" class="form-control" required>
                                        <option value="">Select relationship</option>
                                        @foreach(['Father', 'Mother', 'Guardian', 'Other'] as $relationship)
                                            <option value="{{ $relationship }}"
                                                {{ old('relationship') == $relationship ? 'selected' : '' }}>
                                                {{ $relationship }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="parent_guardian_phone">Phone Number <span class="required-mark">*</span></label>
                                    <input type="tel" name="parent_guardian_phone" id="parent_guardian_phone"
                                           class="form-control" value="{{ old('parent_guardian_phone') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="parent_guardian_email">Email Address</label>
                                    <input type="email" name="parent_guardian_email" id="parent_guardian_email"
                                           class="form-control" value="{{ old('parent_guardian_email') }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="parent_guardian_address">Residential Address <span class="required-mark">*</span></label>
                                    <textarea name="parent_guardian_address" id="parent_guardian_address"
                                              class="form-control" rows="3" required>{{ old('parent_guardian_address') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <h3 class="section-heading">
                            <i class="fa fa-file-text-o"></i>
                            Application Details
                        </h3>

                        <div class="form-group">
                            <label for="reason_for_applying">Why are you applying for this scholarship? <span class="required-mark">*</span></label>
                            <textarea name="reason_for_applying" id="reason_for_applying"
                                      class="form-control" rows="5"
                                      placeholder="Explain why you are applying and how the scholarship would support the student's education."
                                      required>{{ old('reason_for_applying') }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="academic_result">Academic Result (Optional)</label>
                                    <input type="file" name="academic_result" id="academic_result"
                                           class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                    <small class="help-text">PDF, JPG or PNG. Maximum 5 MB.</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_certificate">Birth Certificate (Optional)</label>
                                    <input type="file" name="birth_certificate" id="birth_certificate"
                                           class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                    <small class="help-text">PDF, JPG or PNG. Maximum 5 MB.</small>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <i class="fa fa-info-circle"></i>
                            Please ensure the information provided is correct.
                            Submission does not guarantee that a scholarship will be awarded.
                        </div>

                        <button type="submit" class="submit-button">
                            <i class="fa fa-paper-plane"></i>
                            Submit Scholarship Application
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection