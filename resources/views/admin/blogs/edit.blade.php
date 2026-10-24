@extends('admin.layouts.app')

@section('title', 'Edit Blog')

@section('page-title', 'Edit Blog')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Edit Blog Post</h1>
        <p>Publish news, announcements and educational articles.</p>
    </div>

    <a href="{{ route('admin.blogs.index') }}"
       class="admin-secondary-btn">

        <i class="ti ti-arrow-left"></i>
        Back to Blog

    </a>

</div>


<div class="admin-form-panel">

    <form action="{{ route('admin.blogs.update', $blog->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-section-title">

            <i class="ti ti-news"></i>

            Blog Information

        </div>


        <div class="admin-form-grid">

            <div class="admin-form-group full">

                <label>
                    Blog Title
                </label>

                <input type="text"
                       name="title"
                       placeholder="Enter blog title"
                       value="{{ old('title', $blog->title) }}"
                       required>

            </div>


            <div class="admin-form-group">

                <label>
                    Category
                </label>

                {{-- <select name="category">

                    <option value="">
                        Select Category
                    </option>

                    <option value="School News">
                        School News
                    </option>

                    <option value="Education">
                        Education
                    </option>

                    <option value="Events">
                        Events
                    </option>

                    <option value="Announcements">
                        Announcements
                    </option>

                </select> --}}

                <select name="category" class="form-control">

    <option value="">Select Category</option>

    <option value="News"
        {{ old('category', $blog->category) == 'News' ? 'selected' : '' }}>
        News
    </option>

    <option value="Announcement"
        {{ old('category', $blog->category) == 'Announcement' ? 'selected' : '' }}>
        Announcement
    </option>

    <option value="Education"
        {{ old('category', $blog->category) == 'Education' ? 'selected' : '' }}>
        Education
    </option>

    <option value="Events"
        {{ old('category', $blog->category) == 'Events' ? 'selected' : '' }}>
        Events
    </option>

    <option value="Achievement"
        {{ old('category', $blog->category) == 'Achievement' ? 'selected' : '' }}>
        Achievement
    </option>

</select>

            </div>


            <div class="admin-form-group">

                <label>
                    Author
                </label>

                <input type="text"
                       name="author"
                       value="{{ old('author', $blog->author) }}"
                       placeholder="Author name">

            </div>


            <div class="admin-form-group full">

                <label>
                    Featured Image
                </label>

                <input type="file"
                       name="image"
                       accept="image/*">

            </div>

            @if($blog->image)

    <div style="margin-bottom:15px;">
        <img src="{{ asset('frontend/assets/blog/' . $blog->image) }}"
             alt="{{ $blog->title }}"
             style="width:180px;height:110px;object-fit:cover;">
    </div>

@endif


            <div class="admin-form-group full">

                <label>
                    Content
                </label>

                <textarea name="content"
                          rows="12"
                          placeholder="Write your blog content here..."
                        
                          required> {{ old('content', $blog->content) }}</textarea>

            </div>


            <div class="admin-form-group">

                <label>
                    Status
                </label>

                <select name="status">

                    <option value="1">
                        Published
                    </option>

                    <option value="0">
                        Draft
                    </option>

                </select>

            </div>

        </div>


        <div class="admin-form-footer">

            <a href="{{ route('admin.blogs.index') }}"
               class="admin-secondary-btn">
                Cancel
            </a>

            <button type="submit"
                    class="admin-primary-btn">

                <i class="ti ti-device-floppy"></i>

                Publish Blog

            </button>

        </div>

    </form>

</div>

@endsection