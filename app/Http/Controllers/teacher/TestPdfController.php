<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Http;

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
        $test = Test::find($id);
        $questions = "";
        foreach ($test->questions as $question) {
            if ($question->question_type == "mcq") {
                foreach($question->mcqs()->get() as $q){
                    foreach($q->parts as $part){
                        $questions .= "\n\question {$part->question->question}";
                        $questions .= "\n\begin{oneparchoices}";
                        $questions .= "\n\choice {$part->question->mcq->option_a}";
                        $questions .= "\n\choice {$part->question->mcq->option_b}";
                        $questions .= "\n\choice {$part->question->mcq->option_c}";
                        $questions .= "\n\choice {$part->question->mcq->option_d}";
                        $questions .= "\n\end{oneparchoices}";
                    }
                }
            } else {
                $questions .= "\n\begin{oneparchoices}";
            }
        }
        $doc = "\documentclass{exam}
        \begin{document}

        \begin{center}
        \fbox{\fbox{\parbox{5.5in}{\centering
        Answer the questions in the spaces provided. If you run out of room
        for an answer, continue on the back of the page.}}}
        \end{center}
        
        \vspace{5mm}
        \makebox[0.75\textwidth]{Name and section:\enspace\hrulefill}
        
        \vspace{5mm}
        \makebox[0.75\textwidth]{Instructor’s name:\enspace\hrulefill}
        
        \begin{questions}
        $questions
        \end{questions}
        \end{document}";

        $res = Http::post('https://app.gleedu.com/api/latex/', [
            'text' => $doc,
        ]);
        return $res;
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
