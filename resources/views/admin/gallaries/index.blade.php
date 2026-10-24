@extends('admin.layouts.app')

@section('title', 'Gallery')

@section('page-title', 'Gallery')

@section('content')

<div class="admin-page-header">

    <div>
        <h1>School Gallery</h1>
        <p>Manage photos displayed on your school website.</p>
    </div>

    <a href="{{ route('admin.gallery.create') }}"
       class="admin-primary-btn">

        <i class="ti ti-photo-plus"></i>

        Add Photo

    </a>

</div>


<div class="gallery-admin-grid">

    @forelse($galleries ?? [] as $gallery)

        <div class="gallery-admin-card">

            <div class="gallery-admin-image">

                <img src="{{ asset('frontend/assets/gallery/' . $gallery->media) }}"
                     alt="{{ $gallery->title }}">

                <div class="gallery-admin-actions">

                    <a href="{{ route('admin.gallery.edit', $gallery->id) }}"
                       class="action-btn edit">

                        <i class="ti ti-edit"></i>

                    </a>

                    <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this gallery item?')">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </form>

                </div>

            </div>


            <div class="gallery-admin-content">

                <h3>
                    {{ $gallery->title }}
                </h3>

                <span>
                    {{ $gallery->category }}
                </span>

            </div>

        </div>

    @empty

        <div class="empty-gallery">

            <i class="ti ti-photo"></i>

            <h3>No Gallery Photos</h3>

            <p>
                Upload your first school photo.
            </p>

        </div>

    @endforelse

</div>

@endsection