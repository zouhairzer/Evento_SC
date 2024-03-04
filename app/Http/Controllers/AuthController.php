<?php

namespace App\Http\Controllers;

use App\Models\crR;
use Firebase\JWT\JWT;
use Firebase\JWT\key;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $user = User::where('email', $request->email)->first();
        // dd($request);
        if($user){
            return redirect()->back()->with("The Account Already Exist");
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            
            $user->save();

            return view('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
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
            return redirect()->back()->with("invalid information");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(crR $crR)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(crR $crR)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, crR $crR)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(crR $crR)
    {
        //
    }
}
