<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Student;
use App\Models\Answer;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RandomQuestions;
use App\Models\UserAnswer;
use App\Models\Result;

class showTestController extends Controller
{

    public function showTest()
    {
        if (Session::has('user')) {
            $questions = [];
            if (Session::has('questions')) {
                $questions = Session::get('questions');
            } else {
                $randQuestion = new RandomQuestions;
                // return Session::get('rank');
                $randQuestion->getRandomQuestions(Session::get('testID'), Session::get('rank'));
                $questions = Session::get('questions');
            }
            // return Session::get('user');

            $firstName = Session::get("lastName");
            $testName = $this->getTestName(Session::get('testID'));
            $testTime = $this->getTestTime(Session::get('testID'));

            return view('takeTest.takeTest', compact('questions', 'firstName', 'testName', 'testTime'));
        } else {
            $units = DB::table('tbunit')
                ->where('memo', '=', 1)
                ->get();
            return view('layouts.layout_user_login', compact('units'));
        }
    }

    public function login_user(Request $req)
    {
        // dd($req->rankName);
        // return "A";
        try {
            $count = $this->checkUserHas($req->RD);
            if ($count > 0) {
                $array = array(
                    'status' => 'loginError',
                    'msg' => 'Та нэвтэрсэн байна. Шалгалчид хангана уу!!!'
                );
                return $array;
            }
            $student = new Student;
            $student->unit = $req->unit;
            $student->rank = $req->rank;
            $student->rankName = $req->rankName;
            $student->occupation = $req->occupation;
            $student->RD = $req->RD;
            $student->first_name = $req->firstName;
            $student->last_name = $req->lastName;
            $student->save();
            Session::put('user', $student->id);
            Session::put('lastName', $student->last_name);
            Session::put('testID', '1');
            Session::put('rank', $req->rank);
            $array = array(
                'status' => 'success',
                'msg' => 'ok!!!'
            );
            return $array;
        } catch (\Throwable $th) {
            $array = array(
                'status' => 'error',
                'msg' => 'Алдаа гарлаа!!!'
            );
            return $array;
        }
    }

    public function finishTest(Request $req)
    {
        // return Session::get('user');
        $questions = Session::get('questions');
        $testID = Session::get("testID");

        $point = 0;

        //saveUserAns(Session::get('user'), $req->userAns);
        $qids = "";
        $anss = "";
        $cond = true;

        if ($req->userAns == null) {
            $userans = new UserAnswer;
            $userans->user_id = Session::get('user');
            $userans->test_id = Session::get('testID');
            $userans->question_id = "";
            $userans->answer_id = "";
            $userans->save();
            $result = new Result;
            $result->user_id = Session::get('user');
            $result->test_id = Session::get('testID');
            $result->result_point = 0;
            $result->save();
            if ($testID == 1) {
                Session::forget('questions');
                Session::put('testID', '2');
            } else {
                Session::flush();
                $testID = 3;
            }
            $array = array(
                'status' => 'success',
                'msg' => "Та " . count($questions) . " ширхэг асуултнаас 0 оноо авлаа.",
                'testID' => $testID
            );
            return $array;
        }

        foreach ($req->userAns as $key => $value) {
            $answerPoint = $this->answerPoint($value["ansID"]);
            $point = $point + $answerPoint;
            if ($cond != true) {
                $qids .= ";" . $value["qid"];
                $anss .= ";" . $value["ansID"];
            } else {
                $qids .= $value["qid"];
                $anss .= $value["ansID"];
            }
            $cond = false;
        }

        $userans = new UserAnswer;
        $userans->user_id = Session::get('user');
        $userans->test_id = Session::get('testID');
        $userans->question_id = $qids;
        $userans->answer_id = $anss;
        $userans->save();

        $result = new Result;
        $result->user_id = Session::get('user');
        $result->test_id = Session::get('testID');
        $result->result_point = $point;
        $result->save();

        $array = array(
            'status' => 'success',
            'msg' => "Та " . count($questions) . " ширхэг асуултнаас " . $point . " оноо авлаа.",
            'testID' => $testID
        );

        if ($testID == 1) {
            Session::forget('questions');
            Session::put('testID', '2');
        } else {
            Session::flush();
            $testID = 3;
        }

        return $array;
    }

    public function answerPoint($ansID)
    {
        $answer = Answer::find($ansID);
        if ($answer == null) {
            return 0;
        } else {
            return $answer->is_true;
        }
    }

    public function getTestCount()
    {
        $tests = DB::table("test")->get();
        return count($tests);
    }

    public function getTestName($testID)
    {
        $test = Test::find($testID);
        return $test->test_name;
    }

    public function getTestTime($testID)
    {
        $test = Test::find($testID);
        return $test->time;
    }

    public function checkUserHas($rd)
    {
        $users = DB::table('user')
            ->where('RD', '=', $rd)
            ->get();
        return count($users);
    }
}
