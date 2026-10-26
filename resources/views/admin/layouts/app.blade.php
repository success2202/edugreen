<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Dashboard') |
        {{ config('app.name') }}
    </title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

          @if($school?->favicon)
    <link rel="icon"
          type="image/png"
          href="{{ asset('frontend/assets/img/logo/' . $school->favicon) }}">
@endif

    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

          <link rel="stylesheet" href="{{ asset('backend/assets/css/admin.css') }}">

    <style>

        :root {
            --green: #6dcc2c;
            --green-dark: #59b91b;
            --green-light: #f0f8eb;

            --navy: #263746;
            --text: #68757e;

            --white: #ffffff;
            --light: #f6f8f5;
            --border: #e5e9e3;

            --sidebar-width: 260px;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Arial, sans-serif;
            background: var(--light);
            color: var(--navy);
        }


        a {
            text-decoration: none;
        }


        /* SIDEBAR */

        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;

            width: var(--sidebar-width);
            height: 100vh;

            background: var(--navy);

            z-index: 1000;

            display: flex;
            flex-direction: column;
        }


        .sidebar-logo {
            height: 75px;

            padding: 15px 20px;

            display: flex;
            align-items: center;

            border-bottom: 1px solid rgba(255,255,255,.08);
        }


        .sidebar-logo-box {
            width: 42px;
            height: 42px;

            background: #fff;

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-right: 10px;
        }


        .sidebar-logo-box img {
            max-width: 34px;
            max-height: 34px;
        }


        .sidebar-school-name {
            color: #fff;

            font-family: "Roboto Slab", Georgia, serif;

            font-size: 16px;
            font-weight: 700;
        }


        .sidebar-menu {
            padding: 20px 12px;

            overflow-y: auto;

            flex: 1;
        }


        .menu-title {
            color: #84939d;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 1.2px;

            padding: 0 12px 10px;
        }


        .sidebar-link {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            margin-bottom: 4px;

            color: #c8d1d5;

            border-radius: 7px;

            font-size: 13px;

            transition: .3s;
        }


        .sidebar-link i {
            font-size: 19px;

            width: 22px;

            text-align: center;
        }


        .sidebar-link:hover,
        .sidebar-link.active {
            background: var(--green);

            color: #fff;
        }


        .sidebar-bottom {
            padding: 15px 12px;

            border-top: 1px solid rgba(255,255,255,.08);
        }


        .logout-btn {
            width: 100%;

            border: 0;

            background: transparent;

            color: #c8d1d5;

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            border-radius: 7px;

            cursor: pointer;

            font-size: 13px;

            text-align: left;
        }


        .logout-btn:hover {
            background: rgba(255,255,255,.08);

            color: #fff;
        }


        /* MAIN */

        .admin-main {
            margin-left: var(--sidebar-width);

            min-height: 100vh;
        }


        /* TOPBAR */

        .admin-topbar {
            height: 75px;

            background: #fff;

            border-bottom: 1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;

            position: sticky;

            top: 0;

            z-index: 900;
        }


        .mobile-menu-btn {
            display: none;

            border: 0;

            background: transparent;

            color: var(--navy);

            font-size: 24px;

            cursor: pointer;
        }


        .topbar-left h2 {
            font-family: "Roboto Slab", Georgia, serif;

            font-size: 21px;

            margin-bottom: 3px;
        }


        .topbar-left p {
            color: var(--text);

            font-size: 12px;
        }


        .admin-profile {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .admin-avatar {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: var(--green-light);

            color: var(--green);

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: 700;
        }


        .admin-profile-info strong {
            display: block;

            font-size: 13px;

            color: var(--navy);
        }


        .admin-profile-info span {
            display: block;

            font-size: 11px;

            color: var(--text);

            margin-top: 2px;
        }


        /* CONTENT */

        .admin-content {
            padding: 30px;
        }


        .welcome-box {
            background: var(--navy);

            border-radius: 12px;

            padding: 28px 30px;

            color: #fff;

            margin-bottom: 25px;

            position: relative;

            overflow: hidden;
        }


        .welcome-box::after {
            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            border-radius: 50%;

            background: rgba(109,204,44,.08);

            right: -80px;

            top: -100px;
        }


        .welcome-box h1 {
            font-family: "Roboto Slab", Georgia, serif;

            font-size: 27px;

            margin-bottom: 7px;

            position: relative;

            z-index: 2;
        }


        .welcome-box h1 span {
            color: var(--green);
        }


        .welcome-box p {
            color: #c8d1d5;

            font-size: 13px;

            position: relative;

            z-index: 2;
        }


        /* CARDS */

        .dashboard-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 18px;

            margin-bottom: 25px;
        }


        .dashboard-card {
            background: #fff;

            border: 1px solid var(--border);

            border-radius: 11px;

            padding: 20px;

            transition: .3s;

            position: relative;

            overflow: hidden;
        }


        .dashboard-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 30px rgba(38,55,70,.08);
        }


        .dashboard-card-top {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 17px;
        }


        .dashboard-icon {
            width: 45px;
            height: 45px;

            border-radius: 9px;

            background: var(--green-light);

            color: var(--green);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 22px;
        }


        .dashboard-card-link {
            color: #a2adb2;

            font-size: 18px;
        }


        .dashboard-card h3 {
            font-size: 25px;

            color: var(--navy);

            margin-bottom: 4px;
        }


        .dashboard-card p {
            color: var(--text);

            font-size: 12px;
        }


        /* LOWER CONTENT */

        .dashboard-columns {
            display: grid;

            grid-template-columns:
                1.5fr 1fr;

            gap: 20px;
        }


        .admin-panel {
            background: #fff;

            border: 1px solid var(--border);

            border-radius: 11px;

            overflow: hidden;
        }


        .panel-header {
            padding: 18px 20px;

            border-bottom: 1px solid var(--border);

            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .panel-header h3 {
            font-family: "Roboto Slab", Georgia, serif;

            font-size: 17px;
        }


        .panel-header a {
            color: var(--green);

            font-size: 12px;

            font-weight: 700;
        }


        .quick-actions {
            padding: 20px;

            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 12px;
        }


        .quick-action {
            padding: 15px;

            border: 1px solid var(--border);

            border-radius: 8px;

            color: var(--navy);

            display: flex;

            align-items: center;

            gap: 10px;

            font-size: 12px;

            transition: .3s;
        }


        .quick-action i {
            color: var(--green);

            font-size: 19px;
        }


        .quick-action:hover {
            border-color: var(--green);

            background: var(--green-light);
        }


        .activity-list {
            padding: 5px 20px 15px;
        }


        .activity-item {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 13px 0;

            border-bottom: 1px solid #f0f2ef;
        }


        .activity-item:last-child {
            border-bottom: 0;
        }


        .activity-icon {
            width: 35px;
            height: 35px;

            background: var(--green-light);

            color: var(--green);

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;
        }


        .activity-text strong {
            display: block;

            font-size: 12px;

            color: var(--navy);
        }


        .activity-text span {
            display: block;

            font-size: 10px;

            color: var(--text);

            margin-top: 3px;
        }


        /* MOBILE */

        @media (max-width: 1100px) {

            .dashboard-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 991px) {

            .admin-sidebar {
                transform: translateX(-100%);

                transition: .3s;
            }


            .admin-sidebar.show {
                transform: translateX(0);
            }


            .admin-main {
                margin-left: 0;
            }


            .mobile-menu-btn {
                display: block;
            }


            .admin-topbar {
                padding: 0 20px;
            }


            .dashboard-columns {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 767px) {

            .admin-content {
                padding: 20px 15px;
            }


            .dashboard-grid {
                grid-template-columns: 1fr;
            }


            .welcome-box {
                padding: 23px;
            }


            .welcome-box h1 {
                font-size: 23px;
            }


            .admin-profile-info {
                display: none;
            }


            .topbar-left h2 {
                font-size: 18px;
            }


            .topbar-left p {
                display: none;
            }


            .quick-actions {
                grid-template-columns: 1fr;
            }

        }


    </style>

    @yield('styles')

</head>


<body>


<!-- SIDEBAR -->

<aside class="admin-sidebar" id="adminSidebar">

    <div class="sidebar-logo">

        <div class="sidebar-logo-box">

            <img
                src="{{ asset('frontend/assets/img/logo.jpeg') }}"
                alt="School Logo"
            >

        </div>

        <div class="sidebar-school-name">
            Admin Portal
        </div>

    </div>


    <div class="sidebar-menu">

        <div class="menu-title">
            MAIN MENU
        </div>


        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link active">

            <i class="ti ti-dashboard"></i>

            Dashboard

        </a>


        <a href="{{ route('admin.students.index') }}" class="sidebar-link">

            <i class="ti ti-school"></i>

            Students

        </a>

         {{-- <a href="{{ route('admin.users.index') }}" class="sidebar-link">

            <i class="ti ti-school"></i>

            Users

        </a> --}}

         <a href="{{ route('admin.admissions.applications') }}" class="sidebar-link">

            <i class="ti ti-school"></i>

            Applications

        </a>


        <a href="{{ route('admin.teachers.index') }}" class="sidebar-link">

            <i class="ti ti-users"></i>

            Teachers

        </a>


        <a href="{{ route('admin.admissions.index') }}" class="sidebar-link">

            <i class="ti ti-file-description"></i>

            Admissions

        </a>


        <div class="menu-title" style="margin-top:20px;">
            SCHOOL CONTENT
        </div>


        <a href="{{ route('admin.events.index') }}" class="sidebar-link">

            <i class="ti ti-calendar-event"></i>

            Events

        </a>


        <a href="{{ route('admin.gallery.index') }}" class="sidebar-link">

            <i class="ti ti-photo"></i>

            Gallery

        </a>


        <a href="{{ route('admin.blogs.index') }}" class="sidebar-link">

            <i class="ti ti-news"></i>

            Blog

        </a>


        <a href="{{ route('admin.about.index') }}" class="sidebar-link">

            <i class="ti ti-book"></i>

            About

        </a>


        <a href="{{ route('admin.scholarship-applications.index') }}" class="sidebar-link">

            <i class="ti ti-building"></i>

            Scholarship

        </a>


        <div class="menu-title" style="margin-top:20px;">
            SYSTEM
        </div>


        <a href="{{ route('admin.settings.index') }}" class="sidebar-link">

            <i class="ti ti-settings"></i>

            Settings

        </a>

    </div>


    <div class="sidebar-bottom">

        <form action="{{ route('admin.logout') }}"
              method="POST">

            @csrf

            <button type="submit"
                    class="logout-btn">

                <i class="ti ti-logout"></i>

                Logout

            </button>

        </form>

    </div>

</aside>


<!-- MAIN -->

<main class="admin-main">


    <!-- TOPBAR -->

    <header class="admin-topbar">

        <div style="display:flex;align-items:center;gap:15px;">

            <button class="mobile-menu-btn"
                    onclick="toggleSidebar()">

                <i class="ti ti-menu-2"></i>

            </button>


            <div class="topbar-left">

                <h2>
                    @yield('page-title', 'Dashboard')
                </h2>

                <p>
                    School Administration Portal
                </p>

            </div>

        </div>


        <div class="admin-profile">

            <div class="admin-avatar">

                {{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 1)) }}

            </div>

            <div class="admin-profile-info">

                <strong>
                    {{ Auth::guard('admin')->user()->name }}
                </strong>

                <span>
                    Administrator
                </span>

            </div>

        </div>

    </header>


    <!-- CONTENT -->

    <div class="admin-content">

        @yield('content')

    </div>

</main>


<script>

function toggleSidebar()
{
    document
        .getElementById('adminSidebar')
        .classList.toggle('show');
}

</script>


@yield('scripts')

</body>

</html>