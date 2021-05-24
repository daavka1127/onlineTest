<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\UserAnswer;
use Session;

class UserAnswerController extends Controller
{
    public function newUserAnswer(Request $req){
        $userAnswer = new UserAnswer;
        $userAnswer->user_id = $req->user_id;
        $userAnswer->test_id = $req->test_id;
        $userAnswer->question_id = $req->question_id;
        $userAnswer->answer_id = $req->answer_id;
        $userAnswer->save();
    }
}
