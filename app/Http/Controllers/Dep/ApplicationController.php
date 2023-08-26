<?php

namespace App\Http\Controllers\Dep;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Group;
use App\Models\Session;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $session = Session::find(session('session_id'));

        return view('dep.applications.index', compact('session'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $groups = Group::all();
        return view('dep.applications.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->merge([
            'session_id' => session('session_id'),
        ]);

        $request->validate([
            'name' => 'required',
            'matric_rollno' => 'required|numeric|unique:applications',
            'matric_marks' => 'required|numeric',
            'group_id' => 'required|numeric',
            'session_id' => 'required|numeric'
        ]);
        DB::beginTransaction();
        try {
            $application = Application::create($request->all());
            if ($request->is_other_board) {
                $application->update([
                    'objection' => 'NOC required'
                ]);
            }
            if ($request->matric_marks <= 485) {
                $application->update([
                    'objection' => '3rd division'
                ]);
            }
            if ($request->matric_marks < 660 && $request->group_id < 4) {
                $application->update([
                    'objection' => 'Below Criteria'
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Successfully created');
        } catch (Exception $e) {
            DB::rollBack();
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
        $application = Application::find($id);
        $groups = Group::all();
        return view('dep.applications.edit', compact('application', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'matric_rollno' => 'required|numeric',
            'matric_marks' => 'required|numeric',
            'group_id' => 'required|numeric',
        ]);
        DB::beginTransaction();
        try {
            $application = Application::find($id);
            $application->update($request->all());
            if ($request->is_other_board) {
                $application->update([
                    'objection' => 'NOC required'
                ]);
            }
            if (!$request->is_other_board) {
                $application->update([
                    'is_other_board' => 0
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Successfully updated');
        } catch (Exception $e) {
            DB::rollBack();
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
        $model = Application::find($id);
        try {
            $model->delete();
            return redirect()->route('dep.applications.index')->with('success', 'Successfully removed');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
