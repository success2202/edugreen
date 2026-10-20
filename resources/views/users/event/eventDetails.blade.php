@extends('layouts.app')

@section('styles')
<style>

        :root {
            --event-green: #123c2a;
            --event-light-green: #7ed957;
            --event-text: #555;
            --event-bg: #f7faf7;
        }

        body {
            background: var(--event-bg);
            color: var(--event-text);
            font-family: Arial, sans-serif;
            line-height: 1.8;
        }

        .event-details-wrapper {
            padding: 60px 0;
        }

        .event-details-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(18, 60, 42, 0.08);
        }

        .event-details-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            display: block;
        }

        .event-details-content {
            padding: 35px;
        }

        /* .event-breadcrumb {
            margin-bottom: 20px;
            font-size: 14px;
        }

        .event-breadcrumb a {
            color: var(--event-green);
            text-decoration: none;
        }

        .event-breadcrumb span {
            color: #888;
        } */

        .event-category {
            display: inline-block;
            background: #eaf7e5;
            color: var(--event-green);
            padding: 5px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .event-details-content h1 {
            color: var(--event-green);
            font-size: 34px;
            font-weight: 700;
            line-height: 1.4;
            margin: 0 0 25px;
        }

        .event-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        .event-meta-item {
            flex: 1 1 180px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background: #f6faf5;
            border: 1px solid #e8f0e5;
            padding: 15px;
            border-radius: 8px;
        }

        .event-meta-item i {
            color: var(--event-light-green);
            font-size: 20px;
            margin-top: 4px;
        }

        .event-meta-item strong {
            display: block;
            color: var(--event-green);
            font-size: 14px;
        }

        .event-meta-item span {
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        .event-description {
            font-size: 16px;
            color: #555;
            overflow-wrap: anywhere;
        }

        .event-description p {
            margin-bottom: 18px;
        }

        .event-back-button {
            display: inline-block;
            margin-top: 25px;
            padding: 11px 24px;
            background: var(--event-green);
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .event-back-button:hover {
            background: var(--event-light-green);
            color: var(--event-green);
            text-decoration: none;
        }

        @media (max-width: 767px) {
            .event-details-wrapper {
                padding: 30px 0;
            }

            .event-details-content {
                padding: 22px;
            }

            .event-details-content h1 {
                font-size: 26px;
            }

            .event-details-image {
                max-height: 300px;
            }
        }
  
/* breadcrum event */


/* =========================================
BREADCRUMB — SAME AS BLOG DETAILS
========================================= */

.blog-breadcrumb {
    background: #123c2a;
    padding: 25px 0;
    margin-bottom: 55px;
}

.blog-breadcrumb-content {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 14px;
}

.blog-breadcrumb-content span {
    display: flex;
    align-items: center;
    gap: 6px;
}

.blog-breadcrumb-content a {
    color: #ffffff;
    text-decoration: none;
    transition: 0.3s ease;
}

.blog-breadcrumb-content a:hover {
    color: #7ed957;
}

.blog-breadcrumb-content > i {
    font-size: 15px;
    color: #7ed957;
}

.blog-breadcrumb-content .current {
    color: #7ed957;
    font-weight: 600;
}

/* TABLET */
@media (max-width: 991px) {
    .blog-breadcrumb {
        margin-bottom: 40px;
        padding: 20px 0;
    }
}

/* MOBILE */
@media (max-width: 767px) {
    .blog-breadcrumb {
        margin-bottom: 30px;
        padding: 17px 0;
    }

    .blog-breadcrumb-content {
        font-size: 12px;
        gap: 7px;
    }

    .blog-breadcrumb-content .current {
        max-width: 180px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
}



</style>
@endsection
@section('content')

 <!-- Breadcrumb -->
<div class="blog-breadcrumb">
    <div class="container">

        <div class="blog-breadcrumb-content">

            <span>
                <i class="ti ti-home"></i>
                <a href="{{ route('user.home') }}">Home</a>
            </span>

            <i class="ti ti-chevron-right"></i>

            <span>
                <a href="{{ url('/events') }}">Events</a>
            </span>

            <i class="ti ti-chevron-right"></i>

            <span class="current">
                {{ $event->title }}
            </span>

        </div>

    </div>
</div>
<section class="event-details-wrapper">
    <div class="container">

    
        <div class="event-details-card">

            @if($event->image)
                <img
                    src="{{ asset('storage/' . $event->image) }}"
                    alt="{{ $event->title }}"
                    class="event-details-image"
                >
            @endif

            <div class="event-details-content">

                <span class="event-category">
                    School Event
                </span>

                <h1>{{ $event->title }}</h1>

                <div class="event-meta">

                    <div class="event-meta-item">
                        <i class="fa fa-calendar"></i>
                        <div>
                            <strong>Event Date</strong>
                            <span>
                                {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }}
                            </span>
                        </div>
                    </div>

                    <div class="event-meta-item">
                        <i class="fa fa-clock-o"></i>
                        <div>
                            <strong>Event Time</strong>
                            <span>
                                {{ $event->event_time }}
                            </span>
                        </div>
                    </div>

                    <div class="event-meta-item">
                        <i class="fa fa-map-marker"></i>
                        <div>
                            <strong>Event Location</strong>
                            <span>{{ $event->venue }}</span>
                        </div>
                    </div>

                </div>

                <div class="event-description">
                    {!! nl2br(e($event->description)) !!}
                </div>

                <a href="{{ url('/events') }}" class="event-back-button">
                    <i class="fa fa-arrow-left"></i>
                    Back to Events
                </a>

            </div>
        </div>

    </div>
</section>




@endsection