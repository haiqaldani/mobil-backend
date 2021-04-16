<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMobilRequest extends FormRequest
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
            'id_seller' => 'exists:users,id',
            'title' => 'required|max:255',
            'car_year' => 'required|date_greater_than:1900',
            'car_types_id' => 'required|integer|exists:car_types,id',
            'merk_id' => 'required|integer|exists:merks,id',
            'car_model_id' => 'required|integer|exists:car_models,id',
            'car_variant_id' => 'required|integer|exists:car_variants,id',
            'kilometers' => 'integer',
            'price' => 'required',
            'condition' => 'required',
            'color' => 'max:255',
            'description' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return[
            'title.required'    => 'Judul iklan harus diisi',
            'car_year.required'    => 'Tahun mobil harus diisi',
            'car_year.year'    => 'Tahun mobil harus dalam bentuk tahun ',
            'car_types_id.required'    => 'Tipe mobil harus dipilih ',
            'merk_id.required'    => 'Merk harus dipilih ',
            'car_model_id.required'    => 'Model mobil harus dipilih ',
            'car_variant_id.required'    => 'Varian mobil harus dipilih ',
            'kilometers.required'    => 'Jarak tempuh harus diisi',
            'kilometers.number'    => 'Jarak tempuh harus dalam bentuk angka',
            'price.required'    => 'Harga harus diisi',
            'condition.required'    => 'Kondisi harus diisi',
            'description.required'    => 'Deskripsi harus diisi',
            'image.required'    => 'Gambar harus diisi minimal 1',
            'image.*.image'    => 'File di upload harus gambar',
            'image.*.mimes:jpeg,png,jpg,gif,svg'    => 'File di upload harus dalam bentuk format jpeg, png, jpg, gif, svg',
            'image.*.max:2048'    => 'Size file maksimal 2mb',
        ];
    }

}
