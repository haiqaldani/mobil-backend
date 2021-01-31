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
            'transmission' => 'required',
            'fuel' => 'required|max:255',
            'edition' => 'max:255',
            'cc' => 'integer',
            'kilometers' => 'integer',
            'price' => 'required',
            'price_description' => 'required|max:500',
            'color' => 'max:255',
            'vehicle_features_id' => 'max:255',
            'description' => 'required',
            'model' => 'required|max:255',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return[
            'title.required'    => 'Judul iklan harus diisi',
            'model.required'    => 'Model mobil harus diisi',
            'car_year.required'    => 'Tahun mobil harus diisi',
            'car_year.year'    => 'Tahun mobil harus dalam bentuk tahun ',
            'car_types_id.required'    => 'Tipe mobil harus dipilih ',
            'cc.number'    => 'CC harus dalam bentuk angka ',
            'transmission.required'    => 'Transmisi harus dipilih',
            'fuel.required'    => 'Tipe bahan bakar harus dipilih',
            'kilometers.required'    => 'Jarak tempuh harus diisi',
            'kilometers.number'    => 'Jarak tempuh harus dalam bentuk angka',
            'price.required'    => 'Harga harus diisi',
            'price.number'    => 'Harga harus dalam bentuk angka',
            'price.required'    => 'Deskripsi harga harus diisi',
            'condition.required'    => 'Kondisi harus diisi',
            'description.required'    => 'Deskripsi harus diisi',
            'image.required'    => 'Gambar harus diisi',
            'image.required'    => 'Gambar harus diisi minimal 1',
            'image.*.image'    => 'File di upload harus gambar',
            'image.*.mimes:jpeg,png,jpg,gif,svg'    => 'File di upload harus dalam bentuk format jpeg, png, jpg, gif, svg',
            'image.*.max:2048'    => 'Size file maksimal 2mb',
        ];
    }

}
