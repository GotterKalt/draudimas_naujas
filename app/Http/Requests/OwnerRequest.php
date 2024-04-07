<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:15',
            'surname'=>'required|string|min:3|max:15',
            'phone'=>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>__('Vardas yra privalomas'),
            'name.min'=>__('Vardas turi buti ilgesnis nei 2 simboliai'),
            'name.max'=>__('Vardas turi buti trumpesnis nei 16 simboliu'),
            'name'=>__('Vardas yra neteisingas'),
            'surname.required'=>__('Pavardė yra privaloma'),
            'surname.min'=>__('Pavardė turi buti ilgesne nei 2 simboliai'),
            'surname.max'=>__('Pavardė turi buti trumpesne nei 16 simboliu'),
            'surname'=>__('Pavardė yra neteisinga'),
            'phone.required'=>__('Telefono numeris yra privalomas'),
            'phone.numeric'=>__('Telefono numeris užrašomas skaičiais'),
        ];
    }
}
