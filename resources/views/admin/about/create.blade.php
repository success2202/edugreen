
@extends('admin.layouts.app')
@section('styles') 

<style>
    .eg-about {
        padding: 25px 0 40px;
        color: #26382d;
    }

    .eg-about .page-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 25px;
    }

    .eg-about .page-heading h2 {
        margin: 0 0 7px;
        font-size: 25px;
        font-weight: 700;
        color: #173f2b;
    }

    .eg-about .page-heading p {
        margin: 0;
        color: #778279;
        font-size: 14px;
    }

    .eg-about .about-card {
        background: #fff;
        border: 1px solid #e5ebe6;
        border-radius: 10px;
        box-shadow: 0 4px 18px rgba(20, 55, 35, .05);
        margin-bottom: 22px;
        overflow: hidden;
    }

    .eg-about .about-card-header {
        background: #fff;
        border-bottom: 1px solid #e8eee9;
        padding: 18px 22px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }

    .eg-about .about-card-header h5 {
        margin: 0;
        color: #17472e;
        font-size: 16px;
        font-weight: 700;
    }

    .eg-about .about-card-body {
        padding: 22px;
    }

    .eg-about .about-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 10px 16px;
        border-radius: 6px;
        border: 1px solid transparent;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: .2s ease;
    }

    .eg-about .about-btn-primary {
        background: #198754;
        color: #fff;
    }

    .eg-about .about-btn-primary:hover {
        background: #146c43;
        color: #fff;
    }

    .eg-about .about-btn-secondary {
        background: #f1f5f2;
        color: #34483a;
        border-color: #e0e7e1;
    }

    .eg-about .about-btn-secondary:hover {
        background: #e4ebe5;
        color: #173f2b;
    }

    .eg-about .about-btn-danger {
        background: #fff0f0;
        color: #b42318;
        border-color: #f5d1d1;
    }

    .eg-about .about-btn-danger:hover {
        background: #ffe0e0;
    }

    .eg-about .about-label {
        display: block;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 700;
        color: #35483b;
    }

    .eg-about .about-form-group {
        margin-bottom: 21px;
    }

    .eg-about .about-form-control {
        display: block;
        width: 100%;
        border: 1px solid #dce5de;
        border-radius: 6px;
        padding: 11px 13px;
        color: #34483a;
        background: #fff;
        font-size: 14px;
        outline: none;
        box-shadow: none;
    }

    .eg-about .about-form-control:focus {
        border-color: #198754;
        box-shadow: 0 0 0 3px rgba(25, 135, 84, .10);
    }

    .eg-about textarea.about-form-control {
        min-height: 130px;
        resize: vertical;
        line-height: 1.7;
    }

    .eg-about .about-help {
        display: block;
        margin-top: 6px;
        font-size: 12px;
        color: #7b877e;
    }

    .eg-about .about-alert {
        padding: 13px 16px;
        margin-bottom: 20px;
        border-radius: 6px;
        font-size: 14px;
    }

    .eg-about .about-image {
        display: block;
        width: 100%;
        max-width: 330px;
        max-height: 230px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e2e9e3;
        margin-bottom: 12px;
    }

    .eg-about .about-image-preview {
        display: none;
        width: 100%;
        max-width: 330px;
        max-height: 230px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e2e9e3;
        margin-top: 12px;
    }

    .eg-about .about-section {
        padding: 18px 0;
        border-bottom: 1px solid #edf1ed;
    }

    .eg-about .about-section:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }

    .eg-about .about-section h6 {
        color: #198754;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 9px;
    }

    .eg-about .about-section p {
        color: #58665b;
        font-size: 14px;
        line-height: 1.8;
        margin-bottom: 0;
        overflow-wrap: anywhere;
    }

    .eg-about .about-empty {
        text-align: center;
        padding: 45px 20px;
    }

    .eg-about .about-empty .empty-icon {
        font-size: 38px;
        color: #198754;
        margin-bottom: 15px;
    }

    .eg-about .about-empty h5 {
        color: #17472e;
        font-weight: 700;
    }

    .eg-about .about-empty p {
        color: #7b877e;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .eg-about .about-meta {
        color: #7b877e;
        font-size: 12px;
    }

    .eg-about .about-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;
    }

    .eg-about .invalid-feedback {
        display: block;
    }

    @media (max-width: 767px) {
        .eg-about {
            padding-top: 15px;
        }

        .eg-about .page-heading h2 {
            font-size: 21px;
        }

        .eg-about .about-card-body {
            padding: 16px;
        }

        .eg-about .about-card-header {
            padding: 15px 16px;
        }

        .eg-about .about-actions {
            width: 100%;
        }
    }
</style>

@endsection
@section('content')
<div class="container eg-about">

    {{-- @include('admin.about.partials.styles') --}}

    <div class="page-heading">
        <div>
            <h2>Create About Page</h2>
            <p>Add the information that introduces Edu-Green Schools to visitors.</p>
        </div>

        <a href="{{ route('admin.about.index') }}"
           class="about-btn about-btn-secondary">
            <i class="fa fa-arrow-left"></i> Back to About
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger about-alert">
            <strong>Please correct the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.about.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="about-card">
            <div class="about-card-header">
                <h5><i class="fa fa-file-text-o"></i> About Page Information</h5>
            </div>

            <div class="about-card-body">

                <div class="about-form-group">
                    <label class="about-label" for="content">About Content</label>
                    <textarea
                        name="content"
                        id="content"
                        class="about-form-control @error('content') is-invalid @enderror"
                        rows="6"
                        placeholder="Write the story and background of Edu-Green Schools..."
                    >{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="about-form-group">
                    <label class="about-label" for="mission">Our Mission</label>
                    <textarea
                        name="mission"
                        id="mission"
                        class="about-form-control @error('mission') is-invalid @enderror"
                        rows="4"
                        placeholder="What is the mission of your school?"
                    >{{ old('mission') }}</textarea>
                    @error('mission')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="about-form-group">
                    <label class="about-label" for="vision">Our Vision</label>
                    <textarea
                        name="vision"
                        id="vision"
                        class="about-form-control @error('vision') is-invalid @enderror"
                        rows="4"
                        placeholder="What is the vision of your school?"
                    >{{ old('vision') }}</textarea>
                    @error('vision')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="about-form-group">
                    <label class="about-label" for="values">Our Values</label>
                    <textarea
                        name="values"
                        id="values"
                        class="about-form-control @error('values') is-invalid @enderror"
                        rows="4"
                        placeholder="Describe the values that guide your school..."
                    >{{ old('values') }}</textarea>
                    @error('values')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="about-form-group">
                    <label class="about-label" for="image">About Page Image</label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="about-form-control @error('image') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >
                    <small class="about-help">
                        Allowed formats: JPG, JPEG, PNG and WEBP. Maximum size: 2MB.
                    </small>

                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <img id="imagePreview" class="about-image-preview" alt="Image preview">
                </div>

            </div>
        </div>

        <div class="about-card">
            <div class="about-card-body">
                <div class="about-actions">
                    <button type="submit" class="about-btn about-btn-primary">
                        <i class="fa fa-save"></i> Save About Page
                    </button>

                    <a href="{{ route('admin.about.index') }}"
                       class="about-btn about-btn-secondary">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>

</div>

<script>
    document.getElementById('image').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.removeAttribute('src');
            preview.style.display = 'none';
        }
    });
</script>
@endsection
