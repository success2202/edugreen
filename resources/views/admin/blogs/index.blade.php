@extends('admin.layouts.app')

@section('title', 'Blog')

@section('page-title', 'Blog')

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


    <div class="table-responsive">

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