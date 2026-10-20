@extends('admin.layouts.app')

@section('title', 'Users')

@section('page-title', 'Users')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Registered Users</h1>

        <p>
            Manage parents, students and other registered users.
        </p>
    </div>

</div>


<div class="admin-panel">

    <div class="admin-table-header">

        <h3>All Users</h3>

        <div class="admin-search">

            <i class="ti ti-search"></i>

            <input type="text"
                   placeholder="Search users...">

        </div>

    </div>


    <div class="table-responsive">

        <table class="admin-table">

            <thead>

                <tr>

                    <th>#</th>

                    <th>User</th>

                    <th>Email</th>

                    <th>Phone</th>

                    <th>Registered</th>

                    <th>Action</th>

                </tr>

            </thead>


            <tbody>

                @forelse($users ?? [] as $user)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>


                    <td>

                        <div class="table-user">

                            <div class="table-avatar">

                                {{ strtoupper(substr($user->name, 0, 1)) }}

                            </div>

                            <strong>
                                {{ $user->name }}
                            </strong>

                        </div>

                    </td>


                    <td>
                        {{ $user->email }}
                    </td>


                    <td>
                        {{ $user->phone ?? '—' }}
                    </td>


                    <td>
                        {{ $user->created_at->format('d M Y') }}
                    </td>


                    <td>

                        <div class="table-actions">

                            <a href="#"
                               class="action-btn view">

                                <i class="ti ti-eye"></i>

                            </a>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="empty-table">

                        <i class="ti ti-users"></i>

                        <h4>
                            No Users Found
                        </h4>

                        <p>
                            No registered users yet.
                        </p>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection