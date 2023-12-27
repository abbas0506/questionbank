<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;

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
        return view('teacher.tests.create', compact('grades', 'annexedGrade', 'annexedSubject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function annexGrade($id)
    {
        $annexedGrade = Grade::find($id);
        $annexedSubject = '';
        $grades = Grade::where('id', '>', 8)->get();
        return view('teacher.tests.create', compact('grades', 'annexedGrade', 'annexedSubject'));
    }

    public function annexSubject($id)
    {
        $annexedSubject = Subject::find($id);
        $annexedGrade = $annexedSubject->grade;
        $grades = Grade::where('id', '>', 8)->get();
        return view('teacher.tests.create', compact('grades', 'annexedGrade', 'annexedSubject'));
    }
}
