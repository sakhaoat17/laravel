<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:registrations',
            'password' => 'required|string|min:8',
            'remember_me' => 'boolean', // Assuming 'remember_me' is boolean
        ]);

        // Create a new registration record
        $registration = Registration::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_me' => $request->remember_me ?? false, // Default to false if not provided
        ]);

        // Return a response (e.g., success message or registration data)
        return response()->json(['registration' => $registration]);
    }
    public function login(Request $request)
{
    // Validate the request data
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Attempt to authenticate the user with the provided credentials
    $user = Registration::authenticate($request->email, $request->password);

    if ($user) {
        // Authentication successful
        return response()->json([
            'message' => 'Authentication successful',
            'userId' => $user->id, // Include the user ID in the response
        ]);
    } else {
        // Authentication failed
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
 public function show($user_id)
    {
        $user =Registration::where('id', $user_id)->first();
        
        if (!$user) {
            return response()->json(['error' => 'user not found'], 404);
        }
        
        return response()->json($user);
}
    
    
    
}
