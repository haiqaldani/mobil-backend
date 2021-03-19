<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Albert221\Filepond\FilepondSerializer;
use Albert221\Filepond\FilepondRule;

class CarGalleryRequest extends FormRequest
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
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'car_model_id.required'    => 'Model Mobil harus diisi',
            // 'image.required'    => 'Gambar model  harus diisi',
            // 'image.image'    => 'Harus berupa image',
            // 'image.mimes:jpeg,png,jpg,gif,svg'    => 'Format harus jpeg, png, jpg, gif, svg',
            // 'image.max:2048'    => 'Maksimal size image harus 2mb',
        ];
    }
}
