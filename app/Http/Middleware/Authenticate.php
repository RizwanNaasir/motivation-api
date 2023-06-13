<?php

namespace App\Http\Middleware;

use App\Traits\CanResponseTrait;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    use CanResponseTrait;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return $this->error(
                message: 'You need to login before you can perform any actions.',
                code: Response::HTTP_UNAUTHORIZED
            );
        }
        else {
            return 'Unauthorized!';
        }
    }
}
