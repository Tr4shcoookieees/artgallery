<?php

namespace App\Http\Requests\Order;

use App\Models\Artwork;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
        $product = Artwork::where('id', $this->get('product_id'))->first();

        return [
            'product_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
