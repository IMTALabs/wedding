<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWishRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'wish' => 'required|string|max:1000',
            'wedding_id' => 'required|integer|exists:weddings,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên của bạn là bắt buộc.',
            'name.string' => 'Tên của bạn phải là một chuỗi ký tự.',
            'name.max' => 'Tên của bạn không được vượt quá 255 ký tự.',
            'wish.required' => 'Lời chúc là bắt buộc.',
            'wish.string' => 'Lời chúc phải là một chuỗi ký tự.',
            'wish.max' => 'Lời chúc không được vượt quá 1000 ký tự.'
        ];
    }
}
