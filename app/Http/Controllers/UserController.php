<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:sanctum');
    }

    public function list()
    {
        return  User::all();

    }


    public function store(StoreUserRequest $request)
    {

        $image_path = $request->file('image')->store('image', 'public');

        User::create($request->all()+['profile_picture'=>$image_path]);
        return response()->json([
            'message' => __('Created Successfully'),
            'status' => true,

        ],200);
    }


    public function findById( $id)
    {
        $user=User::findOrFail($id);
        return $user;
    }




    public function update($id,UpdateUserRequest $request)
    {
        $user=User::findOrFail($id);
        $image_path = $request->file('image')->store('image', 'public');

        $user->update($request->all()+['profile_picture'=>$image_path]);

        return response()->json([
            'message' => __('Updated Successfully'),
            'status' => true,

        ],200);
    }



    public function delete( $id)
    {
        User::findOrFail($id)?->delete();
        return response()->json([
            'message' => __('Deleted Successfully'),
            'status' => true,
        ],200);
    }

}
