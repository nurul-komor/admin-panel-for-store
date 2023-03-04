<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'productName' => 'required|max:20',
            'imei_1' => 'required|unique:products|numeric',
            'imei_2' => 'required | unique:products|numeric',
            'model_no' => 'required',
            'product_code' => 'required|numeric',
            'qty' => 'required',
            'price' => 'required',
            'details' => 'required',
            'productImage' => 'required|mimes:jpg,png,jif,file',
            'brand_id' => 'required',
        ];
    }
}
