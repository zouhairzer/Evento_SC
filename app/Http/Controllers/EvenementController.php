<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\StoreEvenementRequest;
use App\Http\Requests\UpdateEvenementRequest;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\key;


class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AjouterEvenement(Request $request)
    {
        $evenement = Evenement::where('titre',$request->titre)->first();
        
        if(!$evenement){

            $uploadFile = 'images/';
            $uploadFileName = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($uploadFile), $uploadFileName);
            

            $evenement = new Evenement();
            $evenement->titre = $request->titre;
            $evenement->description = $request->description;
            $evenement->image = $uploadFileName;
            $evenement->date = $request->date;
            $evenement->lieu = $request->lieu;
            $evenement->nombre_places_disponibles = $request->nombre_places_disponibles;
            $evenement->category = $request->category;
            $evenement->date_fin = $request->date_fin;
            $evenement->prix = $request->prix;
            $evenement->type = $request->type;
            $evenement->user_id = $request->user_id;

            // dd($evenement);
            $evenement->save();
    
            return redirect()->back()->with('success','Ajouter avec Succes');
        }
        else{
            return redirect()->back()->with('Error','Ajoute à échoue');
        }
    }


    public function AfficheEvenement()
    {

        $AfficheEvenements = DB::table('categories')->join('evenements', 'categories.id', '=', 'evenements.category')
                                                    ->select('evenements.*', 'categories.category')
                                                    ->paginate(4);

        // dd($AfficheEvenements);   

        $category = Category::all();
        $users = User::all();

        return view('organisateur.orTables',compact('AfficheEvenements','category','users'));
    }


    
    public function deleteEvenements($id)
    {
        $deleteEvenement =  Evenement::find($id);
        $deleteEvenement->delete();
        return redirect('/orTables');
    }

/////////////////////////////////////////////////  Update Evenement /////////////////////////////////////////////////

    public function getEvenements($id)
    {
        
        $getEvenement = Evenement::find($id);
        $getCategory = Category::all();

        // dd($getEvenement);
        // dd($getCategory);
        return view('organisateur.update_Evenement', compact('getEvenement','getCategory'));
    }


    public function updateEvenements(Request $request)
    {  
        $evenement = Evenement::findOrFail($request->id);
        $evenement->titre = $request->titre;
        $evenement->description = $request->description;
        $evenement->date = $request->date;
        $evenement->lieu = $request->lieu;
        $evenement->nombre_places_disponibles = $request->nombre_places_disponibles;
        $evenement->category = $request->category;
        $evenement->prix = $request->prix; 
        
        // dd($evenement);

        if($request->hasFile('image')){
            $uploadFile = 'images/';
            $uploadFileName = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($uploadFile),$uploadFileName);

            if($evenement->image){
                Storage::delete('images/',$evenement->image);
            }
            $evenement->image = $uploadFileName;
        }


        $evenement->save();

        return redirect('/orTables');
    }
///////////////////////////////////////////////// Search /////////////////////////////////////////////////

    public function search(Request $request)
    {
        $query = $request->input('search');

        $evenement = Evenement::where('titre', 'like','%%')->get();

        return view('index',compact('evenement'));
    }

/////////////////////////////////////////////////  ADMIN Affche, Reject && Accept /////////////////////////////////////////////////

    public function fetchEvenements()
    {
        $AfficheEvenements = DB::table('categories')->join('evenements', 'categories.id', '=', 'evenements.category')
                                                    ->select('evenements.*','categories.category')
                                                    ->paginate(4);
        $category = Category::all();

        return view('admin.evenements',compact('AfficheEvenements','category'));
    }

/////////////////////////////////////////////////  ADMIN , Reject && Accept Event /////////////////////////////////////////////////

    public function AcRjEvenemen(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:evenements,id',
            'status' => 'required|in:accepter,rejecter',
        ]);

        if($request){
            $evenement = Evenement::findOrFail($request->id);
            $evenement->status = $request->status;
            // dd($evenement);
            $evenement->save();
            if($evenement->status === 'accepter'){
                return redirect()->back()->with('success','The Event is Accepted');
            }
            else{
                return redirect()->back()->with('error','The Event is Rejected');
            }
        }
}


    
/////////////////////////////////////////////////  organisateur , auto && manuell acceptation ticket /////////////////////////////////////////////////

    public function type(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:evenements,id',
            'type' => 'required|in:auto,manuell'
        ]);

        // dd($request);
        
        $type = Evenement::findOrFail($request->id);
        $type->type = $request->type;
        $type->save();

        return redirect()->back();
    }
    
}