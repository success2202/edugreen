<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\SchoolSetting;
use App\Models\Student;
use App\Models\SchoolFeesPayment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    //
     /**
     * Display students.
     */
    // public function index(Request $request)
    // {
    //     $query = Student::query();

    //     // Search
    //     if ($request->filled('search')) {

    //         $search = $request->search;

    //         $query->where(function ($q) use ($search) {

    //             $q->where('first_name', 'like', "%{$search}%")
    //                 ->orWhere('middle_name', 'like', "%{$search}%")
    //                 ->orWhere('last_name', 'like', "%{$search}%")
    //                 ->orWhere('admission_number', 'like', "%{$search}%");

    //         });
    //     }

    //     // School level filter
    //     if ($request->filled('level')) {

    //         $query->where('level', $request->level);

    //     }

    //     // Class filter
    //     if ($request->filled('class')) {

    //         $query->where('class', $request->class);

    //     }

    //     // Status filter
    //     if ($request->has('status') && $request->status !== '') {

    //         $query->where('status', $request->status);

    //     }

    //     $students = $query
    //         ->latest()
    //         ->paginate(10);

    //     return view('admin.students.index', compact('students'));
    // }


public function index(Request $request)
{
    $query = Student::query();

    if ($request->filled('search')) {
        $search = trim($request->input('search'));

        $query->where(function ($q) use ($search) {
            $q->where('first_name', 'LIKE', "%{$search}%")
                ->orWhere('middle_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->orWhere('admission_number', 'LIKE', "%{$search}%");
        });
    }

    if ($request->filled('level')) {
        $query->where('level', $request->input('level'));
    }

    if ($request->filled('class')) {
        $query->where('class', $request->input('class'));
    }

    if ($request->filled('status')) {
        $query->where('status', $request->input('status'));
    }

    // Fetch students BEFORE checking payment statuses
    $students = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    // Get current academic session and term
    $school = SchoolSetting::first();

    $currentSession = $school->current_session ?? null;
    $currentTerm = $school->current_term ?? null;

    $paymentStatuses = collect();

    if ($currentSession && $currentTerm) {
        $studentIds = $students->getCollection()->pluck('id');

        $paymentStatuses = SchoolFeePayment::whereIn(
            'student_id',
            $studentIds
        )
            ->where('session', $currentSession)
            ->where('term', $currentTerm)
            ->pluck('status', 'student_id');
    }

    // Attach payment status to each student
    $students->getCollection()->transform(
        function ($student) use ($paymentStatuses) {
            $student->school_fee_status = $paymentStatuses->get(
                $student->id,
                'unpaid'
            );

            return $student;
        }
    );

    return view('admin.students.index', compact(
        'students',
        'school',
        'currentSession',
        'currentTerm'
    ));
}

    /**
     * Show create student form.
     */
    public function create()
    {
        return view('admin.students.create');
    }


    /**
     * Store new student.
     */
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([

    //         'first_name' => 'required|string|max:100',
    //         'middle_name' => 'nullable|string|max:100',
    //         'last_name' => 'required|string|max:100',

    //         'admission_number' => 'required|string|max:100|unique:students,admission_number',

    //         'date_of_birth' => 'nullable|date',

    //         'gender' => 'required|in:Male,Female',

    //         'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

    //         'level' => 'required|in:Nursery,Primary,Secondary',

    //         'class' => 'required|string|max:100',

    //         'admission_date' => 'nullable|date',

    //         'parent_name' => 'required|string|max:150',

    //         'parent_phone' => 'required|string|max:30',

    //         'parent_email' => 'nullable|email|max:150',

    //         'parent_address' => 'nullable|string',

    //         'status' => 'nullable|boolean',

    //     ]);


    //     // Upload student image
    //     if ($request->hasFile('image')) {

    //         $validated['image'] = $request
    //             ->file('image')
    //             ->store('students', 'public');

    //     }


    //     $validated['status'] = $request->has('status')
    //         ? $request->status
    //         : 1;


    //     Student::create($validated);


    //     return redirect()
    //         ->route('admin.students.index')
    //         ->with('success', 'Student added successfully.');
    // }

    public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:100',
        'middle_name' => 'nullable|string|max:100',
        'last_name' => 'required|string|max:100',

        'date_of_birth' => 'nullable|date',

        'gender' => 'required|in:Male,Female',

        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        'level' => 'required|in:Nursery,Primary,Secondary',

        'class' => 'required|string|max:100',

        'admission_date' => 'nullable|date',

        'parent_name' => 'required|string|max:255',

        'parent_phone' => 'required|string|max:30',

        'parent_email' => 'nullable|email|max:255',

        'parent_address' => 'nullable|string|max:1000',

        'status' => 'nullable|boolean',
    ]);


    // Automatically generate admission number
    $validated['admission_number'] =
        Student::generateAdmissionNumber();


    // Automatically use today's date if no admission date is provided
    if (empty($validated['admission_date'])) {
        $validated['admission_date'] = now()->toDateString();
    }


    // Default status
    if (!isset($validated['status'])) {
        $validated['status'] = 1;
    }


    // Upload student image
    if ($request->hasFile('image')) {

        $validated['image'] =
            $request->file('image')->store('students', 'public');
    }


    $validated['password'] = Hash::make($request->first_name);

    Student::create($validated);


    return redirect()
        ->route('admin.students.index')
        ->with(
            'success',
            'Student added successfully. Admission number: '
            . $validated['admission_number']
        );
}


    /**
     * Display student.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        $school = SchoolSetting::first();

        return view('admin.students.show', compact('student','school'));
    }



    /**
     * Show edit form.
     */
    public function showEditForm($id)
    {
        $student = Student::findOrFail($id);

        return view('admin.students.edit', compact('student'));
    }


    /**
     * Update student.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([

            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'required|string|max:100',

            'admission_number' => 'required|string|max:100|unique:students,admission_number,' . $student->id,

            'date_of_birth' => 'nullable|date',

            'gender' => 'required|in:Male,Female',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'level' => 'required|in:Nursery,Primary,Secondary',

            'class' => 'required|string|max:100',

            'admission_date' => 'nullable|date',

            'parent_name' => 'required|string|max:150',

            'parent_phone' => 'required|string|max:30',

            'parent_email' => 'nullable|email|max:150',

            'parent_address' => 'nullable|string',

            'status' => 'nullable|boolean',

        ]);


        // Replace image
        if ($request->hasFile('image')) {

            if ($student->image) {

                Storage::disk('public')
                    ->delete($student->image);

            }

            $validated['image'] = $request
                ->file('image')
                ->store('students', 'public');

        }


        $validated['status'] = $request->has('status')
            ? $request->status
            : 0;


        $student->update($validated);


        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }


    /**
     * Delete student.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);


        if ($student->image) {

            Storage::disk('public')
                ->delete($student->image);

        }


        $student->delete();


        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }


    public function createResult($id)
{
    $student = Student::findOrFail($id);

    return view('admin.students.createResult', compact('student'));
}


// public function storeResult(Request $request, $id)
// {
//     $student = Student::findOrFail($id);

//     $validated = $request->validate([
//         'session' => 'required|string|max:20',
//         'term' => 'required|in:First Term,Second Term,Third Term',
//         'subject' => 'required|string|max:100',

//         'ca_score' => 'required|numeric|min:0|max:40',
//         'exam_score' => 'required|numeric|min:0|max:60',

//         'grade' => 'nullable|string|max:5',
//         'remark' => 'nullable|string|max:100',
//     ]);

//     $validated['student_id'] = $student->id;

//     $validated['total_score'] =
//         $validated['ca_score'] + $validated['exam_score'];

//     Result::create($validated);

//     return redirect()
//         ->route('admin.students.result', $student->id)
//         ->with('success', 'Student result added successfully.');
// }

public function storeResult(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'session' => 'required|string|max:20',

        'term' => 'required|in:First Term,Second Term,Third Term',

        'subject' => 'required|string|max:100',

        'ca_score' => 'required|numeric|min:0|max:40',

        'exam_score' => 'required|numeric|min:0|max:60',
    ]);

    // Calculate total
    $total = $validated['ca_score'] + $validated['exam_score'];

    // Calculate grade and remark
    if ($total >= 70) {

        $grade = 'A';
        $remark = 'Excellent';

    } elseif ($total >= 60) {

        $grade = 'B';
        $remark = 'Very Good';

    } elseif ($total >= 50) {

        $grade = 'C';
        $remark = 'Good';

    } elseif ($total >= 45) {

        $grade = 'D';
        $remark = 'Fair';

    } elseif ($total >= 40) {

        $grade = 'E';
        $remark = 'Pass';

    } else {

        $grade = 'F';
        $remark = 'Fail';
    }

    $validated['student_id'] = $student->id;
    $validated['total_score'] = $total;
    $validated['grade'] = $grade;
    $validated['remark'] = $remark;

    Result::create($validated);

    return redirect()
        ->route('admin.students.result', $student->id)
        ->with('success', 'Student result added successfully.');
}

    /**
     * Display student result.
     */
