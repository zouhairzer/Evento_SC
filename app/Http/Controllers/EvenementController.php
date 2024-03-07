<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Category;
use App\Http\Requests\StoreEvenementRequest;
use App\Http\Requests\UpdateEvenementRequest;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
                                                    ->select('evenements.*','categories.category')
                                                    ->paginate(4);
                                
        $category = Category::all();

        return view('organisateur.orTables',compact('AfficheEvenements','category'));
    }

    public function deleteEvenements($id)
    {
        $deleteEvenement =  Evenement::find($id);
        $deleteEvenement->delete();
        return redirect('/orTables');
    }

    public function getEvenements($id)
    {
        $getEvenement = Evenement::find($id);
        $getCategory = Category::all();

        // dd($getCategory);
        return view('organisateur.update_Evenement', compact('getEvenement','getCategory'));
    }

    public function updateEvenements(Request $request)
    {
        // dd($request);
        
        $evenement = Evenement::findOrFail($request->id);
        $evenement->titre = $request->titre;
        $evenement->description = $request->description;
        $evenement->date = $request->date;
        $evenement->lieu = $request->lieu;
        $evenement->nombre_places_disponibles = $request->nombre_places_disponibles;
        $evenement->category = $request->category;

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
}
