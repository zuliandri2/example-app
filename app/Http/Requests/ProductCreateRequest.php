<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|regex:/[0-9]+$/|digits_between:1,999999999|unique:App\Models\Products',
            'name' => 'required|max:255|string',
            'description' => 'required|max:500|string',
            'price' => 'required|regex:/[0-9]+$/|digits_between:1,999999999',
            'image' => 'nullable|mimes:jpg,bmp,png'
        ];
    }

    public function messages(): array
    {
        return [
            'id.regex' => 'The :attribute field must be a number',
            'price.regex' => 'The :attribute field must be a number',
        ];
    }

    protected $stopOnFirstFailure = true;

    protected $redirect = '/products/create';
}
