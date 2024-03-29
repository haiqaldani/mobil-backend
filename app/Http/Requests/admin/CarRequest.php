<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'kilometers' => 'integer',
            'price' => 'required',
            'color' => 'max:255',
            'vehicle_features_id' => 'max:255',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'title.required'    => 'Judul iklan harus diisi',
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
        ];
    }

    
}
