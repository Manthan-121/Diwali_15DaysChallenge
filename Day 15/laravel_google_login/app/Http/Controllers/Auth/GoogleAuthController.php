<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class GoogleAuthController extends Controller
{
    // Redirect to Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google callback
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Find or create a user
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'provider_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                ]
            );

            // Log in the user
            Auth::login($user);

            // Return JSON response on successful login
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            // Return JSON response on error
            return response()->json([
                'success' => false,
                'message' => 'Authentication failed!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
