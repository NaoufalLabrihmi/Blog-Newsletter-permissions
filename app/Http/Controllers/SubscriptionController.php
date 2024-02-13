<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email', // Ensure email is unique
        ], [
            'email.unique' => 'This email address is already subscribed.', // Custom validation message
        ]);

        // Check if the email already exists in the subscribers table
        if (Subscriber::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'This email address is already subscribed.'])->withInput();
        }

        // If validation passes and email doesn't exist, attempt to create the subscriber
        try {
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();
        } catch (\Exception $e) {
            // Handle any exceptions, such as database errors
            return redirect()->back()->with('error', 'Failed to subscribe. Please try again.');
        }

        return redirect()->back()->with('success', 'Subscription successful!');
    }
}
