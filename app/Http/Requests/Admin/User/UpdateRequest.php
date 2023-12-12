<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50', 'min:4',],
            'age' => ['nullable', 'max:120', 'integer',],
            'city' => ['nullable', 'string', 'max:50',],
            'info' => ['nullable', 'string', 'max:100',],
            'banned_until' => ['required', 'date'],
            'role' => ['required',],
        ];
    }
}
