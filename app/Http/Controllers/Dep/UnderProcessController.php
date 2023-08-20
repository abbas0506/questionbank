<?php

namespace App\Http\Controllers\dep;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;

class UnderProcessController extends Controller
{
    //
    public function index()
    {
        $session = Session::find(session('session_id'));
        return view('dep.underprocess.index', compact('session'));
    }
}
