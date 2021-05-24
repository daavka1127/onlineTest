<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Student;
use DB;

class showTestController extends Controller
{
    public function showTest()
    {
        if (Session::has('user')) {
            $this->createQuestions();
            $questions = [];
            $questions = Session::get('questions');
            // return $questions;
            // return Session::get('user');
            return view('testDadaa', compact('questions'));
        } else {
            return view('layouts.layout_user_login');
        }
    }

    public function login_user(Request $req)
    {
        try {
            $student = new Student;
            $student->unit = $req->unit;
            $student->rank = $req->rank;
            $student->RD = $req->RD;
            $student->first_name = $req->firstName;
            $student->last_name = $req->lastName;
            $student->save();
            Session::put('user', $student->id);
            return redirect('/');
        } catch (\Throwable $th) {
            return "Алдаа гарлаа";
        }
    }

    public function createQuestions()
    {
        $questions = DB::table('question')->get();

        // return $questions;
        $arrQuestions = [];
        $rowCount = 1;
        foreach ($questions as $question) {
            $datarow = [];
            $datarow['number'] = $rowCount;
            $datarow['id'] = $question->id;
            $datarow['lesson_id'] = $question->lesson_id;
            $datarow['question'] = $question->question;

            $answers = $this->getAnswersByID($question->id);
            $ansTable = [];
            foreach ($answers as $answer) {
                $ansRow = [];
                $ansRow['id'] = $answer->id;
                $ansRow['answer'] = $answer->answer;
                $ansRow['is_true'] = $answer->is_true;
                array_push($ansTable, $ansRow);
            }
            $datarow['answers'] = $ansTable;

            array_push($arrQuestions, $datarow);
            $rowCount++;
        }
        Session::put('questions', $arrQuestions);
        // return $arrQuestions;
    }

    public function getAnswersByID($qid)
    {
        $answers = DB::table('answer')
            ->where('question_id', '=', $qid)
            ->get();
        return $answers;
    }
}
