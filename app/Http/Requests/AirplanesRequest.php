<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirplanesRequest extends FormRequest
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
            'model_name'=>'required',
            'count_seats'=>'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'Поле :attribute обязательно для ввода',
            'integer'=>'Поле :attribute должно содержать только цифры',
        ];
    }
}
