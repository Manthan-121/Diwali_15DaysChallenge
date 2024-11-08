<?php

namespace App\Http\Controllers;

use App\Mail\ThankYouMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Log\LogManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // Display the registration form
    public function showForm()
    {
        return view('register');
    }
    // Store form data in the database
    public function store(Request $request)
    {

        $log = new LogManager(app());
        $log->info('User registration attempted', ['email' => $request->email]);


        // Validate incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'nullable|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Log successful registration
        $log->info('User registered successfully', [
            'user_id' => $user->id,
            'email' => $user->email,
            'time' => now(),
        ]);

        // Mail::to($request->email)->send(new ThankYouMail($request));

        return redirect()->back()->with('success', 'Registration successful! A confirmation email has been sent.');
    }
}
