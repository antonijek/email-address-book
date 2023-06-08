<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstName'=>'required|max:255|string|min:3',
            'lastName'=>'required|max:255|string|min:3',
            'email'=>'required|max:255|email|min:3',
            'image' => 'file|mimes:jpeg,png|max:2048',
        ];
    }
}
