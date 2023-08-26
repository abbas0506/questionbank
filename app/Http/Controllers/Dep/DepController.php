<?php

namespace App\Http\Controllers\Dep;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Group;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PHPUnit\Metadata\Api\Groups;

class DepController extends Controller
{
    //
    public function index()
    {

        // $collection = Application::all()->groupBy(function ($data) {
        //     return \Carbon\Carbon::parse($data->created_at)->format('d-M-y');
        // })->sortBy('created_at');




        $group_wise_count = Application::selectRaw('group_id, count(*) as count')
            ->groupBy('group_id');


        $dataset1 = Group::joinSub($group_wise_count, 'sub', function ($join) {
            $join->on('groups.id', '=', 'sub.group_id');
        })->select('short', 'count')->get();


        $dataset2 = Application::selectRaw('day(created_at) as day, count(*) as count')
            ->where('created_at', '>=', Carbon::today()->subDays(7))
            ->groupBy('day')
            ->get();

        // ->selectRaw('groups.id, groups.name as name, count(*) as count')
        // ->groupBy('groups.id')
        // ->get();

        // $collection = Application::join('groups', 'applications.group_id', '=', 'groups.id')
        //     ->selectRaw('groups.id, groups.name as name, count(*) as count')
        //     ->groupBy('groups.id')
        //     ->get();

        // echo $date;
        $groups = collect();
        $groupWiseAppCount = collect();
        $days = collect();
        $dayWiseAppCount = collect();

        foreach ($dataset1 as $data) {
            $groups->add($data->short);
            $groupWiseAppCount->add($data->count);
        }
        foreach ($dataset2 as $data) {
            $days->add($data->day);
            $dayWiseAppCount->add($data->count);
        }

        $session = Session::find(session('session_id'));
        return view('dep.index', compact('session', 'groups', 'groupWiseAppCount', 'days', 'dayWiseAppCount'));
    }
}
