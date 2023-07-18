<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required| unique:products|string|min:3',
           'small_description' =>' required',
            'description'=>'required',
            'orginal_price' => 'requried',
            'selling_price' => 'requried',
            'image'=>'required',
            'qty' => 'required',
            'tax' => 'required',
            'meta_title'=>'required',
            'meta_descrip'=>'required',
            'meta_keywords'=>'required'
        ];
    }
}
