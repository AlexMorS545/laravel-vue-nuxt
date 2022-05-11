<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentRequest extends FormRequest
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
            'equipment_type_id' => 'required',
            'serial_number' => 'required|unique:equipments|min:8',
        ];
    }

    public function messages()
    {
        return [
            'equipment_type_id.required' => 'Тип оборудования обязательное поле',
            'serial_number.required' => 'Серийный номер обязательное поле',
            'serial_number.unique' => 'Данный номер уже существует, введите другой',
        ];
    }
}
