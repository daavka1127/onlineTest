<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Student;

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
        $lawAns = DB::table('user_answer')
            ->where("user_id", "=", $req->userID)
            ->where("test_id", "=", "1")->first();
        if ($lawAns != null) {
            $answered = $lawAns->question_id;
            $answered = explode(";", $answered);
            // return $answered;
        }

        $generalAns = DB::table('user_answer')
            ->where("user_id", "=", $req->userID)
            ->where("test_id", "=", "2")->first();
        if ($generalAns != null) {
            $answered = $generalAns->question_id;
            $answered = explode(";", $answered);
            return $answered;
        }

        // return $req->userID;
    }
}