//     public function showResult(Request $request, $id)
// {
//     $student = Student::findOrFail($id);

//     $results = collect();

//     if ($request->filled('session') && $request->filled('term')) {

//         $results = $student->results()
//             ->where('session', $request->session)
//             ->where('term', $request->term)
//             ->orderBy('subject')
//             ->get();
//     }

//     return view('admin.students.studentResult', compact(
//         'student',
//         'results'
        
//     ));
// }


public function showResult(Request $request, $id)
{
    $student = Student::findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | If session and term were searched
    |--------------------------------------------------------------------------
    | Show the searched result.
    */
    if ($request->filled('session') && $request->filled('term')) {

        $session = $request->session;
        $term = $request->term;

        $results = $student->results()
            ->where('session', $session)
            ->where('term', $term)
            ->orderBy('subject')
            ->get();

    } else {

        /*
        |--------------------------------------------------------------------------
        | No search yet
        |--------------------------------------------------------------------------
        | Automatically get the latest result.
        |--------------------------------------------------------------------------
        */

        $latestResult = $student->results()
            ->latest('id')
            ->first();

        if ($latestResult) {

            $session = $latestResult->session;
            $term = $latestResult->term;

            $results = $student->results()
                ->where('session', $session)
                ->where('term', $term)
                ->orderBy('subject')
                ->get();

        } else {

            $session = null;
            $term = null;

            $results = collect();
        }
    }

    return view('admin.students.studentResult', compact(
        'student',
        'results',
        'session',
        'term'
    ));
}


