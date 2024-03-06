<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\forgotPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Firebase\JWT\JWT;
use Firebase\JWT\key;
use App\Models\User;
use App\Models\crR;

class AuthController extends Controller
{

    public function create(Request $request)
    {
        
        $user = User::where('email', $request->email)->first();
        // dd($request);
        if($user){
            return redirect()->back()->with('Error','The Account Already Exist');
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role_id = $request->role_id;
            
            $user->save();

            return view('/login')->with('success', 'Registration Successful');
        }
    }



    public function login(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        // dd($user);
        if($user && password_verify($request->password,$user->password)){
            $_SESSION['email'] = $user->email;

            $payload =[
                'sub' => $user->id
            ];

            $jwt = JWT::encode($payload, $_ENV['JWT_SECRET'], $_ENV['JWT_ALGO']);

            $cookie = cookie('token', $jwt, 60);
            return redirect('/')->withCookie($cookie);
        }else{
            return redirect()->back()->with('Eror','invalid Information');
        }
    }


    
    public function forgot_Password(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!empty($user)){
            $user->remember_token = str::random(49); 
            $user->save();

            // dd($user);

            Mail::to($user->email)->send(new forgotPasswordMail($user));
            // dd($user);

            return redirect()->back()->with('success', 'Check Your Email');
        }
        else{
            return redirect()->back()->with('Error','Email Not found');
        }
    }


    public function resetPassword($token, Request $request)
    {
        // dd($request);
        $user = User::where('remember_token', '=', $token)->first();

        if(!empty($user)){
            
            if($request->password == $request->cpassword){
                $user->password = Hash::make($request->cpassword);
                $user->remember_token = str::random(49);
                $user->save();

                return redirect('/login')->with('success','Password Successfully Reset');
            }
            else{
                return redirect()->back()->with('Error','Pssword and Confirm Password Incorrect');
            }
        }
        else{
            abort(404);
        }
    }

    public function logout()
    {
        Session::flush();
        return view('login');
    }

}
