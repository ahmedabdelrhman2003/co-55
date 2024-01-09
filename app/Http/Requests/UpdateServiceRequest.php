<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required', 'min:10'],
            'icon_title' => ['required', 'array'],
            'image' => ['image', 'required', 'mimes:jpj,png,jpeg,svg', 'max:1000'],
            'icon_title2' => ['array'],
            'icon_image' => ['array']
        ];
    }
}
