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

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('about', 'public');
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

        if ($request->hasFile('image')) {
            $newImage = $request->file('image')->store('about', 'public');

            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }

            $validated['image'] = $newImage;
        }

        $about->update($validated);

        return redirect()->route('admin.about.index')
            ->with('success', 'About Page updated successfully.');
    }
}
