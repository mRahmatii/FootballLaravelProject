<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
        return
        [
            'first_name' => 'required|string|max:50|min:3',
            'last_name' =>'required|string|max:50|min:3',
        ];
    }

    public function messages()
    {
        return
        [
            'first_name.required' => 'لطفا نام خود را وارد کنید',
            'first_name.string' => 'لطفا نام خود را به حروف  وارد کنید',
            'first_name.min' => 'لطفا نام خود را وارد کنید',
            'first_name.max' => 'لطفا نام خود را وارد کنید',
            'last_name.required'  => 'لطفا نام خانوادگی خود را وارد کنید',
            'last_name.string' => 'لطفا نام خانوادگی خود را به حروف  وارد کنید',
            'last_name.min' => 'لطفا نام خانوادگی خود را وارد کنید',
            'last_name.max' => 'لطفا نام خانوادگی خود را وارد کنید',
        ];
    }
}
