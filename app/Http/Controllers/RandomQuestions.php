<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AnswerController;
use Yajra\DataTable\Facades\DataTables;

class RandomQuestions extends Controller
{
    //
    public function getRandomQuestions($testID, $rank)
    {

        // $questions = DB::table('question')->where("lesson_id", "=", 1)->inRandomOrder()->limit(2)->get();
        // return $questions;

        $arrQuestions = [];
        $rowCount = 1;
        if ($testID == '1')
            $lessons = DB::table('lesson')->where("test_id", "=", $testID)->get();
        else {
            // if ($rank == '0')
            $lessons = DB::table('lesson')->where("test_id", "=", $testID)->where('rank', '=', '2')->orwhere('rank', '=', $rank)->get();
        }
        // else
        //     $lessons = DB::table('lesson')->where("test_id", "=", $testID)->where('rank', '=', '1')->orwhere('rank', '=', '2')->get();


        foreach ($lessons as $lesson) {
            // return $lesson->id . "    " . $lesson->question_count;
            $questions = DB::table('question')->where("lesson_id", "=", $lesson->id)->inRandomOrder()->limit($lesson->question_count)->get();
            foreach ($questions as $question) {
                $datarow = [];
                $datarow['number'] = $rowCount;
                $datarow['id'] = $question->id;
                $datarow['lesson_id'] = $question->lesson_id;
                $datarow['question'] = $question->question;

                $answers = $this->getAnswersByID($question->id);

                $ansTable = [];
                foreach ($answers as $answer) {
                    $ansRow = [];
                    $ansRow['id'] = $answer->id;
                    $ansRow['answer'] = $answer->answer;
                    $ansRow['is_true'] = $answer->is_true;
                    array_push($ansTable, $ansRow);
                }
                $datarow['answers'] = $ansTable;

                array_push($arrQuestions, $datarow);
                $rowCount++;
            }
        }
        Session::put('questions', $arrQuestions);
        // return $arrQuestions;
    }
    public function getAnswersByID($qid)
    {
        $answers = DB::table('answer')
            ->where('question_id', '=', $qid)
            ->inRandomOrder()
            ->get();
        return $answers;
    }

    public function getPrintQuestions($testID, $rank)
    {
        $ques = $this->getRandomQuestions($testID, $rank);
        return view('testShow', compact('ques'));
    }
}
