<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signup;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        // Validate the request data
       // $request->validate(Signup::rules());

        // Create a new signup record
        $signup = Signup::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Return a response (e.g., success message or user data)
        return response()->json(['signup' => $signup]);
    }

    // Implement other authentication methods as needed (e.g., login, logout)
}
