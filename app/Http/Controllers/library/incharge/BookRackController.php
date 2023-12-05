<?php

namespace App\Http\Controllers\library\incharge;

use App\Http\Controllers\Controller;
use App\Models\BookRack;
use Exception;
use Illuminate\Http\Request;

class BookRackController extends Controller
{

    public function index()
    {
        //
        $bookRacks = BookRack::all();
        return view('modules.library.librarian.book-racks.index', compact('bookRacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('modules.library.librarian.book-racks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'label' => 'required',
        ]);
        try {
            BookRack::create($request->all());
            return redirect()->route('librarian.book-racks.index')->with('success', 'Successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BookRack $BookRack)
    {
        //
        return view('modules.library.librarian.book-racks.show', compact('BookRack'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $bookRack = BookRack::find($id);
        return view('modules.library.librarian.book-racks.edit', compact('bookRack'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookRack $BookRack)
    {
        //
        $request->validate([
            'label' => 'required',
        ]);
        try {
            $BookRack->update($request->all());
            return redirect()->route('librarian.book-racks.index')->with('success', 'Successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookRack $BookRack)
    {
        //
        try {
            $BookRack->delete();
            return redirect()->back()->with('success', 'Successfully deleted!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
