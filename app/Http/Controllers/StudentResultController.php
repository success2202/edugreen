<?php

namespace App\Http\Controllers;

use App\Models\SchoolSetting;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class StudentResultController extends Controller
{
    public function ResultCheck()
    {
        $school = SchoolSetting::first();
        return view('users.result.check', compact('school'));
    }

    public function lookupResult(Request $request)
    {
        $school = SchoolSetting::first();
        $request->validate([
            'admission_number' => 'required|string',
            'session' => 'required|string',
            'term' => 'required|string',
        ]);

        // Find the student using their admission number
        $student = DB::table('students')
            ->where('admission_number', $request->admission_number)
            ->first();

        if (!$student) {
            return back()
                ->withInput()
                ->with('error', 'Invalid admission number. Student not found.');
        }

        // Retrieve the student's results for the selected session and term
        $results = DB::table('results')
            ->where('student_id', $student->id)
            ->where('session', $request->session)
            ->where('term', $request->term)
            ->orderBy('subject')
            ->get();

        if ($results->isEmpty()) {
            return back()
                ->withInput()
                ->with('error', 'No results found for the selected session and term.');
        }

        return view('users.result.show', compact(
            'student',
            'results',
            'school'
        ));
    }
}


