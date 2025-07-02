<?php

namespace App\Rules;

use Closure;
use App\Models\Member;
use App\Models\MemberCompetition;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckUpdateMemberCompetition implements ValidationRule
{
    public function __construct(
        private $memberId,
        private $competitionId,
        private $memberCompetitionId
    ) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $alreadyExists = MemberCompetition::where('id', '!=', $this->memberCompetitionId)
            ->where('member_id', $this->memberId)
            ->where('competition_id', $this->competitionId)
            ->exists();

        if ($alreadyExists) {
            $fail('Member already registered in competition.');
        }
    }
}
