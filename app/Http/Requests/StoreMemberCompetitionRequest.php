<?php

namespace App\Http\Requests;

use App\Rules\CheckStoreMemberCompetition;
use Illuminate\Foundation\Http\FormRequest;

class StoreMemberCompetitionRequest extends FormRequest
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
            'member_id' => ['required', 'exists:members,id', new CheckStoreMemberCompetition(
                $this->member_id,
                $this->competition_id
            )],
            'competition_id' => 'required|exists:competitions,id',
        ];
    }
}
