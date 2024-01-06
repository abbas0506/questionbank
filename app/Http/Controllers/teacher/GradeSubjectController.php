<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($gradeId)
    {
        //
        $grades = Grade::where('id', '>', 8)->get();
        $grade = Grade::find($gradeId);
        return view('teacher.qbank.subjects.index', compact('grades', 'grade'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($gradeId)
    {
        //
        $grade = Grade::find($gradeId);
        return view('teacher.qbank.subjects.create', compact('grade'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $gradeId)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $exists = Subject::where('name', $request->name)->where('grade_id', $gradeId)->count();
        if ($exists)
            return redirect()->back()->with('warning', 'Already eixsts!');
        else {
            try {
                $question = Subject::create([
                    'name' => $request->name,
                    'grade_id' => $gradeId,
                ]);
                return redirect()->route('teacher.grades.subjects.index', $gradeId)
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
    public function show(string $gradeId, $subjectId)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy($gradeId, string $subjectId)
    {
        //
        try {
            $subject = Subject::find($subjectId);
            $subject->delete();
            return redirect()->route('teacher.grades.subjects.index', $gradeId)->with('success', 'Successfully deleted!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
