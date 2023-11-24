<?php

namespace App\Http\Controllers\library\assistant;

use App\Http\Controllers\Controller;
use App\Models\BookRack;
use Illuminate\Http\Request;

class BookRackController extends Controller
{

    public function index()
    {
        //
        $book_racks = BookRack::all();
        return view('modules.library.assistant.book_racks.index', compact('book_racks'));
    }
    /**
     * Display a listing of the resource.
     */

    public function show(string $id)
    {
        //
        $book_rack = BookRack::find($id);
        return view('modules.library.assistant.book_racks.show', compact('book_rack'));
    }
}
