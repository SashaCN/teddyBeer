<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'title' => ['required', 'string', 'max:191'],
            'description' => ['nullable', 'string', 'max:1000'],
            'availability' => ['boolean'],
            'color' => ['required', 'string', 'max:191'],

            'sizes' => ['nullable', 'array'],
            'sizes.*' => ['required', 'integer', 'exists:sizes,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
