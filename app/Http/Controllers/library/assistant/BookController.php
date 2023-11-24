<?php

namespace App\Http\Controllers\library\assistant;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookDomain;
use App\Models\BookRack;
use App\Models\Language;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('modules.library.assistant.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $languages = Language::all();
        $book_domains = BookDomain::all();
        $book_racks = BookRack::all();
        return view('modules.library.assistant.books.create', compact('languages', 'book_domains', 'book_racks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publish_year' => 'required',
            'language_id' => 'required',
            'num_of_copies' => 'required',
            'price' => 'required|min:0',
            'book_domain_id' => 'required',
            'book_rack_id' => 'required',
            'language_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $book = Book::create($request->all());
            $book->reference_no = $book->reference();
            $book->update();
            Db::commit();
            return redirect()->back()->with('success', 'Successfully added');
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
        $book = Book::find($id);
        return view('modules.library.assistant.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $book = Book::find($id);
        $languages = Language::all();
        $book_domains = BookDomain::all();
        $book_racks = BookRack::all();
        return view('modules.library.assistant.books.edit', compact('book', 'languages', 'book_domains', 'book_racks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publish_year' => 'required',
            'language_id' => 'required',
            'num_of_copies' => 'required',
            'price' => 'required|min:0',
            'book_domain_id' => 'required',
            'book_rack_id' => 'required',
            'language_id' => 'required',
        ]);
        try {
            $book = Book::find($id);
            $book->update($request->all());
            return redirect()->back()->with('success', 'Successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     */
}
