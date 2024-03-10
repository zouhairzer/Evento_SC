<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Evenement;

class ReservationController extends Controller
{


//////////////////////////////////////////// Insert into Reservation ////////////////////////////////////////////

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

//////////////////////////////////////////// Accepter or Rejecter une Reservation Manuell ////////////////////////////////////////////

    public function reservation_manuell()
    {
        $getReservation = DB::table('reservations')->join('evenements','reservations.event_id','=','evenements.id')
                                          ->join('users','reservations.user_id','=','users.id')
                                          ->select('evenements.*','users.name as nom','reservations.id as r_id', 'reservations.status as r_status')
                                          ->get();
                                          
        return view('organisateur.manuel_reservation', compact('getReservation'));
    }


}
