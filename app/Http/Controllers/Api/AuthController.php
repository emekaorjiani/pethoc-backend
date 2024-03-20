<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Notifications\VerifyUserNotification;
use Carbon\Carbon;
use Zeevx\LaraTermii\LaraTermii; // Import LaraTermii for sending OTP

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }


    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone_number',
            'password' => 'required|string|min:8',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        // Create a new user record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Generate OTP
        $otp = mt_rand(100000, 999999);

        // Send OTP via SMS using LaraTermii
        $termii = new LaraTermii(env('TERMII_API_KEY'));
        $termii->sendOTP($user->phone_number, env('TERMII_SENDER_ID'), 'user_registration', 3, 5, 6, $otp, 'Your OTP code is: ' . $otp);

        // Optionally, you can also send OTP via email
        $user->notify(new VerifyUserNotification($otp));

        // Return success response
        return response()->json(['success' => true, 'message' => 'User registered successfully. OTP sent to email and phone.']);
    }

    /**
     * Verify OTP for user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyOtp(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'otp' => 'required|string|min:6|max:6',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        // Find the user by email and phone
        $user = User::where('email', $request->email)->where('phone_number', $request->phone)->first();

        // If user not found, return error response
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        // Check if the OTP matches
        if ($request->otp != $user->otp) {
            return response()->json(['success' => false, 'message' => 'Invalid OTP.'], 422);
        }

        // Update user's email verification status and save
        $user->email_verified_at = Carbon::now();
        $user->save();

        // Optionally, you can also update phone verification status

        // Return success response
        return response()->json(['success' => true, 'message' => 'OTP verified successfully. User registered.']);
    }
}
