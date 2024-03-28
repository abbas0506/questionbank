<?php

namespace App\Http\Controllers\Demo\QuestionPaper;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Question;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\TestQuestionPart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rmunate\Utilities\SpellNumber;

class PaperQuestionController extends Controller
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


    public function add($testId, string $questionType)
    {
        //

        if (session('chapterIdArray')) {
            $test = Test::find($testId);
            $chapters = Chapter::whereIn('id', session('chapterIdArray'))->get();
            return view('services.paper-questions.add', compact('test', 'chapters', 'questionType'));
        } else {
            echo "Chapters not selected!";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate request parameters
        $request->validate([
            'test_id' => 'required|numeric',
            'question_type' => 'required',
            'necessary_parts' => 'required|numeric',

            'chapter_id_array' => 'required',
            'num_of_parts_array' => 'required',
        ]);

        DB::beginTransaction();
        try {
            //create test question instance
            $testQuestion = TestQuestion::create([
                'test_id' => $request->test_id,
                'question_no' => $request->question_no,
                'question_type' => $request->question_type,
                'necessary_parts' => $request->necessary_parts,
            ]);
            //randomly select question parts from each chapter and save them
            $chaperIds = array();
            $numOfParts = array();
            $chaperIds = $request->chapter_id_array;
            $numOfParts = $request->num_of_parts_array;
            $chapters = Chapter::whereIn('id', $chaperIds)->get();

            $i = 0;     //for iterating numOfparts


            foreach ($chapters as $chapter) {
                $questions = Question::where('question_type', $request->question_type)
                    ->where('chapter_id', $chapter->id)
                    ->where('bise_frequency', '>', 1)
                    ->get()
                    ->random($numOfParts[$i++]);
                foreach ($questions as $question) {
                    TestQuestionPart::create([
                        'test_question_id' => $testQuestion->id,
                        'question_id' => $question->id,
                        'marks' => $question->marks,
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('papers.show', $request->test_id)->with('success', 'Question successfully added!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $model = TestQuestion::findOrFail($id);
        try {
            $model->delete();
            return redirect()->back()->with('success', 'Successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    public function  refresh($testQuestionId)
    {
        //iterate through all question parts
        //replace each by an alternative
        $testQuestion = TestQuestion::findOrFail($testQuestionId);
        DB::beginTransaction();
        try {
            foreach ($testQuestion->parts as $part) {

                $testQuestionPart = TestQuestionPart::find($part->id);
                $alreadyIncludedQuestionIds = $testQuestionPart->testQuestion->test->parts->pluck('question_id');
                $replacingQuestion = Question::where('chapter_id', $testQuestionPart->question->chapter_id)
                    ->where('question_type', $testQuestionPart->testQuestion->question_type)
                    ->whereNotIn('id', $alreadyIncludedQuestionIds)
                    ->get()
                    ->random(1)
                    ->first();


                $testQuestionPart->update([
                    'question_id' => $replacingQuestion->id,
                ]);
            }
            DB::commit();
            return redirect()->back();
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }
}
