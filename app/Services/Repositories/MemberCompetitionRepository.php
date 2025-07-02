<?php

namespace App\Services\Repositories;

use App\Models\MemberCompetition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\MemberCompetitionInterface;

class MemberCompetitionRepository implements MemberCompetitionInterface
{
    public function gets()
    {
        return MemberCompetition::with(['competition:id,title', 'member:id,user_id', 'member.user:id,name'])->get();
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            MemberCompetition::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store member competition']);
        }
    }
}
