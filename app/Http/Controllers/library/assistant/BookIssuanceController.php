<?php

namespace App\Http\Controllers\library\assistant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\BookIssuance;
use App\Models\BookReturnPolicy;
use App\Models\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class BookIssuanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function scan()
    {
        //
        return view('assistant.book-issuance.scan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function postScan(Request $request)
    {
        $request->validate([
            'book_ref' => 'required',
            'student_ref' => 'required',
        ]);

        session([
            'book_ref' => $request->book_ref,
            'student_ref' => $request->student_ref,
        ]);
        return redirect()->route('library.assistant.book-issuance.confirm');
    }

    public function confirm()
    {
        //
        $book = '';
        $copy_no = '';
        $warning_message = '';
        // if request contains book_ref and student reference sent 
        if (session('book_ref') && session('student_ref')) {
            $book_ref_parts = explode('-', session('book_ref'));

            $rack_no = $book_ref_parts[0];
            $book_id = (int)$book_ref_parts[1];
            $copy_no = $book_ref_parts[2];

            $book = Book::find($book_id);

            if ($book) {
                //check forgery in each fragment of book ref
                if ($rack_no != $book->rack->label || $copy_no < 1 || $copy_no > $book->num_of_copies)
                    $warning_message = "Boof reference seems to be forged!";
                elseif (BookIssuance::where('book_id', $book->id)->where('copy_no', $copy_no)->whereNull('return_date')->exists()) {
                    //double availability
                    $warning_message = "Requested book has already been issued!";
                } else {
                    //book can be issued
                    $student = Student::where('cnic', session('student_ref'))->first();
                    if ($student) {
                        // all ok --- now issue
                        return view('assistant.book-issuance.confirm', compact('book', 'copy_no', 'student'));
                    } else {
                        $warning_message = "Stdudent reference - invalid";
                    }
                }
            } else {
                $warning_message = "Book reference - invalid";
            }
        } else {
            $warning_message = "Book reference or student reference missing";
        }
        // if there exists warning
        return view('assistant.book-issuance.warning', compact('warning_message'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postConfirm(Request $request)
    {
        //
        $request->validate([
            'book_id' => 'required',
            'copy_no' => 'required',
            'reader_id' => 'required',
        ]);
        // policy_days
        $max_days = BookReturnPolicy::first()->max_days;
        $request->merge([
            'due_date' => Carbon::now()->addDays($max_days)->format('Y/m/d'),
        ]);
        try {
            $bookIssuance = BookIssuance::create($request->all());
            return redirect()->route('library.assistant.book-issuance.scan')->with('success', 'Book has been issued successfully ');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }
}
