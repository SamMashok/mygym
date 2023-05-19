<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->has('type') && $this->user()->cannot('change-type', $this->user)) {
            return false;
        }

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
            'name'         => 'filled',
            'email'        => ['email', $unique = Rule::unique('users')->ignore($this->user)],
            'gender'       => 'filled',
            'username'     => ['alpha_num', $unique],
            'old_password' => 'required_with:password|current_password',
            'password'     => 'confirmed',
        ];
    }
}
