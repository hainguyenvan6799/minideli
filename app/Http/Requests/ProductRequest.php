<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name'=>'required',
            'product_price'=>'required|numeric',
        ];
    }
    public function messages()
    {
        return[
            'product_name.required'=>'Thông tin bắt buộc điền',
            'product_price.required'=>'Thông tin bắt buộc điền',
            'product_price.numberic'=>'Chỉ được điền số',
        ];
    }
}
