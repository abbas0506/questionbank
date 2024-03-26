<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;

class SelfTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $grades = Grade::where('id', '>', 8)->get();
        return view('services.selftest.index', compact('grades'));
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
            'subject_id' => 'required|numeric',
            'chapter_id_array' => 'required',
        ]);


        try {
            // $test = Test::create($request->all());
            $chapterIds = array();
            $chapterIds = $request->chapter_id_array;
            session([
                'chapterIds' => $chapterIds,

            ]);
            return redirect()->route('selftest.show', $request->subject_id);
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
        $subject = Subject::find($id);

        $chapterIds = session('chapterIds');
        $chapters = Chapter::whereIn('id', $chapterIds)->get();
        $questions = collect();
        foreach ($chapters as $chapter) {
            $questionsFromThisChapter = Question::where('question_type', 'mcq')
                ->where('chapter_id', $chapter->id)
                ->get()
                ->random(round(20 / sizeOf($chapterIds), 0));

            foreach ($questionsFromThisChapter as $question)
                $questions->add($question);
        }
        // echo $questions;
        return view('services.selftest.show', compact('subject', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $subject = Subject::find($id);
        $chapters = Chapter::where('subject_id', $id)
            ->whereHas('questions')
            ->get();
        return view('services.selftest.edit', compact('chapters', 'subject'));
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
};
