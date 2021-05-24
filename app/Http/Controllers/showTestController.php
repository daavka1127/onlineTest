<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Student;
use App\Models\Answer;
use App\Models\Test;
use DB;
use App\Http\Controllers\RandomQuestions;

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
                $randQuestion = new RandomQuestions;
                $randQuestion->getRandomQuestions(Session::get('testID'));
                $questions = Session::get('questions');
            }
            // return Session::get('user');

            $firstName = Session::get("lastName");
            $testName = $this->getTestName(Session::get('testID'));
            $testTime = $this->getTestTime(Session::get('testID'));

            return view('takeTest.takeTest', compact('questions', 'firstName', 'testName', 'testTime'));
        }else{
            return view('layouts.layout_user_login');
        }
    }

    public function login_user(Request $req)
    {
        // return "A";
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

    public function finishTest(Request $req){
        $questions = Session::get('questions');
        $testID = Session::get("testID");
        if($testID == 1){
            Session::forget('questions');
            Session::put('testID', '2');
        }
        else{
            Session::flush();
            $testID = 3;
        }
        $point = 0;
        foreach ($req->userAns as $key => $value) {
            $answerPoint = $this->answerPoint($value["ansID"]);
            $point = $point + $answerPoint;
        }
        $array = array(
            'status' => 'success',
            'msg' => "Та " . count($questions) . " ширхэг асуултнаас " . $point . " оноо авлаа.",
            'testID' => $testID
        );
        return $array;
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

    public function getTestName($testID){
        $test = Test::find($testID);
        return $test->test_name;
    }

    public function getTestTime($testID){
        $test = Test::find($testID);
        return $test->time;
    }
}
