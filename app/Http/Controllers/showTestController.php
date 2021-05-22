<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Student;

class showTestController extends Controller
{
    public function showTest(){
        if (Session::has('user'))
        {
            return Session::get('user');
        }else{
            return view('layouts.layout_user_login');
        }
    }

    public function login_user(Request $req){
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
}
