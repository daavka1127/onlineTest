<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use DB;

class AnswerController extends Controller
{
    public function show(){
        $answer = DB::table('answer')->get();
        $question = DB::table('question')->get();
        return view('test.Answer', compact('answer','question'));
    }
    public function back(){
        $answer = DB::table('answer')->get();
        $question = DB::table('question')->get();
        return view('test.Answer', compact('answer','question'));
    }
    public function NewAnswer(){
        return view('test.AnswerNew');
    }
    protected function create(Request $req)
    {
        $question = new Question ;
        $question ->lession_id = $req->lession_id;
        $question ->question = $req->question;
        $question ->save();   
        $i=0;
        foreach ($req->answers as $key) {
            $answer = new Answer;
            $answer->question_id = $question->id;
            $answer ->answer = $key;  
            if($i == $req->rad){
                $answer ->is_true = 1;  
            }
            else{
                $answer ->is_true = 0;  
            }
            $answer ->save();   
            $i++;
        }
    }

    public function getDataTable()
    {
        $question=DB::table('question')->get();
        $answer=DB::table('answer')->get();
        return DataTables::of($question, $answer)
        ->make(true);
    }
}
