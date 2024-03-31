<?php

namespace App\Http\Controllers\Demo\QuestionPaper;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Test;
use Exception;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function index()
    {
        //
        $grades = Grade::where('id', '>', 8)->get();
        return view('services.paper.index', compact('grades'));
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
            // 'title' => 'required',
            // 'test_date' => 'required',
            'subject_id' => 'required|numeric',
            'chapter_id_array' => 'required',
        ]);

        $request->merge([
            'title' => 'Test Title',
            'test_date' => date('Y/m/d'),
            'exercise_only' => ($request->exercise_only) ? 1 : 0,
            'frequent_only' => ($request->frequent_only) ? 1 : 0,
            'user_id' => 1,
        ]);
        try {
            $test = Test::create($request->all());
            $chapterIdArray = array();
            $chapterIdArray = $request->chapter_id_array;
            $chapters = Chapter::whereIn('chapter_no', $chapterIdArray)->get();
            session([
                'chapterIdArray' => $chapterIdArray,
            ]);
            return redirect()->route('papers.show', $test);
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
        $test = Test::find($id);
        return view('services.paper.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $test = Test::find($id);
        return view('services.paper.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'duration' => 'required|numeric',
            'test_date' => 'required|date'
        ]);
        try {
            $test = Test::find($id);
            $test->update($request->all());
            return redirect()->route('papers.show', $test)->with('success', 'Successfully updated');
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
    }
}
