<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Mcq;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChapterMcqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($chapterId)
    {
        //
        $chapter = Chapter::find($chapterId);
        return view('teacher.qbank.questions.mcq.index', compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($chapterId)
    {
        //
        $chapter = Chapter::find($chapterId);
        return view('teacher.qbank.questions.mcq.create', compact('chapter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $chapterId)
    {
        //
        $request->validate([
            'question' => 'required',
            'bise_frequency' => 'required|numeric|min:0',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $mcq = Mcq::create([
                'option_a' => $request->option_a,
                'option_b' => $request->option_b,
                'option_c' => $request->option_c,
                'option_d' => $request->option_d,
            ]);

            $answer = '';
            if ($request->answer_a) $answer = 'a';
            if ($request->answer_b) $answer = 'b';
            if ($request->answer_c) $answer = 'c';
            if ($request->answer_d) $answer = 'd';

            $question = Question::create([
                'chapter_id' => $chapterId,
                'question' => $request->question,
                'answer' => $answer,
                'marks' => 1,
                'bise_frequency' => $request->bise_frequency,
                'is_from_exercise' => ($request->is_from_exercise) ? 1 : 0,
                'is_approved' => false,
                'question_type' => 'mcq',
                'mcq_id' => $mcq->id,
                'user_id' => Auth::user()->id,

            ]);
            DB::commit();
            return redirect()->back()
                ->with([
                    'success' => 'Successfully created',
                    'isFromExercise' => $question->is_from_exercise,
                ]);
        } catch (Exception $e) {
            Db::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($chapterId, $questionId)
    {
        //
        $chapter = Chapter::find($chapterId);
        $question = Question::find($questionId);
        return view('teacher.qbank.questions.mcq.show', compact('chapter', 'question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($chapterId, $questionId)
    {
        //
        $chapter = Chapter::find($chapterId);
        $question = Question::find($questionId);
        return view('teacher.qbank.questions.mcq.edit', compact('chapter', 'question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $chapterId, $questionId)
    {
        //
        $request->validate([

            'question' => 'required',
            'bise_frequency' => 'required|numeric|min:0',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
        ]);

        $question = Question::find($questionId);
        DB::beginTransaction();
        try {

            $question->mcq->update([
                'option_a' => $request->option_a,
                'option_b' => $request->option_b,
                'option_c' => $request->option_c,
                'option_d' => $request->option_d,
            ]);

            $answer = '';
            if ($request->answer_a) $answer = 'a';
            if ($request->answer_b) $answer = 'b';
            if ($request->answer_c) $answer = 'c';
            if ($request->answer_d) $answer = 'd';

            $question->update([
                'question' => $request->question,
                'answer' => $answer,
                'bise_frequency' => $request->bise_frequency,
                'is_from_exercise' => ($request->is_from_exercise) ? 1 : 0,
            ]);
            DB::commit();
            return redirect()->route('teacher.chapters.mcq.index', $chapterId)
                ->with([
                    'success' => 'Successfully updated',
                ]);
        } catch (Exception $e) {
            Db::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($chapterId, $questionId)
    {
        //
        try {
            $question = Question::find($questionId);
            $question->delete();
            return redirect()->route('teacher.chapters.mcq.index', $chapterId)->with('success', 'Successfully deleted!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
