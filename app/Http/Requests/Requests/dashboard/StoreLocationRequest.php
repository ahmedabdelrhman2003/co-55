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
            'name' => ['required'],
            'description' => ['required',  'min:10'],
            'article' => ['required'],
            'icon_title' => ['required'],
            'image' => ['image', 'required', 'mimes:jpeg,jpg,png,svg', 'max:1000'],
            'location_image' => ['required', 'max:1000'],
            'icon_name' => ['required'],
            'icon_image' => ['required'],
        ];
    }
}
