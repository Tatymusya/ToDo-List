<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string|min:3|max:200',
            'descrition' => 'mediumText|nullable',
            'completed' => 'boolean',
        ];
    }
}
