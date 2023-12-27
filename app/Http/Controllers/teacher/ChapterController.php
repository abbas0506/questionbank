<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $grades = Grade::all();
        $subjects = Subject::all();
        $chapters = '';
        if (session('grade_id') && session('subject_id')) {
            $grade_id = session('grade_id');
            $subject_id = session('subject_id');
            $chapters = Chapter::where('grade_id', $grade_id)
                ->where('subject_id', $subject_id)
                ->get();

            return view('teacher.chapters.index', compact('grades', 'subjects', 'chapters'));
        } else {

            return view('teacher.chapters.index', compact('grades', 'subjects', 'chapters'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createChapter($id)
    {
        //
        $subject = Subject::find($id);
        $chapterNo = $subject->chapters->count() > 0 ? $subject->chapters->max('chapter_no') + 1 : 1;
        return view('teacher.chapters.create', compact('subject', 'chapterNo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'subject_id' => 'required',
            'chapter_no' => 'required',
        ]);

        $already_exists = Chapter::where('subject_id', $request->subject_id)
            ->where('chapter_no', $request->chapter_no)
            ->get();

        if ($already_exists->count() > 0)
            return redirect()->route('teacher.chapters.index')
                ->with([
                    'warning' => 'Chapter # already exists!',
                ]);
        else {
            try {

                Chapter::create($request->all());
                return redirect()->route('teacher.subjects.show', $request->subject_id)
                    ->with([
                        'success' => 'Successfully created',
                    ]);
            } catch (Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
                // something went wrong
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $chapter = Chapter::find($id);
        return view('teacher.chapters.show', compact('chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $chapter = Chapter::find($id);
        return view('teacher.chapters.edit', compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        try {
            $chapter = Chapter::find($id);
            $chapter->update($request->all());
            return redirect()->route('teacher.chapters.show', $chapter)->with('success', 'Successfully updated');
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
            $chapter = Chapter::find($id);
            $model = $chapter;
            $chapter->delete();
            return redirect()->route('teacher.subjects.show', $model->subject_id)->with('success', 'Successfully deleted!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function viewQs($chapterId, $qtype)
    {
        $chapter = Chapter::find($chapterId);
        if ($qtype == 'short')
            return view('teacher.questions.short.index', compact('chapter'));

        if ($qtype == 'long')
            return view('teacher.questions.long.index', compact('chapter'));

        if ($qtype == 'mcq')
            return view('teacher.questions.mcqs.index', compact('chapter'));
    }
    public function addQ($chapterId, $qtype)
    {
        $chapter = Chapter::find($chapterId);
        if ($qtype == 'short')
            return view('teacher.questions.short.create', compact('chapter'));

        if ($qtype == 'long')
            return view('teacher.questions.long.create', compact('chapter'));

        if ($qtype == 'mcq')
            return view('teacher.questions.mcqs.create', compact('chapter'));
    }
}
