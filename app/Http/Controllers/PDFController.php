<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $details = Evenement::find($request->id); 

        if(!$details){
            abort(404);
        }

        $data = [
            'titre' => $details->titre,
        ];

        // dd($data);

        $pdf = PDF::loadview('pdf', $data);

        return $pdf->download('Evento.pdf');
    }
}
