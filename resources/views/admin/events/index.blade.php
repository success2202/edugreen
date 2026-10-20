@extends('admin.layouts.app')

@section('title', 'Events')

@section('page-title', 'Events')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>School Events</h1>
        <p>Manage school activities and upcoming events.</p>
    </div>

    <a href="{{ route('admin.events.create') }}"
       class="admin-primary-btn">

        <i class="ti ti-calendar-plus"></i>

        Create Event

    </a>

</div>


<div class="admin-panel">

    <div class="admin-table-header">

        <h3>All Events</h3>

    </div>


    <div class="table-responsive">

        <table class="admin-table">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Event</th>

                    <th>Date</th>

                    <th>Venue</th>

                    <th>Status</th>

                    <th>Action</th>

                </tr>

            </thead>


            <tbody>

                @forelse($events ?? [] as $event)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>

                        <strong>
                            {{ $event->title }}
                        </strong>

                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                    </td>

                    <td>
                        {{ $event->venue }}
                    </td>

                    <td>

                        @if($event->status)

                            <span class="status-badge active">
                                Published
                            </span>

                        @else

                            <span class="status-badge inactive">
                                Draft
                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="table-actions">

                            <a href="{{ route('admin.events.edit', $event->id) }}"
                               class="action-btn edit">

                                <i class="ti ti-edit"></i>

                            </a>

                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this event?')">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </form>
                            

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="empty-table">

                        <i class="ti ti-calendar-event"></i>

                        <h4>No Events Found</h4>

                        <p>
                            Create your first school event.
                        </p>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection