<?php

namespace App\Http\Requests\Resources;

use Illuminate\Foundation\Http\FormRequest;

class EditResourceRequest extends FormRequest
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
            'resource_name' =>  ['required', 'string', 'min:3', 'max:60'],
            'url' => ['required', 'string', 'min:7', 'max:256'],
        ];
    }
}
