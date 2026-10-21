<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    //

     public function index()
    {
        $teachers = Teacher::latest()->get();

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
            'gender' => 'nullable|in:Male,Female',
            'subject' => 'nullable|string|max:255',
            'academic_level' => 'nullable|in:Nursery,Primary,Secondary',
            'qualification' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable|boolean',
        ]);

        // if ($request->hasFile('image')) {
        //     $validated['image'] = $request->file('image')
        //         ->store('teachers', 'public');
        // }



        if ($request->hasFile('image')) {

    // Set upload folder
    $imagePath = public_path('frontend/assets/teacher');

    // Create folder if it doesn't exist
    if (!is_dir($imagePath)) {
        mkdir($imagePath, 0755, true);
    }

    // Generate a unique filename
    $filename = 'teacher_' . uniqid() . '.' .
        $request->file('image')->getClientOriginalExtension();

    // Upload image to frontend/assets/teacher
    $request->file('image')->move($imagePath, $filename);

    // Save filename in database
    $validated['image'] = $filename;
}

        $validated['status'] = $request->has('status') ? 1 : 0;

        Teacher::create($validated);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher added successfully.');
    }

    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.teachers.show', compact('teacher'));
    }

    public function showEditForm(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
            'gender' => 'nullable|in:Male,Female',
            'subject' => 'nullable|string|max:255',
            'academic_level' => 'nullable|in:Nursery,Primary,Secondary',
            'qualification' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {

        //     if ($teacher->image) {
        //         Storage::disk('public')->delete($teacher->image);
        //     }

        //     $validated['image'] = $request->file('image')
        //         ->store('teachers', 'public');
        // }


if ($request->hasFile('image')) {

    // Set upload folder
    $imagePath = public_path('frontend/assets/teacher');

    // Create folder if it doesn't exist
    if (!is_dir($imagePath)) {
        mkdir($imagePath, 0755, true);
    }

    // Delete old image if it exists
    if ($teacher->image) {
        $oldImage = $imagePath . '/' . basename($teacher->image);

        if (is_file($oldImage)) {
            unlink($oldImage);
        }
    }

    // Generate a unique filename
    $filename = 'teacher_' . uniqid() . '.' .
        $request->file('image')->getClientOriginalExtension();

    // Upload new image
    $request->file('image')->move($imagePath, $filename);

    // Save filename in database
    $validated['image'] = $filename;
}


        }


        $validated['status'] = $request->has('status') ? 1 : 0;

        $teacher->update($validated);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher updated successfully.');
    }

    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher->image) {
            Storage::disk('public')->delete($teacher->image);
        }

        $teacher->delete();

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
}
