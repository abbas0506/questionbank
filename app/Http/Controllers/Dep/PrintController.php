<?php

namespace App\Http\Controllers\dep;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    //
    public function index()
    {
        $session = Session::find(session('session_id'));
        return view('dep.print.index', compact('session'));
    }
}
