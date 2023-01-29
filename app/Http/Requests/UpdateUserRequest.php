<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required',
            'phone' => ['digits:11','starts_with:010,011,012,015','numeric',Rule::unique('users')->ignore(request()->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore(request()->id)],
            'profile_picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',


        ];
    }
}
