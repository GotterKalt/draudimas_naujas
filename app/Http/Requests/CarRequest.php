<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'reg_number'=>'required|regex:/^[A-Za-z]{3}\d{3}$/',
            'model'=>'required',
            'photo'=>'nullable|mimes:jpg,png,jpeg|max:5048'
        ];
    }
    public function messages()
    {
        return [
            'reg_number.regex'=>__('Leidžiamos tik 3 raidės ir 3 skaičiai'),
            'reg_number.required'=>__('Mašinos numeris yra privalomas'),
            'model.required'=>__('Nurodikyte modelį'),
            'photo.mimes'=>__('Nuotraukos palaikomi formatai: jpg, png, jpeg'),
            'photo.max'=>__('Nuotraukos maksimalus dydis: 5048 kB'),

        ];
    }
}
