<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;
use Yajra\DataTable\Facades\DataTables;

class AnswerController extends Controller
{

    public function show()
    {
        $answer = DB::table('answer')->get();
        $question = DB::table('question')->get();
        $lesson = DB::table('lesson')->get();
        return view('test.Answer', compact('answer', 'question', 'lesson'));
    }
    public function back()
    {
        $answer = DB::table('answer')->get();
        $question = DB::table('question')->get();
        $lesson = DB::table('lesson')->get();
        return view('test.Answer', compact('answer', 'question', 'lesson'));
    }
    public function NewAnswer()
    {
        $lesson = DB::table('lesson')->get();
        return view('test.AnswerNew', compact('lesson'));
    }
    protected function create(Request $req)
    {
        // $lessons = new Lesson;
        // $lessons ->lessonName;
        // $lessons ->save();

        $question = new Question;
        $question->lesson_id = $req->lessonName;
        $question->question = $req->question;
        $question->save();
        $i = 0;



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
        $lessons = DB::table('lesson')->get();
        $question = DB::table('question')->get();
        $answer = DB::table('answer')->get();
        return DataTables::of($question, $answer, $lessons)
            ->make(true);
    }
}
