<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProductUpdateRequest extends FormRequest
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
            'id' => 'required|regex:/[0-9]+$/|digits_between:1,999999999',
            'name' => 'required|max:255|string',
            'description' => 'required|max:500|string',
            'price' => 'required|regex:/[0-9]+$/|digits_between:1,999999999',
            'image' => 'required|image|max:1024'
        ];
    }

    protected $stopOnFirstFailure = true;

    protected $redirect = '';

    public function messages()
    {
        return [
            'id.regex' => 'The :attribute field must be a number',
            'price.regex' => 'The :attribute field must be a number',
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated($key, $default);
        if (isset($validated['image'])) {
            $image = $validated['image'];
            $validated['image'] = $validated['id'] . '_' . $image->getClientOriginalName();
        }
        return $validated;
    }

    public function storeFile(): void
    {
        if ($this->hasFile('image')) {
            Storage::putFileAs('public', $this->file('image'), $this->id . '_' . $this->file('image')->getClientOriginalName());
        }
    }
}