// edit student result
    public function editResult($studentId, $resultId)
{
    $student = Student::findOrFail($studentId);

    $result = Result::where('id', $resultId)
        ->where('student_id', $student->id)
        ->firstOrFail();

    return view('admin.students.resultEdit', compact(
        'student',
        'result'
    ));
}


// public function updateResult(Request $request, $studentId, $resultId)
// {
//     $student = Student::findOrFail($studentId);

//     $result = Result::where('id', $resultId)
//         ->where('student_id', $student->id)
//         ->firstOrFail();

//     $validated = $request->validate([
//         'session' => 'required|string|max:20',

//         'term' => 'required|in:First Term,Second Term,Third Term',

//         'subject' => 'required|string|max:100',

//         'ca_score' => 'required|numeric|min:0|max:40',

//         'exam_score' => 'required|numeric|min:0|max:60',

//         'grade' => 'nullable|string|max:5',

//         'remark' => 'nullable|string|max:100',
//     ]);

//     $validated['total_score'] =
//         $validated['ca_score'] + $validated['exam_score'];

//     $result->update($validated);

//     return redirect()
//         ->route('admin.students.result', $student->id)
//         ->with('success', 'Student result updated successfully.');
// }


public function updateResult(Request $request, $studentId, $resultId)
{
    $student = Student::findOrFail($studentId);

    $result = Result::where('id', $resultId)
        ->where('student_id', $student->id)
        ->firstOrFail();

    $validated = $request->validate([
        'session' => 'required|string|max:20',

        'term' => 'required|in:First Term,Second Term,Third Term',

        'subject' => 'required|string|max:100',

        'ca_score' => 'required|numeric|min:0|max:40',

        'exam_score' => 'required|numeric|min:0|max:60',
    ]);

    // Calculate total
    $total = $validated['ca_score'] + $validated['exam_score'];

    // Calculate grade and remark
    if ($total >= 70) {

        $grade = 'A';
        $remark = 'Excellent';

    } elseif ($total >= 60) {

        $grade = 'B';
        $remark = 'Very Good';

    } elseif ($total >= 50) {

        $grade = 'C';
        $remark = 'Good';

    } elseif ($total >= 45) {

        $grade = 'D';
        $remark = 'Fair';

    } elseif ($total >= 40) {

        $grade = 'E';
        $remark = 'Pass';

    } else {

        $grade = 'F';
        $remark = 'Fail';
    }

    $validated['total_score'] = $total;
    $validated['grade'] = $grade;
    $validated['remark'] = $remark;

    $result->update($validated);

    return redirect()
        ->route('admin.students.result', $student->id)
        ->with('success', 'Student result updated successfully.');
}


// public function printResult(Request $request, $studentId, $resultId)
// {
//     $student = Student::findOrFail($studentId);

//     $result = Result::where('id', $resultId)
//         ->where('student_id', $student->id)
//         ->firstOrFail();

//     $results = Result::where('student_id', $student->id)
//         ->where('session', $result->session)
//         ->where('term', $result->term)
//         ->orderBy('subject')
//         ->get();

//     $school = SchoolSetting::first();

//     return view('admin.students.printResult', compact(
//         'student',
//         'result',
//         'results',
//         'school'
//     ));
// }

public function printResult(Request $request, $studentId)
{
    $student = Student::findOrFail($studentId);

    $request->validate([
        'session' => 'required|string|max:20',
        'term' => 'required|in:First Term,Second Term,Third Term',
    ]);

    $results = Result::where('student_id', $student->id)
        ->where('session', $request->session)
        ->where('term', $request->term)
        ->orderBy('subject')
        ->get();

    $school = SchoolSetting::first();

    return view('admin.students.printResult', compact(
        'student',
        'results',
        'school'
    ));
}
}
