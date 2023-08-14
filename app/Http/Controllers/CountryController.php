<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    //

    public function getCountries()
    {
        $countries = Country::all();
        $token = csrf_token();
        return view('countries.index', compact('countries', 'token'));
    }

    public function addCountry(Request $req)
    {
        if ($req->ct_id) {



            DB::table('countries')->where('ct_id', $req->ct_id)->update([
                'ct_name' => $req->ct_name,
                'ct_desc' => $req->ct_desc,
                'ct_status' => $req->ct_status,
            ]);
            return response()->json([
                'message' => 'Country of operation successfully updated',
                'status' => '200',
            ]);

        } else {
            $dept = new Country();
            $dept->ct_name = $req->ct_name;
            $dept->ct_desc = $req->ct_desc;
            $dept->save();

            return response()->json([
                'code' => '200',
                'message' => 'Country of operation successfully added'
            ]);
        }


    }

}