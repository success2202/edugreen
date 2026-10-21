<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //
      public function index()
    {
        $blogs = Blog::latest()->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Make slug unique
        $originalSlug = $validated['slug'];
        $counter = 1;

        while (Blog::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter++;
        }

        // if ($request->hasFile('image')) {
        //     $validated['image'] = $request->file('image')
        //         ->store('blogs', 'public');
        // }

        if ($request->hasFile('image')) {

    // Set upload folder
    $imagePath = public_path('backend/assets/about');

    // Create folder if it doesn't exist
    if (!is_dir($imagePath)) {
        mkdir($imagePath, 0755, true);
    }

    // Generate a unique filename
    $filename = 'blog_' . uniqid() . '.' .
        $request->file('image')->getClientOriginalExtension();

    // Upload image to backend/assets/img/about
    $request->file('image')->move($imagePath, $filename);

    // Save filename in database
    $validated['image'] = $filename;
}

        $validated['status'] = $request->has('status') ? 1 : 0;

        Blog::create($validated);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.show', compact('blog'));
    }

    public function showEditForm(string $id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Make slug unique while ignoring current blog
        $originalSlug = $validated['slug'];
        $counter = 1;

        while (
            Blog::where('slug', $validated['slug'])
                ->where('id', '!=', $blog->id)
                ->exists()
        ) {
            $validated['slug'] = $originalSlug . '-' . $counter++;
        }

        // if ($request->hasFile('image')) {

        //     if ($blog->image) {
        //         Storage::disk('public')->delete($blog->image);
        //     }

        //     $validated['image'] = $request->file('image')
        //         ->store('blogs', 'public'); 
        // }

if ($request->hasFile('image')) {

    // Image upload folder
    $imagePath = public_path('frontend/assets/about');

    // Create folder if it does not exist
    if (!is_dir($imagePath)) {
        mkdir($imagePath, 0755, true);
    }

    // Delete old image if it exists in this folder
    if ($blog->image) {
        $oldImage = $imagePath . '/' . basename($blog->image);

        if (is_file($oldImage)) {
            unlink($oldImage);
        }
    }

    // Generate a unique filename
    $filename = 'blog_' . uniqid() . '.' .
        $request->file('image')->getClientOriginalExtension();

    // Upload image
    $request->file('image')->move($imagePath, $filename);

    // Save filename in database
    $validated['image'] = $filename;
}


        $validated['status'] = $request->has('status') ? 1 : 0;

        $blog->update($validated);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog post deleted successfully.');
    }
}
