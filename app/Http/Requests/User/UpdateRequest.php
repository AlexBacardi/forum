<?php

namespace App\Http\Requests\User;

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
            'name' => 'required|string|max:50|min:4',
            'age' => 'nullable|max:120|integer',
            'gender' => 'nullable',
            'city' => 'nullable|string|max:50',
            'info' => 'nullable|string|max:100',
            'web_site' => 'nullable|string|max:20',
            'avatar' => 'nullable|file',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'имя',
            'age' => 'возраст',
            'gender' => 'пол',
            'city' => 'город',
            'info' => 'о себе',
            'web_site' => 'веб-сайт',
            'avatar' => 'аватар',
        ];
    }
}
