<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailToSubscribers; // Assuming you have created a Mailable class
use App\Models\Subscriber;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the request data
        $request->validate([
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);

        // Get all subscribers
        $subscribers = Subscriber::all(); // Assuming you have a Subscriber model

        // Loop through subscribers and send email to each one
        foreach ($subscribers as $subscriber) {
            // Send email using Mailtrap
            Mail::to($subscriber->email)->send(new SendEmailToSubscribers($request->subject, $request->content));
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Email sent successfully to all subscribers.');
    }
}
