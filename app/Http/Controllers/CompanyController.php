<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return  Company::all();

    }


    public function store(StoreCompanyRequest $request)
    {


        Company::create($request->all());

        return response()->json([
            'message' => __('Created Successfully'),
            'status' => true,

        ],200);
    }


    public function findById( $id)
    {
        return Company::findOrFail($id);

    }




    public function update($id,UpdateCompanyRequest $request, Company $company)
    {

        $company->update($request->all());

        return response()->json([
            'message' => __('Updated Successfully'),
            'status' => true,

        ],200);
    }



    public function delete( $id)
    {
        Company::findOrFail($id)?->delete();
        return response()->json([
            'message' => __('Deleted Successfully'),
            'status' => true,
        ],200);
    }
}
