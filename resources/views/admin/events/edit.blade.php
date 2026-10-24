@extends('admin.layouts.app')

@section('title', 'Edit Event')

@section('page-title', 'Edit Event')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Edit Event</h1>
        <p>Update the details of the event.</p>
    </div>

    <a href="{{ route('admin.events.index') }}"
       class="admin-secondary-btn">

        <i class="ti ti-arrow-left"></i>
        Back to Events

    </a>

</div>


<div class="admin-form-panel">

    <form action="{{ route('admin.events.update', $event->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')


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
                       value="{{ old('title', $event->title) }}"
                       required>

            </div>


            <div class="admin-form-group">

                <label>
                    Event Date
                </label>

                <input type="date"
                       name="event_date"
                          value="{{ old('event_date', $event->event_date) }}"
                       required>

            </div>


            <div class="admin-form-group">

                <label>
                    Event Time
                </label>

                <input type="time"
                       name="event_time"
                       value="{{ old('event_time', $event->event_time) }}">

            </div>


            <div class="admin-form-group full">

                <label>
                    Venue
                </label>

                <input type="text"
                       name="venue"
                       placeholder="e.g. School Main Hall"
                       value="{{ old('venue', $event->venue) }}">

            </div>


            <div class="admin-form-group full">

                <label>
                    Description
                </label>

                <textarea name="description"
                          rows="6"
                          placeholder="Describe the event...">
                        {{ old('description', $event->description) }}
                        </textarea>

            </div>


            <div class="admin-form-group">

                <label>
                    Event Image
                </label>

                <input type="file"
                       name="image"
                       accept="image/*">

            </div>
@if($event->image)

    <div style="margin-bottom:15px;">
        <img src="{{ asset('frontend/assets/event/' . $event->image) }}"
             alt="{{ $event->title }}"
             style="width:180px;height:110px;object-fit:cover;">
    </div>

@endif

            <div class="admin-form-group">

                <label>
                    Status
                </label>

                {{-- <select name="status">

                    <option value="1">
                        Published
                    </option>

                    <option value="0">
                        Draft
                    </option>

                </select> --}}

<select name="status">
    <option value="1" {{ $event->status == 1 ? 'selected' : '' }}>
        Published
    </option>

    <option value="0" {{ $event->status == 0 ? 'selected' : '' }}>
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

                Update Event

            </button>

        </div>

    </form>

</div>

@endsection