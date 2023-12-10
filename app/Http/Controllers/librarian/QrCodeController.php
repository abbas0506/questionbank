<?php

namespace App\Http\Controllers\librarian;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookDomain;
use App\Models\BookRack;
use Exception;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bookRacks = BookRack::all();
        return view('librarian.qrcodes.index', compact('bookRacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function generateQr(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
        ]);
        try {
            $books = Book::whereBetween('id', [$request->from, $request->to])->get();
            return redirect()->route('librarian.preview-qr')->with('books', $books);
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }
    public function previewQr()
    {
        if (session('books')) {
            $books = session('books');
            $pdf = PDF::loadView('librarian.qrcodes.preview', compact('books'))->setPaper('a4', 'portrait');
            $pdf->set_option("isPhpEnabled", true);

            $file = "QrCode.pdf";
            return $pdf->stream($file);
        } else {
            echo " books range not provided";
        }
    }
}
