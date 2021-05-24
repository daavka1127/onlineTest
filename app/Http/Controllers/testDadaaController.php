<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class testDadaaController extends Controller
{
    public function test(){
        $answers = DB::table('answer')->get();
        return view('testDadaa', compact('answers'));
    }
}
