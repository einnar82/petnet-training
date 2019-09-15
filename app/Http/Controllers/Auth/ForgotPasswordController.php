<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordNotification;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $user = User::whereEmail($request->email)->firstOrFail();
        //set password token to db
        $token = (new PasswordReset)->createToken($request->email);
        //send notification via email
        $user->sendPasswordResetNotification($token);
        return response()->json(['message' => 'The code has been sent to your email, please check!']);
    }
}
