<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
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
        return view('deo.students.create');
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
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
    public function import($id)
    {

        $section = Section::find($id);
        
        $confirmed_applications = Session::find(session('session_id'))->applications()->feepaid()->get();
        
        
        
        // return view('admin.students.import', compact('section', 'confirmed_applications'));
    }

    public function importStudents(Request $request)
    {

        $request->validate([
            'section_id' => 'required',
            'ids_array' => 'required',
        ]);
        $section_id = $request->section_id;
        $ids = array();
        $ids = $request->ids_array;
        $id_str = '';
        if ($ids) {
            DB::beginTransaction();
            try {
                foreach ($ids as $id) {
                    $application = Application::find($id);
                    Student::create([
                        'name' => $application->name,
                        'phone' => $application->phone,
                        'rollno' => $application->matric_rollno,
                        'group_id' => $application->group_id,
                        'score' => $application->matric_marks,
                        'section_id' => $request->section_id,

                    ]);
                }
                DB::commit();
                return response()->json(['msg' => "Successful"]);
            } catch (Exception $ex) {
                DB::rollBack();
                return response()->json(['msg' => $ex->getMessage()]);
            }
        }
    }
}
