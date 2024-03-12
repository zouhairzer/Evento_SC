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
        
        if(!$check ){

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

//////////////////////////////////////////// Afficher la page de  Rejecter une Reservation Manuell ////////////////////////////////////////////

    public function reservation_manuell()
    {
        $getReservation = DB::table('reservations')->join('evenements','reservations.event_id','=','evenements.id')
                                                    ->join('users','reservations.user_id','=','users.id')
                                                    ->select('evenements.*','users.name as nom','reservations.id as r_id', 'reservations.status as r_status')
                                                    ->get();
        return view('organisateur.manuel_reservation', compact('getReservation'));
    }

//////////////////////////////////////////// Accepter or Rejecter une Reservation Manuell ////////////////////////////////////////////


    public function approve_manuell(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:reservations,id',
            'status' => 'required|in:rejecter,accepter'
        ]);

        $check = Evenement::where('type','auto')->first();

        $reservation = Reservation::findOrFail($request->id);

        if(!$check)
        {
            $reservation->status = $request->status;
        }

        else
        {    
            $reservation->status = 'accepter';
            $ev = Evenement::find($id);
            $ev->nombre_places_disponibles = $ev->nombre_places_disponibles - 1;

            $ev->save();
        }

        $reservation->save();

        

        return redirect()->back();
    }


}
