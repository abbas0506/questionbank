<?php

namespace App\Http\Controllers\Dep;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Session;
use Exception;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $session = Session::find(session('session_id'));
        return view('dep.fee.index', compact('session'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $session = Session::find(session('session_id'));
        return view('dep.fee.create', compact('session'));
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
        $application = Application::find($id);
        return view('dep.fee.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'fee' => 'required|numeric|min:0',
        ]);

        $model = Application::find($id);
        try {
            $model->update($request->all());
            return redirect()->route('dep.fee.index')->with('success', 'Successfully updated');
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
                'fee' => null,
            ]);
            return redirect()->route('dep.fee.index')->with('success', 'Successfully removed');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
