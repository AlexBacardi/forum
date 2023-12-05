<?php

namespace App\Http\Requests\Admin\Category;

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
            'title' => ['required', 'string', 'max:50', 'min:5'],
            'descr' => ['required', 'string', 'max:100', 'min:5'],
            'preview_img' => ['required', 'image', 'mimes:png,jpg', 'dimensions:max_width=54, max_heigth=54'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название',
            'descr' => 'Описание',
            'preview_img' => 'Файл',
        ];
    }
}
