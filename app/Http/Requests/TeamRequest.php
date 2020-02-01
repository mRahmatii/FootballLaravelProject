<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required|string|max:50|min:3',
        ];
    }

    public function messages()
    {
        return
        [
            'name.required' => 'لطفا نام تیم را وارد کنید',
            'name.string' => 'لطفا نام تیم را به حروف  وارد کنید',
            'name.min' => ' نام تیم باید بیشتر از دو حرف باشد',
            'name.max' => 'لطفا نام تیم را وارد کنید',
        ];
    }
}
