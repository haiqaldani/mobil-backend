<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VehicleFeatureRequest extends FormRequest
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
            'category' => 'required',
            'feature' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return[
            'category.required'    => 'Kategori fitur harus diisi',
            'feature.required'    => 'Fitur mobil harus diisi',
        ];
    }
}
