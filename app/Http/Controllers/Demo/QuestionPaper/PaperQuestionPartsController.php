<?php

namespace App\Http\Controllers\Demo\QuestionPaper;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\TestQuestionPart;
use Exception;
use Illuminate\Http\Request;

class PaperQuestionPartsController extends Controller
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
    public function refresh($testQuestionPartId)
    {
        $testQuestionPart = TestQuestionPart::find($testQuestionPartId);
        $alreadyIncludedQuestionIds = $testQuestionPart->testQuestion->test->parts->pluck('question_id');
        $replacingQuestion = Question::where('chapter_id', $testQuestionPart->question->chapter_id)
            ->where('question_type', $testQuestionPart->testQuestion->question_type)
            ->whereNotIn('id', $alreadyIncludedQuestionIds)
            ->get()
            ->random(1)
            ->first();

        try {
            $testQuestionPart->update([
                'question_id' => $replacingQuestion->id,
            ]);
            return redirect()->back();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
