@extends('admin.layouts.app')

@section('title', 'Teachers')

@section('page-title', 'Teachers')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Teachers</h1>
        <p>Manage your school's teaching staff.</p>
    </div>

    <a href="{{ route('admin.teachers.create') }}"
       class="admin-primary-btn">
        <i class="ti ti-user-plus"></i>
        Add Teacher
    </a>

</div>


<div class="admin-panel">

    <div class="admin-table-header">

        <h3>All Teachers</h3>

        <div class="admin-search">
            <i class="ti ti-search"></i>
            <input type="text"
                   placeholder="Search teachers...">
        </div>

    </div>


    <div class="table-responsive">

        <table class="admin-table">

            <thead>

                <tr>
                    <th>#</th>
                    <th>Teacher</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($teachers ?? [] as $teacher)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            <div class="table-user">

                                <div class="table-avatar">

                                    @if($teacher->image)
                                        <img src="{{ asset('storage/'.$teacher->image) }}"
                                             alt="{{ $teacher->name }}">
                                    @else
                                        {{ strtoupper(substr($teacher->name, 0, 1)) }}
                                    @endif

                                </div>

                                <strong>
                                    {{ $teacher->name }}
                                </strong>

                            </div>

                        </td>

                        <td>
                            {{ $teacher->email }}
                        </td>

                        <td>
                            {{ $teacher->subject }}
                        </td>

                        <td>
                            {{ $teacher->academic_level }}
                        </td>

                        <td>

                            @if($teacher->status)

                                <span class="status-badge active">
                                    Active
                                </span>

                            @else

                                <span class="status-badge inactive">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="table-actions">

                                <a href="#"
                                   class="action-btn view">
                                    <i class="ti ti-eye"></i>
                                </a>

                                <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
                                   class="action-btn edit">
                                    <i class="ti ti-edit"></i>
                                </a>

                                <form action="{{ route('admin.teachers.destroy', $teacher->id) }}"
                  method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this teacher?');">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="action-btn text-danger">
                    <i class="ti ti-trash"></i>
                </button>

            </form>
                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="empty-table">

                            <i class="ti ti-users"></i>

                            <h4>No Teachers Found</h4>

                            <p>
                                Add your first teacher to get started.
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection