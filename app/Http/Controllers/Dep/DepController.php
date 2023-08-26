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

        // dataset1
        $groups = collect();
        $groupWiseCount = collect();

        $group_wise_count = Application::selectRaw('group_id, count(*) as count')
            ->groupBy('group_id');


        $dataset1 = Group::joinSub($group_wise_count, 'sub', function ($join) {
            $join->on('groups.id', '=', 'sub.group_id');
        })->select('short', 'count')->get();

        foreach ($dataset1 as $data) {
            $groups->add($data->short);
            $groupWiseCount->add($data->count);
        }

        // dataset 2
        $days = collect();
        $dayWiseCount = collect();
        $feeWiseCount = collect();
        $objectionWiseCount = collect();

        $dataset2 = Application::selectRaw('concat(day(created_at)," ", substring(monthname(created_at),1,3)) as day, count(*) as count, sum(fee) as fee')
            ->where('created_at', '>=', Carbon::today()->subDays(7))
            ->groupBy('day')
            ->get();

        $dataset2a = Application::selectRaw('day(created_at) as day, count(*) as count')
            ->where('created_at', '>=', Carbon::today()->subDays(7))
            ->whereNotNull('objection')
            ->groupBy('day')
            ->get();

        foreach ($dataset2 as $data) {
            $days->add($data->day);
            $dayWiseCount->add($data->count);
            $feeWiseCount->add($data->fee);
        }
        foreach ($dataset2a as $data) {
            $objectionWiseCount->add($data->count);
        }

        // dataset 3
        $percentLabels = collect();
        $percentWiseCount = collect();

        $marks_percentage = Application::selectRaw("round(matric_marks/11,0) as percentage")->get();

        for ($i = 45; $i < 100; $i += 5) {
            $percentLabels->add($i . "-" . $i + 4);
            $percentWiseCount->add($marks_percentage->whereBetween('percentage', [$i, $i + 4])->count());
        }

        $session = Session::find(session('session_id'));
        return view('dep.index', compact('session', 'groups', 'groupWiseCount', 'days', 'dayWiseCount', 'feeWiseCount', 'objectionWiseCount', 'percentLabels', 'percentWiseCount'));
    }
}
