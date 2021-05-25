<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use DB;

class AnswerController extends Controller
{
<<<<<<< HEAD
    public function show(){
        $answer = DB::table('answer')->get();
        $question = DB::table('question')->get();
        return view('test.Answer', compact('answer','question'));
    }
    public function back(){
        $answer = DB::table('answer')->get();
        $question = DB::table('question')->get();
        return view('test.Answer', compact('answer','question'));
=======
    public function show()
    {
        $data = DB::table('answer')->get();
        $data = DB::table('question')->get();
        return view('test.Answer', compact('data'));
    }
    public function back()
    {
        $data = DB::table('answer')->get();
        $data = DB::table('question')->get();
        return view('test.Answer', compact('data'));
>>>>>>> 0de2ff30ed8f35d480f5d51d92f620e45dc2d054
    }
    public function NewAnswer()
    {
        $lessons = DB::table('lesson')->get();
        return view('test.AnswerNew', compact('lessons'));
    }
    protected function create(Request $req)
    {
<<<<<<< HEAD
        $question = new Question ;
        $question ->lession_id = $req->lession_id;
        $question ->question = $req->question;
        $question ->save();   
        $i=0;
=======
        $question = new Question;
        $question->lesson_id = $req->testID;
        $question->question = $req->question;
        $question->save();
        $i = 0;
>>>>>>> 0de2ff30ed8f35d480f5d51d92f620e45dc2d054
        foreach ($req->answers as $key) {
            $answer = new Answer;
            $answer->question_id = $question->id;
            $answer->answer = $key;
            if ($i == $req->rad) {
                $answer->is_true = 1;
            } else {
                $answer->is_true = 0;
            }
            $answer->save();
            $i++;
        }
    }

    public function getDataTable()
    {
        $question = DB::table('question')->get();
        $answer = DB::table('answer')->get();
        return DataTables::of($question, $answer)
            ->make(true);
    }
}
