<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function send(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->success(message: 'Email already verified.');
        }

        $request->user()->sendEmailVerificationNotification();

        return $this->success(message: 'Verification link will be sent on your email.');
    }
}
