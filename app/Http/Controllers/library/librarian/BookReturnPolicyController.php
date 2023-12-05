<?php

namespace App\Http\Controllers\library\librarian;

use App\Http\Controllers\Controller;

use App\Models\BookReturnPolicy;
use Exception;
use Illuminate\Http\Request;

class BookReturnPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bookReturnPolicy = BookReturnPolicy::first();
        return view('modules.library.librarian.return-policy.index', compact('bookReturnPolicy'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(BookReturnPolicy $bookReturnPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookReturnPolicy $bookReturnPolicy)
    {
        //
        // $book_return_policy = BookReturnPolicy::first();
        return view('modules.library.librarian.return-policy.edit', compact('bookReturnPolicy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookReturnPolicy $bookReturnPolicy)
    {
        //
        $request->validate([
            'max_days' => 'required|numeric|min:0',
            'fine_per_day' => 'required|numeric|min:0',
        ]);
        try {
            $bookReturnPolicy->update($request->all());
            return redirect()->back()->with('success', 'Successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookReturnPolicy $bookReturnPolicy)
    {
        //
    }
}
