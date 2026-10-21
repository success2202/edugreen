<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    //
     public function Index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.gallaries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallaries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',

            'category' => 'nullable|string|max:100',

            'description' => 'nullable|string',

            'media' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,webp,gif,mp4,webm,mov,avi',
                'max:51200',
            ],

            'status' => 'nullable|boolean',
        ]);

        // $file = $request->file('media');

        // $extension = strtolower($file->getClientOriginalExtension());

        // $imageExtensions = [
        //     'jpg',
        //     'jpeg',
        //     'png',
        //     'webp',
        //     'gif',
        // ];

        // if (in_array($extension, $imageExtensions)) {
        //     $mediaType = 'image';
        // } else {
        //     $mediaType = 'video';
        // }

        // $validated['media'] = $file->store('gallery', 'public');

        // $validated['media_type'] = $mediaType;

        // $validated['status'] = $request->has('status') ? 1 : 0;


$file = $request->file('media');

$extension = strtolower($file->getClientOriginalExtension());

$imageExtensions = [
    'jpg',
    'jpeg',
    'png',
    'webp',
    'gif',
];

if (in_array($extension, $imageExtensions)) {
    $mediaType = 'image';
} else {
    $mediaType = 'video';
}

// Set upload folder
$mediaPath = public_path('frontend/assets/gallery');

// Create folder if it doesn't exist
if (!is_dir($mediaPath)) {
    mkdir($mediaPath, 0755, true);
}

// Generate unique filename
$filename = 'gallery_' . uniqid() . '.' . $extension;

// Upload image or video
$file->move($mediaPath, $filename);

// Save filename in database
$validated['media'] = $filename;

$validated['media_type'] = $mediaType;

$validated['status'] = $request->has('status') ? 1 : 0;



        Gallery::create($validated);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery media uploaded successfully.');
    }

    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('admin.gallery.show', compact('gallery'));
    }

    public function showEditForm(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('admin.gallaries.edit', compact('gallery'));
    }

    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',

            'category' => 'nullable|string|max:100',

            'description' => 'nullable|string',

            'media' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,gif,mp4,webm,mov,avi',
                'max:51200',
            ],

            'status' => 'nullable|boolean',
        ]);

        // if ($request->hasFile('media')) {

        //     // Delete old file
        //     if ($gallery->media) {
        //         Storage::disk('public')->delete($gallery->media);
        //     }

        //     $file = $request->file('media');

        //     $extension = strtolower(
        //         $file->getClientOriginalExtension()
        //     );

        //     $imageExtensions = [
        //         'jpg',
        //         'jpeg',
        //         'png',
        //         'webp',
        //         'gif',
        //     ];

        //     if (in_array($extension, $imageExtensions)) {
        //         $mediaType = 'image';
        //     } else {
        //         $mediaType = 'video';
        //     }

        //     $validated['media'] = $file->store(
        //         'gallery',
        //         'public'
        //     );

        //     $validated['media_type'] = $mediaType;
        // }




        
if ($request->hasFile('media')) {

    // Set upload folder
    $mediaPath = public_path('frontend/assets/gallery');

    // Create folder if it doesn't exist
    if (!is_dir($mediaPath)) {
        mkdir($mediaPath, 0755, true);
    }

    // Delete old file if it exists
    if ($gallery->media) {
        $oldMedia = $mediaPath . '/' . basename($gallery->media);

        if (is_file($oldMedia)) {
            unlink($oldMedia);
        }
    }

    // Get uploaded file
    $file = $request->file('media');

    $extension = strtolower(
        $file->getClientOriginalExtension()
    );

    // Supported image extensions
    $imageExtensions = [
        'jpg',
        'jpeg',
        'png',
        'webp',
        'gif',
    ];

    // Determine media type
    if (in_array($extension, $imageExtensions)) {
        $mediaType = 'image';
    } else {
        $mediaType = 'video';
    }

    // Generate unique filename
    $filename = 'gallery_' . uniqid() . '.' . $extension;

    // Upload image or video
    $file->move($mediaPath, $filename);

    // Save filename and media type
    $validated['media'] = $filename;
    $validated['media_type'] = $mediaType;
}


        $validated['status'] = $request->has('status') ? 1 : 0;

        $gallery->update($validated);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery updated successfully.');
    }

    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->media) {
            Storage::disk('public')->delete($gallery->media);
        }

        $gallery->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery item deleted successfully.');
    }
}
