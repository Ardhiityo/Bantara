<?php

namespace App\Http\Requests;

use App\Models\MemberCompetition;
use Illuminate\Support\Facades\Gate;
use App\Rules\CheckUpdateMemberCompetition;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberCompetitionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update', MemberCompetition::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'member_id' => ['required', 'exists:members,id', new CheckUpdateMemberCompetition(
                $this->member_id,
                $this->competition_id,
                $this->route('member_competition')->id
            )],
            'competition_id' => ['required', 'exists:competitions,id'],
            'status' => ['required', 'string', 'in:rejected,approved,processed'],
        ];
    }
}
