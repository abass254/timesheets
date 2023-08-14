<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    //

    public function getDepartments()
    {
        $departments = Department::all();
        $token = csrf_token();
        return view('departments.index', compact('departments', 'token'));
    }

    public function addDepartment(Request $req)
    {
        if ($req->dp_id) {

            DB::table('departments')->where('dp_id', $req->dp_id)->update([
                'dp_name' => $req->dp_name,
                'dp_desc' => $req->dp_desc,
                'dp_status' => $req->dp_status,
            ]);
            return response()->json([
                'message' => 'Department successfully updated',
                'status' => '200',
            ]);

        } else {
            $dept = new Department();
            $dept->dp_name = $req->dp_name;
            $dept->dp_desc = $req->dp_desc;
            $dept->save();

            return response()->json([
                'code' => '200',
                'message' => 'Department successfully added'
            ]);
        }


    }

    public function password()
    {
        $pass = Hash::make('11223344');
        return $pass;

    }

}