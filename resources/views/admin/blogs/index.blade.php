@extends('admin.layouts.app')

@section('title', 'Blog')

@section('page-title', 'Blog')

@section('styles')
    <style> 

/* Blog table horizontal scrolling */
.blogs-table-scroll {
    display: block;
    width: 100%;
    max-width: 100%;
    overflow-x: auto !important;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
}

.blogs-table-scroll .admin-table {
    width: 100%;
    min-width: 850px;
    border-collapse: collapse;
    margin-bottom: 0;
}

.blogs-table-scroll .admin-table th,
.blogs-table-scroll .admin-table td {
    white-space: nowrap;
    vertical-align: middle;
}

/* Allow long blog titles to wrap */
.blogs-table-scroll .admin-table td:nth-child(2) {
    white-space: normal;
    min-width: 200px;
}

/* Keep action buttons on one line */
.blogs-table-scroll .table-actions {
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
}

.blogs-table-scroll .table-actions form {
    display: inline-flex;
    margin: 0;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .blogs-table-scroll {
        width: 100%;
        max-width: 100%;
        overflow-x: auto !important;
    }

    .blogs-table-scroll .admin-table {
        min-width: 850px;
    }
}

    </style>
@endsection

@section('content')

<div class="admin-page-header">

    <div>
        <h1>Blog & News</h1>
        <p>Manage school news, announcements and articles.</p>
    </div>

    <a href="{{ route('admin.blogs.create') }}"
       class="admin-primary-btn">

        <i class="ti ti-plus"></i>

        Create Post

    </a>

</div>


<div class="admin-panel">

    <div class="admin-table-header">

        <h3>All Posts</h3>

    </div>


    <div class="table-responsive blogs-table-scroll">

        <table class="admin-table">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Title</th>

                    <th>Category</th>

                    <th>Author</th>

                    <th>Status</th>

                    <th>Action</th>

                </tr>

            </thead>


            <tbody>

                @forelse($blogs ?? [] as $blog)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>

                        <strong>
                            {{ $blog->title }}
                        </strong>

                    </td>

                    <td>
                        {{ $blog->category }}
                    </td>

                    <td>
                        {{ $blog->author }}
                    </td>

                    <td>

                        @if($blog->status)

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

                            <a href="#"
                               class="action-btn view">
                                <i class="ti ti-eye"></i>
                            </a>

                            <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                               class="action-btn edit">
                                <i class="ti ti-edit"></i>
                            </a>

                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this blog post?')">
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

                        <i class="ti ti-news"></i>

                        <h4>No Blog Posts</h4>

                        <p>
                            Create your first blog post.
                        </p>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection