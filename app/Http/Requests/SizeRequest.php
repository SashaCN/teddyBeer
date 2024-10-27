<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'width' => ['required', 'integer'],
            'height' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
