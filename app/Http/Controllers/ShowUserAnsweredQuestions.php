<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $answeredlaw = explode(";", $answeredlaw);
        }

        $generalAns = DB::table('user_answer')
            ->where("user_id", "=", $req->userID)
            ->where("test_id", "=", "2")->first();
        if ($generalAns != null) {
            $answeredgen = $generalAns->question_id;
            $answeredgen = explode(";", $answeredgen);
        }
        $answered['law'] = $answeredlaw;
        $answered['general'] = $answeredgen;

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
