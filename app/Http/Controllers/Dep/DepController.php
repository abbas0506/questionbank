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

        // $collection = Application::all()->groupBy(function ($data) {
        //     return \Carbon\Carbon::parse($data->created_at)->format('d-M-y');
        // })->sortBy('created_at');

        $collection = Application::selectRaw('day(created_at) as day, count(*) as count, sum(fee) as fee')
            ->groupBy('day')
            ->get();


        $labels = collect();
        $apps = collect();
        $medical = collect();
        $engg = collect();
        $ics = collect();
        $arts = collect();
        $fee = collect();

        foreach ($collection as $detail) {
            $labels->add($detail->day);
            $apps->add($detail->count);
            $fee->add($detail->fee);
        }

        $session = Session::find(session('session_id'));
        return view('dep.index', compact('session', 'labels', 'apps', 'fee'));
    }
}
