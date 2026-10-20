@extends('admin.layouts.app')

@section('title', 'Create Blog')

@section('page-title', 'Create Blog')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Create Blog Post</h1>
        <p>Publish news, announcements and educational articles.</p>
    </div>

    <a href="{{ route('admin.blogs.index') }}"
       class="admin-secondary-btn">

        <i class="ti ti-arrow-left"></i>
        Back to Blog

    </a>

</div>


<div class="admin-form-panel">

    <form action="{{ route('admin.blogs.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf


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
                       required>

            </div>


            <div class="admin-form-group">

                <label>
                    Category
                </label>

                <select name="category">

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

                </select>

            </div>


            <div class="admin-form-group">

                <label>
                    Author
                </label>

                <input type="text"
                       name="author"
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


            <div class="admin-form-group full">

                <label>
                    Content
                </label>

                <textarea name="content"
                          rows="12"
                          placeholder="Write your blog content here..."
                          required></textarea>

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