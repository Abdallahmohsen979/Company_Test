<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function list()
    {
        return  Employee::all();

    }


    public function store(StoreEmployeeRequest $request)
    {


        Employee::create($request->all());

        return response()->json([
            'message' => __('Created Successfully'),
            'status' => true,

        ],200);
    }


    public function findById( $id)
    {
        return Employee::findOrFail($id);

    }


    public function update($id,UpdateEmployeeRequest $request)
    {
        $employee=Employee::findOrFail($id);
        $employee->update($request->all());

        return response()->json([
            'message' => __('Updated Successfully'),
            'status' => true,

        ],200);
    }


    public function delete( $id)
    {
        Employee::findOrFail($id)?->delete();
        return response()->json([
            'message' => __('Deleted Successfully'),
            'status' => true,
        ],200);
    }
}
