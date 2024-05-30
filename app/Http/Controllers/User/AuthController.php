<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): JsonResponse
    {
        $credentials = ['email' => request()->email, 'password' => request()->password];

        if (Auth::guard('user')->attempt($credentials)) {
            $user = User::where('email', request()->email)->first();
            $token =  $user->createToken('auth')->plainTextToken;

            return response()->json([
                'message' => 'success',
                'user' => new UserResource($user),
                'token' => $token,
            ], 200);
        }

        return response()->json([
            'message' => 'Email atau Password salah'
        ], 401);
    }

    public function logout(): JsonResponse
    {
        request()->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
