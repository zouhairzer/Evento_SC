<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EventoController extends Controller
{
    public function index()
    {
        return view('index');
    }


    
    
    public function afficheLogin()
    {
        return view('login');
    }

    public function afficheRegister()
    {
        return view('register');
    }
    
    public function afficheforgot_Password()
    {
        return view('forgot_Password');
    }


    public function afficheReset($token)
    {
        $user = User::where('remember_token','=',$token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            // dd($user);
            return view('reset',$data);
        }
        
        else{
            abort(404);
        }
        
    }

    public function afficheDashboard()
    {
        return view('organisateur.dashboard');
    }
    
    public function afficheTable()
    {
        return view('organisateur.table');
    }
}
