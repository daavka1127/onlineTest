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
        $questions = $this->getDataTable();
        $questionCols = $this->getQuestionCols();
        return view('test.Answer', compact('answer', 'question', 'lesson', 'questions', 'questionCols'));
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
            if ($key != "") {
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
        return $question->id;
    }

    public function getDataTable()
    {

        $questions = DB::table('question')
            ->join('lesson', 'question.lesson_id', '=', 'lesson.id')
            ->select('question.*', 'lesson.lessonName')
            ->get();
        $arrQuestions = [];


        foreach ($questions as $question) {
            $datarow = [];
            array_push($datarow, $question->id);
            array_push($datarow, $question->lesson_id);
            array_push($datarow, $question->question);
            array_push($datarow, $question->lessonName);
            // $datarow = $question->id;
            // $datarow = $question->lesson_id;
            // $datarow = $question->question;
            // $datarow = $question->lessonName;
            // $answers = $this->getAnswersByQuestionID($question->lesson_id);
            // for ($i=0; $i < $ansCount; $i++) {
            //     $datarow['lessonName']
            // }
            $answers = $this->getAnsCountByQid($question->id);
            $index = 1;

            $ansCount = $this->getAnsCount();

            for ($i = 0; $i < $ansCount; $i++) {
                if ($i >= count($answers))
                    array_push($datarow, "");
                // $datarow = "";
                else
                    array_push($datarow, $answers[$i]->answer);
                // $datarow = $answers[$i]->answer;
            }

            // foreach ($answers as $answer) {
            //     $datarow['hariult' . $index] = $answer->answer;
            //     $index++;
            // }
            array_push($arrQuestions, $datarow);
        }
        // dd($arrQuestions);
        return $arrQuestions;
    }

    public function getQuestionCols()
    {
        $arrCols = [];

        $ansCount = $this->getAnsCount();
        $datarow = [];
        $datarow['title'] = 'id';
        array_push($arrCols, $datarow);
        $datarow['title'] = 'lesson_id';
        array_push($arrCols, $datarow);
        $datarow['title'] = 'question';
        array_push($arrCols, $datarow);
        $datarow['title'] = 'lessonName';
        array_push($arrCols, $datarow);
        for ($i = 1; $i <= $ansCount; $i++) {
            $datarow['title'] = 'hariult' . $i;
            array_push($arrCols, $datarow);
        }
        return $arrCols;
    }

    public function getAnswersByQuestionID($qid)
    {
        $answers = DB::table('answer')
            ->where('question_id', '=', $qid)
            ->get();
        dd($answers);
    }

    public function getAnsCount()
    {
        $answers = DB::table('answer')
            ->select(DB::raw('COUNT(*) as `too`'))
            ->groupBy('question_id')
            ->get();
        $currentVal = 0;
        foreach ($answers as $answer) {
            if ($currentVal < $answer->too) {
                $currentVal = $answer->too;
            }
        }
        return $currentVal;
    }

    public function getAnsCountByQid($qid)
    {
        $ans = DB::table('answer')
            ->where('question_id', '=', $qid)
            ->get();
        return $ans;
    }

    public function deleteQuestion(Request $req)
    {
        // return "A";
        DB::beginTransaction();
        try {

            $question = Question::find($req->qiestionID);
            $question->delete();

            Answer::where('question_id', $req->qiestionID)->delete();

            DB::commit();
            $array = array(
                'status' => 'success',
                'msg' => 'Амжилттай устгалаа!!!'
            );
            return $array;
        } catch (\Throwable $th) {
            DB::rollBack();
            $array = array(
                'status' => 'error',
                'msg' => 'Алдаа гарлаа!!!'
            );
            return $array;
        }
    }
}
