<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\LessonDataTable;
use App\Models\Lesson;
use DB;

class LessonController extends Controller
{
    public function show(LessonDataTable $lesson){
      return $lesson->render('test.Lesson');
    }
    public function back(LessonDataTable $lesson)
    {
        return $lesson->render('test.Lesson');

    }
    public function NewLesson(){
        return view('test.LessonNew');
    }
    protected function create(Request $req)
    {
            $lesson = new Lesson ;
            $lesson ->test_id=$req->test_id;
            $lesson ->rank=$req->rank;
            $lesson ->lessonName =$req->lessonName;
            $lesson ->question_count=$req->question_count;
            $lesson ->save();
            $lesson=DB::table('lesson')->get();
            return view('test.LessonNew');
        }
      
        public function destroy($id)
        {
            $lesson = new Article;
            $lesson->deleteData($id);
    
            return response()->json(['success'=>'Article deleted successfully']);
        }
      public function getDataTable()
  {
    $lesson=DB::table('lesson')->get();
    return DataTables::of($lesson)
      ->make(true);
  }
}
