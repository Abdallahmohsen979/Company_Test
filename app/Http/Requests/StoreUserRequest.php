<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'username' => 'required',
            'phone' => 'unique:users|digits:11|starts_with:010,011,012,015|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'profile_picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',


        ];
    }
}
