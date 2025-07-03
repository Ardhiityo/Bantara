<?php

namespace App\Http\Requests;

use App\Models\Member;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update', Member::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->route('member')->user->id],
            'phone' => ['nullable', 'numeric', 'unique:members,phone,' . $this->route('member')->id],
            'password' => ['nullable', 'min:8', 'max:25'],
            'position_id' => ['nullable', 'exists:positions,id'],
            'is_verified' => ['required', 'boolean']
        ];
    }
}
