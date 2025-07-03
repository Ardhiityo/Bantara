<?php

namespace App\Services\Repositories;

use App\Models\MemberCompetition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\MemberCompetitionInterface;

class MemberCompetitionRepository implements MemberCompetitionInterface
{
    public function gets()
    {
        if (Auth::user()->hasRole('admin')) {
            return MemberCompetition::with(['competition:id,title', 'member:id,user_id', 'member.user:id,name,email'])->get();
        }
        return MemberCompetition::with(['competition:id,title', 'member:id,user_id', 'member.user:id,name,email'])
            ->where('member_id', Auth::user()->member->id)
            ->get();
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

    public function getTotal()
    {
        return MemberCompetition::whereHas('competition', function ($query) {
            $query->where('end_date', '>=', now());
        })->count();
    }

    public function getLatest()
    {
        return MemberCompetition::with(
            ['competition:id,title', 'member:id,user_id', 'member.user:id,name']
        )->select('id', 'member_id', 'competition_id')
            ->limit(3)
            ->get();
    }

    public function check($competition)
    {
        return Auth::user()->member->memberCompetitions()->where('competition_id', $competition->id)->exists();
    }
}
