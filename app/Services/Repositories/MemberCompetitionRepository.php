<?php

namespace App\Services\Repositories;

use App\Services\Interfaces\MemberCompetitionInterface;
use App\Models\MemberCompetition;

class MemberCompetitionRepository implements MemberCompetitionInterface
{
    public function gets()
    {
        return MemberCompetition::with(['competition:id,title', 'member:id,user_id', 'member.user:id,name'])->get();
    }
}
