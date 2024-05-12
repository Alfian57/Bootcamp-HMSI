<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'gender' => ['required', Rule::in(Gender::MALE->value, Gender::FEMALE->value)],
            'date_of_birth' => ['required', 'date'],
            'phone_number' => ['required', 'string', 'max:25'],
            'photo_profile' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
            'is_admin' => ['required', 'boolean'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => __('dashboard/users.form.name.attribute'),
            'email' => __('dashboard/users.form.email.attribute'),
            'password' => __('dashboard/users.form.password.attribute'),
            'password_confirmation' => __('dashboard/users.form.password-confirmation.attribute'),
            'gender' => __('dashboard/users.form.gender.attribute'),
            'date_of_birth' => __('dashboard/users.form.date-of-birth.attribute'),
            'phone_number' => __('dashboard/users.form.phone-number.attribute'),
            'photo_profile' => __('dashboard/users.form.photo-profile.attribute'),
            'is_active' => __('dashboard/users.form.is-active.attribute'),
            'is_admin' => __('dashboard/users.form.is-admin.attribute'),
        ];
    }
}
