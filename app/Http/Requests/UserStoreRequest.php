<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('create-user', User::class);
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
}
