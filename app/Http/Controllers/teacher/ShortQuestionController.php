<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShortQuestionController extends Controller
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
        ]);

        $request->merge([
            'question_type_id' => 1,
            'is_from_exercise' => ($request->is_from_exercise) ? 1 : 0,
            'is_approved' => false,
            'user_id' => Auth::user()->id,
        ]);
        try {
            Question::create($request->all());
            return redirect()->route('teacher.questions.view', [$request->chapter_id, 1])
                ->with([
                    'success' => 'Successfully created',
                ]);
        } catch (Exception $e) {
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $question = Question::find($id);
        return view('teacher.questions.short.edit', compact('question'));
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
        ]);

        $request->merge([
            'is_from_exercise' => ($request->is_from_exercise) ? 1 : 0,
        ]);
        $question = Question::find($id);
        try {
            $question->update($request->all());
            return redirect()->route('teacher.questions.view', [$question->chapter_id, 1])
                ->with([
                    'success' => 'Successfully updated',
                ]);
        } catch (Exception $e) {
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
        try {
            $model = Question::find($id);
            $question = $model;
            $model->delete();
            return redirect()->route('teacher.questions.view', [$question->chapter, 1])->with('success', 'Successfully deleted!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
