<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Student;
use App\Models\SchoolFeesPayment;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolFeePaymentController extends Controller
{
    private function currentAcademicDetails()
    {
        $school = SchoolSetting::first();

        return [
            'school' => $school,
            'session' => $school->session ?? null,
            'term' => $school->current_term ?? null,
        ];
    }

    public function index($studentId)
    {
        $school = SchoolSetting::first();

        $student = DB::table('students')
            ->where('id', $studentId)
            ->first();

        abort_if(!$student, 404, 'Student not found.');

        $currentSession = $school->session ?? null;
        $currentTerm = $school->current_term ?? null;

        $terms = ['First Term', 'Second Term', 'Third Term'];

        $payments = SchoolFeesPayment::where('student_id', $studentId)
            ->when($currentSession, function ($query) use ($currentSession) {
                $query->where('session', $currentSession);
            })
            ->orderBy('session', 'desc')
            ->orderByRaw("
                CASE term
                    WHEN 'First Term' THEN 1
                    WHEN 'Second Term' THEN 2
                    WHEN 'Third Term' THEN 3
                    ELSE 4
                END
            ")
            ->get();

        $currentPayment = null;

        if ($currentSession && $currentTerm) {
            $currentPayment = SchoolFeesPayment::where('student_id', $studentId)
                ->where('session', $currentSession)
                ->where('term', $currentTerm)
                ->first();
        }

        return view('admin.students.fees', compact(
            'school',
            'student',
            'currentSession',
            'currentTerm',
            'currentPayment',
            'payments',
            'terms'
        ));
    }

    public function markPaid(Request $request, $studentId)
    {
        $request->validate([
        'session' => 'required|string',
        'term' => 'required|string',
        'amount' => 'required|numeric|min:0',
        'payment_date' => 'required|date',
        'payment_reference' => 'nullable|string|max:255',
        'notes' => 'nullable|string',
    ]);
        $school = SchoolSetting::first();
    $student = Student::findOrFail($studentId);

    SchoolFeesPayment::updateOrCreate(
        [
            'student_id' => $student->id,
            'session' => trim($request->session),
            'term' => trim($request->term),
        ],
        [
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'status' => 'paid',
            'payment_reference' => $request->payment_reference,
            'notes' => $request->notes,
            'recorded_by' => auth()->id(),
        ]
    );

    return redirect()
        ->route('admin.students.fees.index', ['student' => $student->id])
        ->with('success', 'School fee payment recorded successfully.');
    }

    public function markUnpaid($studentId)
    {
        $school = SchoolSetting::first();

        $student = DB::table('students')
            ->where('id', $studentId)
            ->first();

        abort_if(!$student, 404, 'Student not found.');

        $currentSession = $school->session ?? null;
        $currentTerm = $school->current_term ?? null;

        if (!$currentSession || !$currentTerm) {
            return back()->with(
                'error',
                'Please configure the current academic session and term in School Settings.'
            );
        }

        SchoolFeesPayment::where('student_id', $studentId)
            ->where('session', $currentSession)
            ->where('term', $currentTerm)
            ->update(['status' => 'unpaid']);

        return redirect()
            ->route('admin.students.fees.index', ['student' => $studentId])
            ->with('success', 'Payment status changed to unpaid.');
    }
}


