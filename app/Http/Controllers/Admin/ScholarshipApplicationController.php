<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScholarshipApplication;
use Illuminate\Http\Request;


class ScholarshipApplicationController extends Controller
{
   
    /**
     * Display all scholarship applications.
     */
    public function index(Request $request)
    {
        $query = ScholarshipApplication::query();

        // Search applications
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('middle_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('application_number', 'like', "%{$search}%")
                    ->orWhere('scholarship_programme', 'like', "%{$search}%")
                    ->orWhere('parent_guardian_email', 'like', "%{$search}%");
            });
        }

        // Filter by application status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $applications = $query->latest()
            ->paginate(15)
            ->withQueryString();

        // Dashboard summary figures
        $totalApplications = ScholarshipApplication::count();

        $pendingApplications = ScholarshipApplication::where(
            'status',
            'pending'
        )->count();

        $approvedApplications = ScholarshipApplication::where(
            'status',
            'approved'
        )->count();

        $rejectedApplications = ScholarshipApplication::where(
            'status',
            'rejected'
        )->count();

        return view('admin.scholarship.index', compact(
            'applications',
            'totalApplications',
            'pendingApplications',
            'approvedApplications',
            'rejectedApplications'
        ));
    }

    /**
     * View an individual scholarship application.
     */
    public function show($id)
    {
        $application = ScholarshipApplication::findOrFail($id);

        return view(
            'admin.scholarship.showDetails',
            compact('application')
        );
    }

    /**
     * Update the application status.
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'admin_notes' => 'nullable|string|max:5000',
        ]);

        $application = ScholarshipApplication::findOrFail($id);

        $application->status = $validated['status'];
        $application->admin_notes = $validated['admin_notes'] ?? null;
        $application->save();

        return redirect()
            ->route('admin.scholarship-applications.show', $application->id)
            ->with('success', 'Scholarship application status updated successfully.');
    }


}
