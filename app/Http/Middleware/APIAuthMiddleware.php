<?php

namespace App\Http\Middleware;

use App\Utils\Helper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class APIAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            if ($user->role != 'owner') {
                return Helper::ResponseAPI('Error! You do not have permission to perform this action', null, 403);
            }
        }

        if (!$request->has('email') && !$request->has('password')) {
            if (Auth::guard('api')->guest() || !Auth::guard('api')->check()) {
                return Helper::ResponseAPI('Unauthorized', null, 401);
            }
        }






        return $next($request);
    }
}
