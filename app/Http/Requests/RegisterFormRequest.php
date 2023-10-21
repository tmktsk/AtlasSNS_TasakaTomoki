<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "username" => "required|min:2|max:12",
            "mail" => ['required','min:5','max:40','email',
                Rule::unique('users', 'mail')->ignore(Auth::user()->id),],
            "password" => "required|alpha_num|min:8|max:20",
            "password_confirm" => "required|alpha_num|min:8|max:20|same:password",
            "bio" => "nullable|max:150",
            "images" => [
                "nullable",
                "file",
                "mimes:jpg,png,bmp,gif,svg",
            ],
        ];
    }
}
