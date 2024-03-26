<?php

namespace App\Http\Controllers\PaperGeneration;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Test;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemoPaperGenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $grades = Grade::where('id', '>', 8)->get();
        return view('services.paper-generation.index', compact('grades'));
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
            return redirect()->route('papergeneration-demo.show', $test);
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
        return view('services.paper-generation.show', compact('test'));
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
        return view('services.paper-generation.edit', compact('chapters', 'subject'));
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
