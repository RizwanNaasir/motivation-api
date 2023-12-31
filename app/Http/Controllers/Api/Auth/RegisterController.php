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
            'age' => $request->input('age', 0),
            'gender' => $request->input('gender', 'N/A'),
            'favorite_hobby' => $request->input('favorite_hobby', 'N/A'),
            'personality_type' => $request->input('personality_type', 'N/A'),
            'password' => bcrypt($request->input('password')),
        ]);

//        $user->sendEmailVerificationNotification();
        return $this->success(
            data: ['token' => $user->createToken('API Token')->plainTextToken],
            message: 'User created successfully'
        );
    }
}
