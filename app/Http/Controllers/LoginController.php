<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $user = User::where("email", $request->email)->first();
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                "error" => "Invalid credentials"
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $token = $user->createToken('access-token')->plainTextToken;

        return response()->json([
            'access-token' => $token
        ], Response::HTTP_OK);
    }
}
