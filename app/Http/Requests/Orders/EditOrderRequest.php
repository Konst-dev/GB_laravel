<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class EditOrderRequest extends FormRequest
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
            'name' =>  ['required', 'string', 'min:3', 'max:60'],
            'phone' => ['required', 'string', 'min:7', 'max:15'],
            'email' => ['required', 'string', 'min:7', 'max:100'],
            'description' => ['nullable', 'string']
        ];
    }
}
