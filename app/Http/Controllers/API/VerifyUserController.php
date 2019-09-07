<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class VerifyUserController extends Controller
{
    public function verify(Request $request)
    {
        if ($user = User::whereCode($request->code)->firstOrFail()) {
            $user->update(['email_verified_at' => now()]);
            return response()->json(['message' => 'user verified']);
        }
        return response()->json(['message' => 'user not found!'], 404);
    }
}
