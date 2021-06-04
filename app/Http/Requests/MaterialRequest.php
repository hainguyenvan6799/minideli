<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'material_name'=>'required',
            'material_qty'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'material_name.required'=>'Thông tin bắt buộc điền',
            'material_qty.required'=>'Thông tin bắt buộc điền',
        ];
    }
}
