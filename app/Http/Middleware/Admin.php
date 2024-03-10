<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\key;
use App\Models\User;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->cookie('token')){
            return redirect('/');
        }
        else{
            $token = $request->cookie('token');
            $data = JWT::decode($token, new Key($_ENV['JWT_SECRET'],'HS256'));
            $user = User::find($data->sub);
            
            if($user->role_id === 1){
                return $next($request);
            }

            else{
                return redirect('/login');
            }
        }

    }
}
