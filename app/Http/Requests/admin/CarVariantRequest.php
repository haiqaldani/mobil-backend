<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarVariantRequest extends FormRequest
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
            'car_model_id' => 'required|exists:car_models,id',
            'edition' => 'required|max:255',
            'transmission' => 'required',
            'cc' => 'required|integer',
            'variant' => 'max:255',

        ];
    }

    public function messages()
    {
        return[
            'car_model_id.required'    => 'Model  Mobil harus diisi',
            'edition.required'    => 'Model Mobil harus diisi',
            'edition.max:255'    => 'Model Mobil maksimal 255 huruf',
            'transmission.required'    => 'Transmisi harus dipilih',
            'cc.required'    => 'CC Mobil harus diisi',
            'cc.integer'    => 'CC Mobil harus berupa angka',
            // 'variant.required'    => 'Variant Mobil harus diisi',
            'variant.max:255'    => 'Variant Mobil maksimal 255 huruf',
            
        ];
    }
}
