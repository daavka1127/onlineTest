<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTable\Facades\DataTables;


class RandomQuestions extends Controller
{
    //
    public function getRandomQuestions($testID, $rank, $rand)
    {

        $arrQuestions = [];
        $rowCount = 1;
        if ($rank == '1') {
            $lessons = DB::table('lesson')->where("test_id", "=", $testID)->where(function ($query) {
                $query->where('rank', '1')->orwhere('rank', '2');
            })->get();
        } else {
            $lessons = DB::table('lesson')->where("test_id", "=", $testID)->where(function ($query) {
                $query->where('rank', '0')->orwhere('rank', '2');
            })->get();
        }


        foreach ($lessons as $lesson) {
            // return $lesson->id . "    " . $lesson->question_count;
            if ($rand == '0')
                $questions = DB::table('question')->where("lesson_id", "=", $lesson->id)->inRandomOrder()->limit($lesson->question_count)->get();
            else
                $questions = DB::table('question')->where("lesson_id", "=", $lesson->id)->get();

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
        return $arrQuestions;
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
        $ques = $this->getRandomQuestions($testID, $rank, '1');
        return view('testShow', compact('ques'));
    }
    public function getPrintRandomQuestions($testID, $rank)
    {
        $ques = $this->getRandomQuestions($testID, $rank, '0');
        // dd($ques);
        return view('testShow', compact('ques'));
    }
}
