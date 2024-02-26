<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
            'title' => 'required|max:50',
            'text' => 'required',
            'price' => 'required|numeric|digits_between:2,11',
            'images' => 'mimes:jpeg,png,bmp',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'is your ad a ghust ?!!',
            'title.max' => 'too long',
            'text.required' => 'ad with no text , wow',
            'price.required' => 'is this for free ?'
        ];
    }
}
