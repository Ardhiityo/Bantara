<?php

namespace App\Rules;

use Closure;
use App\Models\Member;
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
        $member = Member::find($this->memberId)->memberCompetitions()
            ->where('id', '!=', $this->memberCompetitionId)
            ->where(
                'competition_id',
                $this->competitionId
            )->exists();

        if ($member) {
            $fail('Member already registered in competition.');
        }
    }
}
