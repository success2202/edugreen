@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')


@section('content')


<!-- WELCOME -->

<div class="welcome-box">

    <h1>
        Welcome back,
        <span>{{ Auth::guard('admin')->user()->name }}</span>
    </h1>

    <p>
        Here's an overview of your school's activities and
        administration today.
    </p>

</div>


<!-- STATISTICS -->

<div class="dashboard-grid">


    <!-- STUDENTS -->

  <div class="dashboard-card">
    <div class="dashboard-card-top">
        <div class="dashboard-icon">
            <i class="ti ti-school"></i>
        </div>

        <a href="{{ route('admin.students.index') }}"
           class="dashboard-card-link">
            <i class="ti ti-arrow-up-right"></i>
        </a>
    </div>

    <h3>{{ $totalStudents }}</h3>
    <p>Total Students</p>
</div>


    <!-- TEACHERS -->

    <div class="dashboard-card">

        <div class="dashboard-card-top">

            <div class="dashboard-icon">
                <i class="ti ti-users"></i>
            </div>

            <a href="{{ route('admin.students.index') }}" class="dashboard-card-link">
                <i class="ti ti-arrow-up-right"></i>
            </a>

        </div>

        <h3>{{ $totalTeachers}}</h3>

        <p>
            Total Teachers
        </p>

    </div>


    <!-- ADMISSIONS -->

    <div class="dashboard-card">

        <div class="dashboard-card-top">

            <div class="dashboard-icon">
                <i class="ti ti-file-description"></i>
            </div>

            <a href="{{ route('admin.admissions.index') }}" class="dashboard-card-link">
                <i class="ti ti-arrow-up-right"></i>
            </a>

        </div>

        <h3>{{ $totalApplications}}</h3>

        <p>
            Applications
        </p>

    </div>


    <!-- EVENTS -->

    <div class="dashboard-card">

        <div class="dashboard-card-top">

            <div class="dashboard-icon">
                <i class="ti ti-calendar-event"></i>
            </div>

            <a href="{{ route('admin.events.index') }}" class="dashboard-card-link">
                <i class="ti ti-arrow-up-right"></i>
            </a>

        </div>

        <h3>{{ $upcomingEvents}}</h3>

        <p>
            Upcoming Events
        </p>

    </div>


    <!-- GALLERY -->

    <div class="dashboard-card">

        <div class="dashboard-card-top">

            <div class="dashboard-icon">
                <i class="ti ti-photo"></i>
            </div>


<a href="{{ route('admin.gallery.index') }}" class="dashboard-card-link">
                <i class="ti ti-arrow-up-right"></i>
            </a>
        </div>

        <h3>{{ $totalGalleryPhotos}}</h3>

        <p>
            Gallery Photos
        </p>

    </div>


    <!-- BLOG -->

    <div class="dashboard-card">

        <div class="dashboard-card-top">

            <div class="dashboard-icon">
                <i class="ti ti-news"></i>
            </div>

            <a href="{{ route('admin.blogs.index') }}" class="dashboard-card-link">
                <i class="ti ti-arrow-up-right"></i>
            </a>

        </div>

        <h3>{{ $totalBlogPosts}}</h3>

        <p>
            Blog Posts
        </p>

    </div>


    <!-- ACADEMICS -->

    <div class="dashboard-card">

        <div class="dashboard-card-top">

            <div class="dashboard-icon">
                <i class="ti ti-book"></i>
            </div>

<a href="#" class="dashboard-card-link">
                <i class="ti ti-arrow-up-right"></i>
            </a>
        </div>

        <h3>{{ $totalAcademicLevels}}</h3>

        <p>
            Academic Levels
        </p>

    </div>


    <!-- FACILITIES -->

    <div class="dashboard-card">

        <div class="dashboard-card-top">

            <div class="dashboard-icon">
                <i class="ti ti-building"></i>
            </div>

        </div>

        <h3>0</h3>

        <p>
            Scholarship
        </p>

    </div>

</div>


<!-- LOWER AREA -->

<div class="dashboard-columns">


    <!-- QUICK ACTIONS -->

    <div class="admin-panel">

        <div class="panel-header">

            <h3>
                Quick Actions
            </h3>

        </div>


        <div class="quick-actions">

            <a href="{{ route('admin.students.create') }}" class="quick-action">

                <i class="ti ti-user-plus"></i>

                Add Student

            </a>


            <a href="{{ route('admin.teachers.create') }}" class="quick-action">

                <i class="ti ti-user-check"></i>

                Add Teacher

            </a>


            <a href="{{ route('admin.events.create') }}" class="quick-action">

                <i class="ti ti-calendar-plus"></i>

                Create Event

            </a>


            <a href="{{ route('admin.blogs.create') }}" class="quick-action">

                <i class="ti ti-news"></i>

                Create Blog Post

            </a>


            <a href="{{ route('admin.gallery.create') }}" class="quick-action">

                <i class="ti ti-photo-plus"></i>

                Add Gallery Photo

            </a>


            <a href="{{ route('admin.settings.index')}}" class="quick-action"> 

                <i class="ti ti-settings"></i>

                School Settings

            </a>

        </div>

    </div>


    <!-- RECENT ACTIVITY -->

    <div class="admin-panel">

        <div class="panel-header">

            <h3>
                Recent Activity
            </h3>

            <a href="#">
                View All
            </a>

        </div>


        <div class="activity-list">


            <div class="activity-item">

                <div class="activity-icon">

                    <i class="ti ti-user-plus"></i>

                </div>

                <div class="activity-text">

                    <strong>
                        New student registered
                    </strong>

                    <span>
                        No recent activity
                    </span>

                </div>

            </div>


            <div class="activity-item">

                <div class="activity-icon">

                    <i class="ti ti-calendar-event"></i>

                </div>

                <div class="activity-text">

                    <strong>
                        School event
                    </strong>

                    <span>
                        No recent activity
                    </span>

                </div>

            </div>


            <div class="activity-item">

                <div class="activity-icon">

                    <i class="ti ti-news"></i>

                </div>

                <div class="activity-text">

                    <strong>
                        Blog update
                    </strong>

                    <span>
                        No recent activity
                    </span>

                </div>

            </div>


        </div>

    </div>


</div>


@endsection