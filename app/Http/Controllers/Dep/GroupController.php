<?php

namespace App\Http\Controllers\dep;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Session;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class GroupController extends Controller
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $session = Session::find(session('session_id'));
        $group = Group::find($id);
        return view('dep.groups.show', compact('session', 'group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function print(string $id)
    {
        //
        $group = Group::find($id);
        $pdf = PDF::loadView('dep.groups.print', compact('group'))->setPaper('a4', 'portrait');
        $pdf->set_option("isPhpEnabled", true);

        $file = "group " . $group->name . ".pdf";
        return $pdf->stream($file);
    }
}
