<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    //
     public function application()
    {
        $school = SchoolSetting::first();
        return view('users.application.apply', compact('school'));
    }

    /**
     * Store new application.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            // Student information
            'first_name' => 'required|string|max:100',

            'middle_name' => 'nullable|string|max:100',

            'last_name' => 'required|string|max:100',

            'date_of_birth' => 'required|date',

            'gender' => 'required|in:Male,Female',

            'level' => 'required|in:Nursery,Primary,Secondary',

            'class' => 'required|string|max:50',

            'previous_school' => 'nullable|string|max:255',

            'student_photo' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',


            // Parent information
            'parent_name' =>
                'required|string|max:255',

            'parent_phone' =>
                'required|string|max:30',

            'parent_email' =>
                'nullable|email|max:255',

            'relationship' =>
                'required|string|max:50',

            'parent_address' =>
                'required|string|max:1000',


            // Application
            'session' =>
                'required|string|max:20',

            'referral_source' =>
                'nullable|string|max:100',

            'message' =>
                'nullable|string|max:2000',

            'declaration' =>
                'required|accepted',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Upload Student Passport
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('student_photo')) {

            $validated['student_photo'] =
                $request->file('student_photo')
                    ->store('applications', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Default Application Status
        |--------------------------------------------------------------------------
        */

        $validated['status'] = 'Pending';


        /*
        |--------------------------------------------------------------------------
        | Save Application
        |--------------------------------------------------------------------------
        */

        Application::create($validated);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('user.application')
            ->with(
                'success',
                'Your application has been submitted successfully. Our admissions team will contact you.'
            );
    }
}
