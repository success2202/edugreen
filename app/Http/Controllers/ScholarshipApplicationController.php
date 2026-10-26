<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipApplication;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ScholarshipApplicationController extends Controller
{
    //
    public function CreateScholarship()
    {
        $school = SchoolSetting::first();
        return view('users.scholarship.application', compact('school'));
    }

    public function StoreApplication(Request $request)
    {
        $validated = $request->validate([
            'scholarship_programme' => 'required|string|max:150',

            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'required|string|max:100',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:Male,Female',
            'current_school' => 'required|string|max:255',
            'current_class' => 'required|string|max:100',

            'parent_guardian_name' => 'required|string|max:255',
            'relationship' => 'required|string|max:100',
            'parent_guardian_phone' => 'required|string|max:30',
            'parent_guardian_email' => 'nullable|email|max:255',
            'parent_guardian_address' => 'required|string|max:2000',

            'reason_for_applying' => 'required|string|max:5000',
            'academic_result' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'birth_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        // foreach (['academic_result', 'birth_certificate'] as $document) {
        //     if ($request->hasFile($document)) {
        //         $validated[$document] = $request->file($document)
        //             ->store('scholarship-documents', 'local');
        //     }
        // }


        // Ensure the scholarship directory exists
$uploadPath = public_path('frontend/assets/scholarship');

if (!file_exists($uploadPath)) {
    mkdir($uploadPath, 0755, true);
}

// Upload scholarship documents
foreach (['academic_result', 'birth_certificate'] as $document) {
    if ($request->hasFile($document)) {

        $file = $request->file($document);

        // Generate a unique filename
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Move file directly into public/frontend/assets/scholarship/
        $file->move($uploadPath, $fileName);

        // Save the relative path in the database
        $validated[$document] = 'frontend/assets/scholarship/' . $fileName;
    }
}

        $validated['application_number'] =
            'EGS-SCH-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6));

        ScholarshipApplication::create($validated);

        return redirect()
            ->route('user.scholarship.application')
            ->with('success', 'Your scholarship application has been submitted successfully.');
    }

}
