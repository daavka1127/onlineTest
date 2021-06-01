<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;

class ShowUserAnsweredQuestions extends Controller
{
    //
    public function showUsers()
    {
        $users = DB::table('user')
            ->join('user_answer', 'user_answer.user_id', '=', 'user.id')
            ->select('user.*', 'user_answer.question_id', 'user_answer.answer_id')->get();

        //$user = Student::find()

        return view('showUserAnswer', compact('users'));
    }
    public function getUserAnswers(Request $req)
    {

        $answeredlaw = null;
        $answeredgen = null;
        $lawAns = DB::table('user_answer')
            ->where("user_id", "=", $req->userID)
            ->where("test_id", "=", "1")->first();
        if ($lawAns != null) {
            $answeredlaw = $lawAns->question_id;
            $answeredlawans = $lawAns->answer_id;
            $answeredlaw = explode(";", $answeredlaw);
            $answeredlawans = explode(";", $answeredlawans);
        }

        $generalAns = DB::table('user_answer')
            ->where("user_id", "=", $req->userID)
            ->where("test_id", "=", "2")->first();
        if ($generalAns != null) {
            $answeredgen = $generalAns->question_id;
            $answeredgen = explode(";", $answeredgen);
            $answeredgenans = $generalAns->answer_id;
            $answeredgenans = explode(";", $answeredgenans);
        }

        $queswithanslaw = [];
        for ($i = 0; $i < count($answeredlaw); $i++) {
            $ques = [];
            $ques["id"] = $answeredlaw[$i];
            $q = DB::table("question")->select('question')->where("id", "=", $answeredlaw[$i])->first();
            if ($q != null)
                $ques["ques"] = DB::table("question")->select('question')->where("id", "=", $answeredlaw[$i])->first();
            $ques["hariulsan"] = $answeredlawans[$i];

            $anss = DB::table('answer')->where('question_id', '=', $answeredlaw[$i])->get();
            // return count($anss);
            $row = [];
            foreach ($anss as $ans) {
                $data = [];
                $data["id"] = $ans->id;
                $data["answer"] = $ans->answer;
                $data["istrue"] = $ans->is_true;
                array_push($row, $data);
            }
            $ques["ans"] = $row;
            array_push($queswithanslaw, $ques);
        }
        $queswithansgeneral = [];
        for ($i = 0; $i < count($answeredgen); $i++) {
            $ques = [];
            $ques["id"] = $answeredgen[$i];
            $q = DB::table("question")->select('question')->where("id", "=", $answeredgen[$i])->first();
            if ($q != null)
                $ques["ques"] = DB::table("question")->select('question')->where("id", "=", $answeredgen[$i])->first();
            $ques["hariulsan"] = $answeredgenans[$i];

            $anss = DB::table('answer')->where('question_id', '=', $answeredgen[$i])->get();
            // return count($anss);
            $row = [];
            foreach ($anss as $ans) {
                $data = [];
                $data["id"] = $ans->id;
                $data["answer"] = $ans->answer;
                $data["istrue"] = $ans->is_true;
                array_push($row, $data);
            }
            $ques["ans"] = $row;
            array_push($queswithansgeneral, $ques);
        }
        // return $queswithans;

        $answered['law'] = $queswithanslaw;
        $answered['general'] = $queswithansgeneral;

        return $answered;
    }
    public function getUnits()
    {
        $units = DB::table('tbunit')->get();
        return view('UnitResultShow', compact('units'));
    }
    public function getUnitUserAnswers(Request $req)
    {
        // return $req->unidID;
        $users = DB::table('user')->where('unit', '=', $req->unitID)->get();


        $unitAllAns = [];
        foreach ($users as $user) {
            $unitans = [];
            $unitans['rank'] = $user->rank;
            $unitans['occupation'] = $user->occupation;
            $unitans['rankName'] = $user->rankName;
            $unitans['RD'] = $user->RD;
            $unitans['firstName'] = $user->first_name;
            $unitans['lastName'] = $user->last_name;

            $userres = DB::table('result')
                ->where('user_id', '=', $user->id)->get();

            // return count($userres);
            $usertestans = [];
            foreach ($userres as $res) {
                $testAns = [];
                $testAns['test_id'] = $res->test_id;
                $testAns['result'] = $res->result_point;
                array_push($usertestans, $testAns);
            }
            $unitans['answer'] = $usertestans;
            array_push($unitAllAns, $unitans);
        }

        return $unitAllAns;
    }
}
