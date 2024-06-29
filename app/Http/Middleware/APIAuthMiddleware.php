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
        if (!$request->has('email') && !$request->has('password')) {
            if (Auth::guard('api')->guest() || !Auth::guard('api')->check()) {
                Helper::ResponseAPI(['error' => 'Unauthorized'], null, 401);
            }

            if (Auth::guard('api')->user()->role != 'owner') {
                return Helper::ResponseAPI('Error! You do not have permission to perform this action', null, 403);
            }
        }

        return $next($request);
    }
}
