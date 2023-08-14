<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Department;

class AccountController extends Controller
{
    //

    public function getUsers()
    {
        $user = User::all();
        $token = csrf_token();
        return view('users.index', compact('user', 'token'));
    }

    public function createUser()
    {

        $supervisor = User::where('is_supervisor', '1')->get();
        $company = Company::where('cp_status', '1')->get();
        $department = Department::where('dp_status', '1')->get();
        return view('users.create', compact('supervisor', 'company', 'department'));
    }

    public function addUser()
    {

    }


}