@extends('admin.layouts.app')

@section('title', 'Add Gallery')

@section('page-title', 'Add Gallery')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Add Gallery Media</h1>
        <p>Add photos and videos from school activities and events.</p>
    </div>

    <a href="{{ route('admin.gallery.index') }}"
       class="admin-secondary-btn">

        <i class="ti ti-arrow-left"></i>
        Back to Gallery

    </a>

</div>


{{-- Validation Errors --}}

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


{{-- Success Message --}}

@if(session('success'))

    <div class="alert alert-success">
        <i class="ti ti-check"></i>
        {{ session('success') }}
    </div>

@endif


<div class="admin-form-panel">

    <form action="{{ route('admin.gallery.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf


        <div class="form-section-title">

            <i class="ti ti-photo"></i>

            Gallery Information

        </div>


        <div class="admin-form-grid">


            {{-- MEDIA --}}

            <div class="admin-form-group full">

                <label>
                    Photo / Video *
                </label>

                <input type="file"
                       name="media"
                       accept="image/*,video/*"
                       required>

                <small>
                    Images: JPG, PNG, WEBP, GIF<br>
                    Videos: MP4, WEBM, MOV, AVI<br>
                    Maximum size: 50MB.
                </small>

            </div>


            {{-- TITLE --}}

            <div class="admin-form-group">

                <label>
                    Title
                </label>

                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       placeholder="e.g. School Sports Day">

            </div>


            {{-- CATEGORY --}}

            <div class="admin-form-group">

                <label>
                    Category
                </label>

                <select name="category">

                    <option value="">
                        Select Category
                    </option>

                    <option value="School Life"
                        {{ old('category') == 'School Life' ? 'selected' : '' }}>
                        School Life
                    </option>

                    <option value="Sports"
                        {{ old('category') == 'Sports' ? 'selected' : '' }}>
                        Sports
                    </option>

                    <option value="Events"
                        {{ old('category') == 'Events' ? 'selected' : '' }}>
                        Events
                    </option>

                    <option value="Classroom"
                        {{ old('category') == 'Classroom' ? 'selected' : '' }}>
                        Classroom
                    </option>

                    <option value="Graduation"
                        {{ old('category') == 'Graduation' ? 'selected' : '' }}>
                        Graduation
                    </option>

                </select>

            </div>


            {{-- DESCRIPTION --}}

            <div class="admin-form-group full">

                <label>
                    Description
                </label>

                <textarea name="description"
                          rows="5"
                          placeholder="Photo or video description...">{{ old('description') }}</textarea>

            </div>


            {{-- STATUS --}}

            <div class="admin-form-group full">

                <label class="admin-checkbox">

                    <input type="checkbox"
                           name="status"
                           value="1"
                           checked>

                    <span>
                        Publish this media
                    </span>

                </label>

            </div>


        </div>


        <div class="admin-form-footer">

            <a href="{{ route('admin.gallery.index') }}"
               class="admin-secondary-btn">

                Cancel

            </a>


            <button type="submit"
                    class="admin-primary-btn">

                <i class="ti ti-upload"></i>

                Upload Media

            </button>

        </div>


    </form>

</div>

@endsection