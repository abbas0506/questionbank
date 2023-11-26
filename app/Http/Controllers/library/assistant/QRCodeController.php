<?php

namespace App\Http\Controllers\library\assistant;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookRack;
use App\Models\Clas;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class QRCodeController extends Controller
{

    public function index()
    {
        $book_racks = BookRack::all();
        $classes = Clas::all();
        return view('modules.library.assistant.qrcodes.index', compact('book_racks', 'classes'));
    }
    /**
     * Display a listing of the resource.
     */
    public function previewBooksQr(string $id)
    {
        //
        $book_rack = BookRack::find($id);
        $pdf = PDF::loadView('modules.library.assistant.qrcodes.books.preview', compact('book_rack'))->setPaper('a4', 'portrait');
        $pdf->set_option("isPhpEnabled", true);

        $file = "QRCode.pdf";
        return $pdf->stream($file);
    }
    public function previewTeachersQr()
    {
        //
        $teachers = Teacher::all();
        $pdf = PDF::loadView('modules.library.assistant.qrcodes.teachers.preview', compact('teachers'))->setPaper('a4', 'portrait');
        $pdf->set_option("isPhpEnabled", true);

        $file = "QRCode.pdf";
        return $pdf->stream($file);
    }
    public function previewStudentsQr(string $id)
    {
        //
        $clas = Clas::find($id);
        $pdf = PDF::loadView('modules.library.assistant.qrcodes.students.preview', compact('clas'))->setPaper('a4', 'portrait');
        $pdf->set_option("isPhpEnabled", true);

        $file = "QRCode.pdf";
        return $pdf->stream($file);
    }
}
