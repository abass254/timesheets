<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Support\Facades\DB;


class CompanyController extends Controller
{
    //

    public function getCompanies()
    {
        $countries = Country::where('ct_status', '1')->get();
        // $companies = json_decode(DB::table('countries')->join('companies', 'countries.ct_id', 'companies.cp_country')->select('companies.*', 'countries.*')->get());

        $companies = Company::all();
        //return json_decode($companies);


        $token = csrf_token();
        return view('companies.index', compact('countries', 'token', 'companies'));
    }

    public function addCompany(Request $req)
    {
        if ($req->cp_id) {



            DB::table('companies')->where('cp_id', $req->cp_id)->update([
                'cp_name' => $req->cp_name,
                'cp_address' => $req->cp_address,
                'cp_country' => $req->cp_country,
                'cp_status' => $req->cp_status,
            ]);
            return response()->json([
                'message' => 'Company successfully updated',
                'status' => '200',
            ]);

        } else {
            $dept = new Company();
            $dept->cp_name = $req->cp_name;
            $dept->cp_address = $req->cp_address;
            $dept->cp_country = $req->cp_country;
            $dept->save();

            return response()->json([
                'code' => '200',
                'message' => 'Company successfully added'
            ]);
        }


    }
}