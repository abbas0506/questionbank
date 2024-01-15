<?php

namespace App\Http\Controllers\principal;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherEvaluation;
use App\Models\TeacherEvaluationItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherEvaluationController extends Controller
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
    public function create($teacherId)
    {
        //
        $teacher = Teacher::find($teacherId);
        $teacherEvaluationItems = TeacherEvaluationItem::all();
        return view('principal.teachers.evaluation.create', compact('teacherEvaluationItems', 'teacher'));
    }
    public function add($teacherId)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $teacherId)
    {
        //
        $request->validate([
            'teacher_evaluation_item_id_array' => 'required',
            'evaluation_marks_array' => 'required',
            'month' => 'required',
        ]);

        $marks = array();
        $marks = $request->evaluation_marks_array;
        $evaluationItemIds = array();
        $evaluationItemIds = $request->teacher_evaluation_item_id_array;
        DB::beginTransaction();
        //stop if already registered
        try {
            if ($evaluationItemIds) {
                $i = 0;
                foreach ($evaluationItemIds as $evaluationItemId) {
                    //register students for this course
                    TeacherEvaluation::create([
                        'teacher_id' => $teacherId,
                        'teacher_evaluation_item_id' => $evaluationItemId,
                        'evaluation_marks' => $marks[$i++],
                        'month' => $request->month,
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('principal.teachers.index')->with('success', 'Teacher evaluation successful');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors($ex->getMessage());
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
