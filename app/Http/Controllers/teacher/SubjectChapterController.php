<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;

class SubjectChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($subjectId)
    {
        //
        $subject = Subject::find($subjectId);
        return view('teacher.qbank.chapters.index', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($subjectId)
    {
        //
        $subject = Subject::find($subjectId);
        $chapterNo = $subject->chapters->count() > 0 ? $subject->chapters->max('chapter_no') + 1 : 1;
        return view('teacher.qbank.chapters.create', compact('subject', 'chapterNo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $subjectId)
    {
        //
        $request->validate([
            'name' => 'required',
            'chapter_no' => 'required',
        ]);
        $request->merge([
            'subject_id' => $subjectId,
        ]);
        $already_exists = Chapter::where('subject_id', $request->subject_id)
            ->where('chapter_no', $request->chapter_no)
            ->get();

        if ($already_exists->count() > 0)
            return redirect()->route('teacher.subjects.chapters.index', $subjectId)
                ->with([
                    'warning' => 'Chapter # already exists!',
                ]);
        else {
            try {

                Chapter::create($request->all());
                return redirect()->route('teacher.subjects.chapters.index', $request->subject_id)
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
    public function show($subjectId, $chapterId)
    {
        //
        $subject = Subject::find($subjectId);
        $chapter = Chapter::find($chapterId);
        return view('teacher.qbank.chapters.show', compact('subject', 'chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($subjectId, $chapterId)
    {
        //
        $subject = Subject::find($subjectId);
        $chapter = Chapter::find($chapterId);
        return view('teacher.qbank.chapters.edit', compact('subject', 'chapter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $subjectId, $chapterId)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        try {
            $chapter = Chapter::find($chapterId);
            $chapter->update($request->all());
            return redirect()->route('teacher.subjects.chapters.index', [$subjectId, $chapter])->with('success', 'Successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($subjectId, $chapterId)
    {
        //
        try {
            $chapter = Chapter::find($chapterId);
            $chapter->delete();
            return redirect()->route('teacher.subjects.chapters.index', $subjectId)->with('success', 'Successfully deleted!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
