<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\key;
use App\Models\User;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->cookie('token')){

        }
        else{
            $token = $request->cookie('token');
            $data = JWT::decode($token, new key($_ENV['JWT_SECRET'],'HS256'));
            $user = User::find($data->sub);

            if(!$user){
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
            }
            else{
                return $next($request);
            }
        }
    }
}
