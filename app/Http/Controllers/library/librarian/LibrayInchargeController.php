<?php

namespace App\Http\Controllers\library\librarian;

use App\Http\Controllers\Controller;
use App\Models\Assistant;
use App\Models\Book;
use App\Models\BookDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibrayInchargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $assistants = Assistant::all();
        $books = Book::all();
        return view('modules.library.librarian.index', compact('user', 'assistants', 'books'));
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
