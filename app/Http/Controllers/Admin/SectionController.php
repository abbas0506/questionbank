<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Clas;
use Exception;
use Illuminate\Http\Request;

class SectionController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'clas_id' => 'required|numeric',
        ]);

        try {

            $letters = config('global.letters');
            $clas = Clas::find($request->clas_id);

            // if section exists, assign next letter
            if ($clas->sections->count() > 0) {
                $last = $clas->sections->last()->name;
                $index = array_search($last, $letters);
                Section::create([
                    'name' => $letters[$index + 1],
                    'clas_id' => $request->clas_id,
                ]);
            } else {
                //else start naming from A
                Section::create([
                    'name' => $letters[0],
                    'clas_id' => $request->clas_id,
                ]);
            }

            return redirect()->route('admin.classes.index')->with('success', 'Successfully created');
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
        $section = Section::find($id);
        return view('admin.sections.show', compact('section'));
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
    public function print($id)
    {
        $section = Section::find($id);
    }
}
