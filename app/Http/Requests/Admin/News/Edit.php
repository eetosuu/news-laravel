<?php

namespace App\Http\Requests\Admin\News;

use App\Enums\News\Status;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class Edit extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title' => ['required', 'string', 'min:3', 'max:150'],
            'author' => ['required', 'string', 'min:2', 'max:100'],
            'image' => ['nullable', 'image'],
            'status' => ['required', new Enum(Status::class)],
            'description' => ['nullable', 'string']

        ];
    }

    public function messages()
    {
       return [
           'required' => 'Поле :attribute обязательно для заполнения'
       ];
    }

    public function attributes()
    {
        return [
          'author' => 'Автор'
        ];
    }
}
