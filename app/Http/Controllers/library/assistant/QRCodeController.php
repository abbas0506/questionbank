<?php

namespace App\Http\Controllers\library\assistant;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookRack;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class QRCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function preview(string $id)
    {
        //
        $book_rack = BookRack::find($id);
        $pdf = PDF::loadView('modules.library.assistant.qrcodes.preview', compact('book_rack'))->setPaper('a4', 'portrait');
        $pdf->set_option("isPhpEnabled", true);

        $file = "QRCode.pdf";
        return $pdf->stream($file);
    }
}
