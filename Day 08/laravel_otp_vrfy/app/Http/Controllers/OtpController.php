<?php

namespace App\Http\Controllers;
use App\Mail\OtpMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\OtpRequest;
class OtpController extends Controller
{
    public function index()
    {
        return view("sendotp");
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // Generate a 6-character alphanumeric OTP
        // Define allowed characters for OTP (A-Z, a-z, 0-9)
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $otpCode = substr(str_shuffle($characters), 0, 6);
        $expiresAt = Carbon::now()->addMinutes(10);

        // Save OTP to the database
        OtpRequest::updateOrCreate(
            ['email' => $request->email],
            ['otp_code' => $otpCode, 'expires_at' => $expiresAt, 'is_verified' => false]
        );

        // Send OTP email
        Mail::to($request->email)->send(new OtpMail($otpCode));

        // Store email in session and redirect to verify-otp page
        session(['otp_email' => $request->email]);

        return redirect()->route('verify-otp.form')->with('success', 'OTP has been sent to your email!');
    }

    public function showVerifyOtpForm()
    {
        // Prevent direct access to the verification form
        if (!session()->has('otp_email')) {
            return redirect()->route('register.index');
        }

        return view('verifyotp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string'
        ]);

        $otpRecord = OtpRequest::where('email', session('otp_email'))
            ->where('otp_code', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if ($otpRecord) {
            $otpRecord->update(['is_verified' => true]);
            session()->forget('otp_email');

            return redirect()->route('success-rot')->with('success', 'OTP verified successfully!');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }

    public function successMSG(){
        return view('success');
    }
}
