<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class TestPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($testId)
    {
        //
        $test = Test::find($testId);
        return view('teacher.tests.pdf.create', compact('test'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $testId)
    {
        //
        $pageOrientation = $request->page_orientation;
        $pageSize = $request->page_size;
        $rows = $request->rows;
        $cols = $request->cols;
        $test = Test::find($testId);
        $fontSize = $request->font_size;
        $pdf = PDF::loadView('teacher.tests.pdf.preview', compact('test', 'rows', 'cols', 'fontSize'))->setPaper($pageSize, $pageOrientation);
        $pdf->set_option("isPhpEnabled", true);
        $file = "test.pdf";
        return $pdf->stream($file);
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
}
