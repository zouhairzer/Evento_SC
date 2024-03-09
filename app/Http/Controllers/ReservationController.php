<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function ticket(Request $request)
    {

        $ticket = new Reservation();

        $ticket->user_id = $request->user_id;

        $ticket->event_id = $request->event_id;

        // dd($ticket);

        $ticket->save();

        return redirect()->back();
    }

}
