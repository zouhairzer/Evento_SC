<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use App\Models\Evenement;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function ticket(Request $request)
    {
        
        $status = Evenement::all();

        $check = Reservation::where('user_id', $request->user_id)->first();
        
        if(!$check){

            $reserver = new Reservation();
            
            $reserver->user_id = $request->user_id;
            
            $reserver->event_id = $request->event_id;
            
            // dd($reserver);
            
            $reserver->save();
            
            return redirect()->back()->with('Accpeter','Reservation à Accepter');
        }
        else{
            return redirect()->back()->with('Rejecter','Déjà reserver');
        }

    }

}
