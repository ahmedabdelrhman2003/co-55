<?php

namespace App\Http\Requests\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
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
            'location_image' => ['required', 'array', 'min:0'],
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'article' => ['required', 'max:1000'],
            'icon_title' => ['required', 'array', 'min:0'],
            'icon_title.*' => ['max:255'],
            'image' => ['image', 'required', 'mimes:jpeg,jpg,png,svg'],
            'icon_image.*' => ['mimes:jpeg,jpg,png,svg'],
            'icon_image' => ['array', 'required', 'min:0'],

        ];
    }
}