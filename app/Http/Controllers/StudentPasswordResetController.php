<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SchoolSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StudentPasswordResetController extends Controller
{
    //
     // Display the form where the student requests a reset link.
    public function showForgotForm()
    {
        $school = SchoolSetting::first();
        return view('users.student.forgot-password', compact('school'));
    }

    // Verify admission number and registered parent email, then email a link.
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'admission_number' => 'required|string',
            'email' => 'required|email',
        ]);

        $student = Student::where(
            'admission_number',
            $request->admission_number
        )
        ->where('parent_email', $request->email)
        ->where('status', 1)
        ->first();

        if (!$student) {
            return back()->withErrors([
                'email' => 'We could not verify those details. Check your admission number and registered email.',
            ])->withInput($request->only('admission_number', 'email'));
        }

        // Remove any previous reset token for this student.
        DB::table('student_password_resets')
            ->where('student_id', $student->id)
            ->delete();

        $token = Str::random(64);

        DB::table('student_password_resets')->insert([
            'student_id' => $student->id,
            'token_hash' => hash('sha256', $token),
            'expires_at' => Carbon::now()->addMinutes(30),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $resetUrl = route('student.password.reset', [
            'token' => $token,
        ]);

        try {
            Mail::raw(
                "Hello {$student->first_name},\n\n"
                . "We received a request to reset the password for your Edu Green School student portal.\n\n"
                . "Open this link to create a new password:\n{$resetUrl}\n\n"
                . "This link expires in 30 minutes. If you did not request a password reset, you can ignore this email.",
                function ($message) use ($student) {
                    $message->to($student->parent_email)
                        ->subject('Edu Green School - Password Reset');
                }
            );
        } catch (\Throwable $e) {
            report($e);

            DB::table('student_password_resets')
                ->where('student_id', $student->id)
                ->delete();

            return back()->withErrors([
                'email' => 'We could not send the reset email. Please try again later.',
            ])->withInput($request->only('admission_number', 'email'));
        }

        return back()->with(
            'success',
            'A password reset link has been sent to the registered email address.'
        );
    }

    // Display the form for entering a new password.
    public function showResetForm($token)
    {
        $school = SchoolSetting::first();
        $reset = DB::table('student_password_resets')
            ->where('token_hash', hash('sha256', $token))
            ->where('expires_at', '>', now())
            ->first();

        if (!$reset) {
            return redirect()
                ->route('student.password.request')
                ->withErrors([
                    'email' => 'This reset link is invalid or has expired. Request a new one.',
                ]);
        }

        return view('users.student.reset-password', [
            'token' => $token,
            'school' => $school,
        ]);
    }

    // Save the new password.
    public function resetPassword(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $reset = DB::table('student_password_resets')
            ->where('token_hash', hash('sha256', $token))
            ->where('expires_at', '>', now())
            ->first();

        if (!$reset) {
            return redirect()
                ->route('student.password.request')
                ->withErrors([
                    'email' => 'This reset link is invalid or has expired. Request a new one.',
                ]);
        }

        $student = Student::find($reset->student_id);

        if (!$student) {
            return redirect()
                ->route('student.password.request')
                ->withErrors([
                    'email' => 'The student account could not be found.',
                ]);
        }

        // Store the password as a secure hash.
        $student->password = Hash::make($request->password);
        $student->save();

        // A reset link must only work once.
        DB::table('student_password_resets')
            ->where('student_id', $student->id)
            ->delete();

        return redirect()
            ->route('student.login')
            ->with('success', 'Your password has been reset. You can now sign in.');
    }
}
