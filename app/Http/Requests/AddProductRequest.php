<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
        
        'category_id'=>'required',
        'brand_id'=>'required',
        'product_name'=>'required',
        'product_short_description'=>'required',
        'product_long_description'=>'required',
        'product_price'=>'required',
        'product_size'=>'required',
        'product_color'=>'required',
        
        ];
    }
}
