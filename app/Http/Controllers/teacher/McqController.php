<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Mcq;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class McqController extends Controller
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
        $request->validate([
            'chapter_id' => 'required',
            'question' => 'required',
            'answer' => 'nullable',
            'marks' => 'required|numeric|min:0',
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
                'chapter_id' => $request->chapter_id,
                'question' => $request->question,
                'answer' => $answer,
                'marks' => $request->marks,
                'bise_frequency' => $request->bise_frequency,
                'is_from_exercise' => ($request->is_from_exercise) ? 1 : 0,
                'is_approved' => false,
                'question_type' => 'mcq',
                'mcq_id' => $mcq->id,
                'user_id' => Auth::user()->id,

            ]);
            DB::commit();
            return redirect()->route('teacher.questions.view', [$request->chapter_id, 'mcq'])
                ->with([
                    'success' => 'Successfully created',
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
    public function show(string $id)
    {
        //
        $question = Question::find($id);
        echo $question->mcq->question->bise_frequency;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $question = Question::find($id);
        return view('teacher.questions.mcqs.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([

            'question' => 'required',
            'answer' => 'nullable',
            'marks' => 'required|numeric|min:0',
            'bise_frequency' => 'required|numeric|min:0',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
        ]);

        $question = Question::find($id);
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
                'marks' => $request->marks,
                'bise_frequency' => $request->bise_frequency,
                'is_from_exercise' => ($request->is_from_exercise) ? 1 : 0,
            ]);
            DB::commit();
            return redirect()->route('teacher.questions.view', [$question->chapter_id, 'mcq'])
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
    public function destroy(string $id)
    {
        //
        DB::beginTransaction();
        try {
            $question = Question::find($id);
            $question->mcq->delete();
            $question->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Successfully deleted!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
