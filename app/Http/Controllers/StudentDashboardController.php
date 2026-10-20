<?php

namespace App\Http\Controllers;

use App\Models\SchoolSetting;
use Illuminate\Http\Request;
;
use Illuminate\Support\Facades\DB;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $school = SchoolSetting::first();
        $student = DB::table('students')
            ->where('id', session('student_id'))
            ->first();

        if (!$student) {
            session()->forget('student_id');

            return redirect()->route('student.login');
        }

        $sessions = DB::table('results')
            ->where('student_id', $student->id)
            ->distinct()
            ->orderBy('session', 'desc')
            ->pluck('session');

        return view('users.student.dashboard', compact(
            'student',
            'sessions',
            'school'
        ));
    }

    public function checkResult(Request $request)
    {
        $school = SchoolSetting::first();
        $request->validate([
            'session' => 'required|string',
            'term' => 'required|string',
        ]);

        $student = DB::table('students')
            ->where('id', session('student_id'))
            ->first();

        if (!$student) {
            session()->forget('student_id');

            return redirect()->route('student.login');
        }

        $results = DB::table('results')
            ->where('student_id', $student->id)
            ->where('session', $request->session)
            ->where('term', $request->term)
            ->orderBy('subject')
            ->get();

        if ($results->isEmpty()) {
            return redirect()
                ->route('student.dashboard')
                ->withInput()
                ->with('error', 'No results found for the selected session and term.');
        }

        $sessions = DB::table('results')
            ->where('student_id', $student->id)
            ->distinct()
            ->orderBy('session', 'desc')
            ->pluck('session');


            $sessions = DB::table('results')
    ->where('student_id', $student->id)
    ->whereNotNull('session')
    ->where('session', '!=', '')
    ->distinct()
    ->orderBy('session', 'desc')
    ->pluck('session');

        return view('users.student.dashboard', compact(
            'student',
            'sessions',
            'results',
            'school'
        ))->with('selectedSession', $request->session)
          ->with('selectedTerm', $request->term);
    }
}


