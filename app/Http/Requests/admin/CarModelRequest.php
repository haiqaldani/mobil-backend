<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarModelRequest extends FormRequest
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
            'merk_id' => 'required|exists:merks,id',
            'model' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return[
            'merk_id.required'    => 'Merk  Mobil harus diisi',
            'model.required'    => 'Model  Mobil harus diisi',
            'model.max:255'    => 'Model  Mobil maksimal 255 huruf',
            'image.required'    => 'Gambar model  harus diisi',
            'image.image'    => 'Harus berupa image',
            'image.mimes:jpeg,png,jpg,gif,svg'    => 'Format harus jpeg, png, jpg, gif, svg',
            'image.max:2048'    => 'Maksimal size image harus 2mb',
        ];
    }
}
