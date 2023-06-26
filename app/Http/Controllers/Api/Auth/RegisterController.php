<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $user = User::query()->create([
            'name' => $request->input('name', ''),
            'surname' => $request->input('surname', ''),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->sendEmailVerificationNotification();
        return $this->success(
            data: ['token' => $user->createToken('API Token')->plainTextToken],
            message: 'User created successfully'
        );
    }
}
