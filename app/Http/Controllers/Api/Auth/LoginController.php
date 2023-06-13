<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);
        try {
            auth()->attempt($credentials);
            if (auth()->check()) {
                $user = auth()->user();
                return $this->success([
                    'token' => $user->createToken('API Token')->plainTextToken,
                ]);
            } else {
                return $this->error(
                    message: 'invalid credentials',
                    code: 401
                );
            }

        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 400);
        }
    }

    public function update(Request $request): JsonResponse
    {
        try {
            $user = User::query()->where('id', auth()->id())->first();
            $user->update($request->validated());
            return $this->success($user);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 400);
        }
    }

    public function logout()
    {
        $user = request()->user();
        $user->device_token = null;
        $user->save();
        $user->tokens()->delete();
        return $this->success(
            message: 'Logged out successfully'
        );
    }
}
