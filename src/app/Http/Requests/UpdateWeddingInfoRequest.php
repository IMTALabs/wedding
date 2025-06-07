<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeddingInfoRequest extends FormRequest
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
            // Groom information
            'groom_name' => 'required|string|max:100',
            'groom_birthday' => 'nullable|date|before:today',
            'groom_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_groom' => 'nullable|string|min:10|max:1000',
            'groom_father' => 'nullable|string|max:100',
            'groom_mother' => 'nullable|string|max:100',
            
            // Bride information
            'bride_name' => 'required|string|max:100',
            'bride_birthday' => 'nullable|date|before:today',
            'bride_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_bride' => 'nullable|string|min:10|max:1000',
            'bride_father' => 'nullable|string|max:100',
            'bride_mother' => 'nullable|string|max:100',
            
            // Wedding date
            'wedding_date' => 'nullable|date|after_or_equal:today',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'groom_name.required' => 'Tên chú rể là bắt buộc.',
            'groom_name.max' => 'Tên chú rể không được quá 100 ký tự.',
            'groom_birthday.date' => 'Ngày sinh chú rể phải là một ngày hợp lệ.',
            'groom_birthday.before' => 'Ngày sinh chú rể phải trước ngày hôm nay.',
            'groom_image.image' => 'File ảnh chú rể phải là hình ảnh.',
            'groom_image.mimes' => 'Ảnh chú rể phải có định dạng: jpeg, png, jpg, gif.',
            'groom_image.max' => 'Ảnh chú rể không được lớn hơn 2MB.',
            'about_groom.min' => 'Giới thiệu về chú rể phải ít nhất 10 ký tự.',
            'about_groom.max' => 'Giới thiệu về chú rể không được quá 1000 ký tự.',
            
            'bride_name.required' => 'Tên cô dâu là bắt buộc.',
            'bride_name.max' => 'Tên cô dâu không được quá 100 ký tự.',
            'bride_birthday.date' => 'Ngày sinh cô dâu phải là một ngày hợp lệ.',
            'bride_birthday.before' => 'Ngày sinh cô dâu phải trước ngày hôm nay.',
            'bride_image.image' => 'File ảnh cô dâu phải là hình ảnh.',
            'bride_image.mimes' => 'Ảnh cô dâu phải có định dạng: jpeg, png, jpg, gif.',
            'bride_image.max' => 'Ảnh cô dâu không được lớn hơn 2MB.',
            'about_bride.min' => 'Giới thiệu về cô dâu phải ít nhất 10 ký tự.',
            'about_bride.max' => 'Giới thiệu về cô dâu không được quá 1000 ký tự.',
            
            'wedding_date.date' => 'Ngày cưới phải là một ngày hợp lệ.',
            'wedding_date.after_or_equal' => 'Ngày cưới phải từ hôm nay trở đi.',
        ];
    }
}
