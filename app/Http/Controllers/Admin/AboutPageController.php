<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    //
     // Display the saved About Page information.
    public function index()
    {
        $about = AboutPage::first();
        $school = SchoolSetting::first();
        return view('admin.about.index', compact('about', 'school'));
    }

   public function create()
{
    $school = SchoolSetting::first();

    return view('admin.about.create', compact('school'));
}

    public function store(Request $request)
    {
        if (AboutPage::exists()) {
            return redirect()->route('admin.about.index')
                ->with('success', 'An About Page already exists.');
        }

        $validated = $request->validate([
            'content' => 'nullable|string',
            'mission' => 'nullable|string',
            'values'  => 'nullable|string',
            'vision'  => 'nullable|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // if ($request->hasFile('image')) {
        //     $validated['image'] = $request->file('image')
        //         ->store('about', 'public');
        // }

        if ($request->hasFile('image')) {
    $image = $request->file('image');

    // Generate a unique filename
    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

    // Save image to public/frontend/assets/about
    $image->move(public_path('frontend/assets/about'), $imageName);

    // Save image path in the database
    $validated['image'] = 'frontend/assets/about/' . $imageName;
}

        AboutPage::create($validated);

        return redirect()->route('admin.about.index')
            ->with('success', 'About Page created successfully.');
    }

    public function edit($id)
    {
        $about = AboutPage::findOrFail($id);

        $school = SchoolSetting::first();
        return view('admin.about.edit', compact('about', 'school'));
    }

    public function update(Request $request, $id)
    {
        $about = AboutPage::findOrFail($id);

        $validated = $request->validate([
            'content' => 'nullable|string',
            'mission' => 'nullable|string',
            'values'  => 'nullable|string',
            'vision'  => 'nullable|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // if ($request->hasFile('image')) {
        //     $newImage = $request->file('image')->store('about', 'public');

        //     if ($about->image) {
        //         Storage::disk('public')->delete($about->image);
        //     }

        //     $validated['image'] = $newImage;
        // }

        if ($request->hasFile('image')) {
    $image = $request->file('image');

    // Generate a unique filename
    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

    // Save directly to public/frontend/assets/about
    $image->move(public_path('frontend/assets/about'), $imageName);

    // Delete the previous image if it exists
    if ($about->image && file_exists(public_path($about->image))) {
        unlink(public_path($about->image));
    }

    // Save the relative path in the database
    $validated['image'] = 'frontend/assets/about/' . $imageName;
}

        $about->update($validated);

        return redirect()->route('admin.about.index')
            ->with('success', 'About Page updated successfully.');
    }
}
