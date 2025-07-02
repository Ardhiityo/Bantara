<?php

namespace App\Services\Repositories;

use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\MemberInterface;

class MemberRepository implements MemberInterface
{
    public function getPaginated()
    {
        return Member::with(['user:id,name,email'])->select('id', 'user_id', 'is_verified', 'phone')->paginate(10);
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            User::create($data)->member()->create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store member']);
        }
    }
}
