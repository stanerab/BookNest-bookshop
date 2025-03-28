<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Contact extends Controller
{
    public function index()
    {
        return view('contact'); // Load the contact page
    }

    public function submit()
    {
        $request = service('request');

        $name = $request->getPost('name');
        $email = $request->getPost('email');
        $message = $request->getPost('message');

        $to = "your-email@example.com"; // Replace with your actual email
        $subject = "New Contact Form Submission from $name";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            return redirect()->to('/contact')->with('success', 'Message sent successfully!');
        } else {
            return redirect()->to('/contact')->with('error', 'Error sending message. Try again.');
        }
    }
}

