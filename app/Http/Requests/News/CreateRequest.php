<?php

namespace App\Http\Requests\News;

use App\Enums\NewsStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_ids' => ['required', 'array'],
            'category_ids.*' => ['exists:categories,id'],
            'title' =>  ['required', 'string', 'min:5', 'max:200'],
            'author' => ['nullable', 'string', 'min:2', 'max:50'],
            'status' => ['required', new Enum(NewsStatus::class)],
            'image' => ['sometimes'],
            'description' => ['nullable', 'string']
        ];
    }
    public function getCategoryIds(): array
    {
        return (array) $this->validated('category_ids');
    }
}
