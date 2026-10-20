<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmissionController extends Controller
{
    //
    //  public function Index(Request $request)
    // {
    //     $query = Application::whereNotNull('admission_number');

    //     if ($request->filled('search')) {
    //         $search = $request->search;

    //         $query->where(function ($q) use ($search) {
    //             $q->where('first_name', 'like', "%{$search}%")
    //                 ->orWhere('middle_name', 'like', "%{$search}%")
    //                 ->orWhere('last_name', 'like', "%{$search}%")
    //                 ->orWhere('admission_number', 'like', "%{$search}%")
    //                 ->orWhere('parent_phone', 'like', "%{$search}%");
    //         });
    //     }

    //     if ($request->filled('level')) {
    //         $query->where('level', $request->level);
    //     }

    //     if ($request->filled('session')) {
    //         $query->where('session', $request->session);
    //     }

    //     $admissions = $query
    //         ->latest()
    //         ->paginate(10)
    //         ->withQueryString();

    //     return view('admin.admission.index', compact('admissions'));
    // }


    public function Index(Request $request)
{
    $query = Application::whereNotNull('admission_number');


    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where('first_name', 'like', "%{$search}%")
                ->orWhere('middle_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('admission_number', 'like', "%{$search}%")
                ->orWhere('parent_phone', 'like', "%{$search}%");

        });
    }


    if ($request->filled('level')) {
        $query->where('level', $request->level);
    }


    if ($request->filled('session')) {
        $query->where('session', $request->session);
    }


    $admissions = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();


    // Get the actual students using admission numbers
    $admissionNumbers = $admissions
        ->pluck('admission_number')
        ->filter();


    $students = Student::whereIn(
        'admission_number',
        $admissionNumbers
    )
    ->get()
    ->keyBy('admission_number');


    return view(
        'admin.admission.index',
        compact('admissions', 'students')
    );
}

    /**
     * Show all applications waiting for admission.
     */
    public function applications(Request $request)
    {
        $query = Application::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('middle_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('parent_phone', 'like', "%{$search}%");
            });
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('session')) {
            $query->where('session', $request->session);
        }

        $applications = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.application.index', compact('applications'));
    }

    /**
     * View one application.
     */
    public function showApplication($id)
    {
        $application = Application::findOrFail($id);

        return view('admin.application.show', compact('application'));
    }

    /**
     * Update application status.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Reviewed,Accepted,Rejected',
        ]);

        $application = Application::findOrFail($id);

        $application->update([
            'status' => $request->status,
        ]);

        return back()->with(
            'success',
            'Application status updated successfully.'
        );
    }

    /**
     * Admit applicant and create student record.
     */
    // public function admitApplicant($id)
    // {
    //     $application = Application::findOrFail($id);

    //     // Prevent duplicate admission
    //     if ($application->admission_number) {
    //         return back()->with(
    //             'error',
    //             'This applicant has already been admitted.'
    //         );
    //     }

    //     DB::transaction(function () use ($application) {

    //         $year = date('Y');

    //         // Find the latest admission number for this year
    //         $lastAdmission = Student::where(
    //             'admission_number',
    //             'like',
    //             "ADM/AG/{$year}/%"
    //         )
    //             ->orderByDesc('id')
    //             ->first();

    //         if ($lastAdmission) {

    //             $lastNumber = (int) substr(
    //                 $lastAdmission->admission_number,
    //                 strrpos($lastAdmission->admission_number, '/') + 1
    //             );

    //             $nextNumber = $lastNumber + 1;

    //         } else {
    //             $nextNumber = 1;
    //         }

    //         $admissionNumber =
    //             'ADM/AG/' . $year . '/' . str_pad(
    //                 $nextNumber,
    //                 3,
    //                 '0',
    //                 STR_PAD_LEFT
    //             );

    //         // Create student
    //         $student = Student::create([
    //             'first_name' => $application->first_name,
    //             'middle_name' => $application->middle_name,
    //             'last_name' => $application->last_name,

    //             'admission_number' => $admissionNumber,

    //             'date_of_birth' => $application->date_of_birth,
    //             'gender' => $application->gender,

    //             'image' => $application->student_photo,

    //             'level' => $application->level,
    //             'class' => $application->class,

    //             'admission_date' => now()->toDateString(),

    //             'parent_name' => $application->parent_name,
    //             'parent_phone' => $application->parent_phone,
    //             'parent_email' => $application->parent_email,
    //             'parent_address' => $application->parent_address,

    //             'status' => 1,
    //         ]);

    //         // Update application
    //         $application->update([
    //             'admission_number' => $admissionNumber,
    //             'status' => 'Accepted',
    //         ]);
    //     });

    //     return redirect()
    //         ->route('admin.admissions.index')
    //         ->with(
    //             'success',
    //             'Student admitted successfully. Admission number has been generated.'
    //         );
    // }

    public function admitApplicant($id)
{
    $application = Application::findOrFail($id);

    // Prevent duplicate admission
    if ($application->admission_number) {

        return back()->with(
            'error',
            'This applicant has already been admitted.'
        );
    }


    DB::transaction(function () use ($application) {

        // Generate admission number
        $admissionNumber =
            Student::generateAdmissionNumber();


        // Create student
        $student = Student::create([

            'first_name' => $application->first_name,

            'middle_name' => $application->middle_name,

            'last_name' => $application->last_name,

            'admission_number' => $admissionNumber,

            'date_of_birth' => $application->date_of_birth,

            'gender' => $application->gender,

            'image' => $application->student_photo,

            'level' => $application->level,

            'class' => $application->class,

            'admission_date' => now()->toDateString(),

            'parent_name' => $application->parent_name,

            'parent_phone' => $application->parent_phone,

            'parent_email' => $application->parent_email,

            'parent_address' => $application->parent_address,

            'status' => 1,

        ]);


        // Connect application to admission number
        $application->update([

            'admission_number' => $admissionNumber,

            'status' => 'Accepted',

        ]);
    });


    return redirect()
        ->route('admin.admissions.index')
        ->with(
            'success',
            'Student admitted successfully. Admission number generated.'
        );
}
}
