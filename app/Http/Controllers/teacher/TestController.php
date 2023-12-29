<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Test;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
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
        $annexedGrade = '';
        $annexedSubject = '';
        $grades = Grade::where('id', '>', 8)->get();
        return view('teacher.tests.config', compact('grades', 'annexedGrade', 'annexedSubject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'test_date' => 'required',
            'subject_id' => 'required|numeric',
            'chapter_no_array' => 'required',
        ]);

        $request->merge([
            'exercise_only' => ($request->exercise_only) ? 1 : 0,
            'frequent_only' => ($request->frequent_only) ? 1 : 0,
            'user_id' => Auth::user()->id,
        ]);
        try {
            $test = Test::create($request->all());
            $chapterNoArray = array();
            $chapterNoArray = $request->chapter_no_array;
            $chapters = Chapter::whereIn('chapter_no', $chapterNoArray)->get();
            session([
                'testId' => $test->id,
                // 'chapters' => $chapters,
                'chapterNoArray' => $chapterNoArray,
            ]);
            return redirect()->route('teacher.test-questions.index');
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
        $test = Test::find($id);
        return view('teacher.tests.edit', compact('test'));
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
        ]);
        try {
            $test = Test::find($id);
            $test->update($request->all());
            return redirect()->route('teacher.test-questions.index', $test)->with('success', 'Successfully updated');
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

    public function annexGrade($id)
    {
        $annexedGrade = Grade::find($id);
        $annexedSubject = '';
        $grades = Grade::where('id', '>', 8)->get();
        return view('teacher.tests.config', compact('grades', 'annexedGrade', 'annexedSubject'));
    }

    public function annexSubject($id)
    {
        $annexedSubject = Subject::find($id);
        $annexedGrade = $annexedSubject->grade;
        $grades = Grade::where('id', '>', 8)->get();
        return view('teacher.tests.config', compact('grades', 'annexedGrade', 'annexedSubject'));
    }
}
