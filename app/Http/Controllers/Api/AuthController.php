<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $attempt = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($attempt) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'message' => 'Login Success',
                'token' => $token
            ]);
        }
        return response()->json([
            'message' => 'Invalid login credentials'
        ]);
    }
}
