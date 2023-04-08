<?php

namespace App\Http\Requests;

use App\Models\Provider;
use Illuminate\Foundation\Http\FormRequest;

class ProviderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('create-provider', Provider::class);
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'address' => ['required', 'max:200'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
