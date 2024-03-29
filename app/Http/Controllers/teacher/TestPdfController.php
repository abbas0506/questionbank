<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
        // simple pdf
        $test = Test::find($testId);
        return view('pdf.create', compact('test'));

        // latex pdf
        // $test = Test::findOrFail($testId);
        // if ($test->questions->count() == 0) {
        //     return redirect()->route('teacher.tests.show', $testId)->with('error', 'No questions found');
        // }
        // $orientation = 'portrait';
        // $pageSize = 'legalpaper'; // 'a4paper';
        // $columns = 2;
        // $data = view('papers.latex3', compact('test', 'orientation', 'pageSize', 'columns'))->render();
        // if (Storage::disk('local')->exists('test.tex')) {
        //     Storage::disk('local')->delete('test.tex');
        // }
        // $file = Storage::disk('local')->put('test.tex', $data);
        // try {
        //     // $res = Http::post('https://app.gleedu.com/api/latex/', [
        //     //     'text' => $data,
        //     //     'model' => 'bibtex',
        //     // ]);
        //     $res = Http::attach('file', $data, 'test.tex')
        //         ->post('http://16.171.40.228:5000/latex-to-pdf');
        //     if ($res->failed()) {
        //         return $res->body();
        //     }
        //     $output = Storage::disk('local')->put('test.pdf', $res->body());
        //     return response()->file(storage_path('app/test.pdf'));

        //     // return the pdf file to the user

        //     // $data =  $res->json();
        //     // if (!isset($data['data'])) {
        //     //     return "Error: " . $res->body();
        //     // }
        //     $data =  base64_decode($res);
        //     $filename = 'test.pdf';
        //     return response()->make($data, 200, [
        //         'Content-Type' => 'application/pdf',
        //         'Content-Disposition' => 'inline; filename="' . $filename . '"'
        //     ]);
        // } catch (\Exception $e) {
        //     // Handle the exception (e.g., log the error)
        //     // You can also retrieve more details about the error by examining $e
        //     return $e->getMessage();
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $testId)
    {
        $orientation = $request->page_orientation;
        $pageSize = $request->page_size;
        $rows = $request->rows;
        $columns = $request->cols;
        $test = Test::find($testId);
        $fontSize = $request->font_size;
        $data = view('papers.latex3', compact('test', 'orientation', 'pageSize', 'columns', 'fontSize'))->render();
        if (Storage::disk('local')->exists('test.tex')) {
            Storage::disk('local')->delete('test.tex');
        }
        $file = Storage::disk('local')->put('test.tex', $data);
        try {
            $res = Http::attach('file', $data, 'test.tex')
                ->post('http://16.171.40.228/latex-to-pdf');
            if ($res->failed()) {
                return $res->body();
            }
            $output = Storage::disk('local')->put('test.pdf', $res->body());
            return response()->file(storage_path('app/test.pdf'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        $pdf = PDF::loadView('teacher.tests.pdf.preview', compact('test', 'rows', 'cols', 'fontSize'))->setPaper($pageSize, $pageOrientation);
        $pdf->set_option("isPhpEnabled", true);
        $file = "test.pdf";
        return $pdf->stream($file);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $testId, string $id)
    {
        $test = Test::findOrFail($testId);
        if ($test->questions->count() == 0) {
            return redirect()->route('teacher.tests.show', $testId)->with('error', 'No questions found');
        }
        $orientation = 'portrait';
        $pageSize = 'legalpaper'; // 'a4paper';
        $columns = 2;
        $fontSize = 8;
        $data = view('papers.latex3', compact('test', 'orientation', 'pageSize', 'columns','fontSize'))->render();
        if (Storage::disk('local')->exists('test.tex')) {
            Storage::disk('local')->delete('test.tex');
        }
        $file = Storage::disk('local')->put('test.tex', $data);
        try {
            $res = Http::attach('file', $data, 'test.tex')
                ->post('http://16.171.40.228/latex-to-pdf');
            if ($res->failed()) {
                return $res->body();
            }
            $output = Storage::disk('local')->put('test.pdf', $res->body());
            return response()->file(storage_path('app/test.pdf'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
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
