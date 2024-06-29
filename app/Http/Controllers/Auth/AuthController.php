<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Utils\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('LaravelPassport')->accessToken;
            return Helper::ResponseAPI('token', $token);
        }
        return Helper::ResponseAPI('Incorret credentials or User does not exists', null, 403);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        $token = $user->createToken('LaravelPassport')->accessToken;
        return Helper::ResponseAPI('token', $token, 201);
    }

    public function logout()
    {
        $user = Auth::guard('api')->user();
        if ($user) {
            $tokens = $user->tokens;
            foreach ($tokens as $token) {
                $token->revoke();
            }
            return Helper::ResponseAPI('Successfully logged out');
        } else {
            return Helper::ResponseAPI('User not authenticated', null, 401);
        }
    }
}
