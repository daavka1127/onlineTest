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
        $data = DB::table('answer')->get();
        $data = DB::table('question')->get();
        return view('test.Answer', compact('data'));
    }
    public function back(){
        $data = DB::table('answer')->get();
        $data = DB::table('question')->get();
        return view('test.Answer', compact('data'));
    }
    public function NewAnswer(){
        return view('test.AnswerNew');
    }
    protected function create(Request $req)
    {
        $data = new Question ;
        $data ->test_id = $req->test_id;
        $data ->question = $req->question;
        $data ->save();   
        DB::table('question')->get();
       
        $data = new Answer;
        $data ->answer = $req->answer;  
        $data ->is_true = $req->is_true;  
        $data ->save();   
        DB::table('answer')->get();   
    }
      public function getDataTable()
    {
        $question=DB::table('question')->get();
        $answer=DB::table('answer')->get();
        return DataTables::of($question, $answer)
        ->make(true);
    }
}
