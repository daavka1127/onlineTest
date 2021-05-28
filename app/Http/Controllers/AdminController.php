<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTable\Facades\DataTables;

class AdminController extends Controller
{
    public function show()
    {
        return view('test.User');
    }
    public function NewPage()
    {
        $data = DB::table('test')->get();
        return view('test.Test', compact('data'));
    }
    public function NewTest()
    {
        return view('test.TestNew');
    }
    protected function create(Request $req)
    {
        $data = new Test;
        $data->test_name = $req->test_name;
        $data->save();
        $data = DB::table('test')->get();
        return view('test.TestNew');
    }

    public function getDataTable()
    {
        $test = DB::table('test')->get();
        return DataTables::of($test)
            ->make(true);
    }
    function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 'edit') {
                $data = array(
                    'test_name' => $request->test_name,
                );
                DB::table('test')
                    ->where('id', $request->id)
                    ->update($data);
            }
            if ($request->action == 'delete') {
                DB::table('test')
                    ->where('id', $request->id)
                    ->delete();
            }
            return response()->json($request);
        }
    }
    public function back()
    {
        $data = DB::table('test')->get();
        return view('test.Test', compact('data'));
    }
    public function homeback()
    {
        return view('test.User');
    }
}
