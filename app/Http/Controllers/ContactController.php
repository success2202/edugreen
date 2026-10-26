<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => ['nullable', 'string', 'max:20'],
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:5000',
        ]);

        $emailBody = "New message from the Edu-Green Schools website\n\n"
            . "Name: " . $validated['name'] . "\n"
            . "Email: " . $validated['email'] . "\n"
            . "Phone: " . $validated['phone'] . "\n"
            . "Subject: " . $validated['subject'] . "\n\n"
            . "Message:\n" . $validated['message'];

        Mail::raw($emailBody, function ($mail) use ($validated) {
            $mail->to('support@edugreenschools.org')
                ->replyTo($validated['email'], $validated['name'])
                ->subject('Website Contact: ' . $validated['subject']);
        });

        return back()->with(
            'success',
            'Thank you for contacting Edu-Green Schools. Your message has been sent successfully.'
        );
    }
}





    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'email', 'max:255'],
    //         'phone' => ['nullable', 'string', 'max:20'],
    //         'subject' => ['nullable', 'string', 'max:255'],
    //         'message' => ['required', 'string', 'max:10000'],
    //     ]);

    //     ContactMessage::create($validated);

    //     return back()->with(
    //         'success',
    //         'Thank you for contacting us! Your message has been received.'
    //     );
    // }

