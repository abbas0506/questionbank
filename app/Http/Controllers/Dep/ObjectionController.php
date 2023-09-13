<?php

namespace App\Http\Controllers\dep;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Session;
use Exception;
use Illuminate\Http\Request;

class ObjectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $session = Session::find(session('session_id'));
        return view('dep.objections.index', compact('session'));
    }

    /**
     * Display the specified resource.
     */
    public function create()
    {
        $session = Session::find(session('session_id'));
        return view('dep.objections.create', compact('session'));
    }

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
        return view('dep.objections.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'objection' => 'required',
        ]);

        $model = Application::find($id);
        try {
            $model->update($request->all());
            return redirect()->route('dep.applications.index')->with('success', 'Successfully updated');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
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
            $model->update([
                'objection' => null,
            ]);
            return redirect()->route('dep.applications.index')->with('success', 'Successfully removed: objection');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
