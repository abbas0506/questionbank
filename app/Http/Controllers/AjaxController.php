<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function fetchChapters(Request $request)
    {

        $request->validate([
            'grade_id' => 'required',
            'subject_id' => 'required',
        ]);

        session([
            'grade_id' => $request->grade_id,
            'subject_id' => $request->subject_id,
        ]);
        $chapters = Chapter::where('grade_id', $request->grade_id)
            ->where('subject_id', $request->subject_id)
            ->get();

        $tr = "";
        foreach ($chapters->sortBy('chapter_no') as $chapter) {
            $tr .= "<tr>" .
                "<td>" . $chapter->chapter_no . "</td>" .
                "<td class='text-left'> <a href='/teacher/chapters/$chapter->id' class='link'>" . $chapter->name . "</a></td>" .
                "</tr>";
        }

        return response()->json([
            'tr' => $tr,
        ]);
    }
}
