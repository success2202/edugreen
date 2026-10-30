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
     private function getAcademicDetails()
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
    $payments = SchoolFeesPayment::where('student_id', $studentId)
    ->orderBy('session', 'desc')
    ->get();

    $academic = $this->getAcademicDetails();

    $school = $academic['school'];
    $currentSession = $academic['session'];
    $currentTerm = $academic['term'];

    $student = DB::table('students')
        ->where('id', $studentId)
        ->first();

    abort_if(!$student, 404, 'Student not found.');

    // Available terms as stored in the payment table.
    $terms = [
        'First Term',
        'Second Term',
        'Third Term',
    ];

    // Convert School Settings term format to payment table format.
    $termNames = [
        'first_term' => 'First Term',
        'second_term' => 'Second Term',
        'third_term' => 'Third Term',
    ];

    $currentTermKey = strtolower(trim((string) $currentTerm));

    $currentTerm = $termNames[$currentTermKey] ?? $currentTerm;

    // Get all payment records for this student.
    $payments = SchoolFeesPayment::where('student_id', $studentId)
        ->orderBy('session', 'desc')
        ->orderByRaw("
            CASE LOWER(TRIM(term))
                WHEN 'first term' THEN 1
                WHEN 'first_term' THEN 1
                WHEN 'second term' THEN 2
                WHEN 'second_term' THEN 2
                WHEN 'third term' THEN 3
                WHEN 'third_term' THEN 3
                ELSE 4
            END
        ")
        ->get();

    // Get the current term payment.
    $currentPayment = null;

    if ($currentSession && $currentTerm) {
        $currentPayment = SchoolFeesPayment::where('student_id', $studentId)
            ->whereRaw('TRIM(session) = ?', [trim($currentSession)])
            ->whereRaw(
                'LOWER(TRIM(term)) = ?',
                [strtolower(trim($currentTerm))]
            )
            ->first();
    }

    // Find the next unpaid term in the current session.
    $nextUnpaidTerm = null;

    foreach ($terms as $term) {
        $payment = $payments->first(function ($payment) use (
            $term,
            $currentSession
        ) {
            return trim((string) $payment->session) === trim((string) $currentSession)
                && strtolower(trim((string) $payment->term)) === strtolower(trim($term));
        });

        if (!$payment || strtolower(trim((string) $payment->status)) !== 'paid') {
            $nextUnpaidTerm = $term;
            break;
        }
    }

    return view('admin.students.fees', compact(
        'school',
        'student',
        'currentSession',
        'currentTerm',
        'currentPayment',
        'payments',
        'terms',
        'nextUnpaidTerm'
    ));
}

    public function markPaid(Request $request, $studentId)
    {
        $terms = [
            'First Term',
            'Second Term',
            'Third Term',
        ];

        $request->validate([
            'term' => 'required|string|in:' . implode(',', $terms),
            'amount' => 'required|numeric|min:0.01',
            'payment_date' => 'required|date',
            'payment_reference' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $student = Student::findOrFail($studentId);

        $school = SchoolSetting::first();

        if (!$school || !$school->session) {
            return back()->with(
                'error',
                'Please configure the current academic session in School Settings.'
            );
        }

        $session = trim($school->session);
        $term = trim($request->term);

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
            ->route('admin.students.fees.index', [
                'studentId' => $student->id,
            ])
            ->with('success', $term . ' payment recorded successfully.');
    }

    public function markUnpaid(Request $request, $studentId)
{
    $request->validate([
        'session' => 'required|string',
        'term' => 'required|string',
    ]);

    $student = Student::findOrFail($studentId);

    $payment = SchoolFeesPayment::where('student_id', $student->id)
        ->where('session', $request->session)
        ->whereRaw('LOWER(TRIM(term)) = ?', [
            strtolower(trim($request->term))
        ])
        ->first();

    if (!$payment) {
        return back()->with('error', 'Payment record not found.');
    }

    $payment->update([
        'status' => 'unpaid',
    ]);

    return redirect()
        ->route('admin.students.fees.index', [
            'studentId' => $student->id
        ])
        ->with('success', $request->term . ' payment status changed to unpaid.');
}
}


