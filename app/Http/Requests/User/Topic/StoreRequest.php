<?php

namespace App\Http\Requests\User\Topic;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:6', 'max:50'],
            'content' => ['required', 'string', 'min:10', 'max:300'],
            'category_id' => ['required', 'integer',],
        ];
    }
}