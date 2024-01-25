<?php

namespace App\Http\Requests\Artwork;

use Illuminate\Foundation\Http\FormRequest;

class ArtworkStoreRequest extends FormRequest
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
            'title' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'category_id' => ['required', 'exists:categories,id'],
            'theme_id' => ['required', 'exists:themes,id'],
            'price' => ['integer', 'min:0'],
            'quantity' => ['integer', 'min:0'],
        ];
    }
}
