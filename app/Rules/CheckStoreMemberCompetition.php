<?php

namespace App\Rules;

use App\Models\Member;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckStoreMemberCompetition implements ValidationRule
{
    public function __construct(
        private $memberId,
        private $competitionId,
    ) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $member = Member::find($this->memberId)->memberCompetitions()
            ->where(
                'competition_id',
                $this->competitionId
            )->exists();

        if ($member) {
            $fail('Member already registered in competition.');
        }
    }
}
