<?php

namespace App\Http\Controllers\dep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnderProcessController extends Controller
{
    //
    public function index()
    {
        // $session = session()::find(session('session_id'));
        return view('dep.underprocess.index', compact('session'));
    }
}
