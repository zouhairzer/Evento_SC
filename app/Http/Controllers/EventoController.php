<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Evenement;
use App\Models\Category;
use Illuminate\Pagination\Paginator;

class EventoController extends Controller
{
    // public function index()
    // {
    //     return view('index');
    // }
    
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
        return view('admin.dashboard');
    }
    
    public function afficheTable()
    {
        return view('admin.table');
    }

    public function afficheorDashboard()
    {
        return view('organisateur.orDashboard');
    }

    public function afficheorTables()
    {
        return view('organisateur.orTables');
    }



    public function filter(Request $request)
    {
        $category =  $request->input('category');

        $query = DB::table('evenements')->join('categories','evenements.category','=','categories.id')
                                        ->select('evenements.*','categories.category');
                                        
        if($category){
            $query->where('categories.category',$category);
        }

        $AfficheEvenements = $query->paginate(5);
        $categories = Category::all();
        
        return view('index',compact('AfficheEvenements','categories'));

    }
}
