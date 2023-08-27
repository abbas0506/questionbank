<?php

namespace App\Http\Controllers\dep;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PdfController extends Controller
{
    //
    public function recommended()
    {
        $session = Session::find(session('session_id'));
        $pdf = PDF::loadView('dep.pdf.recommended', compact('session'))->setPaper('a4', 'portrait');
        $pdf->set_option("isPhpEnabled", true);

        $file = "Recommended List " . $session->title() . ".pdf";
        return $pdf->stream($file);
    }
    public function objectioned()
    {
        $session = Session::find(session('session_id'));
        $pdf = PDF::loadView('dep.pdf.objectioned', compact('session'))->setPaper('a4', 'portrait');
        $pdf->set_option("isPhpEnabled", true);

        $file = "Objection List " . $session->title() . ".pdf";
        return $pdf->stream($file);
    }
}
