<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use DB;

class LessonController extends Controller
{
    public function show(){
        $data = DB::table('lesson')->get();
        return view('test.Lesson', compact('data'));
    }
    public function NewLesson(){
        return view('test.LessonNew');
    }
    protected function create(Request $req)
    {
            $data = new Lesson ;
            $data ->rank=$req->rank;
            $data ->lessonName =$req->lessonName;
            $data ->save();
            $data=DB::table('lesson')->get();
            return view('test.LessonNew');
        }
      
      public function getDataTable()
  {
    $lesson=DB::table('lesson')->get();
    return DataTables::of($lesson)
      ->make(true);
  }
}
