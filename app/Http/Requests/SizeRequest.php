<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'width' => ['required', 'integer', 'min:1', 'max:10000'],
            'height' => ['required', 'integer', 'min:1', 'max:10000'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
