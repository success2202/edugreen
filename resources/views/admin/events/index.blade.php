@extends('admin.layouts.app')

@section('title', 'Events')

@section('page-title', 'Events')

@section('styles')
    <style>
    /* Events table horizontal scrolling */
.events-table-scroll {
    display: block;
    width: 100%;
    max-width: 100%;
    overflow-x: auto !important;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
}

.events-table-scroll .admin-table {
    width: 100%;
    min-width: 850px;
    border-collapse: collapse;
    margin-bottom: 0;
}

.events-table-scroll .admin-table th,
.events-table-scroll .admin-table td {
    white-space: nowrap;
    vertical-align: middle;
}

/* Allow long event titles and venues to wrap */
.events-table-scroll .admin-table td:nth-child(2),
.events-table-scroll .admin-table td:nth-child(4) {
    white-space: normal;
    min-width: 160px;
}

/* Keep action buttons aligned */
.events-table-scroll .table-actions {
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
}

.events-table-scroll .table-actions form {
    display: inline-flex;
    margin: 0;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .events-table-scroll {
        width: 100%;
        max-width: 100%;
        overflow-x: auto !important;
    }

    .events-table-scroll .admin-table {
        min-width: 850px;
    }
}
    </style>
@endsection

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


    <div class="table-responsive events-table-scroll">

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