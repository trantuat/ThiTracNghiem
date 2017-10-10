<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckProfileRequest extends FormRequest
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
            'username' => 'required|alpha|min:6|max:255', // field name bắt buộc nhập và phải có tổi thiểu 6 ký tự
            'fullname' => 'min:6|max:50',
            'phone' => 'numeric|digits_between:10,11',
            'address' =>'min:2|max:50',
            // 'email' =>'required|email',
            // 'password' =>'required|min:6|max:25',
            // 'confirmPassword' =>'required|min:6|max:25'

        ];
    }
}
