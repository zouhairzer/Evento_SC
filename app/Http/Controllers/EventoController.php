<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
