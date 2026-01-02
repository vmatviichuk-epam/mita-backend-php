<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Login endpoint - returns mock JWT token.
     *
     * TODO: Implement real authentication with database lookup and JWT generation
     */
    public function login(Request $request): JsonResponse
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => [
                    'code' => 'VALIDATION_ERROR',
                    'message' => $validator->errors()->first(),
                ]
            ], 422);
        }

        // Mock response - always returns success for any credentials
        // TODO: Replace with real authentication logic
        return response()->json([
            'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxIiwidXNlcm5hbWUiOiJ0ZXN0dXNlciJ9.MOCK',
            'user' => [
                'id' => 1,
                'username' => $request->input('username'),
            ],
        ]);
    }

    // TODO: Implement registration endpoint
    // public function register(Request $request): JsonResponse

    // TODO: Implement logout endpoint
    // public function logout(Request $request): JsonResponse
}
