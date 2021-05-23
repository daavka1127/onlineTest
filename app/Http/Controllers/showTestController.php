<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Student;
use App\Models\Answer;
use DB;

class showTestController extends Controller
{
    public function showTest(){
        if (Session::has('user'))
        {
            $questions = [];
            if (Session::has('questions')){
                $questions = Session::get('questions');
            }
            else{
                $this->createQuestions();
                $questions = Session::get('questions');
            }
            // return Session::get('user');
            $firstName = Session::get("lastName");

            return view('takeTest.takeTest', compact('questions', 'firstName'));
        }else{
            return view('layouts.layout_user_login');
        }
    }

    public function login_user(Request $req){
        try {
            $student = new Student;
            $student->unit = $req->unit;
            $student->rank = $req->rank;
            $student->RD = $req->RD;
            $student->first_name = $req->firstName;
            $student->last_name = $req->lastName;
            $student->save();
            Session::put('user', $student->id);
            Session::put('lastName', $student->last_name);
            Session::put('testID', '1');
            return redirect('/');
        } catch (\Throwable $th) {
            return "Алдаа гарлаа";
        }
    }

    public function createQuestions($testID){
        $questions = DB::table('question')->get();
        // return $questions;
        $arrQuestions = [];
        $rowCount = 1;
        foreach($questions as $question){
            $datarow = [];
            $datarow['number'] = $rowCount;
            $datarow['id'] = $question->id;
            $datarow['lesson_id'] = $question->lesson_id;
            $datarow['question'] = $question->question;

            $answers = $this->getAnswersByID($question->id);
            $ansTable = [];
            foreach($answers as $answer){
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
        Session::put('questions', $arrQuestions);
        // return $arrQuestions;
    }

    public function getAnswersByID($qid){
        $answers = DB::table('answer')
            ->where('question_id', '=', $qid)
            ->get();
        return $answers;
    }

    public function finishTest(Request $req){
        $questions = Session::get('questions');
        $testID = Session::get("testID");
        if($testID == 1){
            Session::put('testID', '2');
        }
        else{
            Session::flush();
        }
        $point = 0;
        foreach ($req->userAns as $key => $value) {
            $answerPoint = $this->answerPoint($value["ansID"]);
            $point = $point + $answerPoint;
        }
        return "Та " . count($questions) . " ширхэг асуултнаас " . $point . " оноо авлаа.";
    }

    public function answerPoint($ansID){
        $answer = Answer::find($ansID);
        if($answer == null){
            return 0;
        }
        else{
            return $answer->is_true;
        }
    }

    public function getTestCount(){
        $tests = DB::table("test")->get();
        return count($tests);
    }
}
