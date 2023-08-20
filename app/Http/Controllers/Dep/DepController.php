<?php

namespace App\Http\Controllers\Dep;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Session;
use Illuminate\Http\Request;

class DepController extends Controller
{
    //
    public function index()
    {
        $session = Session::find(session('session_id'));

        return view('dep.index', compact('session'));
    }
}
