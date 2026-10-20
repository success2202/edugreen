<?php

namespace App\Http\Controllers;

use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    //
     public function showLogin()
    {
        if (session()->has('student_id')) {
            return redirect()->route('student.dashboard');
        }
        $school = SchoolSetting::first();
        return view('users.student.login', compact('school'));
    }

//     public function login(Request $request)
//     {
//         $request->validate([
//             'admission_number' => 'required|string',
//             'password' => 'required|string',
//         ]);

//         $student = DB::table('students')
//             ->where('admission_number', $request->admission_number)
//             ->where('status', 1)
//             ->first();

//         if (!$student || !$student->password ||
//             !Hash::check($request->password, $student->password)) {
//             return back()
//                 ->withInput($request->only('admission_number'))
//                 ->with('error', 'Invalid admission number or password.');
//         }

//         $request->session()->regenerate();
//         // $request->session()->put('student_id', $student->id);

//         $request->session()->regenerate();

// $request->session()->put([
//     'student_id' => $student->id,
//     'first_name' => $student->first_name,
//     'student_name' => trim(
//         $student->first_name . ' ' . $student->last_name
//     ),
// ]);

// return redirect()->route('student.dashboard');

//         return redirect()->route('student.dashboard');
//     }


public function login(Request $request)
{
    $request->validate([
        'admission_number' => 'required|string',
        'password' => 'required|string',
    ]);

    $student = DB::table('students')
        ->where('admission_number', $request->admission_number)
        ->where('status', 1)
        ->first();

    if (
        !$student ||
        !$student->password ||
        !Hash::check($request->password, $student->password)
    ) {
        return back()
            ->withInput($request->only('admission_number'))
            ->with('error', 'Invalid admission number or password.');
    }

    $request->session()->regenerate();

    $request->session()->put([
        'student_id' => $student->id,
        'first_name' => $student->first_name,
        'student_name' => trim(
            $student->first_name . ' ' . $student->last_name
        ),
    ]);

    return redirect()->route('student.dashboard');
}

    public function logout(Request $request)
    {
        $request->session()->forget('student_id');
        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect()->route('student.login')
            ->with('success', 'You have logged out successfully.');
    }
}
