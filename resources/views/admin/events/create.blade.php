@extends('admin.layouts.app')

@section('title', 'Create Event')

@section('page-title', 'Create Event')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Create Event</h1>
        <p>Create a new school event or activity.</p>
    </div>

    <a href="{{ route('admin.events.index') }}"
       class="admin-secondary-btn">

        <i class="ti ti-arrow-left"></i>
        Back to Events

    </a>

</div>


<div class="admin-form-panel">

    <form action="{{ route('admin.events.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf


        <div class="form-section-title">
            <i class="ti ti-calendar-event"></i>
            Event Information
        </div>


        <div class="admin-form-grid">

            <div class="admin-form-group full">

                <label>
                    Event Title
                </label>

                <input type="text"
                       name="title"
                       placeholder="Enter event title"
                       required>

            </div>


            <div class="admin-form-group">

                <label>
                    Event Date
                </label>

                <input type="date"
                       name="event_date"
                       required>

            </div>


            <div class="admin-form-group">

                <label>
                    Event Time
                </label>

                <input type="time"
                       name="event_time">

            </div>


            <div class="admin-form-group full">

                <label>
                    Venue
                </label>

                <input type="text"
                       name="venue"
                       placeholder="e.g. School Main Hall">

            </div>


            <div class="admin-form-group full">

                <label>
                    Description
                </label>

                <textarea name="description"
                          rows="6"
                          placeholder="Describe the event..."></textarea>

            </div>


            <div class="admin-form-group">

                <label>
                    Event Image
                </label>

                <input type="file"
                       name="image"
                       accept="image/*">

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

            <a href="{{ route('admin.events.index') }}"
               class="admin-secondary-btn">
                Cancel
            </a>

            <button type="submit"
                    class="admin-primary-btn">

                <i class="ti ti-calendar-plus"></i>

                Create Event

            </button>

        </div>

    </form>

</div>

@endsection