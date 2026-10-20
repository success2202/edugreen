@extends('admin.layouts.app')

@section('title', 'Edit Gallery')

@section('page-title', 'Edit Gallery')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Edit Gallery Media</h1>
        <p>Update photos and videos from school activities and events.</p>
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

    <form action="{{ route('admin.gallery.update', $gallery->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @method('PUT')


        <div class="form-section-title">

            <i class="ti ti-photo"></i>

            Gallery Information

        </div>


        <div class="admin-form-grid">


            {{-- CURRENT MEDIA --}}

            <div class="admin-form-group full">

                <label>
                    Current Media
                </label>

                <div class="current-gallery-media">

                    @if($gallery->media_type === 'video')

                        <video controls preload="metadata">

                            <source src="{{ asset('storage/' . $gallery->media) }}">

                            Your browser does not support the video tag.

                        </video>

                    @else

                        <img src="{{ asset('storage/' . $gallery->media) }}"
                             alt="{{ $gallery->title ?? 'Gallery image' }}">

                    @endif

                </div>

            </div>


            {{-- REPLACE MEDIA --}}

            <div class="admin-form-group full">

                <label>
                    Replace Photo / Video
                </label>

                <input type="file"
                       name="media"
                       accept="image/*,video/*">

                <small>
                    Leave empty if you want to keep the current media.<br>
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
                       value="{{ old('title', $gallery->title) }}"
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
                        {{ old('category', $gallery->category) == 'School Life' ? 'selected' : '' }}>
                        School Life
                    </option>

                    <option value="Sports"
                        {{ old('category', $gallery->category) == 'Sports' ? 'selected' : '' }}>
                        Sports
                    </option>

                    <option value="Events"
                        {{ old('category', $gallery->category) == 'Events' ? 'selected' : '' }}>
                        Events
                    </option>

                    <option value="Classroom"
                        {{ old('category', $gallery->category) == 'Classroom' ? 'selected' : '' }}>
                        Classroom
                    </option>

                    <option value="Graduation"
                        {{ old('category', $gallery->category) == 'Graduation' ? 'selected' : '' }}>
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
                          placeholder="Photo or video description...">{{ old('description', $gallery->description) }}</textarea>

            </div>


            {{-- STATUS --}}

            <div class="admin-form-group full">

                <label class="admin-checkbox">

                    <input type="checkbox"
                           name="status"
                           value="1"
                           {{ old('status', $gallery->status) ? 'checked' : '' }}>

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

                <i class="ti ti-device-floppy"></i>

                Update Media

            </button>

        </div>


    </form>

</div>

@endsection