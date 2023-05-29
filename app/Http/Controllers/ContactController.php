<?php
// ans 6
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        // Send email
        Mail::send([], [], function ($message) use ($name, $email, $message) {
            $message->to('your-email@example.com') // Replace with your email address
                ->subject('New Contact Form Submission')
                ->setBody("Name: $name\nEmail: $email\n\nMessage:\n$message");
        });

        return response()->json(['message' => 'Contact form submitted successfully.']);
    }
}
