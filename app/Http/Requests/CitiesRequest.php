<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitiesRequest extends FormRequest
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
            'city_name'=>'required',
            'timezone'=>'required',
            'longitude'=>'required|digits:15',
            'latitude'=>'required|digits:15',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'Поле :attribute обязательно для ввода',
            'digits'=>'Значение поля :attribute должно быть числом'
        ];
    }
}
