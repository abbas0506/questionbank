<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterLongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($chapterId)
    {
        //
        $chapter = Chapter::find($chapterId);
        return view('teacher.qbank.questions.long.index', compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($chapterId)
    {
        //
        $chapter = Chapter::find($chapterId);
        return view('teacher.qbank.questions.long.create', compact('chapter'));
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
        ]);

        try {
            $question = Question::create([
                'question' => $request->question,
                'is_from_exercise' => ($request->is_from_exercise) ? 1 : 0,
                'marks' => $request->marks,
                'bise_frequency' => $request->bise_frequency,
                'chapter_id' => $chapterId,
                'question_type' => 'long',
                'is_approved' => false,
                'user_id' => Auth::user()->id,

            ]);
            return redirect()->back()
                ->with([
                    'success' => 'Successfully created',
                    'isFromExercise' => $question->is_from_exercise,
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
    public function edit($chapterId, $questionId)
    {
        //
        $chapter = Chapter::find($chapterId);
        $question = Question::find($questionId);
        return view('teacher.qbank.questions.long.edit', compact('chapter', 'question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $chapterId, $questionId)
    {
        //
        $request->validate([
            'question' => 'required',
            'marks' => 'required|numeric|min:0',
            'bise_frequency' => 'required|numeric|min:0',
        ]);

        $question = Question::find($questionId);
        try {
            $question->update([
                'question' => $request->question,
                'marks' => $request->marks,
                'is_from_exercise' => ($request->is_from_exercise) ? 1 : 0,
                'bise_frequency' => $request->bise_frequency,
            ]);
            return redirect()->route('teacher.chapters.long.index', $chapterId)
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
    public function destroy($chapterId, $questionId)
    {
        //
        try {
            $question = Question::find($questionId);
            $question->delete();
            return redirect()->route('teacher.chapters.long.index', $chapterId)->with('success', 'Successfully deleted!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
