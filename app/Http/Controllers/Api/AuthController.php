<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        $user = Person::create($request->all());

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'data' => $user,
            'token' => $token
        ], Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        //     // 'remember_me' => 'boolean'
        // ]);

        // if (!Auth::attempt($request->only('email', 'password'))) {
        //     return $this->sendError('Invalid login details', 401);
        // }

        $user = Person::where('email', $request['email'])->firstOrFail();
        
        $token = $user->createToken($user->email)->plainTextToken;

        // $user->api_token = $token;

        return response()->json([
            'data' => $user,
            'token' => $token
        ]);
    }

    public function logout() {
        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'Token Revoked'
        ]);
    }
}
