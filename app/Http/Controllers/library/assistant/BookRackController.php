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

    }
    /**
     * Display a listing of the resource.
     */

    public function show(string $id)
    {
        //
        $book_rack = BookRack::find($id);
        return view('assistant.book_racks.show', compact('book_rack'));
    }
}
