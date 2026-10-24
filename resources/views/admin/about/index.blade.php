
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
            <h2>About Page</h2>
            <p>Manage the information displayed on your Edu-Green Schools website.</p>
        </div>

        @if($about)
            <a href="{{ route('admin.about.edit', $about->id) }}"
               class="about-btn about-btn-primary">
                <i class="fa fa-edit"></i> Edit About Page
            </a>
        @else
            <a href="{{ route('admin.about.create') }}"
               class="about-btn about-btn-primary">
                <i class="fa fa-plus"></i> Create About Page
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success about-alert">
            <i class="fa fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if($about)
        <div class="about-card">
            <div class="about-card-header">
                <h5><i class="fa fa-info-circle"></i> About Edu-Green Schools</h5>
                <span class="about-meta">
                    Last updated:
                    {{ $about->updated_at ? $about->updated_at->format('d M, Y') : 'Not available' }}
                </span>
            </div>

            <div class="about-card-body">
                @if($about->image)
                    <img
                        src="{{ asset( $about->image ) }}"
                        alt="About Edu-Green Schools"
                        class="about-image"
                    >
                @endif

                <div class="about-section">
                    <h6>About Content</h6>
                    <p>{!! nl2br(e($about->content ?? 'No about content has been added yet.')) !!}</p>
                </div>

                <div class="about-section">
                    <h6>Our Mission</h6>
                    <p>{!! nl2br(e($about->mission ?? 'No mission has been added yet.')) !!}</p>
                </div>

                <div class="about-section">
                    <h6>Our Vision</h6>
                    <p>{!! nl2br(e($about->vision ?? 'No vision has been added yet.')) !!}</p>
                </div>

                <div class="about-section">
                    <h6>Our Values</h6>
                    <p>{!! nl2br(e($about->values ?? 'No values have been added yet.')) !!}</p>
                </div>
            </div>
        </div>
    @endif
        <div class="about-card">
            <div class="about-card-body about-empty">
                <div class="empty-icon">
                    <i class="fa fa-info-circle"></i>
                </div>

                <h5>No About Page Created</h5>
                <p>
                    Add your school's story, mission, vision, values, and image
                    to display them on the website.
                </p>

                <a href="{{ route('admin.about.create') }}"
                   class="about-btn about-btn-primary">
                    <i class="fa fa-plus"></i> Create About Page
                </a>
            </div>
        </div>
   

</div>
@endsection
