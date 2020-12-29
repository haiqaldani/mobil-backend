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
            'title' => 'required|max:255',
            'car_year' => 'required',
            'car_types_id' => 'required|integer|exists:car_types,id',
            'transmission' => 'required',
            'fuel' => 'required|max:255',
            'edition' => 'required|max:255',
            'cc' => 'required|integer',
            'kilometers' => 'required|integer',
            'price' => 'required|integer',
            'price_description' => 'required',
            'color' => 'required|max:255',
            'vehicle_features' => 'required|max:255',
            'description' => 'required'
        ];
    }
}
