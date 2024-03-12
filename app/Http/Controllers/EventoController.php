<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Role;

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

/////////////////////////////////////////////////////////  Filter /////////////////////////////////////////////////////////

    public function filter(Request $request)
    {
        $category =  $request->input('category');
        $titre = $request->input('search');

        $query = DB::table('evenements')->join('categories','evenements.category','=','categories.id')
                                        ->select('evenements.*','categories.category')
                                        ->where('status','=','accepter');
                                        
        if($titre){
            $query->where('titre', 'like', "%$titre%");
        }

        if($category){
            $query->where('categories.category',$category);
        }

        $AfficheEvenements = $query->paginate(5);
        $categories = Category::all();
        
        return view('index',compact('AfficheEvenements','categories'));

    }

/////////////////////////////////////////////////////////  Details with display button PDF  /////////////////////////////////////////////////////////

    public function details($id)
    {
        $details = Evenement::find($id);
        $reservation = Reservation::all();
        return view('details', compact('details','reservation'));
    }


///////////////////////////////////////////////////////////////////  Satistique  ///////////////////////////////////////////////////////////////////

    public function StatistiqueOragnisateur()
    {
        $TotalEvent  = Evenement::all()->count();
        $TotalReservation = Reservation::where('status','accepter')->count();
        return view('organisateur.orDashboard', compact('TotalEvent','TotalReservation'));
    }


}
